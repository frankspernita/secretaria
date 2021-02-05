<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areas */

$this->title = $model->idArea;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="areas-view">

   
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idArea], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'A' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idArea], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idArea], [
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
       //     'idArea',
            [
                      'attribute' => 'departamentos.Nombre',
                      'label' => 'Departamento',
            ],
            'Area',
        ],
    ]) ?>
</div>
</div>
    

</div>
