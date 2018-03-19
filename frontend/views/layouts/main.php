<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->head() ?>
	<title>SMA DHI Mapilli</title>
<style type="text/css">
	.gmb{
  	width: 100%;
    height: auto;
	}
  .navbar{
    opacity: 0.9;
  }
  .navbar-nav>li>a{
    font-size: 1em;
    line-height: 3.6em;
  }
  .slide{
    width: 200px;
    height: 100px;
  }
	</style>
</head>
<body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="50">  
        	<?php $this->beginBody() ?>
              <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#home" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><a><img style="width:70px" src="<?php echo Yii::getAlias('@web').'/img/logo.png' ?>"></a> SMA DHI MAPILLI</a>
                      </div>

                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="home">
                            <ul class="nav navbar-nav">
                                <!-- <li class="active"><a href="">Home <span class="sr-only">(current)</span></a></li> -->
                                <li class="active">
                                  <?php echo Html::a('Home ',['/'])  ?>
                                </li>
                                <li class="dropdown">
                                    <a href="profil.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
        																	<li><?php echo Html::a('Sejarah Sekolah',['home/sejarah']) ?></li>
                                              <li role="separator" class="divider"></li>
        																			<li><?php echo Html::a('Visi Dan Misi',['home/visi-dan-misi']) ?></li>
                                              <li role="separator" class="divider"></li>
                                              <li><?php echo Html::a('Struktur Sekolah',['home/struktur']) ?></li>
                                              <li role="separator" class="divider"></li>
        																			<li><?php echo Html::a('Sarana & Prasarana',['home/sarana']) ?></li>
                                              <li role="separator" class="divider"></li>
                                              <li><?php echo Html::a('Struktur Osis',['home/strukturosis']) ?></li>
                                              <li role="separator" class="divider"></li>
                                              <!-- <li><a href="#">Struktur Osis</a></li> -->
                                        </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Program Kerja<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
        																	<li><?php echo Html::a('Sekolah',['/program-kerja/sekolah']) ?></li>
                                              <li role="separator" class="divider"></li>
                                          <li><?php echo Html::a('OSIS',['/program-kerja/osis']) ?></li>
                                              <li role="separator" class="divider"></li>
                                            <li><?php echo Html::a('PMR',['program-kerja/pmr']) ?></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
        													<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">akademik <span class="caret"></span></a>
        													<ul class="dropdown-menu">
        														<li><?php echo Html::a('Guru',['akademik/guru'])?><li>
        														<li role="separator" class="divider"></li>
        														<li><?php echo Html::a('Jadwal',['akademik/jadwal']) ?></li>
        														<li role="separator" class="divider"></li>
        														<li><?php echo Html::a('Kelas',['akademik/kelas']) ?></li>
                                    <li role="separator" class="divider"></li>
                                    <li><?php echo Html::a('siswa',['akademik/siswa']) ?></li>
                                    <li role="separator" class="divider"></li>
                                    <li><?php echo Html::a('Cari Guru',['akademik/cari-guru'])?><li>
        														<!-- <li role="separator" class="divider"></li> -->
        													</ul>
        												</li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                              <li><?php echo Html::a('Contact',['about/contact'])?></li>
                                              <li role="separator" class="divider"></li>
                                              <li><?php echo Html::a('Sosmed',['about/sosmed'])?></li>
                                              <li role="separator" class="divider"></li>
                                              <li><?php echo Html::a('Tentang Web',['about/web'])?></li>
                                        </ul>
                                </li>
                                <!-- <li class="dropdown">
                                  <?php echo Html::a('Login',['/admin']) ?>
                                </li> -->
                            </ul>
                            <!-- batasan -->
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Pencarian">
                                </div>
                                <button type="submit" class="btn btn-default">Cari</button>
                            </form>
                      </div>
                </div>
                <!-- /.navbar-collapse -->
               <!-- /.container-fluid -->
              </nav>
        <!-- batas Navbar -->
        <!-- <!- --> 
        <section id="dg-container" class="dg-container" style="margin-top:40px">
                <div class="dg-wrapper">
                  <a  href="#"><img  src="<?php echo Yii::getAlias('@web').'/frontend/web/img/kelas.jpg' ?>"></a>
                  <a href="#"><img src="<?php echo Yii::getAlias('@web').'/frontend/web/img/osis.jpg' ?>"></a>
                  <a href="#"><img src="<?php echo Yii::getAlias('@web').'/frontend/web/img/baksos1.jpg' ?>"></a>
                  <a href="#"><img src="<?php echo Yii::getAlias('@web').'/frontend/web/img/Wali.jpg' ?>"></a>
                  <a href="#"><img src="<?php echo Yii::getAlias('@web').'/frontend/web/img/siswa.jpg' ?>"></a>
                </div>
                <hr>
        </section>      
        <div class="container-fluid">
            <?= $content ?>
        </div>
</body>
<?php $this->endBody() ?>
<!-- <script src="<?php echo Yii::getAlias('@web').'/js/modernizr.custom.53451.js' ?>"></script>
<script src="<?php echo Yii::getAlias('@web').'/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo Yii::getAlias('@web').'/js/jquery.gallery.js' ?>"></script> -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#dg-container').gallery({
          autoplay  : true
        });
    
  })
</script>
</html>
<?php $this->endPage() ?>



  <!-- batasa slider -->
        <!-- <div id="profil"> -->
        <!-- <li class="list-group-item list-group-item-success">INFORMASI SEKOLAH DHI</li> -->
        <!-- </div> -->