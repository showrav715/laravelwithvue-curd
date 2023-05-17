


<template>
    <div class="my-5 w-75 mx-auto">
        <table class="table">
  <thead>
    
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Details</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-if="services.length != 0" v-for="service in services" :key="service.id">
      <th>{{service.id}}</th>
      <td>
          <img :src="service.image" height="150" width="100"/>
      </td>
      <td>{{service.title}}</td>
      <td>{{service.slug}}</td>
      <td>{{service.details}}</td>
      <td>
          <router-link :to="{name: 'EditService', params: {id: service.id}}" class="btn btn-primary">Edit</router-link>
      </td>
    </tr>
    <tr v-else>
        <td colspan="6" class="text-center">No Data Found</td>
    </tr>
    
  </tbody>
</table>
    </div>
</template>

<script setup>
import useService from "../../libs/service";
import { onMounted } from 'vue';
const {services, getService } = useService();


onMounted(() => getService())

</script>

<style >
    
</style>