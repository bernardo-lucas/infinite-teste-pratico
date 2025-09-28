<script setup>
import { router } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

function logout() {
  router.post(route('logout'))
}
const dark = ref(false)

onMounted(() => {
  dark.value = document.documentElement.classList.contains('dark')
})

function toggleDark() {
  document.documentElement.classList.toggle('dark')
  dark.value = !dark.value
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
