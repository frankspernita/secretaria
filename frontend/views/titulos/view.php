<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Titulos */

$this->title = $model->idTitulo;
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="titulos-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idTitulo], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'Activo' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idTitulo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idTitulo], [
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
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
           // 'idTipoTitulo',
            // 'tipoTitulos.Descripcion',
            [
                      'attribute' => 'tipoTitulos.Descripcion',
                      'label' => 'Tipo de Titulo',
            ],
            'Legajo',
            'Nombre',
            'Fecha',
            'Codigo',
            'Estado',
        ],
    ]) ?>

</div>
</div>
    

</div>

