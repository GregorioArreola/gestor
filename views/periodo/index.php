<?php

use app\models\Periodo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeriodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Periodo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'per_id',
            'per_fkpersonal',
            'per_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Periodo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'per_id' => $model->per_id]);
                }
            ],
        ],
    ]); ?>


</div>