<script>
    import axios from 'axios'
    import {StatusCodes} from 'http-status-codes'
    import {useRepo} from 'pinia-orm'
    import Contact from '@/store/models/Contact'

    const contactRepo = useRepo(Contact)

    export default {
        mounted() {
            this.upstreamAll()
        },
        methods: {
            async upstreamAll() {
                let res = await axios.get('personas')
                if (res.status === StatusCodes.OK) {
                    let {data} = res
                    contactRepo.save(data.data)
                }
            }
        },
        computed: {
            contacts() {
                return contactRepo.query().all()
            }
        }
    }
</script>


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
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.firstName }}</td>
                <td>{{ contact.lastName }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.telephone }}</td>
            </tr>
        </tbody>
    </table>
</template>