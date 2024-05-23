<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Materia;
use app\models\Periodo;
use app\models\Prioridad;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Tarea $model */
/** @var yii\widgets\ActiveForm $form */

$model2 = new Materia();

$this->registerJs("
    $('#periodo-select').on('change', function() {
        $.ajax({
            url: '" . Url::to(['tarea/get-materias']) . "',
            data: {periodo_id: $(this).val()},
            success: function(data) {
                $('#tarea-tar_fkmateria').html(data).trigger('change');
            }
        });
    });
", \yii\web\View::POS_READY);

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
<<<<<<< HEAD
=======
        <div class="col-md-4">
        <?= $form->field($model, 'tar_fkprioridad')->widget(Select2::class, [
                'data' => ArrayHelper::map(Prioridad::find()->all(), 'prio_id', 'prio_nombre'),
                'options' => ['placeholder' => 'Seleccione la prioridad...', 'id' => 'prioridad-select'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model2, 'mat_fkperiodo')->widget(Select2::class, [
                'data' => ArrayHelper::map(Periodo::find()->all(), 'per_id', 'per_nombre'),
                'options' => ['placeholder' => 'Selecciona un periodo...', 'id' => 'periodo-select'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_fkmateria')->widget(Select2::class, [
                'data' => [],
                'options' => ['placeholder' => 'Primero selecciona un periodo'],
                'pluginOptions' => ['allowClear' => true],
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
        <div class="col-md-6">
            <?= $form->field($model, 'tar_finalizacion')->widget(DatePicker::class, [
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
