<?php
function card_open()
{
    echo "<div class='card'>
            <div class='card-body'>";
}
function card_close()
{
    echo "</div>
    </div>";
}
function div_row_open($col){
	echo "<div class='row'>
			<div class='$col'>";
}
function div_row_close(){
	echo "</div>
	</div>";
}
function table_open($id){
	echo "<div class='table-responsive small'>
					<table id='$id' border='0' class='display compact nowrap cell-border row-border' style='width:100%'>";
}
function thead($col){
	echo "<thead style='font-size:13px;'>
			<tr>";
		foreach ($col as $key => $vcol) {
			echo "<th>$vcol</th>";
		}
	echo "</tr>
	</thead>
	<tbody style='font-size:12px;'>";
}
function tbody($col){
	echo "<tr>";
		foreach ($col as $key => $vcol) {
			echo "<td>$vcol</td>";
		}
	echo "</tr>
	";
}
function table_close(){
	echo "</tbody>
		</table>
	</div>";
}

function input($label,$par,$help){
	echo "<div class='form-group'>
    <label>$label</label>
    <input $par class='form-control form-control-sm' placeholder='Enter $label'>
    <small class='form-text text-muted'>$help</small>
  </div>";
}
function input_h($label,$par,$col_label,$col_input){
	echo "<div class='form-group'>
    <label class='$col_label control-label'>$label</label>
    <div class='$col_input'>
      <input $par class='form-control input-sm' placeholder='$label' autocomplete='off'>
    </div>
  </div>";
}
function textarea_h($label,$par,$col_label,$col_input,$val){
	echo "<div class='form-group'>
    <label class='$col_label control-label'>$label</label>
    <div class='$col_input'>
      <textarea $par class='form-control input-sm' placeholder='$label' autocomplete='off'>$val</textarea>
    </div>
  </div>";
}
function input_2h($label,$par,$par2,$col_label,$col_input,$plc1,$plc2){
	echo "<div class='form-group'>
    <label class='$col_label control-label'>$label</label>
    <div class='$col_input'>
      <div class='row'>
	      <input type='text' class='form-control col-3' placeholder='First name'>
	      <input type='text' class='form-control col-3' placeholder='Last name'>
	  </div>
    </div>
  </div>";
}
function select_h($label,$par,$data,$val,$col_label,$col_input){
	echo "<div class='form-group'>
    <label class='$col_label control-label'>$label</label>
    <div class='$col_input'>
	    <select $par class='form-control input-sm'>";
	    	foreach ($data as $key => $vdata) {
	    		if($key==$val){
	    			echo "<option value='$key' selected>$vdata</option>";
	    		}
	    		else{
	    			echo "<option value='$key'>$vdata</option>";
	    		}
	    	}
	    echo "</select>
	</div>
  </div>";
}
function input_col($label,$par,$help,$col){
	echo "<div class='form-group $col'>
    <label>$label</label>
    <input $par class='form-control form-control-sm' placeholder='Enter $label'>
    <small class='form-text text-muted'>$help</small>
  </div>";
}
function text_col($label,$par,$data,$help,$col){
	echo "<div class='form-group $col'>
    <label>$label</label>
    <textarea $par class='form-control form-control-sm' rows='2' placeholder='Enter $label'>$data</textarea>
    <small class='form-text text-muted'>$help</small>
  </div>";
}
function select_col($label,$par,$data,$val,$col){
	echo "<div class='form-group $col'>
    <label>$label</label>
    <select $par class='form-control form-control-sm'>";
    	foreach ($data as $key => $vdata) {
    		if($key==$val){
    			echo "<option value='$key' selected>$vdata</option>";
    		}
    		else{
    			echo "<option value='$key'>$vdata</option>";
    		}
    	}
    echo "</select>
  </div>";
}
function check_col($label,$name,$val,$selected,$gridcheck){
	echo "<div class='form-group'>
		<div class='form-check'>
			<input class='form-check-input' value='$val' name='$name' type='checkbox' id='$gridcheck' $selected>
			<label class='form-check-label' for='$gridcheck'>
				$label
			</label>
		</div>
	</div>";
}
function add_data($url){
	echo "<p>
		<a href='$url' class='btn btn-sm btn-success'><i class='fa fa-plus-square-o'></i> Add</a>
	</p>";
}
function btn_save_reset($col_offset,$col){
	echo "<div class='form-group'>
    <div class='$col_offset $col'>
      <button type='submit' name='save'  class='btn btn-success btn-sm'><i class='fa fa-floppy-o'></i> Save</button>
      <button type='reset' class='btn btn-default btn-sm' \><i class='fa fa-ban'></i> Reset</button>
    </div>
  </div>";
}
function btn_register_col(){
	echo "<button type='submit' name='daftar' class='btn btn-info btn-sm'><i class=\"fa fa-send\"></i> DAFTAR</button>";
}
function btn_submit_col(){
	echo "<button type='submit' name='submit' class='btn btn-success btn-sm'><i class=\"fa fa-send\"></i> Submit</button>";
}
function btn_submit_col_v2(){
	echo "<button type='submit' name='submit' class='btn btn-success btn-sm'><i class=\"fa fa-send\"></i> Submit</button>
	<button type='button' class='btn btn-default btn-sm' onclick=\"self.history.back(-1);\"><i class='fa fa-ban'></i> Batal</button>";
}
function btn_save_col(){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class=\"fa fa-save\"></i> Simpan</button>
	<button type='button' class='btn btn-default btn-sm' onclick=\"self.history.back(-1);\"><i class='fa fa-ban'></i> Batal</button>";
}
function btn_bayar_col(){
	echo "<button type='submit' name='bayar' class='btn btn-success btn-sm'><i class=\"fas fa-money-bill-wave-alt\"></i> Bayar</button>";
}
function btn_save_o_col(){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class=\"fa fa-save\"></i> Simpan</button>";
}
function btn_save_col_cust($url){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class=\"fa fa-save\"></i> Simpan</button>
	<button type='button' class='btn btn-default btn-sm' onclick=\"window.location='".site_url($url)."';\"><i class='fa fa-ban'></i> Close</button>";
}
function btn_save($col_offset,$col){
	echo "<div class='form-group'>
    <div class='$col_offset $col'>
      <button type='submit' name='save'  class='btn btn-success btn-sm'><i class='fa fa-floppy-o'></i> Save</button>
      <button type='button' class='btn btn-default btn-sm' onclick=\"self.history.back(-1);\"><i class='fa fa-ban'></i> Abort</button>
    </div>
  </div>";
}
function btn_save_cust($col_offset,$col,$url){
	echo "<div class='form-group'>
    <div class='$col_offset $col'>
      <button type='submit' name='save'  class='btn btn-success btn-sm'><i class='fa fa-floppy-o'></i> Save</button>
      <button type='button' class='btn btn-default btn-sm' onclick=\"window.location='".site_url($url)."';\"><i class='fa fa-ban'></i> Close</button>
    </div>
  </div>";
}
function btn_create(){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class='fas fa-save'></i> Save</button> &nbsp;
	<a href='#' class='btn btn-info btn-sm' data-dismiss='modal'>Close</a>";
}
function btn_update(){
	echo "<button type='submit' name='update' class='btn btn-success btn-sm'><i class='fas fa-save'></i> Save</button> &nbsp;
	<a href='#' class='btn btn-info btn-sm' data-dismiss='modal'>Close</a>";
}
function btn_upload($URL){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class='fas fa-file-upload'></i> Upload</button> &nbsp;
	<a href='".site_url($URL)."' class='btn btn-info btn-sm'>Close</a>";
}
function btn_save_detail($URL){
	echo "<button type='submit' name='save' class='btn btn-success btn-sm'><i class='fa fa-floppy-o'></i> Save</button>
	<button type='button' class='btn btn-default btn-sm' onclick=\"window.location='".site_url($URL)."';\"><i class='fa fa-times'></i> Close</button>";
}
function form_open_col($par){
	echo "<form $par style='font-size:12px;'>";
}
function form_open($par){
	echo "<form $par class='form-horizontal'>";
}
function form_close(){
	echo "</form>";
}
function konf_save($var,$url){
	if($var){
		echo "<script>alert('Data successfully saved');window.location.href='".site_url($url)."';</script>";
	}
}
function konf_edit($var,$url){
	if($var){
		echo "<script>alert('Data successfully changed');window.location.href='".site_url($url)."';</script>";
	}
}
function konf_delete($var,$url){
	if($var){
		echo "<script>alert('Data successfully deleted');window.location.href='".site_url($url)."';</script>";
	}
}
function image_form($label,$url,$col_label,$col_image){
	echo '<div class="form-group">
					    <label for="staticEmail" class="'.$col_label.'" col-form-label">'.$label.'</label>
					    <div class="'.$col_image.'">
					      <img src="'.$url.'" class="img-thumbnail" width="200">
					    </div>
					  </div>';
}
function image_form_col($label,$url,$col){
	echo '<div class="form-group '.$col.'">
					    <label for="staticEmail" col-form-label">'.$label.'</label>
					    <div>
					      <img src="'.$url.'" class="img-thumbnail" width="200">
					    </div>
					  </div>';
}
function link_col($label,$url,$col){
	echo '<div class="form-group '.$col.'">
					    <label for="staticEmail" col-form-label">'.$label.'</label>
					    <div>
					      <a href="'.$url.'" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
					    </div>
					  </div>';
}
function label_col($label,$text,$col){
	echo '<div class="form-group '.$col.'">
			    <label for="staticEmail" col-form-label">'.$label.'</label>
			    <div>
			      '.$text.'
			    </div>
			  </div>';
}
function upload_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   			elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
			move_uploaded_file("$image", "$destination_url");
	}
	function penyebut($nilai) {
			$nilai = abs($nilai);
			$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = penyebut($nilai - 10). " belas";
			} else if ($nilai < 100) {
				$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " seratus" . penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " seribu" . penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
			}
			return $temp;
		}

		function terbilang($nilai) {
			if($nilai<0) {
				$hasil = "minus ". trim(penyebut($nilai));
			} else {
				$hasil = trim(penyebut($nilai));
			}
			return $hasil;
		}

