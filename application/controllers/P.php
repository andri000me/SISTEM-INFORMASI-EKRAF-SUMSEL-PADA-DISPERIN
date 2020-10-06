<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
 	public function __construct()
  {
     parent::__construct();
     $this->load->model("Mapp");
     //$this->load->libraries('excel_reader');

  }
	public function index()
	{
    $data["page"]="chome";
		
		$this->load->view('client/home',$data);
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
  function keluar()
  {
    unset(
            $_SESSION['id_member'],
            $_SESSION['email'],
            $_SESSION['password'],
            $_SESSION["logged_in"]
    );
    redirect("p","refresh");
  }
	function add_data($table,$data=array())
	{
		$this->Mapp->Add($table,$data);
  }
  function update_jq()
  {
    $data=array("jumlah"=>$_POST["nj"]);
    $where=array("id_keranjang"=>$_POST["id_keranjang"]);
    $this->update_data("keranjang",$data,$where);
  }
  function cetak_faktur(){
    $id=$this->act();
    $data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$id));
    $data["dp"]=$this->Mapp->get_data_all("v_detail_transaksi",array("sha1(no_faktur)"=>$id));
    $this->load->view('client/cetak_faktur',$data);
  }
  function detail_produk()
  {
    $data["page"]="vdetail";
    $data["idP"]=$this->act();
    // $data["kategori"]=$this->Mapp->get_data_all("kategori");
    $arrP=array("id_produk"=>$this->act());
    $data["detailP"]=$this->Mapp->get_data_by("v_produk",$arrP);
    $this->load->view('client/home',$data);
  }
  function search()
  {
    $data["page"]="vsearch_produk";
    $data["data"]=$_POST["data_search"];
    $data["id"]=$this->id();
    $q="select * from v_produk where nama_produk like '%$_POST[data_search]%'";
    $data["list_psearch"]=$this->Mapp->get_data_all_query($q);
    $data["id_member"]=$this->session->userdata("id_member");
    $this->load->view('client/home',$data);
  }
  function kat_produk()
  {
    $data["page"]="vkat_produk";
    $data["act"]=$this->act();
    $data["id"]=$this->id();
    $data["info"]=$this->Mapp->get_data_by("kategori",array("id_kategori"=>$data["id"]));
    $data["list_pkat"]=$this->Mapp->get_data_all("v_produk",array("id_kategori"=>$data["id"],"is_del"=>"0"));
    $data["id_member"]=$this->session->userdata("id_member");
    $this->load->view('client/home',$data);
  }
  function cart()
  {
    $data["page"]="vcart";
    $data["idP"]=$this->act();
    if($data["idP"]!=""){
        $this->db->delete("keranjang", array('id_keranjang' => $data["idP"]));
        redirect("p/cart","refresh");
    }
    else{}
    $data["id_member"]=$this->session->userdata("id_member");
    $this->load->view('client/home',$data);
  }
  function c_bayar($pL)
  {

    $data["page"]="vcbayar";
    $data["idP"]=$this->act();
    $data["idL"]=$this->id();
    $data["pL"]=$pL;    
    $data["id_member"]=$this->session->userdata("id_member");
    $data["list_alamat"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"]));
    //$pL=="alamat" ? $data["LA"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"])): "";
    //$data["Akun"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id_member"]));
    $this->load->view('client/home',$data);
  }
  function c_checkout($pL)
  {
    $data["page"]="vccheckout";
    $data["idP"]=$this->act();
    $data["idL"]=$this->id();
    $data["pL"]=$pL;    
    $data["id_member"]=$this->session->userdata("id_member");
    $data["list_alamat"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"]));
    $data["list_bank"]=$this->Mapp->get_data_all("rek_bayar");  
    $this->load->view('client/home',$data);
  }

  function c_toko($pL)
  {
    $data["page"]="vctoko";
    $data["idP"]=$this->act();
    $data["id"]=$this->id();
    $data["pL"]=$pL;    
    $data["id_member"]=$this->session->userdata("id_member");
    // $pL=="alamat" ? $data["LA"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"])): "";
    if($pL=="produk"){
      error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
      $data["info_toko"]=$this->Mapp->get_data_by("lapak",array("id_member"=>$data["id_member"]));
      $data["ST"]=count($data["info_toko"]);
      $data["lp"]=$this->Mapp->get_data_all("v_produk",array("id_member"=>$data["id_member"],"id_lapak"=>$data["info_toko"]->id_lapak,"is_del"=>"0"));
    }
    elseif($pL=="saldo_jual"){
      error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
      $data["info_toko"]=$this->Mapp->get_data_by("lapak",array("id_member"=>$data["id_member"]));
      $data["ST"]=count($data["info_toko"]);
      $data["data"]=$this->Mapp->get_data_all("v_transaksi",array("status_bayar"=>"paid","konf_bayar"=>"1","id_lapak"=>$data["id_member"]));
    }
    elseif($pL=="add"){
      $data["kat"]=$this->Mapp->get_data_all("kategori");
    }
    elseif($pL=="edit"){
      $data["kat"]=$this->Mapp->get_data_all("kategori");
      $data["dp"]=$this->Mapp->get_data_by("v_produk",array("id_produk"=>$data["id"]));
    }
    elseif($pL=="konf_bayar"){
      $data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
    }
    elseif($pL=="detail_beli" || $pL=="detail_jual"){
      $data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
      $data["dp"]=$this->Mapp->get_data_all("v_detail_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
    }
    else{
      
      // Report all errors except E_NOTICE
      error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
      $data["info_toko"]=$this->Mapp->get_data_by("lapak",array("id_member"=>$data["id_member"]));
      //print_r($data["info_toko"]);
      $data["ST"]=count($data["info_toko"]);
      $this->session->set_userdata('IDL', $data["info_toko"]->id_lapak);
    }
    $data["Akun"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id_member"]));
    $this->load->view('client/home',$data);
  }
  
  function c_transaksi($pL) 
  {
    $data["page"]="vctransaksi";
    $data["idP"]=$this->act();
    $data["id"]=$this->id();
    $data["pL"]=$pL;    
    $data["id_member"]=$this->session->userdata("id_member");
    // $pL=="alamat" ? $data["LA"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"])): "";
    if($pL=="beli"){
      $data["lb"]=$this->Mapp->get_data_all("v_transaksi",array("id_member"=>$data["id_member"]));
    }
    elseif($pL=="jual"){
      $data["lb"]=$this->Mapp->get_data_all("v_transaksi",array("id_lapak"=>$data["id_member"]));
    }
    elseif($pL=="konf_bayar"){
      $data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
    }
    elseif($pL=="detail_beli" || $pL=="detail_jual"){
      $data["info"]=$this->Mapp->get_data_by("v_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
      $data["dp"]=$this->Mapp->get_data_all("v_detail_transaksi",array("sha1(no_faktur)"=>$_GET["i"]));
    }
    else{
    }
    $data["Akun"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id_member"]));
    $this->load->view('client/home',$data);
  }
  function c_setting($pL)
  {
    $data["page"]="vpengaturan";
    $data["idP"]=$this->act();
    $data["pL"]=$pL;    
    $data["id_member"]=$this->session->userdata("id_member");
    $pL=="alamat" ? $data["LA"]=$this->Mapp->get_data_all("alamat_kirim",array("id_member"=>$data["id_member"])): "";
    $data["Akun"]=$this->Mapp->get_data_by("member",array("id_member"=>$data["id_member"]));
    $this->load->view('client/home',$data);
  }
  function daftar()
  {
    $data["nama_toko"]="toko ukm";
    $data["table"]="member";
    $data["page"]="vdaftar";
    $data["idP"]=$this->act();
    //$data["id_member"]=$this->session->userdata("id_member");
    $this->load->view('client/home',$data);
  }
}
