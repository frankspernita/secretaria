<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ResolucionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resoluciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resoluciones-index">

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
        <?= Html::a('Cargar Resolucion', ['create', 'departamento' => $departamento], ['class' => 'btn btn-success']) ?>
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
            ['class' => 'yii\grid\SerialColumn'],

            //'idResolucion',
            'Resolucion',
            'FechaInicio',
            'FechaVencimiento',
            'Estado',

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
                                    'id' => $model->idResolucion,
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
                                    'id' => $model->idResolucion,
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
                                    'id' => $model->idResolucion,
                                    
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
                                    'id' => $model->idResolucion,
                                    
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