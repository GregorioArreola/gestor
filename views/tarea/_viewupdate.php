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
    <?= $form->field($model, 'tar_descripcion')->textarea(['maxlength' => true, 'class' => 'form-control form-control-lg']) ?>
</div>

    </div>

    <div class="row">
        <div class="col-md-4">
        <?= $form->field($model, 'tar_fkprioridad')->widget(Select2::class, [
                'data' => ArrayHelper::map(Prioridad::find()->all(), 'prio_id', 'prio_nombre'),
                'options' => ['placeholder' => 'tar_fkprioridad', 'id' => 'prioridad-select'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model2, 'mat_fkperiodo')->widget(Select2::class, [
                'data' => ArrayHelper::map(Periodo::find()->all(), 'per_id', 'per_nombre'),
                'options' => ['placeholder' => 'Cambiar periodo', 'id' => 'periodo-select'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_fkmateria')->widget(Select2::class, [
                'data' => [ ArrayHelper::map(Materia::find()->all(), 'mat_id', 'mat_nombre'),],
                'options' => ['placeholder' => 'mat_nombre'],
                'pluginOptions' => ['allowClear' => true],
            ]) ?>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6">
            <?= $form->field($model, 'tar_inicio')->widget(DatePicker::class, [
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
    <?= Html::submitButton('Confirmar', ['class' => 'btn btn-success', 'name' => 'redirect-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>