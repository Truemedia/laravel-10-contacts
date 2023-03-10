import { Form, Field } from 'vee-validate'
    import * as yup from 'yup'
    import axios from 'axios'
    import {StatusCodes} from 'http-status-codes'
    import {useRepo} from 'pinia-orm'
    import Contact from '@/store/models/Contact'

    const contactRepo = useRepo(Contact)

    export default {
        components: {
            Form,
            Field,
        },
        computed: {
            schema() {
                return yup.object({
                    firstName: yup.string().required(),
                    lastName: yup.string().required(),
                    email: yup.string().required().email(),
                    telephone: yup.string().required()
                })
            }
        },
        methods: {
            onSubmit(values, {resetForm}) {
                this.createPersona(values, resetForm)
            },
            async createPersona(values, resetForm) {
                let res = await axios.post('personas', values)
                if (res.status === StatusCodes.CREATED) {
                    let {data} = res
                    contactRepo.save(data.data)
                    resetForm()
                }
            }
        }
    }