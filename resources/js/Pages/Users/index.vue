<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import UsersTable from "@/Pages/Users/UsersTable.vue";
import Paginate from "vuejs-paginate-next";

export default {
    components: {
        UsersTable,
        AppLayout,
        paginate: Paginate,
    },

    data: () => ({
        users : [
        ]
    }),

    mounted() {
       this.getUsers()
    },

    methods: {
        getUsers(page = 1 ){
            axios.get(`/get-users?page=${page}`).then((data) => {
                this.users = data.data
            })
        },
    },
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" id="users">
                    <UsersTable v-if="users" :users="users.data"/>
                    <paginate
                        class="pagination-details"
                        :page-count="users.last_page"
                        :page-range="3"
                        :margin-pages="2"
                        :click-handler="getUsers"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :container-class="'pagination'"
                        :page-class="'page-item'"
                    >
                    </paginate>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style lang="css">
@import "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css";
</style>
