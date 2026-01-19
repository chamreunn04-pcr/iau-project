<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push(__('app.sidebar.dashboard'), route('admin.dashboard'));
});

// Leaves index page
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('app.sidebar.users', route('admin.users'));
});

Breadcrumbs::for('permissions', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('app.sidebar.permissions', route('admin.users'));
});

Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('app.sidebar.roles', route('admin.users'));
});

// settings 
Breadcrumbs::for('settings', function ($trail) {});
// manage apps
Breadcrumbs::for('create_apps', function ($trail) {});
