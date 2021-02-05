<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargodocentes */

$this->title = $model->idDocente;
$this->params['breadcrumbs'][] = ['label' => 'Cargodocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cargodocentes-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idDocente, 'departamento' => $model->idDepartamento], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'Activo' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idDocente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idDocente], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Dar de alta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'datosPersonales.Apellido',
                        'datosPersonales.Nombre',
                        //'idDatosP',
                        'Categoria',
                        'Dedicacion',
                        'Designacion',
                        'Condicion',
                        'Puntaje',
                      //  'Categoria',
                      //  'idDatosP',
                       // 'Dedicacion',
                       // 'Designacion',
                       // 'Condicion',
                      //  'Puntaje',
                        'Observacion',
                        'Estado',
                    ],
                ]) ?>
            </div>
</div>
    

</div>
