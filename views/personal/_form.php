<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */
/** @var yii\widgets\ActiveForm $form */

?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Datos del Personal</h3>
    </div>
    <div class="card-body">
        <div class="personal-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'per_paterno')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'per_materno')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'per_nacimiento')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Seleccione la fecha de nacimiento'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <?= $form->field($model, 'per_fkusuario')->widget(Select2::classname(), [
                'data' => [ // Replace with your actual data for options
                    1 => 'Usuario 1',
                    2 => 'Usuario 2',
                    // ...
                ],
                'options' => ['placeholder' => 'Selecciona un usuario'],
                'pluginOptions' => [
                    'theme' => 'bootstrap5',
                    'language' => 'es', // Optional: Spanish language
                ],
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
