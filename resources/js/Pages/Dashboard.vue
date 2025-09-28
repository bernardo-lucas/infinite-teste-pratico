<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  totalClientes: Number,
  ultimoCliente: Object,
  clientesEsteMes: Number,
  clientesPorMes: Array
})
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Dashboard" />

    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
          <div class="bg-white shadow-sm rounded-lg p-6 text-center">
            <h3 class="text-lg font-medium text-gray-700">Total de Clientes</h3>
            <p class="mt-2 text-2xl font-bold text-indigo-600">{{ props.totalClientes }}</p>
          </div>

          <div class="bg-white shadow-sm rounded-lg p-6 text-center">
            <h3 class="text-lg font-medium text-gray-700">Clientes este mês</h3>
            <p class="mt-2 text-2xl font-bold text-indigo-600">{{ props.clientesEsteMes }}</p>
          </div>

          <div class="bg-white shadow-sm rounded-lg p-6 text-center">
            <h3 class="text-lg font-medium text-gray-700">Último Cliente</h3>
            <p class="mt-2 text-indigo-600 font-semibold">
              {{ props.ultimoCliente?.nome || 'Nenhum cliente ainda' }}
            </p>
            <p class="text-sm text-gray-500">
              {{ props.ultimoCliente?.created_at ? new Date(props.ultimoCliente.created_at).toLocaleDateString() : '' }}
            </p>
          </div>
        </div>

        <!-- Gráfico simples -->
        <div class="bg-white shadow-sm rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-700 mb-4">Clientes por mês</h3>
          <div class="grid grid-cols-6 gap-4 text-center">
            <div
              v-for="mes in props.clientesPorMes"
              :key="mes.mes"
              class="flex flex-col items-center"
            >
              <div
                class="w-6 bg-indigo-500 rounded"
                :style="{ height: `${mes.quantidade * 10}px` }"
              ></div>
              <span class="text-sm mt-2">{{ mes.mes }}</span>
              <span class="text-xs text-gray-500">{{ mes.quantidade }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
