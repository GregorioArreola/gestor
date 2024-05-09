<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prioridad $model */

$this->title = 'Update Prioridad: ' . $model->prio_id;
$this->params['breadcrumbs'][] = ['label' => 'Prioridads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prio_id, 'url' => ['view', 'prio_id' => $model->prio_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prioridad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
