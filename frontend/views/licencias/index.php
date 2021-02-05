<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LicenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Licencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Licencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLicencia',
            'Actuacion',
            'Desde',
            'Hasta',
            'ConSueldo',
            //'Detalle',
            //'Estado',
            //'cargodocentes_idDocente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
