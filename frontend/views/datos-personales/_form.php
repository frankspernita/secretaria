<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">


    <?= $form->field($model, 'FechaNac')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ])->label('Fecha Nacimiento') ?>        


        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'DNI')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'Cuil')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'Tipo')->dropDownList(['D' => 'Docente', 'N' => 'No Docente', 'A' => 'Ayudante'], ['prompt' => 'Elige una opción']) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'TelFijo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'Celular')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                     <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        'limit' => 5, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $modelsdomicilios[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                            //'idDomicilio',
                            'Calle',
                            'Numero',
                            'Dpto',
                            'Piso',
                            'Npuerta',
                            'Localidad',
                            'Cpostal',
                          //  'Estado',
                        ],
                    ]); ?>

                    <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsdomicilios as $i => $modeldomicilio): ?>
                        <div class="item panel panel-default"><!-- widgetBodys -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Domicilio</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                    if (! $modeldomicilio->isNewRecord) {
                                        echo Html::activeHiddenInput($modeldomicilio, "[{$i}]idDomicilio");
                                    }
                                ?>
                                <?= $form->field($modeldomicilio, "[{$i}]Calle")->textInput(['maxlength' => true]) ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?= $form->field($modeldomicilio, "[{$i}]Numero")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modeldomicilio, "[{$i}]Dpto")->textInput(['maxlength' => true]) ?>
                                    </div>
                                     <div class="col-sm-3">
                                        <?= $form->field($modeldomicilio, "[{$i}]Piso")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modeldomicilio, "[{$i}]Npuerta")->textInput(['maxlength' => true]) ?>
                                    </div>
                                     <div class="col-sm-9">
                                        <?= $form->field($modeldomicilio, "[{$i}]Localidad")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modeldomicilio, "[{$i}]Cpostal")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <?php DynamicFormWidget::end(); ?>
                </div>
              </div>
            </div>
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
