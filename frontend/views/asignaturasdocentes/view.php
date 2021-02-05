<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignaturasdocentes */

$this->title = $model->idAsignaturaDocente;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturasdocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asignaturasdocentes-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idAsignaturaDocente, 'departamento' => $model->idDepartamento], ['class' => 'btn btn-primary']) ?>
        
    </p>
<div class="row">
            <div class="col-sm-6">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'idAsignaturaDocente',
            'asignatura.Asignatura',
            'resolucion.Resolucion',
            'Estado',
        ],
    ]) ?>
</div>
</div>

</div>