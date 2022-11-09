<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

test('can see edit user page', function() {
    $user = User::factory()->create();
    get('/user/'. $user->id .'/edit')->assertSee($user->name);
});

test('can edit user data', function() {
    $user = User::factory()->create();
    
    put('/user/'. $user->id, [
        'name' => 'Amirul',
        'email' => 'amirul.ihsan@raudhahpay.com',
    ]);
    assertDatabaseHas('users', ['name' => 'Amirul']);
});