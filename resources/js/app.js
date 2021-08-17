
require('./bootstrap');

window.Vue = require('vue');

//Import v-from
import { Form,HasError} from 'vform'
window.Form = Form;

//component
Vue.component('form-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app',
});
