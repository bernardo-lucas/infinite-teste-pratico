<script setup>
import { router } from '@inertiajs/vue3'

function logout() {
  router.post(route('logout'))
}
</script>

<template>
  <div class="min-h-screen bg-gray-100 text-gray-800">
    

    <!-- Conteúdo -->
    <main class="max-w-7xl mx-auto px-4 py-6">
      <slot />
    </main>
  </div>
</template>
