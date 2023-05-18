import Service from './views/services/index.vue'
import Add from './views/services/create.vue'
import Edit from './views/services/edit.vue'
import Register from './views/auth/Register.vue'
import Login from './views/auth/Login.vue'
const routes = [
    { path: '/', component: Service, name: 'Service' },
    { path: '/add', component: Add, name: 'AddService' },
    {
        path: '/edit/:id', component: Edit, name: 'EditService', params: true,
    },
    
    // auth routes
  
     { path: '/register', component: Register, name: 'Register' },
     { path: '/login', component: Login, name: 'Login' },

];

export default routes;