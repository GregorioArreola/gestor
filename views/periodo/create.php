<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Periodo $model */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
