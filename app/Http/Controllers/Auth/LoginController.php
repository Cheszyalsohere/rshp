<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::with(['RoleUser' => function ($query) {
            $query->where('status', 1);
        }, 'RoleUser.role'])
            ->where('email', $request->input('email'))
            ->first();

        // Untuk Pengecekan Email
        if (! $user) {
            return redirect()->back()
                ->withErrors(['email' => 'Email Tidak Ditemukan.'])
                ->withInput();
        }

        // Untuk Pengecekan Password
        if (! Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'Password Salah.'])
                ->withInput();
        }

        // Pastikan user punya role aktif sebelum di-login-kan
        $roleUser = $user->RoleUser->first();

        if (! $roleUser) {
            return redirect()->back()
                ->withErrors(['email' => 'Akun ini belum memiliki role aktif. Hubungi administrator.'])
                ->withInput();
        }

        $userRole = (int) $roleUser->idrole;
        $namaRole = Role::where('idrole', $userRole)->first();

        Auth::login($user);

        // Cegah session fixation: terbitkan ID sesi baru setelah login
        $request->session()->regenerate();

        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $userRole,
            'user_role_name' => $namaRole->nama_role ?? 'User',
            'user_status' => $roleUser->status ?? 'active',
        ]);

        switch ($userRole) {
            case 1:
                return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil!');
            case 2:
                return redirect()->route('Dokter.Dashboard.index')->with('success', 'Login Berhasil!');
            case 3:
                return redirect()->route('Perawat.Dashboard.index')->with('success', 'Login Berhasil!');
            case 4:
                return redirect()->route('Resepsionis.Dashboard.index')->with('success', 'Login Berhasil!');
            case 5:
                return redirect()->route('Pemilik.Dashboard.index')->with('success', 'Login Berhasil!');
            default:
                // Role tidak dikenali: batalkan sesi agar tidak "login tapi terkunci"
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->withErrors(['email' => 'Role akun tidak dikenali. Hubungi administrator.']);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        // Batasi percobaan login untuk mencegah brute-force
        $this->middleware('throttle:10,1')->only('login');
    }
}
