<template>
  <div class="min-h-screen bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Painel de Clientes</h1>
        <div class="flex items-center gap-4">
          <span>{{ $page.props.auth.user.name }}</span>
          <form method="POST" :action="route('logout')">
            <input type="hidden" name="_method" value="POST" />
            <button type="submit" class="text-red-600 hover:underline">Sair</button>
          </form>
        </div>
      </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-6">
      <slot />
    </main>
  </div>
</template>

