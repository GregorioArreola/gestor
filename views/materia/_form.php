<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Materia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h3 class="card-title">Formulario de Materia</h3>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'mat_nombre')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

            <?= Html::dropDownList('prioridad_id', Yii::$app->request->get('prioridad_id'), \app\models\Prioridad::getList(),
            ['prompt' => 'Seleccione un periodo', 'class' => 'form-select mb-3']) ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
