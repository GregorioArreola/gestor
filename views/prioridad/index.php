<?php

use app\models\Prioridad;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PrioridadSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Prioridads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prioridad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prioridad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prio_id',
            'prio_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prioridad $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'prio_id' => $model->prio_id]);
                 }
            ],
        ],
    ]); ?>


</div>
