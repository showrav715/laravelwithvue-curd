<template lang="">
    <div class="my-5 w-75 mx-auto">
        <form @submit.prevent="handleLogin">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    v-model="form.email"
                />
                <div class="text-danger" v-if="errors.email">
                    {{ errors.email[0] }}
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="text"
                    class="form-control"
                    id="password"
                    name="password"
                    v-model="form.password"
                />
                <div class="text-danger" v-if="errors.password">
                    {{ errors.password[0] }}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</template>
<script setup>
import { ref } from "vue";
import useAuth from "../../libs/auth";
const { errors, Login } = useAuth();
const form = ref({
    email: "",
    password: "",
});

const handleLogin = (e) => {
    e.preventDefault();
    Login(form.value);
};
</script>
<style lang=""></style>
