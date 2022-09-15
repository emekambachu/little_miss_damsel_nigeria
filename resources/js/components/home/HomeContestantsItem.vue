<template>
    <div class="col-md-6 col-lg-4 mb-30">
        <!-- featured-imagebox -->
        <div class="featured-imagebox ttm-box-view-top-image featured-imagebox-post-details">
            <div class="featured-thumbnail">
                <img class="img-fluid" :src="'/photos/'+user.image" alt="img">
            </div>
            <div class="featured-bottom-content text-left position-relative">
                <div class="ttm-box-post-date shape-rounded" style="background-color: #13071F;">
                    <span class="ttm-entry-date">
                        <time style="font-size: 17px;" class="entry-date">{{ user.contestant_votes }}<br>
                            <span style="font-size: 10px;">Vote(s)</span>
                        </time>
                    </span>
                </div>
                <div class="featured-title">
                    <h5>
                        <a style="color: #AF0558;"
                           :href="'/contestant/'+user.slug+'/show'">{{ user.name }}</a>
                    </h5>
                </div>
                <div class="post-desc-footer">
                    <a style="color: #AF0558;"
                       class="ttm-btn btn-inline ttm-icon-btn-right ttm-btncolor-black"
                       :href="'/contestant/'+user.slug+'/show'">
                        Vote<i class="ti ti-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div><!-- featured-imagebox -->
    </div>
</template>

<script>
import moment from "moment";

export default {
    props: {
        user: Object
    },
    data() {
        return {
            deleted: false,
        }
    },
    methods: {

    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
