<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

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
        <Head title="Clientes" />

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
        <input v-model="form.nome" type="text" class="mt-1 dark:bg-zinc-600 block w-full dark:border-gray-900 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium">Email</label>
        <input v-model="form.email" type="email" class="mt-1 dark:bg-zinc-600 block w-full dark:border-gray-900 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium">Telefone</label>
        <input v-model="form.telefone" type="text" class="mt-1 dark:bg-zinc-600 block w-full dark:border-gray-900 rounded" />
      </div>
      <button type="submit" class="bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-900">
        Salvar
      </button>
    </form>
  </div>
  </div>
  </div>
  </AuthenticatedLayout> 
</template>




