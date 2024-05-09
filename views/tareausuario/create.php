<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tareausuario $model */

$this->title = 'Create Tareausuario';
$this->params['breadcrumbs'][] = ['label' => 'Tareausuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareausuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
