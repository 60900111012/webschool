<?php use yii\helpers\Html;
 ?>
<h1>Saran Dan Prasanran</h1>
<table class="table">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Gambar</th>
  </tr>
  <?php
  $i=1;
    foreach ($model as $k) {
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $k->nama ?></td>
        <td><?php echo Html::img(Yii::getAlias('@web').'/uploads/'.$k->foto) ?></td>
      </tr>

      <?php
      $i++;
    }
   ?>
</table>
