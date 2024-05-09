<?php
/* @var $this yii\web\View */
/* @var $tareas array of app\models\Tarea */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'Listado de materias';
?>

<?php if (!empty($materias)): ?>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre de la Tarea</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($materias as $materia): ?>
            <tr>
                <!-- Crear un enlace en el nombre de la tarea -->
                <td><?= Html::a(htmlspecialchars($materia->mat_nombre), ['materia/vermateria', 'mat_id' => $materia->mat_id]) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No se encontraron tareas.</p>
<?php endif; ?>
