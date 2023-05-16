<template lang="">
    <div class="my-5 w-75 mx-auto">
        <form>
            <div class="mb-3">
                <label for="title" class="form-label"
                    >Title</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    aria-describedby="emailHelp"
                />
                
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label"
                    >Slug</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="slug"
                />
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label"
                    >Details</label
                >
                
                <textarea class="form-control" id="details" rows="3"></textarea>

            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script setup></script>
<style lang=""></style>
