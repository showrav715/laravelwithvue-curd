<template lang="">
    <div class="my-5 w-75 mx-auto">
        <h5 class="text-center">Edit Service</h5>
        <hr />
        <form @submit.prevent="updateService(id)" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    v-model="service.title"
                    aria-describedby="emailHelp"
                />
                <div class="text-danger" v-if="errors.title">
                    {{errors.title[0]}}
                </div>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input
                    type="text"
                    class="form-control"
                    id="slug"
                    v-model="service.slug"
                />
                <div class="text-danger" v-if="errors.slug">
                    {{errors.slug[0]}}
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label"
                    >Image</label
                >
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    @change="handleFileUpload"
                />
                <img class="my-2" :src="service.image" alt="">
                <div class="text-danger" v-if="errors.image">
                    {{errors.image[0]}}
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Details</label>
                <textarea
                    class="form-control"
                    id="details"
                    v-model="service.details"
                    rows="3"
                ></textarea>
                <div class="text-danger" v-if="errors.details">
                    {{errors.details[0]}}
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</template>
<script setup>
import { useRoute } from "vue-router";
import useService from "../../libs/service";
import { onMounted } from "vue";
const { service, singleService,updateService,errors } = useService();
const route = useRoute();
const id = route.params.id;
onMounted(() => singleService(id));

const handleFileUpload = (e) => {
    service.value.image = e.target.files[0];
};


</script>
<style lang=""></style>
