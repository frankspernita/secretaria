<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Datospersonalestitulo */

$this->title = 'Create Datospersonalestitulo';
$this->params['breadcrumbs'][] = ['label' => 'Datospersonalestitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datospersonalestitulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
