<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */

$this->title = 'Cargar Departamentos';
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-create">

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
