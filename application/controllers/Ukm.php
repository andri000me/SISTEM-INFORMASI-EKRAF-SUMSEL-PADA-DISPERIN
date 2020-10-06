<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_ukm','MK');
		$this->load->model('Model_admin','MA');
	}

	public function index()
	{
		$data['title'] = "E-Commerce Sumatera Selatan";
		$this->load->view('frontend/temp/header',$data);
		$this->load->view('frontend/ukm/daftar');
		$this->load->view('frontend/temp/footer');

	}
	public function login()
	{
		$data['title'] = "E-Commerce Sumatera Selatan";
		$this->load->view('frontend/temp/header',$data);
		$this->load->view('frontend/ukm/login');
		$this->load->view('frontend/temp/footer');

	}
	public function lupapas()
	{
		$data['title'] = "E-Commerce Sumatera Selatan";
		$this->load->view('frontend/temp/header',$data);
		$this->load->view('frontend/ukm/lupapas');
		$this->load->view('frontend/temp/footer');

	}
	public function Beranda()
	{

		$nik = $this->session->userdata('nik');

		if($nik){
			//jika ada session
			$data['user'] = $this->db->get_where('tbl_daftar_ukm',['nik'=>$nik])->row_array();


			$data['title'] = "E-Commerce Sumatera Selatan";
			$data['data_klasterisasi']= $this->MA->listklasterisasi();
			$data['data_kategoribek']= $this->MA->listkategoribek();
			$data['data_daerah']= $this->MA->listdaerah();
			$data['data_pekerjaan']= $this->MA->listPekerjaan();
			$data['data_kecamatan']= $this->MA->listkecamatan();
			$data['data_kabupaten']= $this->MA->listkabupaten();
			$data['data_desa']= $this->MA->listdesa();
			$this->load->view('frontend/ukm/headerber',$data);
			$this->load->view('frontend/ukm/beranda',$data);
			$this->load->view('frontend/temp/footer');

		}else{
			 //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Silahkan Login !');

			redirect('Ukm/Login',$data);
		}

		
	}

	public function perbaharui($id_daftar)
	{
		$id_daftar;
		//data diri
		$nik = $this->input->post('nik', true);
		$nama_pemilik = $this->input->post('nama_pemilik', true);
		$ttl = $this->input->post('ttl', true);
		$handphone = $this->input->post('handphone', true);
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$status = $this->input->post('status', true);

		//data berkas
		$photo_diri = $_FILES['photo_diri']['name'];
		$photo_ktp = $_FILES['photo_ktp']['name'];
		$photo_npwp = $_FILES['photo_npwp']['name'];	
		$photo = $_FILES['photo']['name'];	

		//data ukm
		$id_klasterisasi = $this->input->post('id_klasterisasi', true);
		$id_bekraf = $this->input->post('id_bekraf', true);
		$id_daerah = $this->input->post('id_daerah', true);
		$kabupaten = $this->input->post('kabupaten', true);
		$kecamatan = $this->input->post('kecamatan', true);
		$kelurahan = $this->input->post('kelurahan', true);
		$desa = $this->input->post('desa', true);
		$pekerjaan = $this->input->post('pekerjaan', true);
		$nama_usaha = $this->input->post('nama_usaha', true);
		$status = $this->input->post('status', true);
		$alamat = $this->input->post('alamat', true);
		$latitude = $this->input->post('latitude', true);
		$longtitude = $this->input->post('longtitude', true);
		$latitude = $this->input->post('latitude', true);
		$link_usaha = base_url('p');
		$status_pemilik = $this->input->post('status_pemilik', true);
		$status_usaha = $this->input->post('status_usaha', true);


		$daftar = [
			 'nik' => htmlspecialchars($nik),
             'nama_pemilik' => htmlspecialchars($nama_pemilik),
             'handphone' => htmlspecialchars($handphone),
             'email' => htmlspecialchars($email),
             'password' => htmlspecialchars($password),
             'status' => htmlspecialchars($status),
		];

		$berkas = [
			'id_daftar' => htmlspecialchars($id_daftar),
			'photo_diri' => htmlspecialchars($photo_diri),
			'photo_ktp' => htmlspecialchars($photo_ktp),
			'photo_npwp' => htmlspecialchars($photo_npwp),
			'photo' => htmlspecialchars($photo),
		];
		

		$master = [
			'id_daftar' => htmlspecialchars($id_daftar),
			'id_klasterisasi' => htmlspecialchars($id_klasterisasi),
			'id_bekraf' => htmlspecialchars($id_bekraf),
			'nik' => htmlspecialchars($nik),
			'nama_pemilik' => htmlspecialchars($nama_pemilik),
			'ttl' => htmlspecialchars($ttl),
			'pekerjaan' => htmlspecialchars($pekerjaan),
			'photo' => htmlspecialchars($photo),
			'nama_usaha' => htmlspecialchars($nama_usaha),
			'alamat' => htmlspecialchars($alamat),
			'kabupaten' => htmlspecialchars($kabupaten),
			'kecamatan' => htmlspecialchars($kecamatan),
			'desa' => htmlspecialchars($desa),
			'handphone' => htmlspecialchars($handphone),
			'latitude' => htmlspecialchars($latitude),
			'longtitude' => htmlspecialchars($longtitude),
			'link_usaha' =>htmlspecialchars($link_usaha),
			'status_pemilik' => htmlspecialchars($status_pemilik),
			'status_usaha' => htmlspecialchars($status_usaha)
		];

			if (!empty($_FILES['photo_diri']['name'])) 
			{
				$upload = $this->_do_upload_diri();
				$berkas['photo_diri'] = $upload;
			}
			if(!empty($_FILES['photo_ktp']['name'])) 
			{
				$upload = $this->_do_upload_ktp();
				$berkas['photo_ktp'] = $upload;
			}
			if (!empty($_FILES['photo_npwp']['name'])) 
			{
				$upload = $this->_do_upload_npwp();
				$berkas['photo_npwp'] = $upload;
			}if (!empty($_FILES['photo']['name'])) 
			{
				$upload = $this->_do_upload_ukm();
				$berkas['photo'] = $upload;
			}

		
		$this->MK->tambahMaster($master);
		$this->MK->tambahBerkas($berkas);
		$this->MK->EditDaftar($daftar,$id_daftar);
		
		$this->session->set_userdata('id_daftar',$id_daftar);
		$data = $this->session->set_flashdata('pesan','Selamat Data Berhasil Di Ajukan !');
		//kembali
		redirect('Ukm/statusdaftar',$data);
	}

	//upload foto
	private function _do_upload_diri()
	{
		$config['upload_path'] 		= './assets/upload/dataukm';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 5000;
		$config['max_width'] 		= 5000;
		$config['max_height']  		= 5000;
		$config['file_name'] 		= $_FILES['photo_diri']['name'];
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo_diri')) {
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('Ukm/perbaharui',$data);
		}
		return $this->upload->data('file_name');
	}
	private function _do_upload_ktp()
	{
		$config['upload_path'] 		= './assets/upload/dataukm';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 5000;
		$config['max_width'] 		= 5000;
		$config['max_height']  		= 5000;
		$config['file_name'] 		= $_FILES['photo_ktp']['name'];
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo_ktp')) {
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('Ukm/perbaharui',$data);
		}
		return $this->upload->data('file_name');
	}
	private function _do_upload_npwp()
	{
		$config['upload_path'] 		= './assets/upload/dataukm';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 5000;
		$config['max_width'] 		= 5000;
		$config['max_height']  		= 5000;
		$config['file_name'] 		= $_FILES['photo_npwp']['name'];
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo_npwp')) {
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('Ukm/perbaharui',$data);
		}
		return $this->upload->data('file_name');
	}
	private function _do_upload_ukm()
	{
		$config['upload_path'] 		= './assets/upload/dataukm';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 5000;
		$config['max_width'] 		= 5000;
		$config['max_height']  		= 5000;
		$config['file_name'] 		= $_FILES['photo']['name'];
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo')) {
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('Ukm/perbaharui',$data);
		}
		return $this->upload->data('file_name');
	}

	
	public function statusdaftar()
	{
		$id_daftar = $this->session->userdata('id_daftar');

		if($id_daftar){
			//jika ada session
			$data['user'] = $this->db->get_where('tbl_daftar_ukm',['id_daftar'=>$id_daftar])->row_array();
			$data['master'] = $this->db->get_where('tbl_master_ukm',['id_daftar'=>$id_daftar])->row_array();
			$data['berkas'] = $this->db->get_where('tbl_berkas',['id_daftar'=>$id_daftar])->row_array();

			//pekerjaan
			$a = $data['master']['pekerjaan'];
			$b = $data['master']['kabupaten'];
			$c = $data['master']['kecamatan'];
			$d = $data['master']['desa'];
			//email
			$e = $data['user']['email'];
			$data['member'] = $this->db->get_where('member',['email'=>$e])->row_array();

			$data['pekerjaan'] = $this->db->get_where('tbl_pekerjaan',['id_pekerjaan'=>$a])->row_array();
			$data['kabupaten'] = $this->db->get_where('tbl_kabupaten',['id_kabupaten'=>$b])->row_array();
			$data['kecamatan'] = $this->db->get_where('tbl_kecamatan',['id_kecamatan'=>$c])->row_array();
			$data['desa'] = $this->db->get_where('tbl_desa',['id_desa'=>$d])->row_array();


			$data['title'] = "E-Commerce Sumatera Selatan";
			$data['data_klasterisasi']= $this->MA->listklasterisasi();
			$data['data_kategoribek']= $this->MA->listkategoribek();
			$data['data_daerah']= $this->MA->listdaerah();
			$data['data_pekerjaan']= $this->MA->listPekerjaan();
			$data['data_kecamatan']= $this->MA->listkecamatan();
			$data['data_kabupaten']= $this->MA->listkabupaten();
			$data['data_desa']= $this->MA->listdesa();
			$this->load->view('frontend/ukm/header',$data);
			$this->load->view('frontend/ukm/status',$data);
			$this->load->view('frontend/temp/footer');

		}else{
			 //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Silahkan Login !');

			redirect('Ukm/Login',$data);
		}
	}

	public function daftarecom()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[tbl_daftar_ukm.nik]');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');
		$this->form_validation->set_rules('handphone', 'Handphone', 'required|trim|is_unique[tbl_daftar_ukm.handphone]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[tbl_daftar_ukm.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[8]');
		$this->form_validation->set_rules('status', 'status', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$data['title'] = "E-Commerce Sumatera Selatan";
			$this->load->view('frontend/temp/header',$data);
			$this->load->view('frontend/ukm/daftar');
			$this->load->view('frontend/temp/footer');
		}else{

			$nik = $this->input->post('nik', true);
			$nama_pemilik = $this->input->post('nama_pemilik', true);
			$handphone = $this->input->post('handphone', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$status = $this->input->post('status', true);

			$data = [
                'nik' => htmlspecialchars($nik),
                'nama_pemilik' => htmlspecialchars($nama_pemilik),
                'handphone' => htmlspecialchars($handphone),
                'email' => htmlspecialchars($email),
                'password' => htmlspecialchars($password),
                'status' => htmlspecialchars($status),
            ];


            $this->MK->daftarecom($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login !');

			redirect('Ukm/Login',$data);

		}
	}
	public function loginecom()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('handphone', 'Handphone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$data['title'] = "E-Commerce Sumatera Selatan";
			$this->load->view('frontend/temp/header',$data);
			$this->load->view('frontend/ukm/login');
			$this->load->view('frontend/temp/footer');
		}else{

			$nik = $this->input->post('nik', true);
			$handphone = $this->input->post('handphone', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);


			//ambil data berdasarkan nik
			$user = $this->db->get_where('tbl_daftar_ukm',['nik'=>$nik])->row_array();

			$id = $user['id_daftar'];
			//cek jika user ada
			if($user){
				//cek jika status nya
				if($user['status']==1){
					//cek jika nik ada
					if($user['nik']==$nik){
						//cek handphone
						if($user['handphone']==$handphone){
							//cek email
							if($user['email']==$email){
								//cek password
								if($user['password']==$password){

									
									$data=[
									'nik' => $user['nik'],
									'handphone' => $user['handphone'],
									'email' => $user['email'],
									];

									$this->session->set_userdata('nik',$data['nik']);
									$data = $this->session->set_flashdata('pesan','Selamat Anda Berhasil Login !');
									//kembali
									redirect('Ukm/Beranda',$data);
								

								}else{
									//jika tidak ada passwrod
									$data = $this->session->set_flashdata('pesan','Password Salah !');

									//kembali
									redirect('Ukm/Login',$data);
								}
							}else{
								//jika email tidak ada
									$data = $this->session->set_flashdata('pesan','Email Salah !');

									//kembali
									redirect('Ukm/Login',$data);
							}
						}else{
							//jika handphone tidak ada
							$data = $this->session->set_flashdata('pesan','Handphone Salah !');

									//kembali
									redirect('Ukm/Login',$data);
						}
					}else{
						//jika nik Tidak Ada
						$data = $this->session->set_flashdata('pesan','NIK Salah !');

									//kembali
									redirect('Ukm/Login',$data);
					}

				}
				elseif($user['status']==2){



									$data=[
									'nik' => $user['nik'],
									'handphone' => $user['handphone'],
									'email' => $user['email'],
									];

									$this->session->set_userdata('id_daftar',$id);
									$data = $this->session->set_flashdata('pesan','Selamat Anda Berhasil Login !');
									//kembali
									redirect('Ukm/statusdaftar',$data);
								}elseif($user['status']==3){



									$data=[
									'nik' => $user['nik'],
									'handphone' => $user['handphone'],
									'email' => $user['email'],
									];

									$this->session->set_userdata('id_daftar',$id);
									$data = $this->session->set_flashdata('pesan','Selamat Anda Berhasil Login !');
									//kembali
									redirect('Ukm/statusdaftar',$data);
								}

				else{
					//jika status nya 0
					$data = $this->session->set_flashdata('pesan','Akun Tidak Aktif !');

									//kembali
									redirect('Ukm/Login',$data);
				}
			}else{
				//jika tidak ada user
				$data = $this->session->set_flashdata('pesan','Akun Tidak Ada !');

									//kembali
									redirect('Ukm/Login',$data);
			}

          
		}
	}
	public function proseslupa()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$data['title'] = "E-Commerce Sumatera Selatan";
			$this->load->view('frontend/temp/header',$data);
			$this->load->view('frontend/ukm/lupapas');
			$this->load->view('frontend/temp/footer');
		}else{

			$nik = $this->input->post('nik', true);
			$email = $this->input->post('email', true);
			//ambil data berdasarkan nik
			$user = $this->db->get_where('tbl_daftar_ukm',['nik'=>$nik])->row_array();
			
			if($user){

				$password = $user['password'];
				$nama = $user['nama_pemilik'];
				$handphone = $user['handphone'];

					// Konfigurasi email
		        $config = [
		            'mailtype'  => 'html',
		            'charset'   => 'utf-8',
		            'protocol'  => 'smtp',
		            'smtp_host' => 'smtp.gmail.com',
		            'smtp_user' => 'beramal.com05@gmail.com',  // Email gmail
		            'smtp_pass'   => 'beramal.com_05',  // Password gmail
		            'smtp_crypto' => 'ssl',
		            'smtp_port'   => 465,
		            'crlf'    => "\r\n",
		            'newline' => "\r\n"
		        ];


		        // Load library email dan konfigurasinya
		       $this->email->initialize($config);

		        // Email dan nama pengirim
		        $this->email->from('no-reply@disperin', 'disperin.org');

		        // Email penerima
		        $this->email->to($this->input->post('email')); // Ganti dengan email tujuan

		        // Subject email
		        $this->email->subject('Silahkan Masukan Password Berikut');

		         $this->email->attach(base_url().'assets/admin//img/perindustrian.png');
		         
		        // Isi email
		        $this->email->message('Data Anda adalah <br><br>Nama : '.$nama.'<br>NIK : '.$nik.'<br>Email : '.$email.'<br>Handphone : '.$handphone.'<br>Password : '.$password.'<br><br>Silahkan Login Pada Link Berikut <a href="'.base_url().'Ukm/loginecom">Link</a><br><br>Terima Kasih !');

		        // Tampilkan pesan sukses atau error
		        if ($this->email->send()) {
		            $data = $this->session->set_flashdata('pesan', 'Silahkan Cek Email Anda  !');
					redirect('/Ukm/loginecom',$data);
		        } else {
		            $data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim  !');
					redirect('/Ukm/loginecom',$data);
		        }
				$data = $this->session->set_flashdata('pesan', 'Terima Kasih Atas Kunjungannya !');

				redirect('/Ukm/loginecom',$data);

			}else{
				$data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim !');

				redirect('Ukm/lupapas',$data);
			}
		}

	}

	public function keluarecom()
	{
		$this->session->unset_userdata(array('nik'));
		$this->session->sess_destroy();
		//jika tidak ada user
		$data = $this->session->set_flashdata('pesan','Keluar !');
        redirect('frontend');                
	}

}
