<?php
namespace common\models;
use yii\base\Model;
/**
* 
*/
class NilaiForm extends Model
{
	public $id_siswa;
	public $id_pelajaran;
	public $id_kelas;
	public $jenis_nilai;
	public $nilai;
	public $id;
	public $total;

	public function rules()
	{
		return[
			[['id_kelas','id_pelajaran','id_siswa','jenis_nilai','nilai'],'required','message'=> '{attribute} Tidak Boleh Kosong'],

		];
	}
	public function simpan(){
		$simpan = new TblNilai();
		$nilai_ = 'nilai_'.$this->jenis_nilai;
		$simpan->id_siswa = $this->id_siswa;
		$simpan->id_kelas = $this->id_kelas;
		$simpan->id_pelajaran = $this->id_pelajaran;
		$simpan->$nilai_ = $this->nilai;
		if ($simpan->save())
			return true;
	}
	public function before($model)
	{
		// $dummy = new NilaiForm();
		$this->id = $model->id;
		$this->id_siswa = $model->id_siswa;
		$this->id_pelajaran = $model->id_pelajaran;
		$this->id_kelas = $model->id_kelas;
		$this->jenis_nilai = 0;
		$this->nilai = 0;
		return $this;
	}
	public function tambah_nilai()
	{
		$j = 'nilai_'.$this->jenis_nilai;
		$update = TblNilai::find()->where(['id_siswa'=>$this->id_siswa,'id_kelas'=>$this->id_kelas,'id_pelajaran'=>$this->id_pelajaran])->one();
		$update->$j = $this->nilai;
		if ($update->save())
			return true;
	}
	public function akumulasi($id)
	{
		$nilaiForm = new NilaiForm();
		$nilai = TblNilai::find()->where($id)->one();
		$persen_tugas = TblPersentase::find()->where(['nama_parameter' => 'persen_tugas'])->one(); 
		$persen_mid = TblPersentase::find()->where(['nama_parameter' => 'persen_mid'])->one();
		$persen_akhir = TblPersentase::find()->where(['nama_parameter' => 'persen_akhir'])->one();
		$tugas =  (($nilai->nilai_1+$nilai->nilai_2+$nilai->nilai_3+$nilai->nilai_4+$nilai->nilai_5)* $persen_tugas->nilai_parameter) / 100;
		$mid = ($nilai->nilai_mid * $persen_mid->nilai_parameter) / 100;
		$akhir = ($nilai->nilai_akhir * $persen_akhir->nilai_parameter)/ 100;
		$nilaiForm->total = $tugas+$mid+$akhir;
		return $nilaiForm->total;
	}

	public function garade()
	{
		$nilaiForm = new NilaiForm();
		if ($nilaiForm->total > 90){
			return 'A';
		}
		elseif ($nilaiForm->total < 90 && $nilaiForm->total > 80) {
			return 'B';
		}
		else{
			return 'E';
		}
	}
	public function showAll(){
		return $data = TblNilai::find()->where(['id_siswa'=>$this->id_siswa,'id_kelas'=>$this->id_kelas,'id_pelajaran'=>$this->id_pelajaran])->one();
		 
	}
}

?>