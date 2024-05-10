<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker; // Asegúrate de incluir esta línea
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Tarea $model */
/** @var yii\widgets\ActiveForm $form */
?>

<cs="tarea-form">

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
            <?= $form->field($model, 'tar_fkestado')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_fkprioridad')->widget(Select2::class, [
                'data' => [ // Aquí puedes pasar los datos para las opciones del select
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
            <?= $form->field($model, 'tar_fkmateria')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'tar_creacion')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_finalizacion')->widget(DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_inicio')->widget(DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tar_cierre')->widget(DatePicker::class, [
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>