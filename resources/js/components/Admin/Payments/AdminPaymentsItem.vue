<template>
    <tr>
        <td>
            Name: {{ payment.contestant.name }}
        </td>
        <td>
            Name: {{ payment.name }}<br>
            Email: {{ payment.email }}<br>
            Bank: {{ payment.bank }}<br>
            Payment_method: {{ payment.payment_method }}<br>
        </td>
        <td>
            Votes: {{ payment.quantity }}<br>
            Amount: {{ payment.amount }}<br>
        </td>
        <td>
            Status: <span class="p-1 bg-success text-white" v-if="payment_status === 1">Confirmed</span>
            <span class="p-1 bg-danger text-white" v-else>Pending</span>
        </td>
        <td>
            <button v-if="payment.payment_method === 'bank'"
                    @click="confirmPayment(payment.id)"
                    type="button"
                    class="btn btn-primary mr-2">
                <span v-if="payment_status === 1">
                    Suspend Payment</span>
                <span v-else>Confirm Payment</span>
            </button>
<!--            <button @click="deletePayment(payment.id)"-->
<!--                    type="button"-->
<!--                    class="btn btn-danger mr-2">Deleted</button>-->
        </td>
    </tr>
</template>

<script>

import moment from 'moment';

export default {
    props: {
        payment: Object
    },
    data() {
        return {
            deleted: false,
            payment_status: this.payment.status,
        }
    },
    methods: {
        fullDate(value) {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        },

        deletePayment(id) {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>" + this.payment.email + "s</span> records</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Loading
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'Deleting',// add html attribute if you want or remove
                        allowOutsideClick: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    });
                    axios.delete('/api/admin/payments/' + id + '/delete')
                        .then((response) => {
                            if (response.data.success === true) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 8000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Deleted'
                                });
                                this.deleted = true;
                            }
                        }).catch((error) => {
                        console.log(error);
                    });
                } else if (result.isDenied) {
                    return false;
                }
            });
        },

        confirmPayment(id) {
            // Install sweetalert2 to use
            Swal.fire({
                html: this.payment_status === 1 ? "<h3>Suspend Payment</h3>" : "<h3>Confirm Payment</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Loading
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'Confirming',// add html attribute if you want or remove
                        allowOutsideClick: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    });
                    axios.post('/api/admin/payments/'+ id +'/confirm')
                        .then((response) => {
                            if (response.data.success === true) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 8000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                                Toast.fire({
                                    icon: 'success',
                                    title: this.payment_status === 1 ? 'Payment Confirmed' : 'Payment Suspended',
                                });
                                this.payment_status = response.data.payment.status;
                            }
                        }).catch((error) => {
                            console.log(error);
                        });
                } else if (result.isDenied) {
                    return false;
                }
            });
        },

        paymentLoading(){

        },

        paymentSuccess(){

        }
    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
