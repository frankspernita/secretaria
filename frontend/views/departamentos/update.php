<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentos */

$this->title = 'Modificar Departamento: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDepartamento, 'url' => ['view', 'id' => $model->idDepartamento]];
?>
<div class="departamentos-update">

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
