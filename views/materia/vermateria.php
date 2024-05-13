<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = "Detalle de la Materia: " . $model->mat_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

<h1><?= Html::encode($this->title) ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'mat_id',
        'mat_nombre',
        // Otros atributos de Materia
    ],
]) ?>

<h2>Tareas Relacionadas</h2>
<?php if (!empty($model->tareas)): ?>
    <ul>
    <?php foreach ($model->tareas as $tarea): ?>
        <li><?= Html::a(Html::encode($tarea->tar_nombre), ['tarea/vertarea', 'tar_id' => $tarea->tar_id]) ?></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay tareas relacionadas.</p>
<?php endif; ?>

</div>
