<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prioridad $model */

$this->title = 'Create Prioridad';
$this->params['breadcrumbs'][] = ['label' => 'Prioridads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prioridad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
