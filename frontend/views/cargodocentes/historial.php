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
/* @var $searchModel frontend\models\CargodocentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial de Cambios Descendente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargodocentes-index">


 <!--   <h1><?= Html::encode($this->title) ?></h1>  -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php 

$gridColumns = [

            'Categoria',
            'idDatosP',
            'Dedicacion',
            'Designacion',
            'Condicion',
            'idResolucion',
            'FechaInicio',
            'FechaVenc',
            //'Observacion',
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
            if($model->Estado == 'I'){
                return ['class' => 'danger'];
            }else{
                return ['class' => 'success'];
            }
        },
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

           // 'idDocente',            
            'Categoria',
            'idDatosP',
            'Dedicacion',
            'Designacion',
            'Condicion',
            'idResolucion',
            'FechaInicio',
            'FechaVenc',
            'Observacion',
            'Estado',

            
        ],
    ]); ?>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>
            <?= Html::a('Limpiar Filtros', ['historial'], ['class' => 'btn btn-success']); ?></p>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
