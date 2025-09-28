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
      <h2 class="text-xl font-semibold leading-tight dark:text-white">
        Clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl p-6 bg-white dark:bg-zinc-700 shadow-sm rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Novo Cliente</h2>

        <form @submit.prevent="submit" class="space-y-4">
          
          
          <div>
            <label class="block text-sm font-medium">Nome</label>
            <input
              v-model="form.nome"
              type="text"
              class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
            />
            <p v-if="form.errors.nome" class="mt-1 text-sm text-red-600">
              {{ form.errors.nome }}
            </p>
          </div>

          
          <div>
            <label class="block text-sm font-medium">Email</label>
            <input
              v-model="form.email"
              type="email"
              class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
            />
            <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">
              {{ form.errors.email }}
            </p>
          </div>

          
          <div>
            <label class="block text-sm font-medium">Telefone</label>
            <input
              v-model="form.telefone"
              type="text"
              class="mt-1 block w-full border-gray-300 dark:border-zinc-900 dark:bg-zinc-600 rounded"
            />
            <p v-if="form.errors.telefone" class="mt-1 text-sm text-red-600">
              {{ form.errors.telefone }}
            </p>
          </div>

          
          <button
            type="submit"
            :disabled="form.processing"
            class="bg-sky-700 disabled:opacity-50 text-white px-4 py-2 rounded hover:bg-sky-900"
          >
            {{ form.processing ? 'Salvando...' : 'Salvar' }}
          </button>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
