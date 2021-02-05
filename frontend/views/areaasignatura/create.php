<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areaasignatura */

$this->title = 'Create Areaasignatura';
$this->params['breadcrumbs'][] = ['label' => 'Areaasignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="areaasignatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
