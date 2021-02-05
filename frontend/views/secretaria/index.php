<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DatosPersonalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Secretarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-personales-index">

    <p>        
            <?php echo $searchModel->Estado == 'Activo' ?
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-ok-sign"></i>',
            ['index', 'i' => 1], ['class' => 'btn btn-success']) :
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-remove-sign"></i>',
            ['index'], ['class' => 'btn btn-danger'])
            ?>
    </p>


   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cargar dato de Secretaria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Cargar Rol', ['rol/index'], ['class' => 'btn btn-success']) ?>
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
         //   ['class' => 'yii\grid\SerialColumn'],

            'idUser',
            'Apellido',
            'Nombre',
            'FechaNac',
            'DNI',
            'Cuil',
            'Email:email',
            //'TelFijo',
            //'Celular',
            //'Estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{docs} {view} {update} {delete}',
                'buttons' => [
                  'docs' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-briefcase"></span>',
                          $url,
                          [
                            'title' => 'Ver documentos',
                            'data' => [
                                'params' => [
                                    'id' => $model->idSecretaria,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  
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
                                    'id' => $model->idSecretaria,
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
                                    'id' => $model->idSecretaria,
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
                                    'id' => $model->idSecretaria,
                                    
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
                                    'id' => $model->idSecretaria,
                                    
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
