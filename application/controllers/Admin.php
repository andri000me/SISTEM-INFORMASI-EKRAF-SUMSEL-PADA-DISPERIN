<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mapp");

    }
	public function index()
	{
		$this->load->view('admin/admin_home');
    }
    function act(){
		$act=$this->uri->segment(3);
		return $act;
	}
	function id(){
		$id=$this->uri->segment(4);
		return $id;
	}
    function update_data($table,$data,$where=array())
	{
		$this->Mapp->Update($table,$data,$where);
    }
    function add_data($table,$data=array())
	{
		$this->Mapp->Add($table,$data);
	}
	function login()
	{
		$this->load->view('admin/vlogin');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect("admin/login","refresh");
	}
	function mtoko()
	{
		$data["table"]="lapak";
		$data["view"]="v_toko";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Toko";
		$data["pl"]="vtoko";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("v_toko",array("id_lapak"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("v_toko");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function mslide()
	{
		$data["table"]="slide";
		$data["view"]="";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Banner Slide";
		$data["pl"]="vslide";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("slide",array("id_slide"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("slide");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function mrek()
	{
		$data["table"]="rek_bayar";
		$data["view"]="";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Rekening Pembayaran";
		$data["pl"]="vrek_bayar";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("rek_bayar",array("id_rek_bayar"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("rek_bayar");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function mmember()
	{
		$data["table"]="member";
		$data["view"]="";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Member";
		$data["pl"]="vmember";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("member");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function dpencairan()
	{
		$data["table"]="pencairan";
		$data["view"]="v_pencairan";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Data Permintaan Pencairan";
		$data["pl"]="vpencairan";
		if($data["act"]=="proses_pencairan"){
			$data["e"]=$this->Mapp->get_data_by("v_pencairan",array("sha1(id_pencairan)"=>$_GET["i"]));
		}
		if($data["act"]=="konf_terima"){
			
		}
        else{
			$this->db->order_by("status","desc");
            $data["d"]=$this->Mapp->get_data_all("v_pencairan");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function dkonfirmasi_bayar()
	{
		$data["table"]="konf_bayar";
		$data["view"]="v_konfirmasi_bayar";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Data Konfirmasi Pembayaran";
		$data["pl"]="vkonfirmasi_bayar";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id"]));
		}
		if($data["act"]=="konf_terima"){
			
		}
        else{
            $data["d"]=$this->Mapp->get_data_all("v_konfirmasi_bayar");
        }
		$this->load->view('admin/admin_home',$data);
	}

	function dtransaksi()
	{
		$data["table"]="transaksi";
		$data["view"]="v_transaksi";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Data Transaksi";
		$data["pl"]="vtransaksi";
		if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id"]));
		}
		if($data["act"]=="detail_jual"){
			$data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
			$data["dp"]=$this->Mapp->get_data_all("v_detail_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
		}
        else{
            $data["d"]=$this->Mapp->get_data_all("v_transaksi");
        }
		$this->load->view('admin/admin_home',$data);
	}
	function mproduk()
	{
		$data["table"]="produk";
		$data["view"]="v_produk";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Produk";
		$data["pl"]="vproduk";
		if($data["act"]=="edit"){
			$data["kat"]=$this->Mapp->get_data_all("kategori");
			$data["dp"]=$this->Mapp->get_data_by("v_produk",array("id_produk"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("v_produk");
        }
		$this->load->view('admin/admin_home',$data);
	}
    function mkategori()
    {
		$data["table"]="kategori";
        $data["act"]=$this->act();
        $data["id"]=$this->id();
        $data["title"]="Master Kategori Produk";
        $data["pl"]="vkategori";
        if($data["act"]=="edit"){
			$data["e"]=$this->Mapp->get_data_by("kategori",array("id_kategori"=>$data["id"]));
        }
        else{
            $data["d"]=$this->Mapp->get_data_all("kategori");
        }
        $this->load->view('admin/admin_home',$data);
    }
}
