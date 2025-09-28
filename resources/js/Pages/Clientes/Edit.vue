<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps({
  cliente: Object
})

const form = useForm({
  nome: props.cliente.nome,
  email: props.cliente.email,
  telefone: props.cliente.telefone
})

function submit() {
  form.put(route('clientes.update', props.cliente.id))
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Editar Cliente" />

    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
        Clientes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-gray-100 dark:bg-zinc-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <h2 class="text-lg font-semibold mb-4">Editar Cliente</h2>

          <form @submit.prevent="submit" class="space-y-4">
            
            <div>
              <label class="block text-sm font-medium">Nome</label>
              <input
                v-model="form.nome"
                type="text"
                class="mt-1 block w-full dark:bg-zinc-600 dark:border-gray-900 rounded"
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
                class="mt-1 block w-full dark:bg-zinc-600 dark:border-gray-900 rounded"
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
                class="mt-1 block w-full dark:bg-zinc-600 dark:border-gray-900 rounded"
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
    </div>
  </AuthenticatedLayout>
</template>
