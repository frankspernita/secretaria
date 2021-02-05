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
/* @var $searchModel frontend\models\TitulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulos-index">

    <div class="row">
    <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $modelClient,
        'attributes' => [
            'Apellido',
            'Nombre',
            'Cuil',
            'Email:email',
            'TelFijo',
            'Celular',
            
        ],
    ]) ?>
    </div>
    </div>

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

    <p>
        <?= Html::a('Cargar Titulo', ['create' , 'idP' => $modelClient->idDatosP], ['class' => 'btn btn-success']) ?>
    </p>


<?php 

$gridColumns = [

    // 'idTitulo',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
           // 'idTipoTitulo',
           // 'tipoTitulos.Descripcion',
            [
                      'attribute' => 'tipoTitulos.Descripcion',
                      'label' => 'Tipo de Titulo',
            ],
            'Legajo',
            'Nombre',
            'Fecha',
            'Codigo',
            'Estado',
];

echo ExportMenu::widget([
      'dataProvider' => $dataProvider,
      'columns' => $gridColumns
]);



?>



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
          //  ['class' => 'yii\grid\SerialColumn'],

           // 'idTitulo',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
           // 'idTipoTitulo',
           // 'tipoTitulos.Descripcion',
            [
                      'attribute' => 'tipoTitulos.Descripcion',
                      'label' => 'Tipo de Titulo',
            ],
            'Legajo',
            'Nombre',
            'Fecha',
            'Codigo',
            //'Estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{view} {update} {delete}',
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
                                    'id' => $model->idTitulo,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  'update' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-pencil"></span>',
                          $url,
                          [
                            'title' => 'Modificar',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idTitulo,
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
                                    'id' => $model->idTitulo,
                                    
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
                                    'id' => $model->idTitulo,
                                    
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
    <div class="row">
        <div class="col-sm-6">
            <p>
            <?= Html::a('Limpiar Filtros', ['index'], ['class' => 'btn btn-success']); ?></p>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
