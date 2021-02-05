<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Titulos */

$this->title = 'Cargar Titulo';
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulos-create">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaTitulo' => $listaTitulo,
    ]) ?>
    </div>
   </div>
   </div>

</div>
