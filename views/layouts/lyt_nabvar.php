<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    // Otros elementos del menú para todos los usuarios
];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/user-management/auth/login']];
    // Otros elementos del menú solo para invitados
} else {
    // Menú común para todos los usuarios autenticados
    $menuItems[] = ['label' => 'Datos', 'url' => ['/datos/index']];
    // ...

    // Menú específico para superadmin
    if (User::hasRole(['superadmin'], false)) {
        $menuItems[] = [
            'label' => 'Admin',
            'items' => UserManagementModule::menuItems(),
        ];
    }

    // Agregar el elemento de menú para cerrar sesión
    $menuItems[] = [
        'label' => 'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
        'url' => ['/user-management/auth/logout'],
        'linkOptions' => ['data-method' => 'post'],
    ];
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => $menuItems,
]);

NavBar::end();
?>
