<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargoayudantes */

$this->title = $model->idCargoAyudante;
$this->params['breadcrumbs'][] = ['label' => 'Cargoayudantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cargoayudantes-view">

        <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idCargoAyudante, 'departamento' => $model->idDepartamento], ['class' => 'btn btn-primary']) ?>
        
    </p>
<div class="row">
            <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idCargoAyudante',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
            //'idDatosP',
            'Legajo',
            'Carrera',
            //'idAsignatura',
            'asignatura.Asignatura',
           // 'resoluciones.Resolucion',  
            'Expediente',
            'Estado',
        ],
    ]) ?>
</div>
</div>
   

</div>