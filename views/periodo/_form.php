<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Periodo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_fkpersonal')->textInput() ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
