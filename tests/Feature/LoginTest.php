<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesUsers;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use CreatesUsers, RefreshDatabase;

    public function test_login_fails_with_wrong_password(): void
    {
        $user = $this->makeUser(1, 'password123');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'salahsemua',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_login_rejected_when_user_has_no_active_role(): void
    {
        $this->seedRoles();

        // User tanpa baris role_user sama sekali
        $user = User::create([
            'nama' => 'Tanpa Role',
            'email' => 'norole@mail.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_succeeds_and_stores_integer_role(): void
    {
        $admin = $this->makeUser(1, 'password123');

        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertSame(1, session('user_role'));
    }
}
