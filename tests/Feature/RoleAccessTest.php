<?php

use App\Models\User;

test('student can access student dashboard', function () {
    $student = User::factory()->create(['role' => 'student']);

    $this->actingAs($student)
        ->get('/dashboard')
        ->assertOk();
});

test('admin cannot access student dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get('/dashboard')
        ->assertForbidden();
});

test('admin can access admin dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get('/admin/dashboard')
        ->assertOk();
});

test('student cannot access admin dashboard', function () {
    $student = User::factory()->create(['role' => 'student']);

    $this->actingAs($student)
        ->get('/admin/dashboard')
        ->assertForbidden();
});

test('admin can access student monitoring pages', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $student = User::factory()->create(['role' => 'student']);

    $this->actingAs($admin)
        ->get('/admin/students')
        ->assertOk();

    $this->actingAs($admin)
        ->get("/admin/students/{$student->id}")
        ->assertOk();
});

test('student cannot access student monitoring pages', function () {
    $student = User::factory()->create(['role' => 'student']);

    $this->actingAs($student)
        ->get('/admin/students')
        ->assertForbidden();
});
