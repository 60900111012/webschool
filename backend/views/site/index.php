
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
                Yii::$app->user->id;
               ?>
               <?php echo Html::img(Yii::getAlias('@web').'/img/'.Yii::$app->user->identity->foto,['class' =>'profile-user-img img-responsive img-circle']); ?>

              <h3 class="profile-username text-center"><?php echo Yii::$app->user->identity->nama; ?></h3>

              <p class="text-muted text-center"><?php echo Yii::$app->user->id; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo Yii::$app->user->identity->status ?></a>
                </li>
                <li class="list-group-item">
                  <b>Hari Ini</b> <a class="pull-right"><?php echo date('d-M-Y') ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
