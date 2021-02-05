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
        <div class="col-md-6">
    <?= $form->field($model, 'idDatosP')->dropDownList($listaPersonas, ['id' => 'por', 'prompt' => 'Seleccionar Docente'])->label('Docente para el Cargo')?>
        </div>

        <div class="col-md-6">
    <?= $form->field($model, 'Categoria')->dropDownList(['Titular' => 'Titular', 'Asociado' => 'Asociado', 'Adjunto' => 'Adjunto', 'Jefe de TPs' => 'Jefe de TPs', 'Auxiliar Docente Graduado' => 'Auxiliar Docente Graduado'],['prompt'=>'Seleccionar Categoria']); ?>
        </div>
        
        <div class="col-md-6">
    <?= $form->field($model, 'Dedicacion')->dropDownList(['Exclusiva' => 'Exclusiva', 'Semidedicación' => 'Semidedicación', 'Simple' => 'Simple'],['prompt'=>'Tipo de Dedicacion']); ?>
        </div>
        
        <div class="col-md-6">
    <?= $form->field($model, 'Condicion')->dropDownList(['Regular' => 'Regular', 'Interino' => 'Interino', 'Transitorio' => 'Transitorio'],['prompt'=>'Tipo de Condicion']); ?>
        </div>
        
        <div class="col-md-6">
    <?= $form->field($model, 'Puntaje')->textInput() ?>
        </div>
        
        <div class="col-md-6">
    <?= $form->field($model, 'Designacion')->dropDownList(['Regular por Concurso' => 'Regular por Concurso', 'Interina' => 'Interina', 'Prórroga de designación interina' => 'Prórroga de designación interina', 'Transitoria' => 'Transitoria', 'Extensión de Regularidad por Evaluación Académica' => 'Extensión de Regularidad por Evaluación Académica'],['prompt'=>'Tipo de Designacion']); ?>
        </div>
        
        <div class="col-md-6">
    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    </div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar',['class' => 'btn btn-success']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
