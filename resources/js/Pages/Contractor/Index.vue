<template>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Инн</th>

            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действие</th>
        </tr>
        </thead>
        <tbody v-for="contractor in contractors" class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{contractor.name}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{contractor.email}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{contractor.inn}}</td>

            <td class="px-6 py-4 whitespace-nowrap">
                <Link :href="route('edit', contractor.id)"><button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Изменить</button></Link>

                <button @click.prevent="deleteContractor(contractor.id)" class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Удалить</button>
            </td>
        </tr>

        </tbody>
    </table>

    <td class="px-6 py-4 whitespace-nowrap">
        <Link :href="route('create')"><button class="px-4 py-2 font-medium text-white bg-green-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Добавить</button></Link>

    </td>


</template>

<style scoped>

</style>


<script>
import {Link} from "@inertiajs/vue3";


export default {
    components: {
        Link
    },

    mounted() {
        this.getContractors()
    },

    name: "Index",

    data() {
        return {
            contractors: '',
            pagination: [],
        }
    },

    methods: {
        getContractors() {
            axios.get('api/contractors').then(res => {
                this.contractors = res.data.data
                this.pagination = res.data.meta
            })
        },
        deleteContractor(id) {
            axios.delete(`api/contractors/${id}`)
                .then(res => {
                    this.contractors = res.data.data
                })
        },
    },

}
</script>

