<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';
const form = useForm({
  email: null,
  password: null,
  remember: null,
})
const submit = () =>{
    form.post(route("login"),{
        onError: () => form.reset("password"),
    });
};
</script>
<template>
    <Head title="| Login" />
    <h1 class="title">Log in Page</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="Email" type="email" v-model="form.email" :message="form.errors.email" />
            <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password" />
            <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" v-model="form.remember" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                          </div>
                      </div>
                  </div>
            <div>
                <button type="submit" class="primary-btn" :disabled="form.processing">Login</button>
            </div>
        </form>
    </div>
</template>
