<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

const form = useForm({
  nome: '',
  email: '',
  telefone: ''
})

function submit() {
  form.post(route('clientes.store'))
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Criar Cliente" />

    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-white">
       Clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <h2 class="text-lg font-semibold mb-4">Novo Cliente</h2>

          <form @submit.prevent="submit" class="space-y-4 dark:bg-zinc-700">
            <div>
              <label class="block text-sm font-medium">Nome</label>
              <input
                v-model="form.nome"
                type="text"
                class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
              />
            </div>

            <div>
              <label class="block text-sm font-medium">Email</label>
              <input
                v-model="form.email"
                type="email"
                class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
              />
            </div>

            <div>
              <label class="block text-sm font-medium">Telefone</label>
              <input
                v-model="form.telefone"
                type="text"
                class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
              />
            </div>

            <button
              type="submit"
              class="bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-900"
            >
              Salvar
            </button>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
