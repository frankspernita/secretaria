<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Licencias */

$this->title = 'Create Licencias';
$this->params['breadcrumbs'][] = ['label' => 'Licencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
