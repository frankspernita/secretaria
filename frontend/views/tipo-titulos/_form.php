<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoTitulos */
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
    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true])->label('Tipo de Titulo') ?> 
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
