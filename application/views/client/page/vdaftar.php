<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-4">
            <h4 class="mb-3">Daftar member baru <?= $nama_toko;?></h4>
            <?php
                $CI =& get_instance();
                card_open();
                    form_open_col("method='post' enctype='multipart/form-data' ");
                        echo "<div class='form-row'>";
                            input_col("Nama","type='text' name='nama_member' autocomplete='off'  required","","col-md-4");
                            // input_col("Luas Tanah (m2)","type='text' name='luas_tanah_kapling' autocomplete='off' readonly","","col-md-2");
                            // input_col("Luas Bangunan","type='text' name='luas_bangunan_kapling' autocomplete='off' readonly","","col-md-2");
                            // input_col("Total Harga","type='text' name='total' value='".number_format($trans->total,0)."' autocomplete='off' readonly","","col-md-3");
                            // input_col("Cara Bayar","type='text' name='cara_bayar' autocomplete='off' readonly","","col-md-3");
                            // input_col("Periode Angsuran","type='text' name='jumlah_tahapan' autocomplete='off' readonly","","col-md-3");
                        echo "</div>";

                        echo "<div class='form-row'>";
                            input_col("Alamat","type='text' name='alamat' autocomplete='off'  required","","col-md-8");
                        echo "</div>";
                        echo "<div class='form-row'>";
                            input_col("No. HP","type='text' name='no_hp' autocomplete='off' maxlength='13' required","","col-md-2");
                        echo "</div>";

                        echo "<div class='form-row'>";
                            input_col("Email","type='email' name='email' autocomplete='off' required","","col-md-3");
                        echo "</div>";

                        echo "<div class='form-row'>";
                            input_col("Password","type='password' name='password' autocomplete='off' required","","col-md-3");
                        echo "</div>";
                        // echo "<div class='form-row'>";
                            echo "<small style='font-size:11px;' class='mb-5'>Dengan menekan Tombol Daftar, saya mengkonfirmasi telah menyetujui Syarat dan Ketentuan.</small><br><br>";
                        // echo "</div>";
                        btn_register_col();
                    form_close();
                card_close();
                if(isset($_POST["daftar"])){
                    $data=array(
                        "nama_member"=>$_POST["nama_member"],
                        "alamat"=>$_POST["alamat"],
                        "no_hp"=>$_POST["no_hp"],
                        "email"=>$_POST["email"],
                        "password"=>$_POST["password"]);
                    $save=$CI->add_data($table,$data);
                    // if($save){
                        echo "<script>alert('Pendaftaran berhasil, silahkan login dengan Email dan Password yang telah di daftarkan');</script>";
                    // }
                }
            ?>
        </div>
    </div>
</div>