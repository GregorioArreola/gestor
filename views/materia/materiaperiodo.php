<?php
use yii\helpers\Html; // Importa la clase Html para usarla en la vista

/* @var $this yii\web\View */
/* @var $periodos app\models\Periodo[] */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($periodos)): ?>
        <ul>
            <?php foreach ($periodos as $periodo): ?>
                <li>
                    <?= Html::encode($periodo->per_nombre) ?> (ID: <?= Html::encode($periodo->per_id) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No se encontraron periodos.</p>
    <?php endif; ?>
</div>
