<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalClientes = $user->clientes()->count();

        $ultimoCliente = $user->clientes()->latest()->first();

        $clientesEsteMes = $user->clientes()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $clientesPorMes = collect();
        for ($i = 5; $i >= 0; $i--) {
            $mes = Carbon::now()->subMonths($i);
            $count = $user->clientes()
                ->whereYear('created_at', $mes->year)
                ->whereMonth('created_at', $mes->month)
                ->count();

            $clientesPorMes->push([
                'mes' => $mes->format('M/Y'),
                'quantidade' => $count,
            ]);
        }

        return Inertia::render('Dashboard', [
            'totalClientes'    => $totalClientes,
            'ultimoCliente'    => $ultimoCliente,
            'clientesEsteMes'  => $clientesEsteMes,
            'clientesPorMes'   => $clientesPorMes,
        ]);
    }
}
