<?php

class Model_admin extends CI_Model{

	public function listukmmap()
	{
		$this->db->order_by('id_ukm', 'DESC');
		$this->db->select('*');
		$this->db->from('tbl_master_ukm');
		$this->db->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan=tbl_master_ukm.kecamatan');
		$this->db->join('tbl_kabupaten','tbl_kabupaten.id_kabupaten=tbl_master_ukm.kabupaten');

		$q = $this->db->get();
		return $q->result_array();
		// return $this->db->get('tbl_master_ukm')->result();	
	}
	public function listukmmapcari($id_klasterisasi,$id_bekraf,$id_daerah)
	{
		// $this->db->order_by('id_ukm', 'DESC');
		// return $this->db->get('tbl_master_ukm')->result();

		$this->db->select('*');
		$this->db->from('tbl_master_ukm');
		// $this->db->join('tbl_kecamatan','tbl_kecamatan.kode_kecamatan=tbl_master_wisata.kode_kecamatan');
		// $this->db->join('tbl_desa','tbl_desa.kode_desa=tbl_master_wisata.kode_desa');
		// $this->db->join('tbl_wisata','tbl_wisata.kode_wisata=tbl_master_wisata.kode_wisata','left');
		$this->db->like('tbl_master_ukm.id_klasterisasi',$id_klasterisasi);
		$this->db->or_like('tbl_master_ukm.id_bekraf',$id_bekraf);
		$this->db->or_like('tbl_master_ukm.kabupaten',$id_daerah);

		$query = $this->db->get();
 		return $query->result();

	}

	// klasterisasi
	public function listklasterisasi()
	{
		$this->db->order_by('id_klasterisasi', 'DESC');
		return $this->db->get('tbl_klasterisasi')->result_array();	
	}
	public function TambahKlas($data)
	{
		$this->db->insert('tbl_klasterisasi',$data);
	}
	public function EditKlas($data,$id_klasterisasi)
	{
		$this->db->where('id_klasterisasi',$id_klasterisasi);
		$this->db->update('tbl_klasterisasi',$data);
	}
	public function HapusKlas($id_klasterisasi)
	{
		$this->db->where('id_klasterisasi',$id_klasterisasi);
		$this->db->delete('tbl_klasterisasi');
	}
	// kategori bekraf
	public function listKategoribek()
	{
		$this->db->order_by('id_bekraf', 'DESC');
		return $this->db->get('tbl_bekraf')->result_array();	
	}
	public function TambahBekraf($data)
	{
		$this->db->insert('tbl_bekraf',$data);
	}
	public function EditBekraf($data,$id_bekraf)
	{
		$this->db->where('id_bekraf',$id_bekraf);
		$this->db->update('tbl_bekraf',$data);
	}
	public function HapusBekraf($id_bekraf)
	{
		$this->db->where('id_bekraf',$id_bekraf);
		$this->db->delete('tbl_bekraf');
	}
	// pekerjaan
	public function listPekerjaan()
	{
		$this->db->order_by('id_pekerjaan', 'DESC');
		return $this->db->get('tbl_pekerjaan')->result_array();	
	}
	public function TambahPekerjaan($data)
	{
		$this->db->insert('tbl_pekerjaan',$data);
	}
	public function EditPekerjaan($data,$id_pekerjaan)
	{
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$this->db->update('tbl_pekerjaan',$data);
	}
	public function HapusPekerjaan($id_pekerjaan)
	{
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$this->db->delete('tbl_pekerjaan');
	}
	// Daerah
	public function listDaerah()
	{
		$this->db->order_by('nama_daerah', 'ASC');
		return $this->db->get('tbl_daerah')->result_array();	
	}
	public function TambahDaerah($data)
	{
		$this->db->insert('tbl_daerah',$data);
	}
	public function EditDaerah($data,$id_daerah)
	{
		$this->db->where('id_daerah',$id_daerah);
		$this->db->update('tbl_daerah',$data);
	}
	public function HapusDaerah($id_daerah)
	{
		$this->db->where('id_daerah',$id_daerah);
		$this->db->delete('tbl_daerah');
	}
	// Kabupaten
	public function listKabupaten()
	{
		$this->db->order_by('nama_kabupaten', 'ASC');
		return $this->db->get('tbl_kabupaten')->result_array();	
	}
	public function TambahKabupaten($data)
	{
		$this->db->insert('tbl_kabupaten',$data);
	}
	public function EditKabupaten($data,$id_kabupaten)
	{
		$this->db->where('id_kabupaten',$id_kabupaten);
		$this->db->update('tbl_kabupaten',$data);
	}
	public function HapusKabupaten($id_kabupaten)
	{
		$this->db->where('id_kabupaten',$id_kabupaten);
		$this->db->delete('tbl_kabupaten');
	}
	// kecamatan
	public function listkecamatan()
	{
		 $this->db->select('*');
		 $this->db->order_by('nama_kecamatan', 'ASC');
		 $this->db->from('tbl_kecamatan');
		 $this->db->join('tbl_kabupaten','tbl_kabupaten.id_kabupaten=tbl_kecamatan.id_kabupaten','left');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	public function TambahKecamatan($data)
	{
		$this->db->insert('tbl_kecamatan',$data);
	}
	public function EditKecamatan($data,$id_kecamatan)
	{
		$this->db->where('id_kecamatan',$id_kecamatan);
		$this->db->update('tbl_kecamatan',$data);
	}
	public function HapusKecamatan($id_kecamatan)
	{
		$this->db->where('id_kecamatan',$id_kecamatan);
		$this->db->delete('tbl_kecamatan');
	}
	// kecamatan
	public function listdesa()
	{
		 $this->db->select('*');
		 $this->db->order_by('nama_desa', 'ASC');
		 $this->db->from('tbl_desa');
		 $this->db->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan=tbl_desa.id_kecamatan');
		 $this->db->join('tbl_kabupaten','tbl_kabupaten.id_kabupaten=tbl_desa.id_kabupaten','left');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	public function TambahDesa($data)
	{
		$this->db->insert('tbl_desa',$data);
	}
	public function EditDesa($data,$id_desa)
	{
		$this->db->where('id_desa',$id_desa);
		$this->db->update('tbl_desa',$data);
	}
	public function HapusDesa($id_desa)
	{
		$this->db->where('id_desa',$id_desa);
		$this->db->delete('tbl_desa');
	}
	// klasterisasi
	public function listdaftarukm()
	{
		$this->db->order_by('id_daftar', 'ASC');
		$this->db->where('status',2);
		return $this->db->get('tbl_daftar_ukm')->result_array();	
	}
	//
	public function listberita()
	{
		$this->db->order_by('id_berita','DESC');
		return $this->db->get('tbl_berita')->result_array();
	}
	public function listberitaaktif()
	{
		$this->db->order_by('id_berita','DESC');
		$this->db->where('status_berita',1);
		return $this->db->get('tbl_berita')->result_array();
	}
	public function TambahBerita($data)
	{
		$this->db->insert('tbl_berita',$data);
	}
	public function HapusBerita($id_berita)
	{
		$this->db->where('id_berita',$id_berita);
		$this->db->delete('tbl_berita');
	}
	public function EditBerita($id_berita,$data)
	{
		$this->db->where('id_berita',$id_berita);
		$this->db->update('tbl_berita',$data);
	}
	public function listgaleri()
	{
		$this->db->order_by('id_galeri','DESC');
		return $this->db->get('tbl_galeri')->result_array();
	}
	public function listgalerist()
	{
		$this->db->order_by('id_galeri','DESC');
		$this->db->where('status',1);
		return $this->db->get('tbl_galeri')->result_array();
	}
	public function TambahGaleri($data)
	{
		$this->db->insert('tbl_galeri',$data);
	}
	public function HapusGaleri($id_galeri)
	{
		$this->db->where('id_galeri',$id_galeri );
		$this->db->delete('tbl_galeri');
	}
	public function listslide()
	{
		$this->db->order_by('id','DESC');
		return $this->db->get('tbl_slide')->result_array();
	}
	public function TambahSlide($data)
	{
		$this->db->insert('tbl_slide',$data);
	}
	public function HapusSlide($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_slide');
	}
	public function listpengaduan()
	{
		$this->db->order_by('id_pengaduan','DESC');
		return $this->db->get('tbl_pengaduan')->result_array();
	}
	public function HapusPengaduan($id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan );
		$this->db->delete('tbl_pengaduan');
	}
	public function listpengunjung()
	{
		$this->db->order_by('id','DESC');
		return $this->db->get('tbl_pengunjung')->result_array();
	}
	public function HapusPengunjung($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_pengunjung');
	}
	//master ukm
	public function listmasterukm()
	{
		 $this->db->select('*');
		 $this->db->order_by('id_ukm', 'ASC');
		 $this->db->from('tbl_master_ukm');
		 $this->db->join('tbl_klasterisasi','tbl_klasterisasi.id_klasterisasi=tbl_master_ukm.id_klasterisasi');
		 $this->db->join('tbl_bekraf','tbl_bekraf.id_bekraf=tbl_master_ukm.id_bekraf');
		 $this->db->join('tbl_kabupaten','tbl_kabupaten.id_kabupaten=tbl_master_ukm.kabupaten');
		 $this->db->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan=tbl_master_ukm.kecamatan');
		 $this->db->join('tbl_pekerjaan','tbl_pekerjaan.id_pekerjaan=tbl_master_ukm.pekerjaan');
		 $this->db->join('tbl_desa','tbl_desa.id_desa=tbl_master_ukm.desa','left');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	public function listmasterukme()
	{
		 $this->db->select('*');
		 $this->db->where('status_usaha',1);
		 $this->db->order_by('id_ukm', 'ASC');
		 $this->db->from('tbl_master_ukm');
		 $this->db->join('tbl_klasterisasi','tbl_klasterisasi.id_klasterisasi=tbl_master_ukm.id_klasterisasi');
		 $this->db->join('tbl_bekraf','tbl_bekraf.id_bekraf=tbl_master_ukm.id_bekraf');
		 $this->db->join('tbl_kabupaten','tbl_kabupaten.id_kabupaten=tbl_master_ukm.kabupaten');
		 $this->db->join('tbl_kecamatan','tbl_kecamatan.id_kecamatan=tbl_master_ukm.kecamatan');
		 $this->db->join('tbl_pekerjaan','tbl_pekerjaan.id_pekerjaan=tbl_master_ukm.pekerjaan');
		 $this->db->join('tbl_desa','tbl_desa.id_desa=tbl_master_ukm.desa','left');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	public function TambahMasterukm($data)
	{
		$this->db->insert('tbl_master_ukm',$data);
	}
	public function HapusMasterUkm($id_ukm)
	{
		$this->db->where('id_ukm',$id_ukm);
		$this->db->delete('tbl_master_ukm');
	}
	public function EditMasterUkm($id_ukm,$data)
	{
		$this->db->where('id_ukm',$id_ukm);
		$this->db->update('tbl_master_ukm',$data);
	}

	public function listberkasukm()
	{
		 $this->db->select('*');
		 $this->db->order_by('id_berkas', 'ASC');
		 $this->db->from('tbl_berkas');
		 $this->db->join('tbl_daftar_ukm','tbl_daftar_ukm.id_daftar=tbl_berkas.id_daftar','left');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	public function HapusBerkasUkm($id_berkas)
	{
		$this->db->where('id_berkas',$id_berkas);
		$this->db->delete('tbl_berkas');
	}
	public function listmemberukm()
	{
		$this->db->select('*');
		$this->db->where('role',1);
		return $this->db->get('member')->result_array();
	}
	public function HapusMemberUkm($id_member)
	{
		$this->db->where('id_member',$id_member);
		$this->db->delete('member');
	}
	public function listdaftaruk()
	{
		$this->db->select('*');
		$this->db->where('role',0);
		return $this->db->get('member')->result_array();
	}
	
	public function listadminecom()
	{
		$this->db->select('*');
		return $this->db->get('admin')->result_array();
	}
	public function listadmin()
	{
		$this->db->select('*');
		return $this->db->get('tbl_user')->result_array();
	}
	public function HapusAdmin($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('tbl_user');
	}
	
}