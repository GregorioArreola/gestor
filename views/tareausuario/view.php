<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tareausuario $model */

$this->title = $model->tarusu_id;
$this->params['breadcrumbs'][] = ['label' => 'Tareausuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tareausuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tarusu_id' => $model->tarusu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tarusu_id' => $model->tarusu_id], [
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
            'tarusu_id',
            'tarusu_fkusuario',
            'tarusu_fktarea',
            'tarusu_tipo',
        ],
    ]) ?>

</div>
