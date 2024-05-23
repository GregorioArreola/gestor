<?php

use app\models\Personal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1> Creacion de personal</h1>

<!-- Imagen de usuario -->
<div style="text-align: center;">
    <?= Html::img('@web/images/user.png', ['alt' => 'Imagen de Usuario', 'style' => 'width: 100px; height: 100px;']) ?>
</div>

<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'per_id',
            'per_nombre',
            'per_paterno',
            'per_materno',
            'per_nacimiento',
            //'per_fkusuario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'per_id' => $model->per_id]);
                }
            ],
        ],
    ]); ?>


</div>