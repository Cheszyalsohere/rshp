<?php

namespace Tests\Concerns;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

trait CreatesUsers
{
    /**
     * Isi tabel role dengan 5 role standar (id tetap 1..5).
     */
    protected function seedRoles(): void
    {
        $roles = [
            1 => 'Administrator',
            2 => 'Dokter',
            3 => 'Perawat',
            4 => 'Resepsionis',
            5 => 'Pemilik',
        ];

        foreach ($roles as $id => $name) {
            DB::table('role')->updateOrInsert(['idrole' => $id], ['nama_role' => $name]);
        }
    }

    /**
     * Buat user + role_user aktif untuk role tertentu.
     */
    protected function makeUser(int $roleId, string $password = 'password123'): User
    {
        $this->seedRoles();

        $user = User::create([
            'nama' => 'Test User '.$roleId,
            'email' => 'user'.$roleId.'_'.uniqid().'@mail.com',
            'password' => $password, // otomatis di-hash via cast 'hashed'
        ]);

        RoleUser::create([
            'iduser' => $user->iduser,
            'idrole' => $roleId,
        ]);

        return $user;
    }
}
