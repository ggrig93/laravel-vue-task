<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PaymentsTable from "@/Pages/Payment/PaymentsTable.vue";
import Paginate from "vuejs-paginate-next";
export default {
    components: {
        PaymentsTable,
        AppLayout,
        paginate: Paginate,
    },

    data: () => ({
        payments : {},
        searchQuery: null
    }),

    mounted() {
        this.getPayments()
    },

    methods: {
        getPayments(page = 1){
            axios.get(`/get-payments?page=${page}&search=${this.searchQuery ?? ''}`).then((data) => {
                this.payments = data.data
            })
        },
    }

}
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Payments
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" id="payment">
                    <div class="search-form">
                        <input type="text" v-model="searchQuery" placeholder="Search by ID, Login or Details" @change="getPayments" />
                    </div>
                    <PaymentsTable v-if="payments" :payments="payments.data"/>

                    <paginate
                        class="pagination-details"
                        :page-count="payments.last_page"
                        :page-range="3"
                        :margin-pages="2"
                        :click-handler="getPayments"
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
