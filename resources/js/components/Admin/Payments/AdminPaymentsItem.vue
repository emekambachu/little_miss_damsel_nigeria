<template>
    <tr v-if="!deleted">
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
            Status: {{ payment.status === 1? 'Complete' : 'Pending' }}
        </td>
        <td>
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
    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
