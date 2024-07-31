<script>
export default{
    props: ['payments'],
    data() {
        return {
            searchQuery: ''
        };
    },
    methods: {
        handler (payment) {
            axios.put("/payments/" + payment.id, payment)
        }
    },
}

</script>

<template>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Details</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="payment in payments" :key="payment.id">
            <td>{{ payment.id }}</td>
            <td>{{ payment.login }}</td>
            <td>{{ payment.details }}</td>
            <td>{{ payment.amount }}</td>
            <td>{{ payment.currency }}</td>
            <td>
                <select
                    v-model="payment.status"
                    :disabled="payment.status === 'paid'"
                    @change="handler(payment)">
                    <option value="created">Created</option>
                    <option value="paid">Paid</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</template>
