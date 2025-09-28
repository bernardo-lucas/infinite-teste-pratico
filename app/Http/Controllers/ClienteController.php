<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClienteController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a paginated listing of the authenticated user’s clientes.
     */
    public function index()
    {
        $this->authorize('viewAny', Cliente::class);

        $clientes = auth()
            ->user()
            ->clientes()
            ->paginate(10);

        return Inertia::render('Clientes/Index', [
            'clientes' => $clientes,
        ]);
    }

    /**
     * Show the form for creating a new cliente.
     */
    public function create()
    {
        $this->authorize('create', Cliente::class);

        return Inertia::render('Clientes/Create');
    }

    /**
     * Store a newly created cliente in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Cliente::class);

        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email',
            'telefone' => 'nullable|string|max:20',
        ]);

        auth()->user()->clientes()->create($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Show the form for editing the specified cliente.
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('view', $cliente);

        return Inertia::render('Clientes/Edit', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Update the specified cliente in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $this->authorize('update', $cliente);

        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'nullable|string|max:20',
        ]);

        $cliente->update($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified cliente from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $this->authorize('delete', $cliente);

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
