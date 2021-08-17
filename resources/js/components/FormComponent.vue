<template>
    <div class="container">
        <div class="w-full max-w-xs">
            <form action="#" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submitForm">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                        <input v-model="form.name" type="text" placeholder="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                     focus:outline-none focus:shadow-outline" id="name"
                               name="name">
                        <div class="text-red-500 text-xs" v-if="form.errors.name" v-html="form.errors.name"/>

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <div>
                        <input v-model="form.email" type="text" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                     focus:outline-none focus:shadow-outline" id="email"
                               name="email">
                        <div class="text-red-500 text-xs" v-if="form.errors.email" v-html="form.errors.email"/>
                    </div>

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone
                    </label>
                    <div>
                        <input v-model="form.phone" type="text" placeholder="Phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                     focus:outline-none focus:shadow-outline" id="phone"
                               name="phone">
                        <div  class="text-red-500 text-xs" v-if="form.errors.phone" v-html="form.errors.phone"/>
                    </div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Message
                    </label>
                    <div>
                        <textarea v-model="form.msg" type="text" placeholder="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                     focus:outline-none focus:shadow-outline" id="message"
                                  name="msg"></textarea>
                        <div  class="text-red-500 text-xs" v-if="form.errors.msg" v-html="form.errors.msg"/>

                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                msg: '',
                errors: {},
            }
        }
    },
    methods: {
        submitForm(e) {
            console.log(this.form.name);
            e.preventDefault();
            axios.post('/api/submitForm', {
                name: this.form.name,
                email: this.form.email,
                phone: this.form.phone,
                msg: this.form.msg,
            })
                .then((response) => {
                    this.form.errors = {};
                })
                .catch((error) => {
                    console.log(this);
                    let errors = {};
                    $.each(error.response.data, function (index, value) {
                        if(index === 'name' || index ==='email' || index === 'phone' || index === 'msg'){
                            errors[index] = value.toString();
                        }
                    })
                    this.form.errors = errors;
                });
        },
    }
}
</script>
