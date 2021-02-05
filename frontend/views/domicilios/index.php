<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DomiciliosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Domicilios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domicilios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Domicilios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDomicilio',
            'idDatosP',
            'Calle',
            'Numero',
            'Dpto',
            //'Piso',
            //'Npuerta',
            //'Localidad',
            //'Cpostal',
            //'Estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
