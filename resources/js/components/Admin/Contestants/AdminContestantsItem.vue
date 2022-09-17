<template>
    <tr v-if="!deleted">
            <td>
                <img :src="'/photos/'+user.image" width="100"/>
            </td>
            <td>
                Name: {{ user.name }}<br>
                Date Created: {{ fullDate(user.created_at) }}
            </td>
            <td>{{ votes }}</td>
            <td>
                <button @click="deleteContestant(user.id)" type="button" class="btn btn-danger mr-2">Delete</button>
                <router-link :to="{ name: 'AdminEditContestant', params: { id: user.id }}">
                    <button type="button" class="btn btn-warning">Edit</button>
                </router-link>
            </td>
    </tr>
</template>

<script>

import moment from 'moment';

export default {
    props: {
        user: Object
    },
    data() {
        return {
            deleted: false,
            votes: 0,
        }
    },
    methods: {
        fullDate(value) {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        },

        getTotalVotes(userVotes){
            let totalVotes = 0;
            for (let i = 0; i < userVotes.length; i++) {
                totalVotes += userVotes[i].quantity;
            }

            // userVotes.forEach((item, index)=>{
            //     totalVotes += item.quantity;
            // });
            return totalVotes;
        },

        deleteContestant(id) {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>" + this.user.name + "s</span> records</h3>",
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
                    axios.delete('/api/admin/contestants/' + id + '/delete')
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

    mounted(){
        if(this.user.completed_payments){
            this.votes = this.getTotalVotes(this.user.completed_payments);
        }

    }
}
</script>

<style scoped>

</style>
