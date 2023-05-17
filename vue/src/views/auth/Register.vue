<template lang="">
    <div class="my-5 w-75 mx-auto">
        <form
            @submit.prevent="storeService(form)"
            enctype="multipart/form-data"
        >
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    v-model="form.name"
                    aria-describedby="emailHelp"
                />
                <div class="text-danger" v-if="errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>
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
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>
<script setup>
import { ref } from "vue";
const errors = ref({});
const form = ref({
    name: "",
    email: "",
    password: "",
});
</script>
