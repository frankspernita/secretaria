<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areaasignatura */

$this->title = 'Update Areaasignatura: ' . $model->idAreaAsignatura;
$this->params['breadcrumbs'][] = ['label' => 'Areaasignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAreaAsignatura, 'url' => ['view', 'id' => $model->idAreaAsignatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="areaasignatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
