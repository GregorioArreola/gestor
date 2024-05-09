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
                <a href="#" class="d-block">username</a>
            </div>
        </div>

        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Periodos', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['periodo/periodos']],
                    ['label' => 'Materias', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['materia/materias']],
                    ['label' => 'Tareas', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['tarea/tareas']],
                    ['label' => 'Insights', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['controller/accion-insights']],
                    ['label' => 'Configuracion', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['controller/accion-configuracion']]
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>