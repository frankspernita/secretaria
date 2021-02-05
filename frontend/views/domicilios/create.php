<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Domicilios */

$this->title = 'Create Domicilios';
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domicilios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
