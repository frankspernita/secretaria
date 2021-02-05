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
/* @var $model frontend\models\Titulos */
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
        <div class="col-md-6">
    <?= $form->field($model, 'Fecha')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ])->label('Fecha de obtencion del titulo') ?> 
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'idTipoTitulo')->dropDownList($listaTitulo, ['id' => 'por', 'prompt' => 'Seleccionar Tipo de Titulo'])->label('Tipo de titulo')?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'Legajo')->textInput() ?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
        </div>         
             
        <div class="col-md-6">        
    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>
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
