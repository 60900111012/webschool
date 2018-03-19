<?php /**
 *
 */
 namespace common\models;

 use Yii;
 use yii\base\Model;


class ProfilForm extends Model
{
  public $img;
  public function rules(){
    return   [[['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg']];
  }
  public function MakeChange($model)
  {
     $foto = $this->img->baseName.date('Ymd').date('his').'.'.$this->img->extension;
    $model->foto = $foto;
    if ($this->img->saveAs('img/'.$foto) == 1){
      if ($model->save())
         return true;
      else
         return false;
    }
    else {
      return false;
    }
  }
  public function set_update(){
    if (Yii::$app->user->identity->admin){
      $model = TblUser::findOne(Yii::$app->user->id);
      $foto = $this->img->baseName.date('Ymd').date('his').'.'.$this->img->extension;
      $model->img = $foto;
      if ($this->img->saveAs('img/'.$foto) == 1){
        if ($model->save())
           return true;
        else
           return false;
      }
      else {
        return false;
      }
    }
    elseif (Yii::$app->user->identity->guru){
      return $this->MakeChange(TblGuru::find()->where(['id_guru'=>Yii::$app->user->id])->one());
    }
    elseif (Yii::$app->user->identity->siswa) {
      return $this->MakeChange(TblSiswa::find()->where(['id_siswa'=> Yii::$app->user->id])->one());
    }
  }
}
 ?>
