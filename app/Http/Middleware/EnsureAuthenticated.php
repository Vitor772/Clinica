<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Permitir acesso a Consultas, Pacientes e Prontuários sem autenticação
        if (in_array($request->route()->getName(), ['consults.index', 'patients.index', 'medical_records.index'])) {
            return $next($request);
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
