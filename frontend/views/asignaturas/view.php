<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignaturas */

$this->title = $model->idAsignatura;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asignaturas-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idAsignatura], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'A' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idAsignatura], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idAsignatura], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Dar de alta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">
            <div class="col-sm-6">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idAsignatura',
            'areas.Area',
            'Asignatura',
            'Modulo',
            'Estado',
        ],
    ]) ?>
</div>
</div>

</div>