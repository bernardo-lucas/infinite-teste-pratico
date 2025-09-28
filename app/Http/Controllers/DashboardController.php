<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = Cliente::count();
        $ultimoCliente = Cliente::latest()->first();
        $clientesEsteMes = Cliente::whereMonth('created_at', now()->month)->count();

        $clientesPorMes = collect();
        for ($i = 5; $i >= 0; $i--) {
            $mes = Carbon::now()->subMonths($i);
            $count = Cliente::whereYear('created_at', $mes->year)
                            ->whereMonth('created_at', $mes->month)
                            ->count();
            $clientesPorMes->push([
                'mes' => $mes->format('M/Y'),
                'quantidade' => $count,
            ]);
        }

        return Inertia::render('Dashboard', [
            'totalClientes' => $totalClientes,
            'ultimoCliente' => $ultimoCliente,
            'clientesEsteMes' => $clientesEsteMes,
            'clientesPorMes' => $clientesPorMes,
        ]);
    }
}
