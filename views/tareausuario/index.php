<?php

use app\models\Tareausuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TareausuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tareausuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareausuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tareausuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tarusu_id',
            'tarusu_fkusuario',
            'tarusu_fktarea',
            'tarusu_tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tareausuario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tarusu_id' => $model->tarusu_id]);
                 }
            ],
        ],
    ]); ?>


</div>
