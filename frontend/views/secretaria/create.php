<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Secretaria */

$this->title = 'Cargar Secretaria';
$this->params['breadcrumbs'][] = ['label' => 'Secretarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secretaria-create">

    <div class="row">
    <div class="col-sm-6">
    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaUser' => $listaUser,
    ]) ?>
    </div>
   </div>
   </div>

</div>
