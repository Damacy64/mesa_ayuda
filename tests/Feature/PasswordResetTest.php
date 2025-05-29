<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Features;

test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
})->skip(function () {
    return ! Features::enabled(Features::resetPasswords());
}, 'Password updates are not enabled.');

test('reset password link can be requested', function () {
    Notification::fake();

    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    DB::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
    ]);

    $this->assertDatabaseHas('users', [
        'email' => $user->email,
    ]);

    $response = $this->post('/forgot-password', [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class);
})->skip(function () {
    return ! Features::enabled(Features::resetPasswords());
}, 'Password updates are not enabled.');

test('reset password screen can be rendered', function () {
    Notification::fake();

    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    DB::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/forgot-password', [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (object $notification) {
        $response = $this->get('/reset-password/' . $notification->token);

        $response->assertStatus(200);

        return true;
    });
})->skip(function () {
    return ! Features::enabled(Features::resetPasswords());
}, 'Password updates are not enabled.');

test('password can be reset with valid token', function () {
    Notification::fake();

    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    DB::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/forgot-password', [
        'email' => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (object $notification) use ($user) {
        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
})->skip(function () {
    return ! Features::enabled(Features::resetPasswords());
}, 'Password updates are not enabled.');
