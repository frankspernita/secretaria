<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Personas */

$this->title = $model->Tipo == 'D' ? 'Seguimiento de Docente' : 'Seguimiento de Ayudante';
$this->params['breadcrumbs'][] = ['label' => $model->Tipo == 'D' ? 'Docente' : 'Ayudante', 'url' => ['index', 'Tipo' => $model->Tipo]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-docs">
  <div class="row">


  <div class="col-sm-12">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->


    <div class="row">
      <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apellido',
            'Nombre',
            'Cuil',
            'Email:email',
        ],
    ]) ?>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        <?= $model->Tipo == 'D' ? $this->render('_optionsDocente',['model' => $model]) : $this->render('_optionsDocente', ['model' => $model])?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <?= Html::a('Volver', Url::to(['index', 'Tipo' => $model->Tipo]), ['class' => 'btn btn-primary']) ?>
      </div>
    </div>
  </div>
</div>
</div>
