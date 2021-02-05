<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\widgets\DetailView;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CargoayudantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ayudantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargoayudantes-index">

   <p>        
            <?php echo $searchModel->Estado == 'Activo' ?
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-ok-sign"></i>',
            ['index', 'i' => 1], ['class' => 'btn btn-success']) :
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-remove-sign"></i>',
            ['index'], ['class' => 'btn btn-danger'])
            ?>
    </p>

 <!--   <h1><?= Html::encode($this->title) ?></h1>  -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php 

$gridColumns = [

    //'idCargoAyudante',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
            //'idDatosP',
            'Legajo',
            'Carrera',
            //'idAsignatura',
            'asignatura.Asignatura',
            'resolucion.Resolucion',
            //'idResolucion',
            'Expediente',
            'Estado',
];

echo ExportMenu::widget([
      'dataProvider' => $dataProvider,
      'columns' => $gridColumns
]);



?>
    <p>
        <?= Html::a('Cargar Ayudante', ['create', 'departamento' => $departamento], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-sm-12">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->Estado == 'Inactivo'){
                return ['class' => 'danger'];
            }else{
                return ['class' => 'success'];
            }
        },
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'idCargoAyudante',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
            //'idDatosP',
            'Legajo',
            'Carrera',
            //'idAsignatura',
            'asignatura.Asignatura',
            'resolucion.Resolucion',
            //'idResolucion',
            //'Expediente',
            //'Estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{view} {delete}',
                'buttons' => [
                  
                    'view' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-eye-open"></span>',
                          $url,
                          [
                            'title' => 'Detalles',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idCargoAyudante,
                                ],
                            ],
                          ]
                      ) : null;
                    },

                  'delete' => function ($url, $model, $key) {
                      return $model->Estado == 'Inactivo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-arrow-up"></span>',
                          $url,
                          [
                            'title' => 'Dar de alta',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '¿Dar de alta?',
                                'params' => [
                                    'id' => $model->idCargoAyudante,
                                    'departamento' => $model->idDepartamento,
                                    
                                ],
                            ],
                          ]
                      ) :
                      Html::a(
                          '<span class="glyphicon glyphicon-arrow-down"></span>',
                          $url,
                          [
                            'title' => 'Dar de baja',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '¿Dar de baja?',
                                'params' => [
                                    'id' => $model->idCargoAyudante,
                                    'departamento' => $model->idDepartamento,
                                    
                                ],
                            ],
                          ]
                      );
                  },
                ]
            ],
        ],
    ]); ?>
    </div>
    </div>
    
    <?php Pjax::end(); ?>
</div>