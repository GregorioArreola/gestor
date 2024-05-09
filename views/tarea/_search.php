<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TareaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tarea-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tar_id') ?>

    <?= $form->field($model, 'tar_nombre') ?>

    <?= $form->field($model, 'tar_descripcion') ?>

    <?= $form->field($model, 'tar_fkprioridad') ?>

    <?= $form->field($model, 'tar_fkestado') ?>

    <?php // echo $form->field($model, 'tar_creacion') ?>

    <?php // echo $form->field($model, 'tar_finalizacion') ?>

    <?php // echo $form->field($model, 'tar_inicio') ?>

    <?php // echo $form->field($model, 'tar_cierre') ?>

    <?php // echo $form->field($model, 'tar_fkmateria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
