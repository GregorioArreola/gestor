<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Prioridad $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prioridad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prio_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
