<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.

                        {{ data }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mydata: []
            }
        },

        mounted() {
            console.log('Component mounted.'),
            this.loadData()
        },

        loadData() {
            axios.get('/dashboard/project/3')
            .then((response) => {
                console.log(response.data)
            })
            .catch((error) => {
                console.log(error)
            });


        }
    }
</script>
