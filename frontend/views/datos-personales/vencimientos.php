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

$this->title = 'Vencimientos';
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
 
     <div class="row">
        <div class="col-sm-12">
    <?= GridView::widget([
        'dataProvider' => $sqlProvider,
        'columns' => [
            

      //      'idDatosP',
            'Apellido',
            'Nombre',
            'Resolucion',
            'FechaInicio',
            'FechaVenc',
            
        
            //'Estado',

            
        ],
    ]); ?>
    </div>
    </div>
    <?php Pjax::end(); ?>
    <p>
            <?= Html::a('Limpiar Filtros', ['index'], ['class' => 'btn btn-success']); ?>
    </p>
</div>
