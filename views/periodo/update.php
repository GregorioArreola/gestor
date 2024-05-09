<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Periodo $model */

$this->title = 'Update Periodo: ' . $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_id, 'url' => ['view', 'per_id' => $model->per_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
