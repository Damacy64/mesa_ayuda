<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $this->seed();

    $response = $this->post('/login', [
        'email' => 'samanta.valdovinos@afac.gob.mx',
        'password' => 'password',
        'rol_id' => 'USUARIO',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users cannot authenticate with invalid password', function () {

    $this->post('/login', [
        'email' => 'samanta.valdovinos@afac.gob.mx',
        'password' => 'wrong-password',
        'rol_id' => 'USUARIO',
    ]);

    $this->assertGuest();
});
