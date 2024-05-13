<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = "Detalle del periodo";
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-view">

<h1><?= Html::encode($model->per_nombre) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'per_id',
            [
                'attribute' => 'materias',
                'value' => function ($model) {
                    return !empty($model->materias) ? implode('<br>', array_map(function ($materia) {
                        return Html::a(Html::encode($materia->mat_nombre), ['materia/view-materia', 'mat_id' => $materia->mat_id], ['class' => 'link']);
                    }, $model->materias)) : 'No definidas';
                },
                'format' => 'raw', // Especificamos 'raw' para que se renderice el HTML
            ],
        ],
    ]) ?>

</div>
