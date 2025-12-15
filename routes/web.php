<?php

use App\Models\JenisHewan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('sites.welcome');
// });

Route::get('/', [\App\Http\Controllers\Site\SiteController::class, 'index'])->name('home');
Route::get('/layanan', [\App\Http\Controllers\Site\SiteController::class, 'layanan'])->name('layanan');
Route::get('/login', [\App\Http\Controllers\Site\SiteController::class, 'login'])->name('login');
Route::get('/kontak', [\App\Http\Controllers\Site\SiteController::class, 'kontak'])->name('kontak');
Route::get('/organisasi', [\App\Http\Controllers\Site\SiteController::class, 'organisasi'])->name('organisasi');
Route::get('/about', [\App\Http\Controllers\Site\SiteController::class, 'about'])->name('about');
Route::get('/dokter', [\App\Http\Controllers\Site\SiteController::class, 'dokter'])->name('dokter');

Route::get('/cek-koneksi', [\App\Http\Controllers\Site\SiteController::class, 'CekKoneksi'])->name('site.cek-koneksi');

Route::middleware('isAdministrator')->group(function () {
        Route::get('admin/dashboard', [\App\Http\Controllers\Admin\dashboard_admin::class, 'index'])->name('admin.dashboard');
        Route::prefix('admin/jenis-hewan')->name('Admin.jenis-hewan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\JenisHewanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\JenisHewanController::class, 'destroy'])->name('destroy');
    });
       Route::prefix('admin/pemilik')->name('Admin.Pemilik.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\PemilikController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\PemilikController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\PemilikController::class, 'destroy'])->name('destroy');
    });
        
        Route::prefix('admin/ras-hewan')->name('Admin.RasHewan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RasHewanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RasHewanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RasHewanController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('admin/role')->name('Admin.Role.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('destroy');
    });
       
        Route::prefix('admin/role-user')->name('Admin.RoleUser.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RoleUserController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RoleUserController::class, 'update'])->name('update'); // ID yang dikirim adalah ID RoleUser
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RoleUserController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('admin/daftar-pet')->name('admin.daftar-pet.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DaftarPetController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\DaftarPetController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\DaftarPetController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\DaftarPetController::class, 'destroy'])->name('destroy');
    });
       
        Route::prefix('admin/kategori')->name('Admin.Kategori.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('destroy');
    });

        Route::prefix('admin/kategori-klinis')->name('Admin.KategoriKlinis.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'destroy'])->name('destroy');
    });

        Route::prefix('admin/kode-tindakan')->name('Admin.KodeTindakan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'destroy'])->name('destroy');
    });

        Route::prefix('admin/reservasi')->name('Admin.TemuDokter.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\TemuDokterController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\TemuDokterController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\TemuDokterController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\TemuDokterController::class, 'destroy'])->name('destroy');
    });

        Route::prefix('admin/rekam-medis')->name('Admin.RekamMedis.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RekamMedisController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RekamMedisController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RekamMedisController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RekamMedisController::class, 'destroy'])->name('destroy');
    });
});


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isResepsionis'])->group(function () {
    
    // 1. Dashboard
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('Resepsionis.Dashboard.index');

    // 2. Manajemen Pemilik (Registrasi Pemilik Baru)
    Route::prefix('resepsionis/pemilik')->name('Resepsionis.Pemilik.')->group(function () {
        Route::get('/', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\Resepsionis\PemilikController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'update'])->name('update');
        // Detail Pemilik (Untuk tambah hewan nanti)
        Route::get('/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'show'])->name('show');
    });

    // 3. Manajemen Hewan (CRUD Pet)
    Route::prefix('resepsionis/pet')->name('Resepsionis.Pet.')->group(function () {
        Route::post('/store', [App\Http\Controllers\Resepsionis\PetController::class, 'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Resepsionis\PetController::class, 'update'])->name('update');
    });

    // 4. Pendaftaran Temu Dokter (Appointment)
    Route::prefix('resepsionis/pendaftaran')->name('Resepsionis.TemuDokter.')->group(function () {
        Route::post('/store', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'store'])->name('store');
    });
});

Route::middleware(['auth', 'pemilik'])->group(function () {
    
    // 1. Dashboard & Antrian
    Route::get('/pemilik/dashboard', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])->name('Pemilik.Dashboard.index');

    // 2. Hewan Saya & Riwayat Medis
    Route::prefix('pemilik/hewan')->name('Pemilik.Hewan.')->group(function () {
        Route::get('/', [App\Http\Controllers\Pemilik\HewanSayaController::class, 'index'])->name('index');
        Route::get('/riwayat/{id}', [App\Http\Controllers\Pemilik\HewanSayaController::class, 'riwayat'])->name('riwayat');
    });

    // 3. Profil
    Route::get('/pemilik/profil', [App\Http\Controllers\Pemilik\ProfilSayaController::class, 'index'])->name('Pemilik.Profil.index');
    Route::put('/pemilik/profil', [App\Http\Controllers\Pemilik\ProfilSayaController::class, 'update'])->name('Pemilik.Profil.update');
});


Route::middleware(['auth', 'dokter'])->group(function () {

    // 1. Dashboard Dokter
    Route::get('/dokter/dashboard', [App\Http\Controllers\Dokter\DashboardDokterController::class, 'index'])->name('Dokter.Dashboard.index');

    // 2. Data Pasien (Read Only)
    Route::prefix('dokter/pasien')->name('Dokter.Pasien.')->group(function () {
        Route::get('/', [App\Http\Controllers\Dokter\PasienDokterController::class, 'index'])->name('index');
        Route::get('/{id}', [App\Http\Controllers\Dokter\PasienDokterController::class, 'show'])->name('show');
    });

    // 3. Riwayat Pemeriksaan Saya (List History)
    Route::prefix('dokter/rekam-medis')->name('Dokter.RekamMedis.')->group(function () {
        Route::get('/', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'index'])->name('index');
    });

    // 4. Proses Pemeriksaan (Input Diagnosa & Tindakan)
    Route::prefix('dokter/pemeriksaan')->name('Dokter.Pemeriksaan.')->group(function () {
        // Halaman Form Periksa
        Route::get('/{id_reservasi}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'edit'])->name('edit');

        // Simpan Diagnosa Utama (Update)
        Route::put('/update-diagnosa/{id}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'updateDiagnosa'])->name('updateDiagnosa');

        // CRUD Detail Tindakan (Child)
        Route::post('/detail/store', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'storeDetail'])->name('storeDetail');
        Route::delete('/detail/{id}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'destroyDetail'])->name('destroyDetail');
    });

    // Placeholder Profil (Nanti dibuat terpisah)
    Route::prefix('dokter/profil')->name('Dokter.Profil.')->group(function () {
        Route::get('/', [App\Http\Controllers\Dokter\ProfilDokterController::class, 'index'])->name('index');
    });
});


Route::middleware(['auth', 'perawat'])->group(function () {
    
    // 1. Dashboard
    Route::get('/perawat/dashboard', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'index'])->name('Perawat.Dashboard.index');

    // 2. Data Pasien (Read Only)
    Route::prefix('perawat/pasien')->name('Perawat.Pasien.')->group(function () {
        Route::get('/', [App\Http\Controllers\Perawat\PasienPerawatController::class, 'index'])->name('index');
    });

    // 3. Pemeriksaan Awal (Triage) - Input Anamnesa & Vital
    Route::prefix('perawat/pemeriksaan')->name('Perawat.Pemeriksaan.')->group(function () {
        Route::get('/', [App\Http\Controllers\Perawat\RekamMedisPerawatController::class, 'index'])->name('index'); // List Antrian
        Route::get('/create/{id_reservasi}', [App\Http\Controllers\Perawat\RekamMedisPerawatController::class, 'create'])->name('create'); // Form Input
        Route::post('/store', [App\Http\Controllers\Perawat\RekamMedisPerawatController::class, 'store'])->name('store'); // Simpan Data
        Route::get('/show/{id}', [App\Http\Controllers\Perawat\RekamMedisPerawatController::class, 'show'])->name('show'); // Lihat Detail
    });

    // 4. Profil
    Route::get('/perawat/profil', [App\Http\Controllers\Perawat\ProfilPerawatController::class, 'index'])->name('Perawat.Profil.index');
});