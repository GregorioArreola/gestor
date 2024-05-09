<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Prioridad $model */

$this->title = $model->prio_id;
$this->params['breadcrumbs'][] = ['label' => 'Prioridads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prioridad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'prio_id' => $model->prio_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'prio_id' => $model->prio_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prio_id',
            'prio_nombre',
        ],
    ]) ?>

</div>
