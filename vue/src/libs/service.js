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
        const { title, slug, details, image } = data;

        // Create a new FormData object
        const formDataToSend = new FormData();
        formDataToSend.append('title', title);
        formDataToSend.append('slug', slug);
        formDataToSend.append('details', details);
        formDataToSend.append('image', image);
        axios
            .post("api/services", formDataToSend)
            .then((res) => {
                route.push({ name: "Service" });
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
            });
    };


    const updateService = (id) => {


        const { title, slug, details, image } = service.value;
        const formDataToSend = new FormData();
        formDataToSend.append('title', title);
        formDataToSend.append('slug', slug);
        formDataToSend.append('details', details);
        formDataToSend.append('image', image);
        formDataToSend.append('_method', 'PUT');

        // image file check 
        if (typeof image === 'string') {
            formDataToSend.delete('image');
        } else {
            formDataToSend.append('image', image);
        }

        axios
            .post("api/services/" + id, formDataToSend)
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