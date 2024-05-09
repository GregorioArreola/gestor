<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tarea $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tarea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tar_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tar_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tar_fkprioridad')->textInput() ?>

    <?= $form->field($model, 'tar_fkestado')->textInput() ?>

    <?= $form->field($model, 'tar_creacion')->textInput() ?>

    <?= $form->field($model, 'tar_finalizacion')->textInput() ?>

    <?= $form->field($model, 'tar_inicio')->textInput() ?>

    <?= $form->field($model, 'tar_cierre')->textInput() ?>

    <?= $form->field($model, 'tar_fkmateria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
