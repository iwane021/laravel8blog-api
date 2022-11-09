<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;

uses(RefreshDatabase::class);

test('can delete user data', function() {
    $user = User::factory()->create();
    
    assertDatabaseHas('users', ['name' => $user->name]);
    
    delete('/user/'. $user->id);
    assertDatabaseMissing('users', ['name' => $user->name]);
});