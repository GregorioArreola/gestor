<?php
/* @var $this yii\web\View */
/* @var $materias array of app\models\Materia */

use yii\helpers\Html;

$this->title = 'Listado de materias';
?>

<?php if (!empty($materias)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre de la Materia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materias as $materia): ?>
                <tr>
                    <!-- Crear un enlace en el nombre de la materia -->
                    <td><?= Html::a(Html::encode($materia->mat_nombre), ['materia/view-materia', 'mat_id' => $materia->mat_id]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron materias.</p>
<?php endif; ?>
