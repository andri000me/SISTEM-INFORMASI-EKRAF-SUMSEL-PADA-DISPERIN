<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin','MA');
	}


	public function index()
	{

		$data['title'] = "Dinas Perindustrian Sumatera Selatan";
		$data['berita'] = $this->MA->listberitaaktif();
		$data['data_galeri']= $this->MA->listgalerist();
		$data['data_ukm']= $this->MA->listukmmap();
		$data['data_slide']= $this->MA->listslide();
		$this->load->view('frontend/temp/header',$data);
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/temp/footer');

	}
	public function tambahpengaduan()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama')),
			'email' => htmlspecialchars($this->input->post('email')),
			'handphone' => htmlspecialchars($this->input->post('handphone')),
			'pengaduan' => htmlspecialchars($this->input->post('pengaduan')),
		];

		$this->db->insert('tbl_pengaduan',$data);
		$data = $this->session->set_flashdata('pesan', 'Pengaduan Berhasil !');

		redirect('/',$data);

		
	}
	public function tambahpengunjung()
	{
		$data = [
			'email' => htmlspecialchars($this->input->post('email')),
			'waktu' => htmlspecialchars($this->input->post('waktu')),
		];
		$this->db->insert('tbl_pengunjung',$data);

		
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
        $this->email->subject('Terima Kasih Telah Melakukan Survei Pengunjung');

         $this->email->attach(base_url().'assets/admin//img/perindustrian.png');
         
        // Isi email
        $this->email->message("Hallo <br> Terima Kasih <br> Telah Mengisi Survei Pengunjung <br> Pada Dinas Perindustrian Provinsi Sumatera Selatan");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $data = $this->session->set_flashdata('pesan', 'Email Berhasil Di Kirim  !');
			redirect('/',$data);
        } else {
            $data = $this->session->set_flashdata('pesan', 'Email Gagal Di Kirim  !');
			redirect('/',$data);
        }

		$this->db->insert('tbl_pengunjung',$data);
		$data = $this->session->set_flashdata('pesan', 'Terima Kasih Atas Kunjungannya !');

		redirect('/',$data);
	}

}
