<?php

use App\Models\User;

test('Default role for user is user', function () {
    // Check Dummy User from Seeder
    $user = User::where('email', 'user@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->hasRole('user'))->toBeTrue();

    // Check new User from factory
    $newUser = User::factory()->create();
    expect($newUser)->not->toBeNull();
    expect($newUser->hasRole('user'))->toBeTrue();

    // Check permissions
    expect($user->can('view dashboard'))->toBeTrue();
    expect($user->can('view users'))->toBeFalse();
});

test('Default role for super-admin is super-admin', function () {
    // Check Dummy User from Seeder
    $user = User::where('email', 'superadmin@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->hasRole('super_admin'))->toBeTrue();

    // Check new User from factory
    $newUser = User::factory()->create();
    expect($newUser)->not->toBeNull();
    expect($newUser->hasRole('super_admin'))->toBeFalse();
    
    // Check permissions
    expect($user->can('view dashboard'))->toBeTrue();
    expect($user->can('view users'))->toBeTrue();
});

test('Default role for admin is admin', function () {
    // Check Dummy User from Seeder
    $user = User::where('email', 'admin@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->hasRole('admin'))->toBeTrue();

    // Check new User from factory
    $newUser = User::factory()->create();
    expect($newUser)->not->toBeNull();
    expect($newUser->hasRole('admin'))->toBeFalse();
    
    // Check permissions
    expect($user->can('view dashboard'))->toBeTrue();
    expect($user->can('view users'))->toBeFalse();
});