<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesUsers;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use CreatesUsers, RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect(route('login'));
    }

    public function test_user_with_wrong_role_is_denied(): void
    {
        $dokter = $this->makeUser(2); // Dokter, bukan Admin

        $response = $this->actingAs($dokter)
            ->withSession(['user_role' => 2])
            ->get('/admin/dashboard');

        // CheckRole menolak dengan back()->with('error', ...)
        $response->assertSessionHas('error');
    }

    public function test_user_with_correct_role_is_allowed(): void
    {
        $admin = $this->makeUser(1); // Administrator

        $response = $this->actingAs($admin)
            ->withSession(['user_role' => 1])
            ->get('/admin/dashboard');

        $response->assertOk();
        $response->assertSessionMissing('error');
    }

    public function test_role_check_tolerates_string_session_value(): void
    {
        // Sesi lama bisa menyimpan user_role sebagai string; CheckRole meng-cast (int)
        $resepsionis = $this->makeUser(4);

        $response = $this->actingAs($resepsionis)
            ->withSession(['user_role' => '4'])
            ->get('/resepsionis/dashboard');

        $response->assertOk();
    }
}
