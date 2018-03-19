<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\TblAbsen */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">

</script>
<div class="box box-primary">
    <div class="box-header with-border">
        Daftar Siswa
    </div>
    <div class="box-body">
       <form id="absen">
           <table class="table">
                <?php
                    $i = 1;
            //         foreach ($model as $k){
            //     echo $k->idKelas->nama_kelas.$k->idPelajaran->nama_mapel."<br>";
            //     foreach ($k->idKelas->tblSiswas as $m){
            //         echo $m->id_siswa.$k->idPelajaran->id_mapel."<br>";
            //     }
            // }
                     foreach ($model as $k){
                         ?>

                         <tr>
                     <th colspan="3" style="text-align: center;">Absesi Siswa <?php  echo $k->idKelas->nama_kelas.' - '.$k->idPelajaran->nama_mapel?></th>
                 </tr>
                <tr>
                    <th>No</th>
                    <th>ID Siswa</th>
                    <th>Nama Siswa</th>
                    <th colspan="2"> Absen </th>
                    <th> Status </th>
                </tr>

                         <?php
               //          // $p = $k->idPelajaran->id_mapel;
                        foreach ($k->idKelas->tblSiswas as $m){
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$m->id_siswa."</td>";
                            echo "<td>".$m->nama_siswa."</td>";
                            $r = $k->idPelajaran->id_mapel;
                            echo "<td>". Html::radio($m->id_siswa,null, ['label'=>'Hadir','onclick' => "akbar('$m->id_siswa','$r','H')"])."</td>";
                            echo "<td>". Html::radio($m->id_siswa,null, ['label'=>'Alfa','onclick' => "akbar('$m->id_siswa','$r','A')"])."</td>";
                            echo "<td id='td$m->id_siswa'>";
                            $i++;
                        }
                    }
                ?>
           </table>
       </form>
    </div>
</div>
<?php
    $script ="
    var a;
    function akbar(h,g,a){
          $.ajax({
            url : 'absen?id='+h+'&mapel='+g+'&sts='+a,
            type : 'GET',
            datatype : 'JSON',
            success : function(data){
                $('#td'+h).html('');
                var k = JSON.parse(data);
                $('#td'+h).html(k.hasil);
            },
          });
        }

    ";
//JS;
$this->registerJs($script,View::POS_END);
?>
