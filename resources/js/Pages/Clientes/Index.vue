<script setup>
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '../../Layouts/AppLayout.vue'


defineOptions({ layout: AppLayout })
defineProps({ clientes: Array })

function excluir(id) {
  if (confirm('Tem certeza que deseja excluir?')) {
    router.delete(route('clientes.destroy', id))
  }
}
</script>


<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">Meus Clientes</h1>
    <Link
      :href="route('clientes.create')"
      class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
    >
      Novo Cliente
    </Link>

    <ul class="space-y-2">
      <li
        v-for="cliente in clientes"
        :key="cliente.id"
        class="bg-white p-4 rounded shadow flex justify-between items-center"
      >
        <div>
          <p class="font-semibold">{{ cliente.nome }}</p>
          <p class="text-sm text-gray-600">{{ cliente.email }}</p>
        </div>
        <div class="flex gap-2">
          <Link
            :href="route('clientes.edit', cliente.id)"
            class="text-blue-600 hover:underline"
          >
            Editar
          </Link>
          <button
            @click="excluir(cliente.id)"
            class="text-red-600 hover:underline"
          >
            Excluir
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>