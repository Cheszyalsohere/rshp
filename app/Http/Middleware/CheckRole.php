<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Batasi akses route berdasarkan id role.
     * Dipakai sebagai: ->middleware('role:1') atau 'role:2,3' (boleh beberapa).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userRole = (int) session('user_role');
        $allowed = array_map('intval', $roles);

        if (in_array($userRole, $allowed, true)) {
            return $next($request);
        }

        return back()->with('error', 'Akses ditolak. Anda tidak memiliki hak untuk halaman ini.');
    }
}
