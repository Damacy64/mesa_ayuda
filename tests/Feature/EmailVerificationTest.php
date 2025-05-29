<?php

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Features;

test('email verification screen can be rendered', function () {
    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    Db::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
        'email_verified_at' => null,
    ]);

    $response = $this->actingAs($user)->get('/email/verify');

    $response->assertStatus(200);
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');

test('email can be verified', function () {
    Event::fake();

    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    Db::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);

    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(route('dashboard', absolute: false).'?verified=1');
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');

test('email can not verified with invalid hash', function () {
    DB::table('genders')->insert(['sexo' => 'MASCULINO']);
    Db::table('roles')->insert(['rol' => 'USUARIO']);

    $user = User::create([
        'name' => 'prueba',
        'last_name_p' => 'prueba',
        'sex_id' => 'MASCULINO',
        'rol_id' => 'USUARIO',
        'employer_number' => '0614735',
        'email' => 'prueba.prueba@afac.gob.mx',
        'password' => bcrypt('password'),
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');
