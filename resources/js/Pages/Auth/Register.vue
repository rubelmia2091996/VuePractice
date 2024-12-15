<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';
const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
  remember: false,
})
const submit = () =>{
    form.post(route("register"),{
        onError: () => form.reset("password", "password_confirmation"),
    });
};
</script>
<template>
    <Head title="| Register" />
    <h1 class="title">Register A New Account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="Name" v-model="form.name" :message="form.errors.name" />
            <TextInput name="Email" type="email" v-model="form.email" :message="form.errors.email" />
            <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password" />
            <TextInput name="Confirm Password" v-model="form.password_confirmation"/>
            <div>
                <button type="submit" class="primary-btn" :disabled="form.processing">Submit</button>
            </div>
        </form>
    </div>
</template>
