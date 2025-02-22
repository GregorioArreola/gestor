<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TareausuarioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tareausuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tarusu_id') ?>

    <?= $form->field($model, 'tarusu_fkusuario') ?>

    <?= $form->field($model, 'tarusu_fktarea') ?>

    <?= $form->field($model, 'tarusu_tipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
