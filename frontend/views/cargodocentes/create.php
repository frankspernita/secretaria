<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargodocentes */

$this->title = 'Cargar Docente';
$this->params['breadcrumbs'][] = ['label' => 'Cargodocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargodocentes-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaPersonas' => $listaPersonas,
    ]) ?>
    </div>
   </div>
   </div>

</div>
