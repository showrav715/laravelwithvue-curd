import Service from './views/services/index.vue'
import Add from './views/services/create.vue'
import Edit from './views/services/edit.vue'

const routes = [
    { path: '/', component: Service, name: 'Service' },
    { path: '/add', component: Add, name: 'AddService' },
    {
        path: '/edit/:id', component: Edit, name: 'EditService', params: true,
        
    },

];

export default routes;