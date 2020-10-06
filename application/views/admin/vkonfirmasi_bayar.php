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
		unlink("assets/member/img/".$i->foto_member);
		$this->db->delete($table, array('id_member' => $id));
		redirect("admin/mmember","refresh");
	break;
    default:
        echo "
            <h5 class='mb-3'>Daftar Konfirmasi Pembayaran</h5>
            <div class='card'>
                <div class='card-body'>
                    <table class='display small compact nowrap mt-4' id='tb1'>
                        <thead>
                            <tr>
                                <th>No. Faktur</th>
                                <th>Info Pengirim</th>
                                <th>Rekening Tujuan</th>
                                <th>Bukti Transfer</th>
                                <th class='text-right'>Total Transfer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($d as $key => $v) {
                            echo "<tr class='align-top'>
                                    <td><a href='".site_url("admin/dtransaksi/detail_jual")."?i=".sha1($v->no_faktur)."'>$v->no_faktur</a></td>
                                    <td>Dikirim dari: $v->bank_kirim<br>
                                        No. Rekening: $v->no_rek<br>
                                        A.n: $v->an</td>
                                    <td>Tujuan: $v->bank_kirim_tujuan<br>
                                        No. Rekening: $v->no_rek_tujuan<br>
                                        A.n: $v->an_tujuan</td>
                                    <td><a href='".base_url("upload/konf_bayar/".$v->file_trf)."' target='_blank()'>
                                            <img src='".base_url("upload/konf_bayar/".$v->file_trf)."' style='max-height:100px;'>
                                        </a>
                                    </td>
                                    <td class='text-right'>Rp. ".number_format($v->total_trf)."</td>
                                    <td>";
                                        if($v->status_bayar=="no_paid" && $v->konf_bayar!="0"){
                                            echo "<a href='".site_url("admin/dkonfirmasi_bayar/konf_terima")."?i=".sha1($v->no_faktur)."' title='Konfirmasi terima pembayaran' class='btn btn-sm btn-success' onclick=\"return confirm('Pembayaran transaksi ini telah diterima?')\">Konfirmasi Terima Pembayaran</a>";
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