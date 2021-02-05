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
    <?= $form->field($model, 'Resolucion')->textInput(['maxlength' => true]) ?>
    	</div>
        <div class="col-md-12">
    <?= $form->field($model, 'FechaInicio')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ])->label('Fecha de Inicio del Cargo') ?> 
    	</div>
        <div class="col-md-12">
    <?= $form->field($model, 'FechaVencimiento')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ])->label('Fecha del fin del Cargo') ?> 
    	</div>

    </div>
    </div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>