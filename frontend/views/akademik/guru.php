<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?><?php

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
        /*height: 208px;*/
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
        /*width: 670px;*/
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
<h1>Dafar Guru</h1>
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
                              Tanggal Ujian Tengah Semester Tanggal 10-09-2018
                          </dir>  
                     </div>
                     <div class="info">
                          <div class="head">
                               <h4>Informasi</h4>
                          </div>
                          <dir class="informasi">
                              Tanggal Ujian Tengah Semester Tanggal 10-09-2018
                          </dir>  
                     </div>
            </div>

            <div class="col-lg-10" id="midle">
               <div class="info2">
                    <div class="head">
                         <h4>Informasi</h4>
                    </div>
                                  <!-- <p> -->
                                      <table class="table">
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Guru</th>
                                          <th>Status</th>
                                          <th>Pendidikan</th>
                                          <th>Jenis Kelamin</th>
                                          <!-- <th>Foto</th> -->
                                        </tr>
                                        <?php
                                        $i=1;
                                        foreach ($model as $k) 
                                        {
                                          ?>
                                          <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $k->nama_guru ?></td>
                                                <td><?php echo $k->status_guru ?></td>
                                                <td><?php echo $k->pendidikan ?></td>
                                                <td><?php echo $k->jk ?></td>
                                                <td><?php echo Html::img(Yii::getAlias('@web').'/img/'.$k->foto) ?></td>
                                              </tr>
                                          <?php
                                          $i++;
                                        } ?>
                                      </table>
                                  <!-- </p> -->
              </div>
          </div>
        </div>
      </div>
    </div>

