<script setup>
import { Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const props = defineProps({
  clientes: Object
})

const search = ref('')

const filteredClientes = computed(() => {
  if (!search.value) return props.clientes
  const filtrados = props.clientes.data.filter(cliente =>
    cliente.nome.toLowerCase().includes(search.value.toLowerCase())
  )
  return {
    ...props.clientes,
    data: filtrados
  }
})

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
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-gray-100 dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="flex items-center justify-between mb-4 gap-2">
  <div class="flex items-center gap-2">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Meus Clientes</h1>
    <Link
      :href="route('clientes.create')"
      class="px-3 py-1 text-xl font-bold bg-sky-800 text-white rounded hover:bg-sky-900"
    >
      +
    </Link>
  </div>
  <input
    v-model="search"
    type="text"
    placeholder="Buscar"
    class="border dark:bg-zinc-700 border-gray-300 dark:border-zinc-500 rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-900"
  />
</div>


          <ul class="space-y-2">
            <li
              v-for="cliente in filteredClientes.data"
              :key="cliente.id"
              class="bg-gray-50 dark:bg-zinc-700 p-4 rounded shadow flex justify-between items-center"
            >
              <div>
                <p class="font-semibold">{{ cliente.nome }}</p>
                <p class="text-sm text-gray-400">{{ cliente.email }}</p>
              </div>
              <div class="flex gap-2">
  <Link
    :href="route('clientes.edit', cliente.id)"
    class="px-3 py-1 text-md rounded bg-sky-800 text-white hover:bg-sky-900 transition"
  >
    ✎
  </Link>
  
  <button
    @click="excluir(cliente.id)"
    class="px-3 py-1 text-sm rounded bg-rose-800 text-white hover:bg-rose-900 transition"
  >
    🗑︎
  </button>
</div>

            </li>
          </ul>

          <div class="mt-6 flex flex-wrap gap-2">
            <div class="mt-6 flex flex-wrap gap-2">
  <template v-for="link in props.clientes.links" :key="link.label">
    <Link
      v-if="link.url"
      :href="link.url"
      v-html="link.label"
      :class="[
        'px-3 py-1 rounded border text-sm',
        link.active ? 'bg-sky-800 text-white dark:border-zinc-700' : 'bg-white dark:border-zinc-700 dark:bg-zinc-600 text-gray-700 dark:text-gray-100 hover:bg-sky-700 hover:text-white dark:hover:bg-sky-700 dark:hover:text-white',
      ]"
    />
    <span
      v-else
      v-html="link.label"
      class="dark:border-zinc-700 px-3 py-1 rounded border text-sm text-gray-400 cursor-not-allowed"
    />
  </template>
</div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
