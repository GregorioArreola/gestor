<?php
/* @var $this yii\web\View */
/* @var $materias array of app\models\Materia */

use yii\helpers\Html;

$this->title = 'Listado de materias';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center"><?= $this->title ?></h1>
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
                                        <td><?= Html::a(Html::encode($materia->mat_nombre), ['materia/view-materia', 'mat_id' => $materia->mat_id]) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else: ?>
                        <p class="text-center">No se encontraron materias.</p>
                    <?php endif; ?>
                    <p>
                            <?= Html::a('Crear materia', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                </div>

            </div>
        </div>
    </div>
</div>
