import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const useAuth = function () {
    const token = ref(JSON.parse(sessionStorage.getItem("token")));
    const user = ref(JSON.parse(sessionStorage.getItem("user")));
    const errors = ref([]);
    const route = useRouter();
    const Login = (data) => {
        const { email, password } = data;
        axios
            .post("api/login", { email, password })
            .then((res) => {
                if (res.data.status == 401) {
                    alert(res.data.message);
                    return;
                }
                const { token, user } = res.data;
                sessionStorage.setItem("token", token);
                sessionStorage.setItem("user", JSON.stringify(user));
                alert("Login Successfull");
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
            });
    };

    const Register = (data) => {
        const { name, email, password } = data;
        axios
            .post("api/register", { name, email, password })
            .then((data) => {
                route.push({ name: "Login" });
            })
            .catch((error) => {
                errors.value = error.response.data.errors;
                
            });
    };

    const GetCurrentUser = () => {
        return user.value;
    };

    const GetToken = () => {
        return token.value;
    };

    return {
        Login,
        Register,
        GetCurrentUser,
        GetToken,
        errors,
    };
};

export default useAuth;
