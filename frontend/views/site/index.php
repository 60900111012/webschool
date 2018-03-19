<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style type="text/css">
    #midle,#left,#right{
        /*background-color: green;*/
        padding: 4px;
    }
    .info,.info2{
        width: 100%;
        border:1px solid #dbdbda;
        border-radius: 6px;
        margin: 0px 0px 17px 0px;
    }
    .info2{
        height: 208px;
        position: relative;
    }
    .head{
        background-color: #5e79dc7d;
        height: 50px;
        padding: 5px;
        border-radius: 6px 6px 0px 0px;
    }
    h4{
        text-align: center;
    }
    .gambar{
        height: 150px;
        width: 200px;
        margin: 2px;
        border-radius: 6px;
        float: left;

    }
    .isi{
        float: left;
        width: 670px;
        text-align: justify;
        padding: 6px 6px 6px 17px;
    }
    h3{
        margin-top: 5px;
        margin-bottom: 4px;
    }
    hr{
        margin: 6px 0 11px; 0;
    }

    * {box-sizing: border-box;}
ul {list-style-type: none;}
/*body {font-family: Verdana, sans-serif;}*/
.bodyc {
  font-size: 16px;
}
.month {
    padding: 50px 25px;
    width: 100%;
    background: #1abc9c;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 11.6%;
    color: #666;
    text-align: center;
}

.days {
    padding:10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 14.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:9px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}

</style>
<div class="site-index">   

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2" id="left">
              <div class="info">
                          <div class="head">
                               <h4>Calender</h4>
                          </div>                       
                          <body>
                                <div class="month">      
                                  <ul>
                                    <li class="prev">&#10094;</li>
                                    <li class="next">&#10095;</li>
                                    <li>
                                      <span style="font-size:18px">
                                      <?php
                                            $tgl=date('Y');
                                            echo $tgl;
                                      ?>
                                      <br>
                                       <?php
                                            $tgl=date('F');
                                            echo $tgl;
                                        ?>

                                    </span>
                                     <!--  <br>
                                      2018</span> -->
                                    </li>
                                  </ul>
                                </div>
                                <ul class="weekdays bodyc">
                                  <li>Mo</li>
                                  <li>Tu</li>
                                  <li>We</li>
                                  <li>Th</li>
                                  <li>Fr</li>
                                  <li>Sa</li>
                                  <li>Su</li>
                                </ul>

                                <ul class="days">  
                                  <span class="active"> 
                                  <?php
                                        $tgl=date('d');
                                            //echo $tgl;
                                        for ($i=1; $i <=30 ; $i++)
                                         {
                                  ?>
                                  <li>
                                  <?php  

                                          echo $i;
                                  ?>
                                  </li>
                                  <?php
                                        }
                                  ?>
                                  <!-- <ul class="days">
                                  <li>1</li>
                                  <li>2</li>
                                  <li>3</li>
                                  <li>4</li>
                                  <li>5</li>
                                  <li>6</li>
                                  <li>7</li>
                                  <li>8</li>
                                  <li>9</li>
                                  <li>10</li>
                                  <li>11</li>
                                  <li>12</li>
                                  <li>13</li>
                                  <li>14</li>
                                  <li>15</li>
                                  <li>16</li>
                                  <li>17</li>
                                  <li>18</li>
                                  <li>19</li>
                                  <li>20</li>
                                  <li>21</li>
                                  <li>22</li>
                                  <li>23</li>
                                  <li>24</li>
                                  <li>25</li>
                                  <li>26</li>
                                  <li>27</li>
                                  <li>28</li>
                                  <li>29</li>
                                  <li>30</li>
                                  <li>31</li>  </ul>-->
                                  </span>
                                </ul>
                          </body>                          
              </div>
                <div class="info">
                  <div class="head">
                       <h4>Informasi</h4>
                  </div>
                  <dir class="informasi">
                      Pendaftaran Siswa baru tanggal 22-7-2018
                  </dir>
               </div>
                <div class="info">
                  <div class="head">
                       <h4>Berita</h4>
                  </div>
                  <dir class="informasi">
                      <li>Ujian Semester akan di laksanakan pada tanggal ... </li>
                      <li>Pembayaran study tour dapat dilakukan di wali kelas masing-masing</li>
                      <li>Surat izin study tour akan diberikan 3 hari sebelum berangkat</li>
                  </dir>
               </div>
            </div>
 <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<!-- tempat tampilkan berita -->
            <div class="col-lg-8" id="midle">
                   <div class="info2">
                      <div class="head">
                           <h4>Informasi</h4>
                      </div>
                        <img class="gambar" src="frontend/web/img/p1.jpg">
                         <div class="isi">
                            <h3>Kegiatan Pelatihan Bantuan Bencana</h3><hr>
                             <p>Kegiatan estrakulikuler sekolah yang di lakukan oleh OSIS, telah banyak membantu siswa untuk mengasa
                              kemampuan dan menambah pengetahuan siswa itu sendiri maupun orang lain yang terlibat dalam kegiatan
                              osis. Salah satu kegiatan osis adalah kegiatan pelatihan bantuan bencana.<a href="">. Selengkapnya..</a></p>
                         </div>
                    </div>
               
                <!-- <div class="col-lg-8" id="midle"> -->
                   <div class="info2">
                      <div class="head">
                           <h4>Informasi</h4>
                      </div>
                        <img class="gambar" src="frontend/web/img/osis.jpg">
                         <div class="isi">
                            <h3>Kegiatan OPAK</h3><hr>
                             <p>Kegiatan Opak Telah sejak dulu dilakukan di sekolah, bertujuan agar semua siswa dapat lebih mengenal 
                             sekolah dan aturan aturan yang ada disekoalh. Opak sangat membantu guru-guru untuk memperkenalkan 
                             keadaan sekolah. Kegiatan tersebut dilakukan oleh anggota osis sebagai kegiatan extrakulikuler di sekolah ini.
                              <a href="">. Selengkapnya..</a></p>
                         </div>
                    </div>
                    <div class="info2">
                      <div class="head">
                           <h4>Informasi</h4>
                      </div>
                        <img class="gambar" src="frontend/web/img/lap.jpg">
                         <div class="isi">
                            <h3>Kegiatan Upacara </h3><hr>
                             <p>Upacara merupakan kegiatan mingguan setiap hari senin jam 07:15 AM.
                             Peserta upacara tidak lain dan tidak bukan adalah guru-guru staf dan siswa siswi di sekolah tersebut. kegiatan 
                             upacara pada umumnya dilakukan oleh siswa siswi yang diberikan tanggung jawab dari sekolah, setiap kelas akan dapat 
                             giliran melakukan kegiatan upacara <a href="">. Selengkapnya..</a></p>
                         </div>
                    </div>
            </div>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  -->

            <div class="col-lg-2" id="right">
               <div class="info">
                  <div class="head">
                       <h4>Informasi</h4>
                  </div>
                  <dir class="informasi">
                      Program Kegiatan osis :
                      <li>Melaksanakan Buka Puasa Bersama serta Shalat Tarwih Bersama</li>
                      <li>Mengadakan Pesantren Kilat pada Bulan Ramdhan</li>
                      <li>Peringatan Maulid Nabi Muhammad SAW</li>
                      <li>Melaksanakan MOS ( Masa Orientasi Siswa )</li>
                      <a href="">Selengkapnya..</a>
                  </dir>
               </div>
                <div class="info">
                  <div class="head">
                       <h4>Informasi</h4>
                  </div>
                  <dir class="informasi">
                      * Biaya Study Tour Siswa Akan Di Sampaikan Hari Senin Tanggal 5 maret 2018
                      <div>
                      * Nama-nama siswa yang dapat SP dari guru BP bisa dilihat disini<a href="">. Selengkapnya..</a></p>
                      </div>
                  </dir>
               </div>
            </div>


        </div>

    </div>
    
</div>


<footer style="border-top: 3px solid black; padding: 20px 0 10px 0; text-align: center;">

  
  <a href="#">HOME</a> | <a href="#">STRUKTUR SEKOLAH</a> | <a href="#">KONTAK</a> | <a href="login.php" >LOGIN</a>
  

<p style="text-align: left">Copyright &copy; 2018. Sistem Informasi UINAM loves DOTA2</p>  


</footer>
    
