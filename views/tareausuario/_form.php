<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tareausuario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tareausuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tarusu_fkusuario')->textInput() ?>

    <?= $form->field($model, 'tarusu_fktarea')->textInput() ?>

    <?= $form->field($model, 'tarusu_tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
