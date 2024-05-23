<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */

$this->title = '' . $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_id, 'url' => ['view', 'per_id' => $model->per_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-update">

    <h1>Actualizar</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
