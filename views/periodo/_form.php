<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Periodo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-4">Crear periodo</h1>

                    <div class="periodo-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'per_fkpersonal')->textInput() ?>

                        <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
