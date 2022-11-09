<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can see create user page', function() {
    get('/user/create')->assertStatus(200);
    get('/user/create')->assertSee('Tambah Data User');
});

test('can create a new user', function() {
    $request = [
        'name' => 'Ryadh',
        'email' => 'riyadh@gmail.com',
        'password' => 12345678
    ];
    post('/user', $request);
    
    assertDatabaseHas('users', [
        'user' => 'Ryadh'
    ]);
});