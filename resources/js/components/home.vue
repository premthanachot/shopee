<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        This is my homepage.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products:[],
                product:null,
            }
        },
        mounted() {
            this.initialize()
            console.log('initialized')
        },
        methods:{
            initialize(){
                axios.get('api/product')
                    .then(Response => {
                        this.products = Response.data.products
                        console.log(Response.data)
                    })
                    .catch(error => {
                        console.log('Error')
                    })
            },
        }
    }
</script>
