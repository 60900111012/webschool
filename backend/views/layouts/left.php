
<aside class="main-sidebar">
<?php use yii\helpers\Html; ?>
    <section class="sidebar">
<?php Yii::$app->user->id; ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php echo Html::img(Yii::getAlias('@web').'/img/'.Yii::$app->user->identity->foto,['class' => 'img-circle']) ?>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->nama ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Web School', 'options' => ['class' => 'header']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                      'label' => 'Profile',
                      'icon' => 'fa fa-users',
                      'url' => ['/profil'],
                    ],
                    [
                        'label' => 'Jadwal Siswa',
                        'icon' => 'fa fa-users',
                        'url' => ['/data-siswa/jadwal'],
                        'visible' => Yii::$app->user->identity->siswa,
                    ],
                    [
                        'label' => 'Daftar Pelajaran',
                        'icon' => 'fa fa-users',
                        'url' => ['/data-siswa/pelajaran'],
                        'visible' => Yii::$app->user->identity->siswa,
                    ],
                    [
                        'label' => 'Nilai Pelajaran',
                        'icon' => 'fa fa-users',
                        'url' => ['/data-siswa/nilai'],
                        'visible' => Yii::$app->user->identity->siswa,
                    ],
                    [
                        'label' => 'Siswa',
                        'icon' => 'fa fa-user',
                        'url' => ['/siswa'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                    [
                        'label' => 'Mata Pelajaran',
                        'icon' => 'fa fa-user',
                        'url' => ['/mata-pelajaran'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                    [
                        'label' => 'Alumni',
                        'icon' => 'fa fa-user',
                        'url' => ['/alumni'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                    [
                        'label'=> 'Data Diri',
                        'icon' => 'fa fa-users',
                        'url' => ['/data-diri'],
                        'visible' => Yii::$app->user->identity->guru or Yii::$app->user->identity->siswa,
                    ],
                    [
                        'label' => 'Jadwal',
                        'icon' => 'fa fa-user',
                        'url' => ['/jadwal'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                     [
                        'label' => 'Aktifitas Guru',
                        'icon' => 'fa fa-user',
                        'url' => ['#'],
                        'visible' => Yii::$app->user->identity->guru,
                        'items' => [
                            [
                                'label' => 'Absen Kelas',
                            'icon' => 'fa fa-users',
                            'url' => ['/aktifitas/']
                            ],
                            [
                                'label' => 'Input Nilai',
                            'icon' => 'fa fa-users',
                            'url' => ['/nilai/']
                            ],
                        ]
                    ],
                    [
                        'label' => 'Kelas',
                        'icon' => 'fa fa-user',
                        'url' => ['/kelas'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                    [
                        'label' => 'Guru',
                        'icon' => 'fa fa-user',
                        'url' => ['/guru'],
                        'visible' => Yii::$app->user->identity->admin,
                    ],
                    [
                        'label'=> 'Registrasi',
                        'icon'=>'fa fa-users',
                        'url'=> '#',
                        'visible' => Yii::$app->user->identity->admin,
                        'items' => [
                            [
                                'label' => 'Siswa',
                                'icon'=>'fa fa-users',
                                'url' => ['registrasi/siswa'],
                            ],
                            [
                                'label' => 'Guru',
                                'icon'=>'fa fa-users',
                                'url' => ['registrasi/guru'],
                            ],
                        ]
                    ],
                    [
                        'label' => 'Pengaturan',
                        'icon' => 'fa fa-user',
                        'url' => ['#'],
                        'visible' => Yii::$app->user->identity->admin,
                        'items' => [
                            [
                                'label' => 'Nilai Persentase',
                                'icon' => 'fa fa-users',
                                'url' => ['/persentase'],
                            ],
                            [
                              'label' => 'Sarana Dan Prasarana',
                              'icon' => 'fa fa-users',
                              'url' => ['/sarana-dan-prasarana'],
                            ],
                            [
                              'label' => 'Berita',
                              'icon' => 'fa fa-users',
                              'url' => ['/berita'],
                            ],
                        ]
                    ],
                    [
                        'label' => 'Akses',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'visible' => Yii::$app->user->identity->admin,
                        'items' =>[
                            [
                                'label' => 'User',
                                'icon' => 'fa fa-users',
                                'url' => '#',
                                'items' => [
                                    [
                                        'label' => 'Siswa',
                                        'icon' =>' fa fa-users',
                                        'url' => ['/user/siswa'],
                                    ],
                                    [
                                        'label' => 'Guru',
                                        'icon' => 'fa fa-users',
                                        'url' => ['/user/guru']
                                    ]
                                ]
                            ],
                        ]
                    ],

                ],
            ]
        ) ?>
    </section>
</aside>
