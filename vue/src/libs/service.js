import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
axios.defaults.baseURL = "http://localhost:8000";
const useService = function () {
    const route = useRouter();

    const services = ref([]);
    const service = ref([]);
    const errors = ref([]);
    const getService = async () => {
        const respose = await axios.get("/api/services");
        services.value = respose.data.data;
    };

    const singleService = async (id) => {
        const respose = await axios.get("/api/services/" + id);
        service.value = respose.data.data;
    };

    const storeService = (data) => {
        axios
            .post("api/services/store", data)
            .then((res) => {
                route.push({ name: "Service" });
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
            });
    };


    const updateService = (id) => { 
        axios
            .put("api/services/" + id, service.value)
            .then((res) => {
                route.push({ name: "Service" });
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
            });
    }

    const deleteService = (id) => { 
        axios
            .delete("api/services/delete/" + id)
            .then((res) => {
                route.push({ name: "Service" });
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
            });
    }


    return {
        services,
        service,
        errors,
        getService,
        singleService,
        storeService,
        updateService,
        deleteService
    }
};

export default useService;