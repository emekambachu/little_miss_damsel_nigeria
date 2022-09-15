<template>
    <div class="ttm-page-title-row text-center">
        <div class="title-box text-center">
            <div class="container">
                <div class="page-title-heading">
                    <h1 class="title">Contestants</h1>
                </div>
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <span>
                            <a title="Homepage" href="/">
                            <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
                        </span>
                        <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                        <span class="ttm-textcolor-white">Contestants</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ttm-row upcoming-event-section">
        <div class="container">

            <div class="row">
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
                </div>
                <form @submit.prevent="searchContestants"
                      class="contactform wrap-form clearfix text-center" novalidate="novalidate">
                    <label class="col-md-8">
                        <i class="ti ti-user"></i>
                        <span class="ttm-form-control">
                                <input class="text-input" v-model="form.term" type="text"
                                       placeholder="Search Contestants" required="required"></span>
                    </label>

                    <input name="submit" type="submit" value="Search"
                           class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20 mb-20"
                           id="submit" title="Search">
                </form>
            </div>

            <div class="row">
                <template v-if="dataLoaded">
                    <home-contestants-item
                        v-for="user in contestants.data"
                        :key="user.id"
                        :user="user"
                    ></home-contestants-item>
                </template>

                <ContentLoader v-else
                   width={800}
                   height={575}
                   viewBox="0 0 800 575"
                   backgroundColor="#f3f3f3"
                   foregroundColor="#ecebeb"
                >
                    <rect x="537" y="9" rx="2" ry="2" width="140" height="10" />
                    <rect x="14" y="30" rx="2" ry="2" width="667" height="11" />
                    <rect x="12" y="58" rx="2" ry="2" width="211" height="211" />
                    <rect x="240" y="57" rx="2" ry="2" width="211" height="211" />
                    <rect x="467" y="56" rx="2" ry="2" width="211" height="211" />
                    <rect x="12" y="283" rx="2" ry="2" width="211" height="211" />
                    <rect x="240" y="281" rx="2" ry="2" width="211" height="211" />
                    <rect x="468" y="279" rx="2" ry="2" width="211" height="211" />
                    <circle cx="286" cy="536" r="12" />
                    <circle cx="319" cy="535" r="12" />
                    <circle cx="353" cy="535" r="12" />
                    <rect x="378" y="524" rx="0" ry="0" width="52" height="24" />
                    <rect x="210" y="523" rx="0" ry="0" width="52" height="24" />
                    <circle cx="210" cy="535" r="12" />
                    <circle cx="428" cy="536" r="12" />
                </ContentLoader>
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

        </div>
    </section>
</template>

<script>
    import HomeContestantsItem from "./HomeContestantsItem";
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
            HomeContestantsItem,
            LaravelVuePagination,
            ContentLoader,
            BulletListLoader,
            ListLoader,
        },

        data(){
          return {
              form: {
                  name: ''
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
                axios.get('/api/home/contestants?page=' + page)
                    .then((response) => {
                        if(response.data.success === true){
                            this.contestants = response.data.contestants;
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
                axios.post('/api/home/contestants/search?page=' + page, this.form)
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
        mounted() {
            this.getContestants();
        }
    }
</script>

<style scoped>

</style>
