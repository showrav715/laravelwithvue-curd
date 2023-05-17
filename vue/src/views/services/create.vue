<template lang="">
    <div class="my-5 w-75 mx-auto">
        <form @submit.prevent="storeService(form)" enctype="multipart/form-data" >
            <div class="mb-3">
                <label for="title" class="form-label"
                    >Title</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    v-model="form.title"
                    aria-describedby="emailHelp"
                />
                <div class="text-danger" v-if="errors.title">
                    {{errors.title[0]}}
                </div>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label"
                    >Slug</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="slug"
                    name="slug"
                    v-model="form.slug"
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
                <div class="text-danger" v-if="errors.image">
                    {{errors.image[0]}}
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label"
                    >Details</label
                >
                <textarea class="form-control" name="details" v-model="form.details" id="details" rows="3"></textarea>
                <div class="text-danger" v-if="errors.details">
                    {{errors.details[0]}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import useService from '../../libs/service';

const { service, storeService, errors } = useService();
const form = reactive({
    title: '',
    slug: '',
    details: '',
    image: {},
})

function handleFileUpload(event) {
    form.image = event.target.files[0];
}


</script>
<style lang=""></style>
