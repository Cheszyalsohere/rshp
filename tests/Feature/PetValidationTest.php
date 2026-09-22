<?php

namespace Tests\Feature;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesUsers;
use Tests\TestCase;

class PetValidationTest extends TestCase
{
    use CreatesUsers, RefreshDatabase;

    public function test_pet_store_requires_valid_fields(): void
    {
        $resepsionis = $this->makeUser(4);

        $response = $this->actingAs($resepsionis)
            ->withSession(['user_role' => 4])
            ->post('/resepsionis/pet/store', []); // tanpa data

        $response->assertSessionHasErrors([
            'idpemilik', 'nama', 'idras_hewan', 'jenis_kelamin', 'tanggal_lahir',
        ]);

        $this->assertSame(0, Pet::count());
    }

    public function test_pet_store_rejects_invalid_jenis_kelamin(): void
    {
        $resepsionis = $this->makeUser(4);

        $response = $this->actingAs($resepsionis)
            ->withSession(['user_role' => 4])
            ->post('/resepsionis/pet/store', [
                'idpemilik' => 999,          // tidak ada (exists gagal)
                'nama' => 'Kitty',
                'idras_hewan' => 999,        // tidak ada
                'jenis_kelamin' => 'X',      // hanya J/B yang valid
                'tanggal_lahir' => '2020-01-01',
            ]);

        $response->assertSessionHasErrors(['idpemilik', 'idras_hewan', 'jenis_kelamin']);
        $this->assertSame(0, Pet::count());
    }
}
