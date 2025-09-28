<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

const dark = ref(false)

onMounted(() => {
  dark.value = localStorage.getItem('theme') === 'dark' || document.documentElement.classList.contains('dark')
  document.documentElement.classList.toggle('dark', dark.value)
})

function toggleDark() {
  dark.value = !dark.value
  document.documentElement.classList.toggle('dark', dark.value)
  localStorage.setItem('theme', dark.value ? 'dark' : 'light')
}
</script>

<template>
  <div class="relative flex min-h-screen flex-col items-center bg-gray-100 dark:bg-zinc-800 pt-6 sm:justify-center sm:pt-0">
    <button
      @click="toggleDark"
      style="width: 4vh; height: 4vh;"
      class="absolute top-4 right-4 flex items-center justify-center bg-zinc-800 dark:bg-white rounded text-white dark:text-zinc-900 text-xl"
    >
      {{ dark ? '☀︎' : '☾' }}
    </button>
    <div class="mt-6 w-full overflow-hidden bg-white dark:bg-zinc-700 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg ">
      <slot />
    </div>
  </div>
</template>
