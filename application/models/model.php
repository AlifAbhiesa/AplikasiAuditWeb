<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public function GetKk($where= "") {
		$data = $this->db->query('select * from tb_kk '.$where);
		return $data;
	}
	
	public function GetBrng17($where= "") {
		$data = $this->db->query('select * from tbl_brng17 LEFT JOIN tbl_mtk ON tbl_brng17.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng1214($where= "") {
		$data = $this->db->query('select * from tbl_brng1214 LEFT JOIN tbl_mtk ON tbl_brng1214.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng810($where= "") {
		$data = $this->db->query('select * from tbl_brng810 LEFT JOIN tbl_mtk ON tbl_brng810.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng1113($where= "") {
		$data = $this->db->query('select * from tbl_brng1113 LEFT JOIN tbl_mtk ON tbl_brng1113.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng15($where= "") {
		$data = $this->db->query('select * from tbl_brng15 LEFT JOIN tbl_dsn ON tbl_brng15.id_dsn = tbl_dsn.id_dsn '.$where);
		return $data;
	}
	
	public function GetBrng1719($where= "") {
		$data = $this->db->query('select * from tbl_brng1719 LEFT JOIN tbl_mhs ON tbl_brng1719.id_mhs = tbl_mhs.id_mhs '.$where);
		return $data;
	}
	
	public function GetBrng18b($where= "") {
		$data = $this->db->query('select * from tbl_brng18b LEFT JOIN tbl_mhs ON tbl_brng18b.id_mhs = tbl_mhs.id_mhs '.$where);
		return $data;
	}
	
	public function GetBrng20($where= "") {
		$data = $this->db->query('select * from tbl_brng20 LEFT JOIN tbl_dsn ON tbl_brng20.id_dsn = tbl_dsn.id_dsn LEFT JOIN tbl_mtk ON tbl_brng20.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng21($where= "") {
		$data = $this->db->query('select * from tbl_brng21 LEFT JOIN tbl_mhs ON tbl_brng21.id_mhs = tbl_mhs.id_mhs '.$where);
		return $data;
	}
	
	public function GetBrng2223($where= "") {
		$data = $this->db->query('select * from tbl_brng2223 LEFT JOIN tbl_mtk ON tbl_brng2223.id_mtk = tbl_mtk.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng24($where= "") {
		$data = $this->db->query('select * from tbl_brng24 LEFT JOIN tbl_kegiatan ON tbl_brng24.id_kegiatan = tbl_kegiatan.id_kegiatan LEFT JOIN tbl_prestasi ON tbl_prestasi.id_kegiatan = tbl_kegiatan.id_kegiatan LEFT JOIN tbl_mhs ON tbl_brng24.nrp_mhs = tbl_mhs.id_mhs LEFT JOIN tbl_jrsn ON tbl_jrsn.id_jrsn = tbl_mhs.id_jrsn '.$where);
		return $data;
	}
	
	public function GetBrng25($where= "") {
		$data = $this->db->query('select * from tbl_brng25 LEFT JOIN tbl_mhs ON tbl_brng25.id_mhs = tbl_mhs.id_mhs LEFT JOIN tbl_dsn ON tbl_dsn.id_dsn = tbl_brng25.id_dsn '.$where);
		return $data;
	}
	
	public function GetBrng2629($where= "") {
		$data = $this->db->query('select * from tbl_brng2629 LEFT JOIN tbl_dsn ON tbl_brng2629.id_dsn = tbl_dsn.id_dsn '.$where);
		return $data;
	}
	
	public function GetBrng30($where= "") {
		$data = $this->db->query('select * from tbl_brng30 LEFT JOIN tbl_dsn ON tbl_brng30.id_dsn = tbl_dsn.id_dsn LEFT JOIN tbl_mtk ON tbl_mtk.id_mtk = tbl_brng30.id_mtk '.$where);
		return $data;
	}
	
	public function GetBrng3132($where= "") {
		$data = $this->db->query('select * from tbl_brng3132 LEFT JOIN tbl_dsn ON tbl_brng3132.id_dsn = tbl_dsn.id_dsn '.$where);
		return $data;
	}
	
	public function GetBrng33($where= "") {
		$data = $this->db->query('select * from tbl_brng33 '.$where);
		return $data;
	}
	
	public function GetBrng34($where= "") {
		$data = $this->db->query('select * from tbl_brng34 '.$where);
		return $data;
	}
	
	public function GetBrng35($where= "") {
		$data = $this->db->query('select * from tbl_brng35 LEFT JOIN tbl_dsn ON tbl_brng35.id_dsn = tbl_dsn.id_dsn '.$where);
		return $data;
	}
	
	
	public function GetMtk($where= "") {
		$data = $this->db->query('select * from tbl_mtk '.$where);
		return $data;
	}
	
	public function Getpres($where= "") {
		$data = $this->db->query('select * from tbl_prestasi LEFT JOIN tbl_kegiatan ON tbl_prestasi.id_kegiatan = tbl_kegiatan.id_kegiatan '.$where);
		return $data;
	}
	
	public function GetMhs($where= "") {
		$data = $this->db->query('select * from tbl_mhs LEFT JOIN tbl_jrsn ON tbl_mhs.id_jrsn = tbl_jrsn.id_jrsn '.$where);
		return $data;
	}
	
	public function GetDsn($where= "") {
		$data = $this->db->query('select * from tbl_dsn '.$where);
		return $data;
	}
	
	public function Getindikator($where= "") {
		$data = $this->db->query('select * from tbl_indikator '.$where);
		return $data;
	}
	
	public function Getmaster_audit($where= "") {
		$data = $this->db->query('select * from tbl_master_audit '.$where);
		return $data;
	}
	
	public function GetKegiatan($where= "") {
		$data = $this->db->query('select * from tbl_kegiatan '.$where);
		return $data;
	}
	
	public function GetJrsn($where= "") {
		$data = $this->db->query('select * from tbl_jrsn LEFT JOIN tbl_dsn ON tbl_jrsn.id_jrsn = tbl_dsn.id_jrsn '.$where);
		return $data;
	}
	
	public function Getaudit($where= "") {
		$data = $this->db->query('select * from tbl_audit LEFT JOIN tbl_master_audit ON tbl_audit.id_master_audit = tbl_master_audit.id_master LEFT JOIN tbl_indikator ON tbl_indikator.kode_indikator = tbl_master_audit.kode_indikator '.$where);
		return $data;
	}

public function Getjadwalaudit($where= "") {
		$data = $this->db->query('select * from tbl_jadwal LEFT JOIN tbl_jrsn ON tbl_jrsn.id_jrsn = tbl_jadwal.id_jrsn '.$where);
		return $data;
	}

	public function Getauditor($where= "") {
		$data = $this->db->query('select * from tbl_auditor LEFT JOIN tbl_dsn ON tbl_auditor.id_dsn = tbl_dsn.id_dsn LEFT JOIN tbl_jadwal ON tbl_jadwal.id_jadwal = tbl_auditor.id_jadwal LEFT JOIN tbl_jrsn ON tbl_jadwal.id_jrsn = tbl_jrsn.id_jrsn '.$where);
		return $data;
	}
	public function Getrentangnilai($where= "") {
		$data = $this->db->query('select * from tbl_rentang_nilai LEFT JOIN tbl_indikator ON tbl_rentang_nilai.kode_indikator = tbl_indikator.kode_indikator '.$where);
		return $data;
	}
	public function Getkesimpulan($where= "") {
		$data = $this->db->query('select * from tbl_kesimpulan LEFT JOIN tbl_jadwal ON tbl_kesimpulan.id_jadwal = tbl_jadwal.id_jadwal '.$where);
		return $data;
	}
	public function Getmanageaccount($where= "") {
		$data = $this->db->query('select * from tb_login '.$where);
		return $data;
	}
	
	public function Getnilaiaudit($where= "") {
		$data = $this->db->query('select tbl_indikator.kode_indikator,tbl_indikator.indikator_audit, tbl_indikator.bobot,tbl_nilai_audit.nilai,tbl_nilai_audit.bobot_nilai as bobotXnilai from tbl_indikator LEFT JOIN tbl_master_audit ON tbl_master_audit.kode_indikator = tbl_indikator.kode_indikator LEFT JOIN tbl_nilai_audit ON tbl_nilai_audit.id_master = tbl_master_audit.id_master '.$where);
		return $data;
	}
/**
	 *Batas GET
	 **/

	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	
	

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	/**
	 * batas Fungsi Public
	 **/
	 
	 
	function UpdateKtp($data){
        $this->db->where('id_ktp',$data['id_ktp']);
        $this->db->update('tb_ktp',$data);
    }
	
	function UpdateBrng17($data){
        $this->db->where('id_brng17',$data['id_brng17']);
        $this->db->update('tbl_brng17',$data);
    }
	
	function UpdateBrng810($data){
        $this->db->where('id_brng810',$data['id_brng810']);
        $this->db->update('tbl_brng810',$data);
    }
	
	function UpdateBrng15($data){
        $this->db->where('id_brng15',$data['id_brng15']);
        $this->db->update('tbl_brng15',$data);
    }
	
	function UpdateBrng1214($data){
        $this->db->where('id_brng1214',$data['id_brng1214']);
        $this->db->update('tbl_brng1214',$data);
    }
	
	function UpdateBrng1113($data){
        $this->db->where('id_brng1113',$data['id_brng1113']);
        $this->db->update('tbl_brng1113',$data);
    }
	
	function UpdateBrng1719($data){
        $this->db->where('id_brng1719',$data['id_brng1719']);
        $this->db->update('tbl_brng1719',$data);
    }
	
	function UpdateBrng18b($data){
        $this->db->where('id_brng18b',$data['id_brng18b']);
        $this->db->update('tbl_brng18b',$data);
    }
	
	function UpdateBrng20($data){
        $this->db->where('id_brng20',$data['id_brng20']);
        $this->db->update('tbl_brng20',$data);
    }
	
	function UpdateBrng21($data){
        $this->db->where('id_brng21',$data['id_brng21']);
        $this->db->update('tbl_brng21',$data);
    }
	
	function UpdateBrng2223($data){
        $this->db->where('id_brng2223',$data['id_brng2223']);
        $this->db->update('tbl_brng2223',$data);
    }
	
	function UpdateBrng24($data){
        $this->db->where('id_brng24',$data['id_brng24']);
        $this->db->update('tbl_brng24',$data);
    }
	
	function UpdateBrng25($data){
        $this->db->where('id_brng25',$data['id_brng25']);
        $this->db->update('tbl_brng25',$data);
    }
	
	function UpdateBrng2629($data){
        $this->db->where('id_brng2629',$data['id_brng2629']);
        $this->db->update('tbl_brng2629',$data);
    }
	
	function UpdateBrng30($data){
        $this->db->where('id_brng2629',$data['id_brng2629']);
        $this->db->update('tbl_brng2629',$data);
    }
	
	function UpdateBrng3132($data){
        $this->db->where('id_brng3132',$data['id_brng3132']);
        $this->db->update('tbl_brng3132',$data);
    }
	
	function UpdateBrng33($data){
        $this->db->where('id_brng33',$data['id_brng33']);
        $this->db->update('tbl_brng33',$data);
    }
	
	function UpdateBrng34($data){
        $this->db->where('id_brng34',$data['id_brng34']);
        $this->db->update('tbl_brng34',$data);
    }
	
	function UpdateBrng35($data){
        $this->db->where('id_brng35',$data['id_brng35']);
        $this->db->update('tbl_brng35',$data);
    }

	function Updatemtk($data){
        $this->db->where('id_mtk',$data['id_mtk']);
        $this->db->update('tbl_mtk',$data);
    }
	
	function Updatepres($data){
        $this->db->where('id_pres',$data['id_pres']);
        $this->db->update('tbl_prestasi',$data);
    }
	
	function Updatekegiatan($data){
        $this->db->where('id_kegiatan',$data['id_kegiatan']);
        $this->db->update('tbl_kegiatan',$data);
    }
	
	function Updatemhs($data){
        $this->db->where('id_mhs',$data['id_mhs']);
        $this->db->update('tbl_mhs',$data);
    }
	
	function Updatejrsn($data){
        $this->db->where('id_jrsn',$data['id_jrsn']);
        $this->db->update('tbl_jrsn',$data);
    }
	
	function Updatedsn($data){
        $this->db->where('id_dsn',$data['id_dsn']);
        $this->db->update('tbl_dsn',$data);
    }
	
	
	function Updateindikator($data){
        $this->db->where('kode_indikator',$data['kode_indikator']);
        $this->db->update('tbl_indikator',$data);
    }
	
	function Updatemaster_audit($data){
        $this->db->where('id_master',$data['id_master']);
        $this->db->update('tbl_master_audit',$data);
    }
	
	function Updateaudit($data){
        $this->db->where('id_master_audit',$data['id_master_audit']);
        $this->db->update('tbl_audit',$data);
    }
	function Updatejadwalaudit($data){
        $this->db->where('id_jadwal',$data['id_jadwal']);
        $this->db->update('tbl_jadwal',$data);
    }

function Updateauditor($data){
        $this->db->where('id_auditor',$data['id_auditor']);
        $this->db->update('tbl_auditor',$data);
    }

function Updaterentangnilai($data){
        $this->db->where('id_rentang',$data['id_rentang']);
        $this->db->update('tbl_rentang_nilai',$data);
    }
	
	function Updatekesimpulan($data){
        $this->db->where('id_kesimpulan',$data['id_kesimpulan']);
        $this->db->update('tbl_kesimpulan',$data);
    }
	function Updatemanageaccount($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('tb_login',$data);
    }

	/**
	 * Batas Update
	 **/
	 
    function cetakktp(){
    	return $this->db->query("select * from tb_ktp");
    }

    function cetakkk(){
    	return $this->db->query("select * from tb_kk");
    }

    function GetUser($where = ''){
		return $this->db->query("select * from tb_login $where;");
	}


	// Cek No yang sudah ada
	function cekNo($kd){
		$query = $this->db->query("select * from tb_iden where no ='".$kd."'");
		$hasil = 0;
		if ($query->num_rows()>0) {
			$hasil = 1;
		}
		return $hasil;
	}

}