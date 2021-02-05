<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="domicilios-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
            //'idDomicilio',
            'Calle',
            'Numero',
            'Dpto',
            'Piso',
            'Npuerta',
            'Localidad',
            'Cpostal',
          //  'Estado',
        ],
    ]); ?>
</div>