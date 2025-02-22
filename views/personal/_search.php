<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_nombre') ?>

    <?= $form->field($model, 'per_paterno') ?>

    <?= $form->field($model, 'per_materno') ?>

    <?= $form->field($model, 'per_nacimiento') ?>

    <?php // echo $form->field($model, 'per_fkusuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
