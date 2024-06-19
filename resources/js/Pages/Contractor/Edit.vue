<template>
    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="bg-white shadow-md rounded-md p-6">

                <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Изменить (что-бы то не было)
                </h2>


                <div class="space-y-6">
                    <div>
                        <label for="new-password" class="block text-sm font-medium text-gray-700">Имя</label>
                        <div class="mt-1">
                            <input v-model="name"
                                   class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div v-if="this.$page.props.errors.name" class="text-sm text-red-600">
                                {{ this.$page.props.errors.name }}
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input v-model="email"
                                   class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div v-if="this.$page.props.errors.email" class="text-sm text-red-600">
                                {{ this.$page.props.errors.email }}
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Инн</label>
                        <div class="mt-1">
                            <input v-model="inn"
                                   class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div v-if="this.$page.props.errors.inn" class="text-sm text-red-600">
                                {{ this.$page.props.errors.inn }}
                            </div>
                        </div>
                    </div>

                    <div>
                        <a class="block w-1/4 py-2 bg-sky-500 border border-sky-600 text-black text-center" @click.prevent="update" href="#">Добавить</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{edit_url}}
</template>

<script>
import {Link} from "@inertiajs/vue3";


export default {

    name: "Edit",

    props: [
        'edit_url',
    ],

    mounted() {
        this.getContractor()
    },

    data() {
        return {
            name: '',
            email: '',
            inn: '',
        }
    },

    methods: {
        getContractor() {
            axios.get(this.edit_url).
            then(res => {
                this.name = res.data[0].name
                this.email = res.data[0].email
                this.inn = res.data[0].inn
            })
        },
        update() {
            this.$inertia.patch(this.edit_url, {
                name: this.name,
                email: this.email,
                inn: this.inn
            })
        },

    },

}
</script>

<style scoped>

</style>
