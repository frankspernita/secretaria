<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Secretaria */

$this->title = 'Modificar Secretaria: ' . $model->idSecretaria;
$this->params['breadcrumbs'][] = ['label' => 'Secretarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSecretaria, 'url' => ['view', 'id' => $model->idSecretaria]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="secretaria-update">

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
