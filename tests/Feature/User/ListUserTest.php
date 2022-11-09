<?php

use App\Models\User;
use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('url can be access', function() {
    get('/user')->assertStatus(200);
    get('/user')->assertSee('Data User');
});

test('contains user & email', function() {
    $users = User::factory()->count(10)->create();
    get('user')->assertSee($users->get(0)->name);
    get('user')->assertSee($users->get(0)->email);
});
