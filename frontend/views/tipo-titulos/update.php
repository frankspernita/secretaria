<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoTitulos */

$this->title = 'Update Tipo Titulos: ' . $model->idTipoTitulo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoTitulo, 'url' => ['view', 'id' => $model->idTipoTitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-titulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
