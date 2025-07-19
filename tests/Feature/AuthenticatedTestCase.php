<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticatedTestCase extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // إنشاء المستخدم وتسجيل الدخول
        $this->user = \App\Models\User::factory()->create();
        $this->actingAs($this->user, 'sanctum');
    }
}
