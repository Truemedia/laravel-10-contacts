import axios from 'axios'
    import {StatusCodes} from 'http-status-codes'
    import {useRepo} from 'pinia-orm'
    import Contact from '@/store/models/Contact'

    const contactRepo = useRepo(Contact)
    const PAGINATION = {
        perPage: 2
    }

    export default {
        mounted() {
            this.upstreamAll()
        },
        data() {
            return {
                pagination: {
                    pageNumber: 1
                }
            }
        },
        methods: {
            async upstreamAll() {
                let res = await axios.get('personas')
                if (res.status === StatusCodes.OK) {
                    let {data} = res
                    contactRepo.save(data.data)
                }
            },
            pageIndexByNumber(number) {
                return this.pageNumbers.findIndex(pageNumber => pageNumber === number)
            },
            offsetByPageNumber(pageNumber) {
                return this.pageIndexByNumber(pageNumber) * this.limit
            },
            pageResults(pageNumber) {
                return this.query.limit(this.limit).offset( this.offsetByPageNumber(pageNumber) ).get()
            },
            goto(pageNumber) {
                this.pagination.pageNumber = pageNumber
            },
            prevPage() {
                if (!this.isFirstPage) {
                    this.pagination.pageNumber--
                }
            },
            nextPage() {
                if (!this.isLastPage) {
                    this.pagination.pageNumber++
                }
            }
        },
        computed: {
            query() {
                return contactRepo.query()
            },
            limit() {
                return PAGINATION.perPage
            },
            offset() {
                return this.offsetByPageNumber(this.pagination.pageNumber)
            },
            list() {
                return this.query.all()
            },
            totalResults() {
                return this.list.length
            },
            currentPageResults() {
                return this.pageResults(this.pagination.pageNumber)
            },
            totalPages() {
                let {totalResults, limit} = this
                return totalResults < limit ? 1 : Math.ceil(totalResults / limit);
            },
            firstPageNumber() {
                let {pageNumbers} = this
                return pageNumbers.shift()
            },
            lastPageNumber() {
                let {pageNumbers} = this
                return pageNumbers.pop()
            },
            pageNumbers() {
                let pageIndexes = Array.from( Array(this.totalPages).keys() )
                pageIndexes.push(pageIndexes.length)
                pageIndexes.shift()
                return pageIndexes
            },
            isFirstPage() {
                return this.pagination.pageNumber === this.firstPageNumber
            },
            isLastPage() {
                return this.pagination.pageNumber === this.lastPageNumber
            }
        }
    }