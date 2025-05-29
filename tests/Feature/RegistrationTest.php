<?php

use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
})->skip(function () {
    return ! Features::enabled(Features::registration());
}, 'Registration support is not enabled.');

// test('registration screen cannot be rendered if support is disabled', function () {
//     $response = $this->get('/register');

//     $response->assertStatus(404);
// })->skip(function () {
//     return Features::enabled(Features::registration());
// }, 'Registration support is enabled.');

test('new users can register', function () {
    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    DB::table('roles')->insert(['rol' => 'USUARIO']);
    DB::table('locations')->insert(['piso' => 'PISO 3']);
    DB::table('areas')->insert(['nombre' => 'DIRECCIÓN DE DESARROLLO ESTRATÉGICO']);

    $response = $this->post('/register', [
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'last_name_m' => 'prueba',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => 'Password123$',
        'password_confirmation' => 'Password123$',
        'sex' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'area' => 'DIRECCIÓN DE DESARROLLO ESTRATÉGICO',
        'location' => 'PISO 3',
        'email_verified_at' => now(),
    ]);

    //$this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
})->skip(function () {
    return ! Features::enabled(Features::registration());
}, 'Registration support is not enabled.');
