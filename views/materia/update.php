<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Materia $model */

$this->title = 'Update Materia: ' . $model->mat_id;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mat_id, 'url' => ['view', 'mat_id' => $model->mat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
