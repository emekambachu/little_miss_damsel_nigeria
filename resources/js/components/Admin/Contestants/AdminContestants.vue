<template>
    <div class="row mt-2">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Contestants</li>
            </ol>
        </div>

        <div class="col-md-6">
            <h4>Contestants</h4>
            <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <h4 class="card-title">{{ total }}</h4>
                </div>
            </div>
        </div>

        <div class="col-12">

            <form @submit.prevent="searchContestants">
                <div class="form-group">
                    <label class="form-label mt-4">Search</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input v-model="form.term"
                                   type="text" class="form-control" placeholder="search contestant"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit"
                                    id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-12">

            <div v-if="searchActive && dataLoaded" class="card-block">
                <h5 v-if="contestants.length > 0">
                    {{ total }} result(s) for
                    <span v-for="(value, index) in search_values" :key="index">
                        "{{ value }}",</span>
                </h5>
                <h5 v-else>
                    {{ total }} result(s) for
                    <span v-for="(value, index) in search_values" :key="index">
                         "{{ value }}",</span>
                </h5>

                <a class="btn btn-rounded btn-outline-success font-weight-bold mr-1"
                   @click.prevent="getContestants">
                    Back to Contestants</a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Image</th>
                        <th scope="col">bio</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <template v-if="dataLoaded">
                    <admin-contestants-item
                        v-for="user in contestants.data"
                        :key="user.id"
                        :user="user"
                    ></admin-contestants-item>
                </template>

                <tr v-else>
                    <td colspan="4">
                        <content-loader
                            :animate="true"
                            :speed="2"
                            width={1500}
                            height={400}
                            viewBox="0 0 1500 400"
                            backgroundColor="#f3f3f3"
                            foregroundColor="#ecebeb"
                        >
                            <rect x="27" y="139" rx="4" ry="4" width="20" height="20" />
                            <rect x="67" y="140" rx="10" ry="10" width="85" height="19" />
                            <rect x="188" y="141" rx="10" ry="10" width="169" height="19" />
                            <rect x="402" y="140" rx="10" ry="10" width="85" height="19" />
                            <rect x="523" y="141" rx="10" ry="10" width="169" height="19" />
                            <rect x="731" y="139" rx="10" ry="10" width="85" height="19" />
                            <rect x="852" y="138" rx="10" ry="10" width="85" height="19" />
                            <rect x="1424" y="137" rx="10" ry="10" width="68" height="19" />
                            <rect x="26" y="196" rx="4" ry="4" width="20" height="20" />
                            <rect x="66" y="197" rx="10" ry="10" width="85" height="19" />
                            <rect x="187" y="198" rx="10" ry="10" width="169" height="19" />
                            <rect x="401" y="197" rx="10" ry="10" width="85" height="19" />
                            <rect x="522" y="198" rx="10" ry="10" width="169" height="19" />
                            <rect x="730" y="196" rx="10" ry="10" width="85" height="19" />
                            <rect x="851" y="195" rx="10" ry="10" width="85" height="19" />
                            <circle cx="1456" cy="203" r="12" />
                            <rect x="26" y="258" rx="4" ry="4" width="20" height="20" />
                            <rect x="66" y="259" rx="10" ry="10" width="85" height="19" />
                            <rect x="187" y="260" rx="10" ry="10" width="169" height="19" />
                            <rect x="401" y="259" rx="10" ry="10" width="85" height="19" />
                            <rect x="522" y="260" rx="10" ry="10" width="169" height="19" />
                            <rect x="730" y="258" rx="10" ry="10" width="85" height="19" />
                            <rect x="851" y="257" rx="10" ry="10" width="85" height="19" />
                            <circle cx="1456" cy="265" r="12" />
                            <rect x="26" y="316" rx="4" ry="4" width="20" height="20" />
                            <rect x="66" y="317" rx="10" ry="10" width="85" height="19" />
                            <rect x="187" y="318" rx="10" ry="10" width="169" height="19" />
                            <rect x="401" y="317" rx="10" ry="10" width="85" height="19" />
                            <rect x="522" y="318" rx="10" ry="10" width="169" height="19" />
                            <rect x="730" y="316" rx="10" ry="10" width="85" height="19" />
                            <rect x="851" y="315" rx="10" ry="10" width="85" height="19" />
                            <circle cx="1456" cy="323" r="12" />
                            <rect x="26" y="379" rx="4" ry="4" width="20" height="20" />
                            <rect x="66" y="380" rx="10" ry="10" width="85" height="19" />
                            <rect x="187" y="381" rx="10" ry="10" width="169" height="19" />
                            <rect x="401" y="380" rx="10" ry="10" width="85" height="19" />
                            <rect x="522" y="381" rx="10" ry="10" width="169" height="19" />
                            <rect x="730" y="379" rx="10" ry="10" width="85" height="19" />
                            <rect x="851" y="378" rx="10" ry="10" width="85" height="19" />
                            <circle cx="1456" cy="386" r="12" />
                            <rect x="978" y="138" rx="10" ry="10" width="169" height="19" />
                            <rect x="977" y="195" rx="10" ry="10" width="169" height="19" />
                            <rect x="977" y="257" rx="10" ry="10" width="169" height="19" />
                            <rect x="977" y="315" rx="10" ry="10" width="169" height="19" />
                            <rect x="977" y="378" rx="10" ry="10" width="169" height="19" />
                            <rect x="1183" y="139" rx="10" ry="10" width="85" height="19" />
                            <rect x="1182" y="196" rx="10" ry="10" width="85" height="19" />
                            <rect x="1182" y="258" rx="10" ry="10" width="85" height="19" />
                            <rect x="1182" y="316" rx="10" ry="10" width="85" height="19" />
                            <rect x="1182" y="379" rx="10" ry="10" width="85" height="19" />
                            <rect x="1305" y="137" rx="10" ry="10" width="85" height="19" />
                            <rect x="1304" y="194" rx="10" ry="10" width="85" height="19" />
                            <rect x="1304" y="256" rx="10" ry="10" width="85" height="19" />
                            <rect x="1304" y="314" rx="10" ry="10" width="85" height="19" />
                            <rect x="1304" y="377" rx="10" ry="10" width="85" height="19" />
                            <circle cx="37" cy="97" r="11" />
                            <rect x="26" y="23" rx="5" ry="5" width="153" height="30" />
                            <circle cx="1316" cy="88" r="11" />
                            <rect x="1337" y="94" rx="0" ry="0" width="134" height="3" />
                            <circle cx="77" cy="96" r="11" />
                        </content-loader>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <laravel-vue-pagination v-if="!searchActive"
                            class="justify-content-center"
                            :limit="3"
                            :data="contestants"
                            @pagination-change-page="getContestants"
    >
        <template #prev-nav>
            <span>&lt; Previous</span>
        </template>
        <template #next-nav>
            <span>Next &gt;</span>
        </template>
    </laravel-vue-pagination>

    <laravel-vue-pagination v-if="searchActive"
                            class="justify-content-center"
                            :limit="3"
                            :data="contestants"
                            @pagination-change-page="searchContestants"
    >
        <template #prev-nav>
            <span>&lt; Previous</span>
        </template>
        <template #next-nav>
            <span>Next &gt;</span>
        </template>
    </laravel-vue-pagination>

</template>

<script>

import AdminContestantsItem from "./AdminContestantsItem";
import LaravelVuePagination from 'laravel-vue-pagination';
import {
    ContentLoader,
    FacebookLoader,
    CodeLoader,
    BulletListLoader,
    InstagramLoader,
    ListLoader,
} from 'vue-content-loader';

export default {
    components: {
        AdminContestantsItem,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },
    data(){
        return {
            form: {
                term: '',
            },
            contestants: [],
            total: 0,
            dataLoaded: false,
            searchActive: false,
            search_values: []
        }
    },

    methods: {
        getContestants(page = 1){
            this.searchActive = false;
            this.dataLoaded = false;
            axios.get('/api/admin/contestants?page=' + page)
                .then((response) => {
                    if(response.data.success === true){
                        this.contestants = response.data.contestants;
                        this.total = response.data.total;
                        this.dataLoaded = true;
                    }else{
                        console.log(response.data.message);
                        this.dataLoaded = true;
                    }
                    console.log(this.contestants);
                }).catch((error) => {
                    console.log(error);
                });
        },

        searchContestants(page = 1){
            // On submit, make search active, turn on div load and empty current logins array
            this.contestants = [];
            this.searchActive = true;
            this.dataLoaded = false;
            axios.post('/api/admin/contestants/search?page=' + page, this.form)
                .then((response) => {
                    console.log(this.form);
                    if(response.data.success === true){
                        this.contestants = response.data.contestants;
                        this.total = response.data.total;
                        this.search_values = response.data.search_values;
                    }else{
                        console.log(response.data.message);
                    }
                    this.dataLoaded = true;
                    console.log(this.contestants);
                }).catch((error) => {
                    console.log(error);
                });
        },
    },
    mounted(){
        this.getContestants();
    }
}

</script>

<style scoped>

</style>
