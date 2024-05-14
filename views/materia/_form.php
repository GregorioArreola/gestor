<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Materia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mat_nombre')->textInput(['maxlength' => true]) ?>

    <?= Html::dropDownList('prioridad_id', Yii::$app->request->get('prioridad_id'), \app\models\Prioridad::getList(),
    ['prompt' => 'Seleccione un periodo', 'class' => 'form-select mb-3']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
