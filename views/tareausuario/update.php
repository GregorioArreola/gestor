<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tareausuario $model */

$this->title = 'Update Tareausuario: ' . $model->tarusu_id;
$this->params['breadcrumbs'][] = ['label' => 'Tareausuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tarusu_id, 'url' => ['view', 'tarusu_id' => $model->tarusu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tareausuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
