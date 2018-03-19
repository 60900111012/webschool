<?php /**
 *
 */
 namespace common\models;

 use Yii;
 use yii\base\Model;
 use common\models\TblSp;
class SpForm extends Model
{

  public $nama;
  public $foto;

  public function rules()
  {
    return [
        [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        [['nama'], 'string', 'max' => 25],
    ];
  }
  public function attributeLabels(){
    return [
      'nama' => 'Nama',
      'foto' => 'Foto',
    ];
  }
  public function save(){
    $img = '';
    if ($this->validate()){

      $model = new TblSp();
      $img = $this->foto->baseName.date('d-M-Y').date('h:i:s').'.'.$this->foto->extension;
      $this->foto->saveAs('img/'.$img);
      $model->nama = $this->nama;
      $model->foto = $img;
      if ($model->save()){
        return true;
      }
      else {
        return false;
      }
    }
  }
  public function get_update($id){
    $model = TblSp::findOne($id);
    $this->nama = $model->nama;
    // $this->foto = $model->foto;
  }
  public function set_update($id)
  {
      $img = '';
      if($this->validate()){
      $model = TblSp::findOne($id);
      $img = $this->foto->baseName.date('d-M-Y').date('h:i:s').'.'.$this->foto->extension;
      $this->foto->saveAs('img/'.$img);
      $model->nama = $this->nama;
      $model->foto = $img;
      if ($model->save()){
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }
}
 ?>
