<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\NoDocentes */

$this->title = $model->idNoDocente;
$this->params['breadcrumbs'][] = ['label' => 'No Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="no-docentes-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idNoDocente], ['class' => 'btn btn-primary']) ?>
        
    </p>
<div class="row">
            <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idNoDocente',
            'datosPersonales.Apellido',
            'datosPersonales.Nombre',
            'Categoria',
            'Ocupacion',
            'Observacion',
            'Estado',
        ],
    ]) ?>
</div>
</div>
    

</div>
