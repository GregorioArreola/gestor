<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">TaskManager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <?php
                $usuario_actual_id = Yii::$app->user->identity->getId();
                $personal = \app\models\Personal::findOne(['per_fkusuario' => $usuario_actual_id]);
                if ($personal !== null) {
                    echo Html::a(Html::encode($personal->per_nombre . ' ' . $personal->per_paterno), ['personal/view', 'per_id' => $personal->per_id], ['class' => 'd-block']);
                } else {
                    echo Html::a("Usuario", ['#'], ['class' => 'd-block']);
                }
                ?>
            </div>
        </div>

        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Inicio', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['site/index']],
                    ['label' => 'Periodos', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['periodo/periodos']],
                    ['label' => 'Materias', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['materia/materias']],
                    ['label' => 'Tareas', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['tarea/index']],
                    ['label' => 'Insights', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['controller/accion-insights']],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
