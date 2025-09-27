<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '../../Layouts/AppLayout.vue'
defineOptions({ layout: AppLayout })

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
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Editar Cliente</h2>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Nome</label>
        <input v-model="form.nome" type="text" class="mt-1 block w-full border-gray-300 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium">Email</label>
        <input v-model="form.email" type="email" class="mt-1 block w-full border-gray-300 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium">Telefone</label>
        <input v-model="form.telefone" type="text" class="mt-1 block w-full border-gray-300 rounded" />
      </div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Salvar
      </button>
    </form>
  </div>
</template>




