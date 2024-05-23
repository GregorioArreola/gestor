<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */

$this->title = $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personal-view">

    <div style="text-align: center;">
        <?= Html::img('@web/images/user.webp', ['alt' => 'Imagen de Usuario', 'style' => 'width: 150px; height: 100px;']) ?>
    </div>

    <p>
        <?= Html::a('Actualizar', ['update', 'per_id' => $model->per_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'per_id' => $model->per_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'per_id',
            'per_nombre',
            'per_paterno',
            'per_materno',
            'per_nacimiento',
            'per_fkusuario',
        ],
    ]) ?>

</div>