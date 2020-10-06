<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
  </ol>
</nav>
<?php
$CI =& get_instance();
switch ($act) {
    case 'delete':
        $i=$this->db->get_where($table,array("id_member"=>$id))->row();
		unlink("assets/ecom/member/img/".$i->foto_member);
		$this->db->delete($table, array('id_member' => $id));
		redirect("admin/mmember","refresh");
	break;
    case "proses_pencairan":
        $ir=$this->db->get_where("lapak",array("id_lapak"=>$e->id_lapak))->row();            
        form_open_col("method='post' enctype='multipart/form-data' ");
            echo "<h5>Proses Pencairan</h5>";
            echo "<div class='card mt-3'>
                    <div class='card-body'>";
                        echo "<div class='form-row'>";
                            input_col("Nama Lapak","type='text' name='nama_lapak' value='$e->nama_lapak' autocomplete='off' readonly","","col-md-4");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("No. Faktur ","type='text' name='no_faktur' value='$e->no_faktur' autocomplete='off' readonly","","col-md-3");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("Tanggal Permintaan","type='text' name='tgl_request' value='$e->tgl_request' autocomplete='off' readonly","","col-md-3");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("Jumlah","type='text' name='nama_produk' value='$e->jumlah' autocomplete='off' readonly","","col-md-2");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("Nama Bank","type='text' name='nama_bank' value='$ir->nama_bank' autocomplete='off' required","","col-md-4");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("No. Rekening","type='text' name='no_rek' value='$ir->no_rek' autocomplete='off' required","","col-md-3");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("Atas Nama","type='text' name='an' value='$ir->an' autocomplete='off' required","","col-md-4");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            $arrStatus=array("pending"=>"Pending","proses"=>"Proses","selesai"=>"Selesai");
                            
                            select_col("Status","name='status' required",$arrStatus,$e->status,"col-md-2");
                        echo "</div>";
                        btn_save_col();
                    echo "</div>
                </div>";
        form_close();
        if(isset($_POST["save"])){
            
            $data=array(
                        "status"=>$_POST["status"],
                        "nama_bank"=>$_POST["nama_bank"],
                        "no_rekening"=>$_POST["no_rekening"],
                        "an"=>$_POST["an"]);
            
            $where=array("sha1(id_pencairan)"=>$_GET["i"]);
            $CI->update_data($table,$data,$where);
            
            echo "<script>alert('Pencairan di proses');window.location='".base_url("admin/dpencairan")."';</script>";
            
            // redirect(current_url());
        }
        echo "<br><br>";
    break;
    default:
        echo "
            <h5 class='mb-3'>Data Permintaan Pencairan</h5>
            <div class='card'>
                <div class='card-body'>
                    <table class='display small compact nowrap mt-4' id='tb1'>
                        <thead>
                            <tr>
                                <th>Nama Lapak</th>
                                <th>No. Faktur</th>
                                <th>Tanggal Permintaan</th>
                                <th class='text-right'>Jumlah</th>
                                <th>Rekening Tujuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($d as $key => $v) {
                            $ir=$this->db->get_where("lapak",array("id_lapak"=>$v->id_lapak))->row();
                            echo "<tr class='align-top'>
                                    <td>$v->nama_lapak</td>
                                    <td><a href='".site_url("admin/dtransaksi/detail_jual")."?i=".sha1($v->no_faktur)."'>$v->no_faktur</a></td>
                                    <td>$v->tgl_request</td>
                                    <td class='text-right'>Rp. ".number_format($v->jumlah)."</td>
                                    <td>";
                                        if($v->nama_bank==""){
                                            echo "Tujuan: $ir->nama_bank<br>
                                            No. Rekening: $ir->no_rek<br>
                                            A.n: $ir->an";
                                        }
                                        else{
                                            echo "Tujuan: $v->nama_bank<br>
                                            No. Rekening: $v->no_rek<br>
                                            A.n: $v->an";
                                        }
                                    echo "</td>
                                    <td><span class='badge badge-info'>$v->status</span></td>
                                    <td>";
                                        if($v->status!="selesai"){
                                            echo "<a href='".site_url("admin/dpencairan/proses_pencairan")."?i=".sha1($v->id_pencairan)."' title='Proses pencairan' class='btn btn-sm btn-success' onclick=\"return confirm('Proses pencairan ini?')\">Proses pencairan</a>";
                                        }
                                        else{
                                            echo "-";
                                        }
                                        echo "</td>
                                </tr>";
                        }

                        echo "</tbody>
                    </table>
                </div>
            </div>";  
    break;
    case 'konf_terima':
            $data=array("status_bayar"=>"paid");
			$where=array("sha1(no_faktur)"=>$_GET["i"]);
			$CI->update_data("transaksi",$data,$where);
			redirect("admin/dkonfirmasi_bayar","refresh");
    break;
}

?>  