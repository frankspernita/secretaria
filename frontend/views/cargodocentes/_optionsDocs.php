<?php
    use yii\helpers\Html;
 ?>
<!-- <div class="row"> -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-file-text"></i> Datos Personales </h3>
    </div>
    <div class="box-body">

        <div class="row">

            <div class="col-sm-4">
                <?=
                  Html::a('<i class="fa fa-files-o"></i>
                  Asignar una Asignatura', ['asignaturasdocentes/index', 'id' => $model->idDocente, 'departamento' => $model->idDepartamento],
                  ['class' => 'btn btn-block btn-lg'])
                ?>
            </div>

            <div class="col-sm-4">
                <?=
                  Html::a('<i class="fa fa-files-o"></i>
                  Agregar Titulo', ['titulos/index', 'id' => $model->idDocente , 'idP' => $model->idDatosP],
                  ['class' => 'btn btn-block btn-lg'])
                ?>
            </div>

    </div>
</div>
<!-- </div> -->
</div>