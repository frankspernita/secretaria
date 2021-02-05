<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargodocentes */

$this->title = 'Modificar Cargo Docente: ' . $model->idDocente;
$this->params['breadcrumbs'][] = ['label' => 'Cargodocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDocente, 'url' => ['view', 'id' => $model->idDocente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargodocentes-update">

   
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
