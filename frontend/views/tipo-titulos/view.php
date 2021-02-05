<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoTitulos */

$this->title = $model->Descripcion;
//$this->params['breadcrumbs'][] = ['label' => 'Tipo Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-titulos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idTipoTitulo], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'A' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idTipoTitulo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idTipoTitulo], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Dar de alta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idTipoTitulo',
            'Descripcion',
            'Estado',
        ],
    ]) ?>
<?= Html::a('Volver', Url::to(['index']), ['class' => 'btn btn-primary']) ?>
</div>
