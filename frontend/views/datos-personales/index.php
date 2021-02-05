<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;
use frontend\models\DomiciliosSearch;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DatosPersonalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Personales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-personales-index">

    <p>        
            <?php echo $searchModel->Estado == 'A' ?
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-ok-sign"></i>',
            ['index', 'Tipo' => $searchModel->Tipo, 'i' => 1], ['class' => 'btn btn-success']) :
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-remove-sign"></i>',
            ['index', 'Tipo' => $searchModel->Tipo], ['class' => 'btn btn-danger'])
            ?>
    </p>


   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Datos Personales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     <div class="row">
        <div class="col-sm-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->Estado == 'I'){
                return ['class' => 'danger'];
            }else{
                return ['class' => 'success'];
            }
        },
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new DomiciliosSearch();
                    $searchModel->idDatosP = $model->idDatosP;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial(
                        '_domicilio',
                        [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]
                    );
                },
            ],

       //     ['class' => 'yii\grid\SerialColumn'],

      //      'idDatosP',
            'Apellido',
            'Nombre',
           // 'FechaNac',
                  [
                      'attribute' => 'FechaNac',
                      'label' => 'Fecha',
                      'format' => 'date',
                      'filter' => '<div class="drp-container input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>'.
                                    DateRangePicker::widget([
                                       'model' => $searchModel,
                                       'attribute' => 'FechaNac',
                                       'useWithAddon'=>true,
                                       'readonly' => true,
                                       'convertFormat'=>true,
                                       'pluginOptions'=>[
                                           'locale'=>[
                                             'format' => 'Y-m-d',
                                             'separator' => ' / '
                                            ],
                                       ]
                                    ]),
                  ],
         //   'DNI',
          //        [
          //            'attribute' => 'DNI',
          //            'label' => 'DNI',
          //        ],
            'Cuil',
            'Email:email',
           // 'TelFijo',
           // 'Celular',
           // 'Tipo',
            //'Estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{docs} {view} {update} {delete}',
                'buttons' => [
                  'docs' => function ($url, $model, $key) {
                      return $model->Estado == 'A' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-briefcase"></span>',
                          $url,
                          [
                            'title' => 'Ver documentos',
                            'data' => [
                                'params' => [
                                    'id' => $model->idDatosP,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  
                    'view' => function ($url, $model, $key) {
                      return $model->Estado == 'A' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-eye-open"></span>',
                          $url,
                          [
                            'title' => 'Detalles',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idDatosP,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  'update' => function ($url, $model, $key) {
                      return $model->Estado == 'A' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-pencil"></span>',
                          $url,
                          [
                            'title' => 'Modificar',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idDatosP,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  'delete' => function ($url, $model, $key) {
                      return $model->Estado == 'I' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-arrow-up"></span>',
                          $url,
                          [
                            'title' => 'Dar de alta',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '¿Dar de alta?',
                                'params' => [
                                    'id' => $model->idDatosP,
                                    
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
                                    'id' => $model->idDatosP,
                                    
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
    <p>
            <?= Html::a('Limpiar Filtros', ['index'], ['class' => 'btn btn-success']); ?>
    </p>
</div>
