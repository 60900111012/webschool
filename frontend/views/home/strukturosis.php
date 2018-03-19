<style type="text/css">
  .profile{
    background-color: #ccd9f6;
    padding: 10px;
    border-radius: 6px;
    margin-left: 36px;
    /*width: 150px;*/
    margin-bottom: 36px;
    text-align: center;
  }
  .foto{
    height: 180px;
  }
  .struk{
    text-align: center;
  }
  .imgstruk{
    width: 60%;
  }
</style>

<div class="col-lg-10 struk">
  <img class="imgstruk" src="<?php echo Yii::getAlias('@web').'/img/osist.png'?>"><hr>
</div>
<?php
  for ($i=1;$i<10;$i++)
  {
?>
<div class="col-lg-2 profile">
  <img class="foto" src="<?php echo Yii::getAlias('@web').'/img/logo.png' ?>"><br>Ardi Ferdiansyah S.Kom
</div>
<?php
  }
?>
