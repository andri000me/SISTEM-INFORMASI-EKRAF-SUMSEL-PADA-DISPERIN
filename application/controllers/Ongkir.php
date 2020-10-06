<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

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
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function set_session(){
		$newdata=array("kurir"=>$_POST["kurir"],"eb"=>$_POST["eb"],"ongkir"=>$_POST["ongkir"],"id_alamat"=>$_POST["id_alamat"]);
		$this->session->set_userdata($newdata);
	}
	function get_alamat()
	{
 		header('Access-Control-Allow-Origin: *');
		
		header('Content-type: application/json');
		$q=$this->db->get_where("alamat_kirim",array("id_alamat_kirim"=>$_GET["id_alamat"]));
		foreach ($q->result() as $key => $value) {
			$row[] = $value;
		}
		$data["list_alamat"]=$row;
		echo json_encode($data);
	}
	function cek_kabupaten()
	{
				$provinsi_id = $_GET['prov_id'];
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "key:268eb35fc82635dbe5898e64db024091"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  //echo $response;
				}

				$data = json_decode($response, true);
				for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
				    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
				}
	}
	function cek_ongkir2() 
	{
				$asal = $_POST['asal'];
				$id_kabupaten = $_POST['kab_id'];
				$kurir = $_POST['kurir'];
				$berat = $_POST['berat'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
					CURLOPT_HTTPHEADER => array(
						"content-type: application/x-www-form-urlencoded",
						"key:268eb35fc82635dbe5898e64db024091"
					),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					$data = json_decode($response, true);
				}
				?>
				
				<?php
				 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
				?>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label>Pilih Layanan</label>
						<select name="layanan" id="hitungX" class="form-control form-control-sm" onchange="hitung()" required>
							<option value="">-- pilih layanan --</option>
							<?php
								for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
									echo "<option value='".$data['rajaongkir']['results'][$k]['costs'][$l]['service']."#".str_replace(",","",$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'])."'>".$data['rajaongkir']['results'][$k]['costs'][$l]['service']." - Rp. ".number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'])."</option>";
								}
							?>
						</select>
					</div>
				</div>
					 
				 <?php
				}
	}
	function cek_ongkir() 
	{
				$asal = $_POST['asal'];
				$id_kabupaten = $_POST['kab_id'];
				$kurir = $_POST['kurir'];
				$berat = $_POST['berat'];

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
					CURLOPT_HTTPHEADER => array(
						"content-type: application/x-www-form-urlencoded",
						"key:268eb35fc82635dbe5898e64db024091"
					),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					$data = json_decode($response, true);
				}
				?>
				<?php echo "<p>".$data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?>, Berat @<?php echo $berat;?>gram, Kurir : <?php echo strtoupper($kurir)."</p>"; ?>
				<?php
				 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
				?>
					 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" class="small">
						 <table class="table table-striped table-sm">
							 <tr>
								 <th>No.</th>
								 <th>Jenis Layanan</th>
								 <th class="text-center">ETD</th>
								 <th class="text-right">Tarif</th>
							 </tr>
							 <?php
							 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
							 ?>
							 <tr>
								 <td><?php echo $l+1;?>.</td>
								 <td>
									 <div><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
									 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
								 </td>
								 <td class="text-center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
								 <td class="text-right"><?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
							 </tr>
							 <?php
							 }
							 ?>
						 </table>
					 </div>
				 <?php
				 }
	}
}
