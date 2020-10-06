<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{

		$data['title'] = "Login Admin";
		$this->load->view('admin_utama/login/index',$data);
	}
	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[tbl_user.email]');
		$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('photo', 'Photo', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[8]|min_length[3]');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Admin";
			$this->load->view('admin_utama/login/index',$data);
			}else{

				$length = 5;

					$characters = '123456789';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
					  $randomString .= $characters[rand(0, $charactersLength - 1)];
					}

					$passwordrandom =$randomString;

				$data = [
					'nama' => htmlspecialchars($this->input->post('nama')),
					'email' => htmlspecialchars($this->input->post('email')),
					'ttl' => htmlspecialchars($this->input->post('ttl')),
					'photo' => htmlspecialchars($_FILES['photo']['name']),
					'password' => htmlspecialchars($this->input->post('password')),
					'kode' => htmlspecialchars($passwordrandom),
					'status' => htmlspecialchars($this->input->post('status')),
				];

		        
		        $this->db->insert('tbl_user',$data);

		        if (!empty($_FILES['photo']['name'])) 
				{
					$upload = $this->_do_upload_photo();
					$berkas['photo'] = $upload;
				}

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
		        $this->email->from('no-reply@disparoki', 'disparoki.org');

		        // Email penerima
		        $this->email->to($this->input->post('email')); // Ganti dengan email tujuan

		        // Subject email
		        $this->email->subject('Aktivasi Email');

		         $this->email->attach(base_url().'assets/admin//img/perindustrian.png');
		         
		        // Isi email
		        $this->email->message('Hallo <br> Terima Kasih <br> Telah Mendaftar Akun <br> Pada Dinas Perindustrian Provinsi Sumatera Selatan <br><br>Silahkan Login Pada Link Berikut <a href="'.base_url().'Auth/verifikasi/'.$passwordrandom.'">Link</a>');

		        // Tampilkan pesan sukses atau error
		        if ($this->email->send()) {
		            $data = $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil, Silahkan Verifikasi Melalui Email  !');
					redirect('Auth',$data);
		        } else {

		        	echo "gagal";die;
		            $data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim  !');
					redirect('Auth',$data);
		        }

			}
		}
		private function _do_upload_photo()
	{
		$config['upload_path'] 		= './assets/upload/akun';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 5000;
		$config['max_width'] 		= 5000;
		$config['max_height']  		= 5000;
		$config['file_name'] 		= $_FILES['photo']['name'];
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo')) {
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('Auth',$data);
		}
		return $this->upload->data('file_name');
	}

		public function verifikasi($kode)
		{
			$this->db->query("UPDATE tbl_user SET status='1' WHERE kode='$kode'");
			$data = $this->session->set_flashdata('pesan', 'Berhasil Di Verifikasi, Silahkan Login  !');
			redirect('Auth',$data);
		}
		public function lupapass()
		{
			$email = $this->input->post('email');
			$ttl = $this->input->post('ttl');

			$user = $this->db->get_where('tbl_user',['email'=>$email])->row_array();
			if($user){
				if($user['ttl']==$ttl){

					$password = $user['password'];

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
				        $this->email->from('no-reply@disparoki', 'disparoki.org');

				        // Email penerima
				        $this->email->to($this->input->post('email')); // Ganti dengan email tujuan

				        // Subject email
				        $this->email->subject('Lupa Password');

				         $this->email->attach(base_url().'assets/admin//img/perindustrian.png');
				         
				        // Isi email
				        $this->email->message('Hallo <br> Terima Kasih <br> Telah Mengirim Konfirmasi Lupas Password <br> Pada Dinas Perindustrian Provinsi Sumatera Selatan <br><br>Email : '.$email.'<br>Tanggal Lahir : '.$ttl.'<br>Password : '.$password.'<br><br>Silahkan Login Pada Link Berikut <a href="'.base_url('Auth').'" class="btn btn-primary">Login</a>');

				        // Tampilkan pesan sukses atau error
				        if ($this->email->send()) {
				            $data = $this->session->set_flashdata('pesan', 'Silahkan Cek Email Anda  !');
							redirect('Auth',$data);
				        } else {

				        	echo "gagal";die;
				            $data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim  !');
							redirect('Auth',$data);
				        }

				}else{
					//jika ttl salah
					$data = $this->session->set_flashdata('pesan', 'Tanggal Lahir Salah  !');
							redirect('Auth',$data);
				}

			}else{
				//jika tidak ada email
				$data = $this->session->set_flashdata('pesan', 'Email Salah  !');
							redirect('Auth',$data);
			}

		}
		public function login()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
			$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[8]|min_length[3]');

			//jika berhasil
			if ($this->form_validation->run() == false) {
				$data['title'] = "Login Admin";
				$this->load->view('admin_utama/login/index',$data);
				}else{

				$email = $this->input->post('email');
				$ttl = $this->input->post('ttl');
				$password = $this->input->post('password');
				$user = $this->db->get_where('tbl_user',['email'=>$email])->row_array();

				if($user){
					if($user['status']==1)
					{
						if($user['email']==$email)
						{
							if($user['ttl']==$ttl)
							{
								if($user['password']==$password)
								{
									$data = [
					        				'email' => $user['email'],
					        				'nama' => $user['nama'],
					        				'ttl' => $user['ttl']
					        			];
					        		$this->session->set_userdata($data);
					        		$data = $this->session->set_flashdata('pesan', 'Selamat Anda Berhasil Login !');
        							redirect('ControllerAdmin',$data);
								}else{
									//jika password salah
									$data = $this->session->set_flashdata('pesan', 'Password Salah !');
        							redirect('Auth',$data);
								}
							}else{
								//jika ttl salah
								//jika password salah
									$data = $this->session->set_flashdata('pesan', 'Tanggal Lahir Salah !');
        							redirect('Auth',$data);
							}
						}else{
							//jika email salah
							//jika password salah
									$data = $this->session->set_flashdata('pesan', 'Email Salah !');
        							redirect('Auth',$data);
						}

					}else{
						//jika belum aktif
						//jika password salah
									$data = $this->session->set_flashdata('pesan', 'Akun Belum Aktif !');
        							redirect('Auth',$data);
					}

				}else{
					//jika tidak ada
					//jika password salah
									$data = $this->session->set_flashdata('pesan', 'Akun Tidak Ditemukan !');
        							redirect('Auth',$data);

				}
			}
		}

		public function useraktif($id_user)
		{
			$this->db->query("UPDATE tbl_user SET status='1' WHERE id_user='$id_user'");
			$data = $this->session->set_flashdata('pesan','User Aktif !');

	        redirect('ControllerAdmin/DataAdmin',$data); 
		}
		public function usernonaktif($id_user)
		{
			$this->db->query("UPDATE tbl_user SET status='0' WHERE id_user='$id_user'");
			$data = $this->session->set_flashdata('pesan','User Tidak Aktif !');

	        redirect('ControllerAdmin/DataAdmin',$data); 
		}
		public function logout()
		{
			$this->session->unset_userdata('email');
			$this->session->sess_destroy();
			//jika tidak ada user
			$data = $this->session->set_flashdata('pesan','Keluar !');

	        redirect('Auth',$data);                
		}
		 

}