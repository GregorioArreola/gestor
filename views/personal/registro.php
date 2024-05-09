<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-personales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_nacimiento')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Escribe tu fecha de nacimiento...'],
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);?>

    <?= $form->field($model2, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model2, 'email')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

	<?php if ( $model2->isNewRecord ): ?>
		<?= $form->field($model2, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

		<?= $form->field($model2, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
	<?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
