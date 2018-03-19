<?php /**
 *
 */
 namespace common\models;

 use Yii;
 use yii\base\Model;
 use common\models\TblBerita;

class BeritaForm extends Model
{

  public $judul,$isi,$tgl,$img;
  public function rules(){
    return [
        [['judul', 'isi', 'tgl'], 'required'],
        [['isi'], 'string'],
        [['tgl'], 'safe'],
        [['judul'], 'string', 'max' => 25],
        [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
    ];
  }
  public function save(){
    $foo = '';
    $foo = $this->img->baseName.'-'.date('Y-m-d').'-'.date('h:i:s').'.'.$this->img->extension;
    $model = new TblBerita();
    $model->judul = $this->judul;
    $model->isi = $this->isi;
    $model->tgl = date('Y-m-d');
    $model->img = $foo;
    $this->img->saveAs('img/'.$foo);
      if ($model->save()){
        return true;
      }
      else {
        return false;
      }
  }
  public function set_update($id){
    $model = TblBerita::findOne($id);
    $this->judul = $model->judul;
    $this->isi = $model->isi;

  }
  public function do_update($id){
    $model = TblBerita::findOne($id);
    $model->judul = $this->judul;
    $model->isi = $this->isi;
    $foo = '';
    $foo = $this->img->baseName.'-'.date('Y-m-d').'-'.date('h:i:s').'.'.$this->img->extension;
    $model->img = $foo;
    $this->img->saveAs('img/'.$foo);
    if ($model->save()){
      return true;
    }
    else {
      return false;
    }
  }
}
 ?>
