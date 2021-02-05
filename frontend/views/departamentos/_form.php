<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\DatosPersonales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form form">

    <?php $form = ActiveForm::begin(
      ['options' => [
                'role' => 'form',
             ],
       'id' => 'dynamic-form'
      ]
    ); ?>


    <div class="box-body">


    <div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'idDatosP')->dropDownList($listaPersonas, ['id' => 'por', 'prompt' => 'Seleccionar Docente'])->label('Docente para el Cargo')?>
    	</div>
        <div class="col-md-12">
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
    	</div>

	</div>
    </div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Volver',['index'], ['class' => 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>