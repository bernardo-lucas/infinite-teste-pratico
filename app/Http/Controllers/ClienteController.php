<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class ClienteController extends Controller
{
    use AuthorizesRequests;
public function index()
{
    $clientes = auth()->user()->clientes()->latest()->get();

    return Inertia::render('Clientes/Index', [
        'clientes' => $clientes
    ]);
}
public function create()
{
    return Inertia::render('Clientes/Create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes,email',
        'telefone' => 'nullable|string|max:20',
    ]);

    auth()->user()->clientes()->create($validated);

    return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
}
public function edit(Cliente $cliente)
{
    $this->authorize('view', $cliente); // garante que o cliente pertence ao usuário

    return Inertia::render('Clientes/Edit', [
        'cliente' => $cliente
    ]);
}

public function update(Request $request, Cliente $cliente)
{
    $this->authorize('update', $cliente);

    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes,email,' . $cliente->id,
        'telefone' => 'nullable|string|max:20',
    ]);

    $cliente->update($validated);

    return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
}
public function destroy(Cliente $cliente)
{
    $this->authorize('delete', $cliente);

    $cliente->delete();

    return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
}


}
