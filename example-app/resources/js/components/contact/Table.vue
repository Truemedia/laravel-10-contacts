<script src="./table.js"></script>
<template>
    <table>
        <!-- Head -->
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>
        </thead>
        <!-- Body -->
        <tbody>
            <tr v-for="contact in currentPageResults" :key="contact.id">
                <td>{{ contact.firstName }}</td>
                <td>{{ contact.lastName }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.telephone }}</td>
            </tr>
        </tbody>
        <!-- Foot -->
        <tfoot>
            <tr>
                <td>
                    <ul>
                        <li v-for="pageNumber in pageNumbers" :key="pageNumber">
                            <span @click="goto(pageNumber)">{{ pageNumber }}</span>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Results count: {{ totalResults }}</td>
            </tr>
        </tfoot>
    </table>
</template>