<template>
    <div class="row justify-content-center mt-5">

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">Total Contestants</div>
                <div class="card-body">
                    {{ total_contestants }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">Total Payers</div>
                <div class="card-body">
                    {{ total_payers }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">Sum Votes</div>
                <div class="card-body">
                    ₦{{ sum_votes }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">Sum Completed Payments</div>
                <div class="card-body">
                    ₦{{ sum_completed_payments }}
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            total_contestants: 0,
            total_payers: 0,
            sum_votes: 0,
            sum_completed_payments: 0,
        }
    },
    methods: {
        getStats(){
            axios.get('/api/admin/stats')
                .then((response) => {
                    if(response.data.success === true){
                        this.total_contestants = response.data.total_contestants;
                        this.total_payers = response.data.total_payers;
                        this.sum_votes = response.data.sum_votes;
                        this.sum_completed_payments = response.data.sum_completed_payments;
                    }else{
                        console.log(response.data.message);
                    }
                }).catch((error) => {
                    console.log(error);
                });
        },
    },
    mounted(){
        this.getStats();
    }
}
</script>

<style scoped>

</style>
