<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin','MA');
		if(!$this->session->userdata('email')){
			//jika ada user masuk sembarangan
        	$data = $this->session->set_flashdata('pesan', 'Anda Belum Login !');
			redirect('auth',$data);
		}
	}

	public function index()
	{
		$data['title'] = "Halaman Beranda Admin";
		$data['data_ukm']= $this->MA->listukmmap();
		$data['data_klasterisasi']= $this->MA->listklasterisasi();
		$data['data_kategoribek']= $this->MA->listkategoribek();
		$data['data_daerah']= $this->MA->listdaerah();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/beranda/index',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function CariBeranda()
	{
		$id_klasterisasi = $this->input->get('id_klasterisasi',true);
		$id_bekraf = $this->input->get('id_bekraf',true);
		$id_daerah = $this->input->get('id_daerah',true);
		
        $data['title'] = "Halaman Beranda Cari";
		$data['data_ukmcari']= $this->MA->listukmmapcari($id_klasterisasi,$id_bekraf,$id_daerah);
		$data['data_klasterisasi']= $this->MA->listklasterisasi();
		$data['data_kategoribek']= $this->MA->listkategoribek();
		$data['data_daerah']= $this->MA->listdaerah();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/beranda/cari',$data);
		$this->load->view('admin_utama/temp/footer');

	}
	// klasterisasi
	public function klasterisasi()
	{
		$data['title'] = "Data klasterisasi";
		$data['link1'] = "Master";
		$data['link2'] = "Data klasterisasi";
		$data['data_klasterisasi']= $this->MA->listklasterisasi();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_klasterisasi',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahKlas()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_klasterisasi', 'Nama klasterisasi', 'required|trim|is_unique[tbl_klasterisasi.nama_klasterisasi]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_klasterisasi');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/klasterisasi',$data);
		}else{

			$nama_klasterisasi = $this->input->post('nama_klasterisasi', true);

			$data = [
                'nama_klasterisasi' => htmlspecialchars($nama_klasterisasi),
            ];

            $this->MA->TambahKlas($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/klasterisasi',$data);

		}
	}
	public function EditKlas($id_klasterisasi)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_klasterisasi', 'Nama klasterisasi', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_klasterisasi');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/klasterisasi',$data);
		}else{

			$nama_klasterisasi = $this->input->post('nama_klasterisasi', true);

			$data = [
                'nama_klasterisasi' => htmlspecialchars($nama_klasterisasi),
            ];

            $this->MA->EditKlas($data,$id_klasterisasi);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/klasterisasi',$data);

		}
	}
	public function HapusKlas($id_klasterisasi)
	{
		$this->MA->HapusKlas($id_klasterisasi);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/klasterisasi',$data);
	}
	// kategori bekraf
	public function KategoriBek()
	{
		$data['title'] = "Data Kategori Bekraf";
		$data['link1'] = "Master";
		$data['link2'] = "Data Kategori Bekraf";
		$data['data_kategoribek']= $this->MA->listkategoribek();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_kategoribek',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahBekraf()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_bekraf', 'Nama Bekraf', 'required|trim|is_unique[tbl_bekraf.nama_bekraf]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_bekraf');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/KategoriBek',$data);
		}else{

			$nama_bekraf = $this->input->post('nama_bekraf', true);

			$data = [
                'nama_bekraf' => htmlspecialchars($nama_bekraf),
            ];

            $this->MA->TambahBekraf($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/KategoriBek',$data);

		}
	}
	public function EditBekraf($id_bekraf)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_bekraf', 'Nama Bekraf', 'required|trim|is_unique[tbl_bekraf.nama_bekraf]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_bekraf');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/KategoriBek',$data);
		}else{

			$nama_bekraf = $this->input->post('nama_bekraf', true);

			$data = [
                'nama_bekraf' => htmlspecialchars($nama_bekraf),
            ];

            $this->MA->EditBekraf($data,$id_bekraf);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/KategoriBek',$data);

		}
	}
	public function HapusBekraf($id_bekraf)
	{
		$this->MA->HapusBekraf($id_bekraf);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/KategoriBek',$data);
	}
	// pekerjaan
	public function Pekerjaan()
	{
		$data['title'] = "Data Pekerjaan";
		$data['link1'] = "Master";
		$data['link2'] = "Data Pekerjaan";
		$data['data_pekerjaan']= $this->MA->listpekerjaan();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_pekerjaan',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahPekerjaan()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim|is_unique[tbl_pekerjaan.nama_pekerjaan]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_pekerjaan');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Pekerjaan',$data);
		}else{

			$nama_pekerjaan = $this->input->post('nama_pekerjaan', true);

			$data = [
                'nama_pekerjaan' => htmlspecialchars($nama_pekerjaan),
            ];

            $this->MA->TambahPekerjaan($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Pekerjaan',$data);

		}
	}
	public function EditPekerjaan($id_pekerjaan)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim|is_unique[tbl_pekerjaan.nama_pekerjaan]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_pekerjaan');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Pekerjaan',$data);
		}else{

			$nama_pekerjaan = $this->input->post('nama_pekerjaan', true);

			$data = [
                'nama_pekerjaan' => htmlspecialchars($nama_pekerjaan),
            ];

            $this->MA->EditPekerjaan($data,$id_pekerjaan);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Pekerjaan',$data);

		}
	}
	public function HapusPekerjaan($id_pekerjaan)
	{
		$this->MA->HapusPekerjaan($id_pekerjaan);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Pekerjaan',$data);
	}
	// Data Daerah
	public function Data_Daerah()
	{
		$data['title'] = "Data Daerah";
		$data['link1'] = "Master";
		$data['link2'] = "Data Daerah";
		$data['data_daerah']= $this->MA->listdaerah();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_daerah',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahDaerah()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_daerah', 'Nama Daerah', 'required|trim|is_unique[tbl_daerah.nama_daerah]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_daerah');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Data_Daerah',$data);
		}else{

			$nama_daerah = $this->input->post('nama_daerah', true);

			$data = [
                'nama_daerah' => htmlspecialchars($nama_daerah),
            ];

            $this->MA->TambahDaerah($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Data_Daerah',$data);

		}
	}
	public function EditDaerah($id_daerah)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_daerah', 'Nama Daerah', 'required|trim|is_unique[tbl_daerah.nama_daerah]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_daerah');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Data_Daerah',$data);
		}else{

			$nama_daerah = $this->input->post('nama_daerah', true);

			$data = [
                'nama_daerah' => htmlspecialchars($nama_daerah),
            ];

            $this->MA->EditDaerah($data,$id_daerah);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Data_Daerah',$data);

		}
	}
	public function HapusDaerah($id_daerah)
	{
		$this->MA->HapusDaerah($id_daerah);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Data_Daerah',$data);
	}
	// Data Daerah
	public function Data_Kabupaten()
	{
		$data['title'] = "Data Kabupaten";
		$data['link1'] = "Master";
		$data['link2'] = "Data Kabupaten";
		$data['data_kabupaten']= $this->MA->listkabupaten();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_kabupaten',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahKabupaten()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_kabupaten', 'Nama Kabupaten', 'required|trim|is_unique[tbl_kabupaten.nama_kabupaten]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_kabupaten');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Data_Kabupaten',$data);
		}else{

			$nama_kabupaten = $this->input->post('nama_kabupaten', true);

			$data = [
                'nama_kabupaten' => htmlspecialchars($nama_kabupaten),
            ];

            $this->MA->TambahKabupaten($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Data_Kabupaten',$data);

		}
	}
	public function Editkabupaten($id_kabupaten)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_kabupaten', 'Nama kabupaten', 'required|trim|is_unique[tbl_kabupaten.nama_kabupaten]');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_kabupaten');
            $data = $this->session->set_flashdata('pesan',$a );

			redirect('ControllerAdmin/Data_Kabupaten',$data);
		}else{

			$nama_kabupaten = $this->input->post('nama_kabupaten', true);

			$data = [
                'nama_kabupaten' => htmlspecialchars($nama_kabupaten),
            ];

            $this->MA->EditKabupaten($data,$id_kabupaten);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Data_Kabupaten',$data);

		}
	}
	public function Hapuskabupaten($id_kabupaten)
	{
		$this->MA->HapusKabupaten($id_kabupaten);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Data_Kabupaten',$data);
	}
	// Data Kecamatan
	public function Data_Kecamatan()
	{
		$data['title'] = "Data Kecamatan";
		$data['link1'] = "Master";
		$data['link2'] = "Data Kecamatan";
		$data['data_kecamatan']= $this->MA->listkecamatan();
		$data['data_kabupaten']= $this->MA->listkabupaten();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_kecamatan',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahKecamatan()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required|trim|is_unique[tbl_kecamatan.nama_kecamatan]');
		$this->form_validation->set_rules('id_kabupaten', 'Nama Kabupaten', 'trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_kecamatan');
            $data = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Data_Kecamatan',$data);
		}else{

			$nama_kecamatan = $this->input->post('nama_kecamatan', true);
			$id_kabupaten = $this->input->post('id_kabupaten', true);

			$data = [
                'nama_kecamatan' => htmlspecialchars($nama_kecamatan),
                'id_kabupaten' => htmlspecialchars($id_kabupaten),
            ];

            $this->MA->TambahKecamatan($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Data_Kecamatan',$data);

		}
	}
	public function EditKecamatan($id_kecamatan)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required|trim');
		$this->form_validation->set_rules('id_kabupaten', 'Nama Kabupaten', 'trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_kecamatan');
			$a = form_error('id_kabupaten');
            $data = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Data_Kecamatan',$data);
		}else{

			$nama_kecamatan = $this->input->post('nama_kecamatan', true);
			$id_kabupaten = $this->input->post('id_kabupaten', true);

			$data = [
                'nama_kecamatan' => htmlspecialchars($nama_kecamatan),
                'id_kabupaten' => htmlspecialchars($id_kabupaten),
            ];
            $this->MA->EditKecamatan($data,$id_kecamatan);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Data_Kecamatan',$data);

		}
	}
	public function Hapuskecamatan($id_kecamatan)
	{
		$this->MA->HapusKecamatan($id_kecamatan);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Data_Kecamatan',$data);
	}
	// data desa
	public function Data_Desa()
	{
		$data['title'] = "Data Desa";
		$data['link1'] = "Master";
		$data['link2'] = "Data Desa";
		$data['data_kecamatan']= $this->MA->listkecamatan();
		$data['data_kabupaten']= $this->MA->listkabupaten();
		$data['data_desa']= $this->MA->listdesa();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/master/list_desa',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahDesa()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_desa', 'Nama Desa', 'required|trim|is_unique[tbl_desa.nama_desa]');
		$this->form_validation->set_rules('id_kabupaten', 'Nama Kabupaten', 'trim');
		$this->form_validation->set_rules('id_kecamatan', 'Nama Kecamatan', 'trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_desa');
            $data = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Data_Desa',$data);
		}else{

			$nama_desa = $this->input->post('nama_desa', true);
			$id_kecamatan = $this->input->post('id_kecamatan', true);
			$id_kabupaten = $this->input->post('id_kabupaten', true);

			$data = [
                'nama_desa' => htmlspecialchars($nama_desa),
                'id_kecamatan' => htmlspecialchars($id_kecamatan),
                'id_kabupaten' => htmlspecialchars($id_kabupaten),
            ];

            $this->MA->TambahDesa($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Data_Desa',$data);

		}
	}
	public function EditDesa($id_desa)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('nama_desa', 'Nama Desa', 'required|trim');
		$this->form_validation->set_rules('id_kabupaten', 'Nama Kabupaten', 'trim');
		$this->form_validation->set_rules('id_kecamatan', 'Nama Kecamatan', 'trim');
		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('nama_desa');
			$a = form_error('id_kabupaten');
			$a = form_error('id_kecamatan');
            $data = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Data_Desa',$data);
		}else{

			$nama_desa = $this->input->post('nama_desa', true);
			$id_kecamatan = $this->input->post('id_kecamatan', true);
			$id_kabupaten = $this->input->post('id_kabupaten', true);

			$data = [
                'nama_desa' => htmlspecialchars($nama_desa),
                'id_kecamatan' => htmlspecialchars($id_kecamatan),
                'id_kabupaten' => htmlspecialchars($id_kabupaten),
            ];
            $this->MA->EditDesa($data,$id_desa);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Data_Desa',$data);

		}
	}
	public function HapusDesa($id_desa)
	{
		$this->MA->HapusDesa($id_desa);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Data_Desa',$data);
	}
	// daftar ukm
	public function PendaftaranUkm()
	{
		$data['title'] = "Data Pendaftaran UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Pendaftaran UKM";
		$data['data_daftarecom']= $this->MA->listdaftarukm();

		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_pendaftaranukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}

	public function Detaildaftar($id_daftar)
	{

		$data['user'] = $this->db->get_where('tbl_daftar_ukm',['id_daftar'=>$id_daftar])->row_array();
		$data['master'] = $this->db->get_where('tbl_master_ukm',['id_daftar'=>$id_daftar])->row_array();
		$data['berkas'] = $this->db->get_where('tbl_berkas',['id_daftar'=>$id_daftar])->row_array();

			//pekerjaan
		$a = $data['master']['pekerjaan'];
		$b = $data['master']['kabupaten'];
		$c = $data['master']['kecamatan'];
		$d = $data['master']['desa'];
		$data['pekerjaan'] = $this->db->get_where('tbl_pekerjaan',['id_pekerjaan'=>$a])->row_array();
		$data['kabupaten'] = $this->db->get_where('tbl_kabupaten',['id_kabupaten'=>$b])->row_array();
		$data['kecamatan'] = $this->db->get_where('tbl_kecamatan',['id_kecamatan'=>$c])->row_array();
		$data['desa'] = $this->db->get_where('tbl_desa',['id_desa'=>$d])->row_array();

		$data['title'] = "Data Pendaftaran UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Detail Pendaftaran UKM";
		$data['data_daftarecom']= $this->MA->listdaftarukm();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/detail_pendaftaranukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function VerifikasiEcom($id_daftar)
	{

		$length = 5;

		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		  $randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$passwordrandom ='UKM'.$randomString;

		$nama_member =  $this->input->post('nama_member');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$foto_member = "";
		$password =$passwordrandom;
		$tgl_join = date('Y-m-d H:i:s');
		$role = 1;

		$data=[
			'nama_member' => htmlspecialchars($nama_member),
			'no_hp' => htmlspecialchars($no_hp),
			'email' => htmlspecialchars($email),
			'alamat' => htmlspecialchars($alamat),
			'foto_member' => htmlspecialchars($foto_member),
			'password' => htmlspecialchars($password),
			'tgl_join' => $tgl_join,
			'role' => htmlspecialchars($role)
		];

		$this->db->insert('member',$data);

		$status = $this->input->post('status');
		$status_usaha = $this->input->post('status_usaha');


		$a = htmlspecialchars($status);
		$b = htmlspecialchars($status_usaha);


		$this->db->query("UPDATE tbl_daftar_ukm SET status='$a' WHERE id_daftar='$id_daftar'");
		$this->db->query("UPDATE tbl_master_ukm SET status_usaha='$b' WHERE id_daftar='$id_daftar'");

		$data = $this->session->set_flashdata('pesan', 'Data Berhasil DiVerifikasi !');
		redirect('ControllerAdmin/PendaftaranUkm',$data);

	}
	// klasterisasi
	public function Berita()
	{
		$data['title'] = "Data Berita";
		$data['link1'] = "Informasi";
		$data['link2'] = "Data Berita";
		$data['data_berita']= $this->MA->listberita();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/informasi/list_berita',$data);
		$this->load->view('admin_utama/temp/footer');
	}

	public function TambahBerita()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');
	
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');
		$this->form_validation->set_rules('deskripsi_berita', 'Deskripsi Berita', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('photo_berita');
			
            $a = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Berita',$data);
		}else{

			$judul_berita = $this->input->post('judul_berita', true);
			$photo_berita = $this->input->post('photo_berita', true);
			$deskripsi_berita = $this->input->post('deskripsi_berita',true);
			$status_berita = 0;
			$date_created = date('Y-m-d H:i:s');

			$data = [
                'judul_berita' => htmlspecialchars($judul_berita),
                'photo_berita' => htmlspecialchars($photo_berita),
                'deskripsi_berita' => htmlspecialchars($deskripsi_berita),
                'status_berita' => htmlspecialchars($status_berita),
                'date_created' => htmlspecialchars($date_created)
            ];

            if (!empty($_FILES['photo_berita']['name'])) 
			{
				$upload = $this->_do_upload_berita();
				$data['photo_berita'] = $upload;
			}

            $this->MA->TambahBerita($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Berita',$data);

		}
	}
	public function EditBerita($id_berita)
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');
		$this->form_validation->set_rules('deskripsi_berita', 'Deskripsi Berita', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			$a = form_error('photo_berita');
            $a = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Berita',$data);
		}else{

			$judul_berita = $this->input->post('judul_berita', true);
			$deskripsi_berita = $this->input->post('deskripsi_berita',true);
			$status_berita = 0;
			$date_created = date('Y-m-d H:i:s');

			$data = [
                'judul_berita' => htmlspecialchars($judul_berita),
                'deskripsi_berita' => htmlspecialchars($deskripsi_berita),
                'status_berita' => htmlspecialchars($status_berita),
                'date_created' => htmlspecialchars($date_created)
            ];

            if (!empty($_FILES['photo_berita']['name'])) 
			{
				$data = $this->db->get_where('tbl_berita',['id_berita'=> $id_berita])->row_array();
				$a =$data['photo_berita'];
				//hapus photo di folder
				unlink(FCPATH.'/assets/upload/berita/'.$a);
				$upload = $this->_do_upload_berita();
				$data['photo_berita'] = $upload;
			}

			$this->MA->EditBerita($id_berita,$data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !');

			redirect('ControllerAdmin/Berita',$data);
		}

	}
	//upload foto
	private function _do_upload_berita()
	{
		$config['upload_path'] 		= './assets/upload/berita';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 10000;
		$config['max_width'] 		= 10000;
		$config['max_height']  		= 10000;
		$config['file_name'] 		= $this->input->post('photo_berita');
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo_berita')) {


			$this->upload->display_errors();
			die;
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('ControllerAdmin/Berita',$data);
		}
		return $this->upload->data('file_name');
	}
	public function HapusBerita($id_berita)
	{
		$data = $this->db->get_where('tbl_berita',['id_berita'=> $id_berita])->row_array();
		$a =$data['photo_berita'];

		
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/berita/'.$a);

		$this->MA->HapusBerita($id_berita);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Berita',$data);
	}
	public function Beritanon($id_berita)
	{
		$this->db->query("UPDATE tbl_berita SET status_berita='1' WHERE id_berita='$id_berita'");
		$data = $this->session->set_flashdata('pesan', 'Berita Aktif !');
		redirect('ControllerAdmin/Berita',$data);
	}
	public function Beritaaktif($id_berita)
	{
		$this->db->query("UPDATE tbl_berita SET status_berita='0' WHERE id_berita='$id_berita'");
		$data = $this->session->set_flashdata('pesan', 'Berita Tidak Aktif !');
		redirect('ControllerAdmin/Berita',$data);
	}

	// klasterisasi
	public function Galeri()
	{
		$data['title'] = "Data Galeri";
		$data['link1'] = "Informasi";
		$data['link2'] = "Data Galeri";
		$data['data_galeri']= $this->MA->listgaleri();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/informasi/list_galeri',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahGaleri()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('judul_galeri', 'Judul Berita', 'required|trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			
			$a = form_error('photo_galeri');
			
            $a = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Galeri',$data);
		}else{

			$judul_galeri = $this->input->post('judul_galeri', true);
			$photo_galeri = $this->input->post('photo_galeri', true);
			$status = 0;
			$data = [
                'judul_galeri' => htmlspecialchars($judul_galeri),
                'photo_galeri' => htmlspecialchars($photo_galeri),
                'status'=> htmlspecialchars($status)
              
            ];

            if (!empty($_FILES['photo_galeri']['name'])) 
			{
				$upload = $this->_do_upload_galeri();
				$data['photo_galeri'] = $upload;
			}

            $this->MA->TambahGaleri($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Galeri',$data);

		}
	}
	//upload foto
	private function _do_upload_galeri()
	{
		$config['upload_path'] 		= './assets/upload/galeri';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 10000;
		$config['max_width'] 		= 10000;
		$config['max_height']  		= 10000;
		$config['file_name'] 		= $this->input->post('photo_galeri');
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo_galeri')) {


			$this->upload->display_errors();
			die;
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('ControllerAdmin/Galeri',$data);
		}
		return $this->upload->data('file_name');
	}
	public function HapusGaleri($id_galeri)
	{
		$data = $this->db->get_where('tbl_galeri',['id_galeri'=> $id_galeri])->row_array();
		$a =$data['photo_galeri'];

		
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/galeri/'.$a);

		$this->MA->HapusGaleri($id_galeri);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Galeri',$data);
	}
	// klasterisasi
	public function Slide()
	{
		$data['title'] = "Data Slide";
		$data['link1'] = "Informasi";
		$data['link2'] = "Data Slide";
		$data['data_slide']= $this->MA->listslide();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/informasi/list_slide',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahSlide()
	{
		//validasi form yang di kirim
		$this->form_validation->set_rules('photo', 'Judul Berita', 'trim');

		//jika berhasil
		if ($this->form_validation->run() == false) {
        //jika gagal
			
			$a = form_error('photo');
			
            $a = $this->session->set_flashdata('pesan',$a);

			redirect('ControllerAdmin/Slide',$data);
		}else{

			$photo = $this->input->post('photo', true);
			$data = [
                'photo' => htmlspecialchars($photo)
              
            ];

            if (!empty($_FILES['photo']['name'])) 
			{
				$upload = $this->_do_upload_slide();
				$data['photo'] = $upload;
			}

            $this->MA->TambahSlide($data);

             //jika selesai
            $data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/Slide',$data);

		}
	}
	//upload foto
	private function _do_upload_slide()
	{
		$config['upload_path'] 		= './assets/upload/slide';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 10000;
		$config['max_width'] 		= 10000;
		$config['max_height']  		= 10000;
		$config['file_name'] 		= $this->input->post('photo');
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo')) {


			$this->upload->display_errors();
			die;
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('ControllerAdmin/Slide',$data);
		}
		return $this->upload->data('file_name');
	}
	public function HapusSlide($id)
	{
		$data = $this->db->get_where('tbl_slide',['id'=> $id])->row_array();
		$a =$data['photo'];

		
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/slide/'.$a);

		$this->MA->HapusSlide($id);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Slide',$data);
	}
	// klasterisasi
	public function Pengaduan()
	{
		$data['title'] = "Data Pengaduan";
		$data['link1'] = "Informasi";
		$data['link2'] = "Data Pengaduan";
		$data['data_pengaduan']= $this->MA->listpengaduan();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/informasi/list_pengaduan',$data);
		$this->load->view('admin_utama/temp/footer');
	}

	public function EmailPengaduan($id_pengaduan)
	{
		$data = $this->db->get_where('tbl_pengaduan',['id_pengaduan'=> $id_pengaduan])->row_array();

		$a = $data['email'];

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
        $this->email->to($a); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Terima Kasih Telah Melakukan Pengaduan');

         $this->email->attach(base_url().'assets/admin//img/perindustrian.png');
         
        // Isi email
        $this->email->message("Hallo <br> Terima Kasih <br> Telah Memberikan Masukan <br> Pada Dinas Perindustrian Provinsi Sumatera Selatan");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = $this->session->set_flashdata('pesan', 'Email Berhasil Di Kirim  !');
			redirect('ControllerAdmin/Pengaduan',$data);
        } else {
            $data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim  !');
			redirect('ControllerAdmin/Pengaduan',$data);
        }

	}


	public function HapusPengaduan($id_pengaduan)
	{
		
		$this->MA->HapusPengaduan($id_pengaduan);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Pengaduan',$data);
	}
	public function Pengunjung()
	{
		$data['title'] = "Data Pengunjung";
		$data['link1'] = "Informasi";
		$data['link2'] = "Data Pengunjung";
		$data['data_pengunjung']= $this->MA->listpengunjung();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/informasi/list_pengunjung',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function HapusPengunjung($id)
	{
		
		$this->MA->HapusPengunjung($id);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/Pengunjung',$data);
	}
	public function DataMasterUkm()
	{
		$data['title'] = "Data Master UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Master UKM";
		$data['data_master']= $this->MA->listmasterukm();
		$data['data_kecamatan']= $this->MA->listkecamatan();
		$data['data_kabupaten']= $this->MA->listkabupaten();
		$data['data_desa']= $this->MA->listdesa();
		$data['data_klasterisasi']= $this->MA->listklasterisasi();
		$data['data_kategoribek']= $this->MA->listkategoribek();
		$data['data_pekerjaan']= $this->MA->listpekerjaan();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_master_ukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahMasterukm()
	{
		$data=[
			'id_daftar' => htmlspecialchars($this->input->post('id_daftar')),
			'id_klasterisasi' => htmlspecialchars($this->input->post('id_klasterisasi')),
			'id_bekraf' => htmlspecialchars($this->input->post('id_bekraf')),
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama_pemilik' => htmlspecialchars($this->input->post('nama_pemilik')),
			'ttl' => htmlspecialchars($this->input->post('ttl')),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
			'photo' => htmlspecialchars($this->input->post('photo')),
			'nama_usaha' => htmlspecialchars($this->input->post('nama_usaha')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'kabupaten' => htmlspecialchars($this->input->post('kabupaten')),
			'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
			'desa' => htmlspecialchars($this->input->post('desa')),
			'handphone' => htmlspecialchars($this->input->post('handphone')),
			'latitude' => htmlspecialchars($this->input->post('latitude')),
			'longtitude' => htmlspecialchars($this->input->post('longtitude')),
			'link_usaha' => htmlspecialchars($this->input->post('link_usaha')),
			'status_pemilik' => htmlspecialchars($this->input->post('status_pemilik')),
			'status_usaha' => htmlspecialchars($this->input->post('status_usaha')),
			];

			if (!empty($_FILES['photo']['name'])) 
			{
				$upload = $this->_do_upload_ukm();
				$data['photo'] = $upload;
			}


			$this->MA->TambahMasterukm($data);

			$data = $this->session->set_flashdata('pesan', 'Data Berhasil Masuk !');

			redirect('ControllerAdmin/DataMasterUkm',$data);

	}
	//upload foto
	private function _do_upload_ukm()
	{
		$config['upload_path'] 		= './assets/upload/dataukm';
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size'] 		= 10000;
		$config['max_width'] 		= 10000;
		$config['max_height']  		= 10000;
		$config['file_name'] 		= $this->input->post('photo');
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('photo')) {


			$this->upload->display_errors();
			die;
			$data = $this->session->set_flashdata('pesan','Photo Gagal Upload');
			redirect('ControllerAdmin/DataMasterUkm',$data);
		}
		return $this->upload->data('file_name');
	}
	public function HapusMasterUkm($id_ukm)
	{
		$data = $this->db->get_where('tbl_master_ukm',['id_ukm'=> $id_ukm])->row_array();
		$a =$data['photo'];
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/dataukm/'.$a);
		$this->MA->HapusMasterUkm($id_ukm);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/DataMasterUkm',$data);
	}
	public function EditMasterukm($id_ukm)
	{
		$data=[
			'id_daftar' => htmlspecialchars($this->input->post('id_daftar')),
			'id_klasterisasi' => htmlspecialchars($this->input->post('id_klasterisasi')),
			'id_bekraf' => htmlspecialchars($this->input->post('id_bekraf')),
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama_pemilik' => htmlspecialchars($this->input->post('nama_pemilik')),
			'ttl' => htmlspecialchars($this->input->post('ttl')),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
			//'photo' => htmlspecialchars($this->input->post('photo')),
			'nama_usaha' => htmlspecialchars($this->input->post('nama_usaha')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'kabupaten' => htmlspecialchars($this->input->post('kabupaten')),
			'kecamatan' => htmlspecialchars($this->input->post('kecamatan')),
			'desa' => htmlspecialchars($this->input->post('desa')),
			'handphone' => htmlspecialchars($this->input->post('handphone')),
			'latitude' => htmlspecialchars($this->input->post('latitude')),
			'longtitude' => htmlspecialchars($this->input->post('longtitude')),
			'link_usaha' => htmlspecialchars($this->input->post('link_usaha')),
			'status_pemilik' => htmlspecialchars($this->input->post('status_pemilik')),
			'status_usaha' => htmlspecialchars($this->input->post('status_usaha')),
			];


			
			if (!empty($_FILES['photo']['name'])) 
			{
				$data = $this->db->get_where('tbl_master_ukm',['id_ukm'=> $id_ukm])->row_array();
				$a =$data['photo'];
				//hapus photo di folder
				unlink(FCPATH.'/assets/upload/dataukm/'.$a);

				$upload = $this->_do_upload_ukm();
				$data['photo'] = $upload;
			}

			$this->MA->EditMasterukm($id_ukm,$data);

			$data = $this->session->set_flashdata('pesan', 'Data Berhasil Edit !');

			redirect('ControllerAdmin/DataMasterUkm',$data);

	}
	public function spnon($id_ukm)
	{
		$this->db->query("UPDATE tbl_master_ukm SET status_pemilik='0' WHERE id_ukm='$id_ukm'");
		$data = $this->session->set_flashdata('pesan', 'Pemilik Tidak Aktif !');

		redirect('ControllerAdmin/DataMasterUkm',$data);
	}
	public function spaktif($id_ukm)
	{
		$this->db->query("UPDATE tbl_master_ukm SET status_pemilik='1' WHERE id_ukm='$id_ukm'");
		$data = $this->session->set_flashdata('pesan', 'Pemilik Aktif !');

		redirect('ControllerAdmin/DataMasterUkm',$data);
	}
	public function gaktif($id_galeri)
	{
		$this->db->query("UPDATE tbl_galeri SET status='1' WHERE id_galeri='$id_galeri'");
		$data = $this->session->set_flashdata('pesan', 'Gambar Tayang !');

		redirect('ControllerAdmin/Galeri',$data);
	}
	public function gnonaktif($id_galeri)
	{
		$this->db->query("UPDATE tbl_galeri SET status='0' WHERE id_galeri='$id_galeri'");
		$data = $this->session->set_flashdata('pesan', 'Gambar Tidak Tayang !');

		redirect('ControllerAdmin/Galeri',$data);
	}
	public function DataBerkasUkm()
	{
		$data['title'] = "Data Berkas UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Berkas UKM";
		$data['data_berkas']= $this->MA->listberkasukm();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_berkas_ukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function HapusBerkasUkm($id_berkas)
	{
		$data = $this->db->get_where('tbl_berkas',['id_berkas'=> $id_berkas])->row_array();
		$a =$data['photo_diri'];
		$b =$data['photo_ktp'];
		$c =$data['photo_npwp'];
		$d =$data['photo'];
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/dataukm/'.$a);
		unlink(FCPATH.'/assets/upload/dataukm/'.$b);
		unlink(FCPATH.'/assets/upload/dataukm/'.$c);
		unlink(FCPATH.'/assets/upload/dataukm/'.$d);
		$this->MA->HapusBerkasUkm($id_berkas);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/DataBerkasUkm',$data);
	}
	public function DataMemberUkm()
	{
		$data['title'] = "Data Member UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Member UKM";
		$data['data_member']= $this->MA->listmemberukm();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_member_ukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function HapusMemberUkm($id_member)
	{
		$data = $this->db->get_where('member',['id_member'=> $id_member])->row_array();
		$a =$data['foto_member'];
		
		//hapus photo di folder
		unlink(FCPATH.'/assets/ecom/member/img/'.$a);
		$this->MA->HapusMemberUkm($id_member);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/DataMemberUkm',$data);
	}
	public function DataDaftarUkm()
	{
		$data['title'] = "Data Pelanggan UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "Pelanggan UKM";
		$data['data_daftar']= $this->MA->listdaftaruk();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_daftar_ukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function DataEcomUkm()
	{
		$data['title'] = "Data E-Commerce UKM";
		$data['link1'] = "UKM";
		$data['link2'] = "E-Commerce UKM";
		$data['data_master']= $this->MA->listmasterukme();
		$data['data_kecamatan']= $this->MA->listkecamatan();
		$data['data_kabupaten']= $this->MA->listkabupaten();
		$data['data_desa']= $this->MA->listdesa();
		$data['data_klasterisasi']= $this->MA->listklasterisasi();
		$data['data_kategoribek']= $this->MA->listkategoribek();
		$data['data_pekerjaan']= $this->MA->listpekerjaan();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/ukm/list_ecom_ukm',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function DataAdminEcom()
	{
		$data['title'] = "Data Admin E-Commerce";
		$data['link1'] = "Akun";
		$data['link2'] = "Admin E-Commerce";
		$data['data_adminecom']= $this->MA->listadminecom();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/akun/list_akun_ecom',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function TambahAdminEcom()
	{
		$data=[
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => htmlspecialchars($this->input->post('password')),
		];
		$this->db->insert('admin',$data);
		$data = $this->session->set_flashdata('pesan', 'Data Berhasil DiTambah !');
		redirect('ControllerAdmin/DataAdminEcom',$data);
	}
	public function HapusAdminEcom($id_admin)
	{
		$this->db->where('id_admin',$id_admin);
		$this->db->delete('admin');
		$data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/DataAdminEcom',$data);

	}
	public function DataAdmin()
	{
		$data['title'] = "Data Admin";
		$data['link1'] = "Akun";
		$data['link2'] = "Admin";
		$data['data_admin']= $this->MA->listadmin();
		$this->load->view('admin_utama/temp/header',$data);
		$this->load->view('admin_utama/temp/navbar');
		$this->load->view('admin_utama/temp/topnavbar');
		$this->load->view('admin_utama/akun/list_akun_admin',$data);
		$this->load->view('admin_utama/temp/footer');
	}
	public function HapusAdmin($id_user)
	{
		$data = $this->db->get_where('tbl_user',['id_user'=> $id_user])->row_array();

		$user= $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$a =$data['photo'];
		$id = $user['id_user'];

		if($id_user==$id){
		$data = $this->session->set_flashdata('pesan', 'Akun Tidak Dapat DiHapus !');
		redirect('ControllerAdmin/DataAdmin',$data);
		}else{
		//hapus photo di folder
		unlink(FCPATH.'/assets/upload/akun/'.$a);
		$this->MA->HapusAdmin($id_user);
        $data = $this->session->set_flashdata('pesan', 'Data Berhasil DiHapus !');
		redirect('ControllerAdmin/DataAdmin',$data);
		}
	}

	

}
