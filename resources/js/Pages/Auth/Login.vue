<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const page = usePage();
const flashMessage = page.props.flash?.message;

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <div v-if="status || flashMessage" class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm font-medium">
      {{ status || flashMessage }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel class="dark:text-white" for="email" value="E-mail" />
        <TextInput
          id="email"
          type="email"
          class="dark:bg-zinc-500 dark:border-zinc-700 dark:text-white block w-full"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <InputLabel class="dark:text-white" for="password" value="Senha" />
        <TextInput
          id="password"
          type="password"
          class="dark:bg-zinc-500 dark:border-zinc-700 dark:text-white mt-1 block w-full "
          v-model="form.password"
          required
          autocomplete="current-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4 block">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember" />
          <span class="dark:text-white ms-2 text-sm text-gray-600">Lembre meu acesso</span>
        </label>
      </div>

      <div class="mt-4 flex items-center justify-end">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="dark:text-white rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Esqueci minha senha
        </Link>

        <PrimaryButton
          class="ms-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Acessar
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
