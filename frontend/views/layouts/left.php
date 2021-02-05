<?php 

use  yii\web\Session;

$session = Yii::$app->session;
$session->open(); // open a session
        
$rol = Yii::$app->user->identity->Rol;
$departamento = Yii::$app->user->identity->idDepartamento;
   
?>

<aside class="main-sidebar">

    <section class="sidebar">

<?php  if ($rol == 'Administrador') {

?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Acciones', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Inicio',
                        'icon' => 'home',
                        'url' => '@web/index.php',
                    ],                   
                                     

                    [
                      'label' => 'Gestion de Usuarios',
                      'icon' => 'users',
                      'url' => '#',
                      'items' => [
                        [
                            'label' => 'Crear Usuario',
                            'icon' => 'user-plus',
                            'url' => '?r=site/registro',
                        ],

                        [
                            'label' => 'Crear Secretaria',
                            'icon' => 'user-plus',
                            'url' => ['secretaria/index'],
                        ],
                        

                      ],
                    ],

                                    



                ],
            ]
        ) 



?>

<?php  

}else{

?>

<?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Acciones', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Inicio',
                        'icon' => 'home',
                        'url' => '@web/index.php',
                    ],

                    [
                        'label' => 'Personal',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [

                            [
                             'label' => 'Datos Personales',
                             'icon' => 'users',
                             'url' => ['datos-personales/index'],
                            ],
                            [
                             'label' => 'Ayudantes',
                             'icon' => 'users',
                             'url' => ['cargoayudantes/index', 'departamento' => $departamento],
                            ],
                            [
                             'label' => 'No Docentes',
                             'icon' => 'users',
                             'url' => ['nodocentes/index', 'departamento' => $departamento],
                            ],
                            [
                             'label' => 'Docentes',
                             'icon' => 'users',
                             'url' => ['cargodocentes/index', 'departamento' => $departamento],
                            ],                                                         
                                    ],
                     ],                    

                      [
                        'label' => 'Administrativo',
                        'icon' => 'archive',
                        'url' => '#',
                        'items' => [

                           
                            ['label' => 'Historial de Resoluciones',
                             'icon' => 'archive',
                             'url' => ['resoluciones/index', 'departamento' => $departamento],
                            ],

     
                                    ],
                     ],

                     [
                        'label' => 'Academico',
                        'icon' => 'archive',
                        'url' => '#',
                        'items' => [
                                                  
                            
                            ['label' => 'Areas',
                             'icon' => 'archive',
                             'url' => ['areas/index', 'departamento' => $departamento],
                            ],

                            ['label' => 'Asignaturas',
                             'icon' => 'archive',
                             'url' => ['asignaturas/index',  'departamento' => $departamento],
                            ],

                             ['label' => 'Tipo de Titulo',
                             'icon' => 'archive',
                             'url' => ['tipo-titulos/index'],
                            ],                         

                                    ],
                     ],
                                     


                ],
            ]
        )

?>


<?php
}
?>

    </section>

</aside>
