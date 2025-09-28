<script setup>
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const props = defineProps({ clientes: Array })

const search = ref('')

const filteredClientes = computed(() =>
  props.clientes.filter(cliente =>
    cliente.nome.toLowerCase().includes(search.value.toLowerCase())
  )
)

function excluir(id) {
  if (confirm('Tem certeza que deseja excluir?')) {
    router.delete(route('clientes.destroy', id))
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Clientes" />

    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex flex-wrap justify-between items-center mb-4 gap-2">
            <h1 class="text-2xl font-bold">Meus Clientes</h1>
            <div class="flex items-center gap-2">
              <input
                v-model="search"
                type="text"
                placeholder="Buscar cliente..."
                class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
              />
              <Link
                :href="route('clientes.create')"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              >
                Novo Cliente
              </Link>
            </div>
          </div>

          <ul class="space-y-2">
            <li
              v-for="cliente in filteredClientes"
              :key="cliente.id"
              class="bg-gray-50 p-4 rounded shadow flex justify-between items-center"
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
      </div>
    </div>
  </AuthenticatedLayout>
</template>
