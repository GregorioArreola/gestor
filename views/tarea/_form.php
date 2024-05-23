<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tarea $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tarea-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tar_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tar_descripcion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']) ?>
        </div>
    </div>

    <div class="row">


     <div class="col-md-4">
            <?= $form->field($model, 'tar_fkestado')->widget(Select2::class, [
                'data' => [
                    '1' => 'No iniciada',
                    '2' => 'Iniciada',
                    '3' => 'Detenida',
                ],
                'options' => ['placeholder' => 'Selecciona un estado...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_fkprioridad')->widget(Select2::class, [
                'data' => [
                    '1' => 'Alta',
                    '2' => 'Media',
                    '3' => 'Baja',
                ],
                'options' => ['placeholder' => 'Selecciona una prioridad...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>

    <div class="col-md-4">
            <?= $form->field($model, 'tar_fkmateria')->widget(Select2::class, [
                'data' => [
                    '1' => 'Materia1',
                    '2' => 'Materia2',
                    '3' => 'Materia3',
                ],
                'options' => ['placeholder' => 'Selecciona una materia...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'tar_creacion')->widget(DatePicker::class, [
                'options' => ['class' => 'form-control'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_finalizacion')->widget(DatePicker::class, [
                'options' => ['class' => 'form-control'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_inicio')->widget(DatePicker::class, [
                'options' => ['class' => 'form-control'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_cierre')->widget(DatePicker::class, [
                'options' => ['class' => 'form-control'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
