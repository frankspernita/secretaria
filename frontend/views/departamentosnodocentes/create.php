<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentosnodocentes */

$this->title = 'Create Departamentosnodocentes';
$this->params['breadcrumbs'][] = ['label' => 'Departamentosnodocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentosnodocentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
