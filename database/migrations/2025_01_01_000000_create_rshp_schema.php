<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Skema domain RSHP hasil rekonstruksi dari basis data yang berjalan.
 *
 * Setiap tabel dibungkus pengecekan hasTable() agar migrasi ini aman
 * dijalankan pada basis data dev yang sudah terisi dari dump lama,
 * sekaligus tetap membangun skema penuh pada instalasi baru / SQLite (test).
 */
return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->bigIncrements('iduser');
                $table->string('nama', 500);
                $table->string('email', 200)->unique();
                $table->string('password', 300);
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('role')) {
            Schema::create('role', function (Blueprint $table) {
                $table->increments('idrole');
                $table->string('nama_role', 100)->nullable();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->increments('idrole_user');
                $table->unsignedBigInteger('iduser')->index();
                $table->unsignedInteger('idrole')->index();
                $table->tinyInteger('status')->default(1);
            });
        }

        if (! Schema::hasTable('jenis_hewan')) {
            Schema::create('jenis_hewan', function (Blueprint $table) {
                $table->increments('idjenis_hewan');
                $table->string('nama_jenis_hewan', 100)->nullable();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('ras_hewan')) {
            Schema::create('ras_hewan', function (Blueprint $table) {
                $table->increments('idras_hewan');
                $table->string('nama_ras', 100)->nullable();
                $table->unsignedInteger('idjenis_hewan')->index();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('kategori')) {
            Schema::create('kategori', function (Blueprint $table) {
                $table->integer('idkategori')->primary();
                $table->string('nama_kategori', 100)->nullable();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('kategori_klinis')) {
            Schema::create('kategori_klinis', function (Blueprint $table) {
                $table->integer('idkategori_klinis')->primary();
                $table->string('nama_kategori_klinis', 50)->nullable();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('kode_tindakan_terapi')) {
            Schema::create('kode_tindakan_terapi', function (Blueprint $table) {
                $table->increments('idkode_tindakan_terapi');
                $table->string('kode', 5)->nullable();
                $table->string('deskripsi_tindakan_terapi', 1000)->nullable();
                $table->unsignedInteger('idkategori')->index();
                $table->unsignedInteger('idkategori_klinis')->index();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('pemilik')) {
            Schema::create('pemilik', function (Blueprint $table) {
                $table->integer('idpemilik')->primary();
                $table->string('no_wa', 45)->nullable();
                $table->string('alamat', 100)->nullable();
                $table->unsignedBigInteger('iduser')->index();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('pet')) {
            Schema::create('pet', function (Blueprint $table) {
                $table->increments('idpet');
                $table->string('nama', 100)->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('warna_tanda', 45)->nullable();
                $table->char('jenis_kelamin', 1)->nullable();
                $table->unsignedInteger('idpemilik')->index();
                $table->unsignedInteger('idras_hewan')->index();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('temu_dokter')) {
            Schema::create('temu_dokter', function (Blueprint $table) {
                $table->increments('id_reservasi_dokter');
                $table->integer('no_urut')->nullable();
                $table->dateTime('waktu_daftar')->nullable();
                $table->string('status', 2)->default('0');
                $table->unsignedInteger('idpet')->nullable()->index();
                $table->unsignedInteger('idrole_user')->nullable()->index();
                $table->unsignedBigInteger('deleted_by')->nullable();
                $table->softDeletes();
            });
        }

        if (! Schema::hasTable('rekam_medis')) {
            Schema::create('rekam_medis', function (Blueprint $table) {
                $table->increments('idrekam_medis');
                $table->timestamp('created_at')->nullable();
                $table->string('anamnesa', 1000)->nullable();
                $table->string('temuan_klinis', 1000)->nullable();
                $table->string('diagnosa', 1000)->nullable();
                $table->unsignedInteger('idpet')->index();
                $table->unsignedInteger('dokter_pemeriksa')->index();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('detail_rekam_medis')) {
            Schema::create('detail_rekam_medis', function (Blueprint $table) {
                $table->increments('iddetail_rekam_medis');
                $table->unsignedInteger('idrekam_medis')->index();
                $table->unsignedInteger('idkode_tindakan_terapi')->index();
                $table->string('detail', 1000)->nullable();
                $table->softDeletes();
                $table->unsignedBigInteger('deleted_by')->nullable();
            });
        }

        if (! Schema::hasTable('dokter')) {
            Schema::create('dokter', function (Blueprint $table) {
                $table->increments('id_dokter');
                $table->unsignedBigInteger('id_user')->nullable()->index();
                $table->string('alamat', 255)->nullable();
                $table->string('no_hp', 20)->nullable();
                $table->string('bidang_dokter', 100)->nullable();
                $table->char('jenis_kelamin', 1)->nullable();
            });
        }

        if (! Schema::hasTable('perawat')) {
            Schema::create('perawat', function (Blueprint $table) {
                $table->increments('id_perawat');
                $table->unsignedBigInteger('id_user')->nullable()->index();
                $table->string('alamat', 255)->nullable();
                $table->string('no_hp', 20)->nullable();
                $table->char('jenis_kelamin', 1)->nullable();
                $table->string('pendidikan', 100)->nullable();
            });
        }
    }

    public function down(): void
    {
        foreach ([
            'detail_rekam_medis', 'rekam_medis', 'temu_dokter', 'pet', 'pemilik',
            'kode_tindakan_terapi', 'kategori_klinis', 'kategori', 'ras_hewan',
            'jenis_hewan', 'role_user', 'perawat', 'dokter', 'role', 'user',
        ] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
