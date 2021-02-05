<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */

$this->title = $model->idSecretaria;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="departamentos-view">

   
    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idSecretaria], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'Activo' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idSecretaria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idSecretaria], [
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
            'idSecretaria',
            'Apellido',
            'Nombre',
            'FechaNac',
            'DNI',
            'Cuil',
            'Email:email',
            'TelFijo',
            'Celular',
            'Estado',
        ],
    ]) ?>

</div>
</div>
    <?= Html::a('Volver', Url::to(['index']), ['class' => 'btn btn-primary']) ?>

</div>
