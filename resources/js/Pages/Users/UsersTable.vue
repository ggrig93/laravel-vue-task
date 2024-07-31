<script>

export default{
    props: ['users'],
}

</script>

<template>
    <table>
        <thead>
        <tr>
            <th>Login</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="users in users" :key="users.id">
            <td>{{ users.login }}</td>
            <td>{{ users.balance }}</td>
        </tr>
        </tbody>
    </table>
</template>

