<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Middleware\CheckRegistrationAge;

class UserValidationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(CheckRegistrationAge::class);
    }
    public function test_user_creation_fails_when_name_is_missing(): void
    {
        $response = $this->from('/users/create')->post('/users', [
            'email' => 'viet@example.com',
            'age' => 25,
        ]);

        $response->assertRedirect('/users/create');
        $response->assertSessionHasErrors(['name']);
    }

    public function test_user_creation_fails_when_email_is_invalid(): void
    {
        $response = $this->from('/users/create')->post('/users', [
            'name' => 'Viet',
            'email' => 'abc',
            'age' => 25,
        ]);

        $response->assertRedirect('/users/create');
        $response->assertSessionHasErrors(['email']);
    }

    public function test_user_creation_fails_when_age_is_under_18(): void
    {
        $response = $this->from('/users/create')->post('/users', [
            'name' => 'Viet',
            'email' => 'viet@example.com',
            'age' => 17,
        ]);

        $response->assertRedirect('/users/create');
        $response->assertSessionHasErrors(['age']);
    }

    public function test_user_creation_succeeds_with_valid_data(): void
    {
        $response = $this->post('/users', [
            'name' => 'Viet',
            'email' => 'viet@example.com',
            'age' => 25,
        ]);

        $response->assertOk();
        $response->assertSee('Name: Viet');
        $response->assertSee('Email: viet@example.com');
        $response->assertSee('Age: 25');
    }
}
