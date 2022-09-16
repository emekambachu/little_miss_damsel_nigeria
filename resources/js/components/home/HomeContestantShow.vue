<template>
    <div class="ttm-page-title-row text-center">
        <div class="title-box text-center">
            <div class="container">
                <div class="page-title-heading">
                    <h1 class="title">{{ contestant.name }}</h1>
                </div>
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <span>
                            <a title="Contestants" :href="'/'">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;Contestants</a>
                        </span>
                        <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                        <span><a title="Contestants" href="">
                                    <i class="fa fa-star"></i>&nbsp;&nbsp;{{ contestant.name }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ttm-row portfolio-section clearfix ttm-bgcolor-dark-grey">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="ttm-pf-single-content-wrapper-innerbox ttm-pf-view-left-image">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="ttm_single_image_wrapper">
                                    <img class="img-fluid" :src="'/photos/'+contestant.image" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 ttm-single-content-wrap-box res-991-mlr-15">
                                <div class="ttm-pf-single-detail-box text-left">
                                    <div class="row ttm-pf-detailbox">

                                        <div class="col-12">
                                            <h4 class="text-purple">Payment Methods: (50 Naira per Vote)</h4>
                                            <p>
                                                <strong>Select mode of payment</strong><br>
                                                <strong>1) Pay online with your card</strong><br>
                                                <strong>2) Pay directly to bank and fill in your details</strong>
                                            </p>
                                            <button :disabled="loading" @click.prevent="paymentMethodOnline"
                                                    class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skin mr-1">
                                                Pay Online
                                            </button>
                                            <button :disabled="loading" @click.prevent="paymentMethodBank"
                                                    class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor">
                                                Pay to Bank
                                            </button>
                                        </div>

                                        <div class="p-3" v-if="payment_method.online">
                                            <p class="text-danger" v-for="(error, index) in errors" :key="index">
                                                {{ error.toString() }}
                                            </p>
                                            <img class="text-center" :src="'/main/paystack_logo.png'" width="150"/>
                                            <form v-if="!loading" @submit.prevent="payOnline"
                                                  class="row contactform wrap-form clearfix">
                                                <label class="col-md-12">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input"
                                                               v-model="form_paystack.name"
                                                               type="text" placeholder="Full Name*"
                                                               required="required"></span>
                                                </label>
                                                <label class="col-md-12">
                                                    <i class="ti ti-email"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" v-model="form_paystack.email"
                                                               type="email" placeholder="Your email*"
                                                               required="required"></span>
                                                </label>
                                                <label class="col-md-12">
                                                    <i class="ti ti-star"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" minlength="4"
                                                               v-model="form_paystack.quantity" type="number"
                                                               placeholder="Votes (Minimum 4)*"
                                                               required="required"></span>
                                                </label>
                                                <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mb-15" id="submit" title="Submit">
                                            </form>
                                            <p v-else class="text-center fa fa-circle-o-notch fa-spin fa-3x"></p>
                                        </div>

                                        <div class="p-3" v-if="payment_method.bank">
                                            <p class="text-danger" v-for="(error, index) in errors" :key="index">
                                                {{ error.toString() }}
                                            </p>
                                            <p>
                                                <strong>
                                                    Pay to our bank account first, then fill in your details below.<br>
                                                    The votes would be added upon payment approval
                                                </strong><br><br>

                                                <strong>Pay to the account details below</strong><br>
                                                <strong>Account Name:</strong> Little Miss Damsel Nigeria<br>
                                                <strong>Account number:</strong> 0432091606<br>
                                                <strong>Bank:</strong> GT Bank<br><br>

                                                <strong>Voting reflects after 4 hours</strong>
                                            </p>
                                            <p class="p-2 bg-success text-white" v-if="success_message !== ''">
                                                {{ success_message }}
                                            </p>
                                            <form v-if="!loading" @submit.prevent="payBank" class="row contactform wrap-form clearfix">
                                                <label class="col-md-6 col-sm-12">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" v-model="form_bank.name"
                                                               type="text" placeholder="Bank account name*"
                                                               required="required"></span>
                                                </label>


                                                <label class="col-md-12">
                                                    <i class="ti ti-user"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input"
                                                               v-model="form_bank.bank"
                                                               type="text" placeholder="Bank Name*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-12">
                                                    <i class="ti ti-email"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input"
                                                               v-model="form_bank.email"
                                                               type="email" placeholder="Your email*"
                                                               required="required"></span>
                                                </label>

                                                <label class="col-md-12">
                                                    <i class="ti ti-star"></i>
                                                    <span class="ttm-form-control">
                                                        <input class="text-input" minlength="4"
                                                               v-model="form_bank.quantity" type="number"
                                                               placeholder="Votes*"
                                                               required="required"></span>
                                                </label>

                                                <div class="col-md-12">
                                                    <input name="submit" type="submit" value="Submit" class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-10" id="submit" title="Submit">
                                                </div>
                                            </form>
                                            <p v-else class="text-center fa fa-circle-o-notch fa-spin fa-3x"></p>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        contestant: Object,
        reference: null
    },
    data() {
        return {
            payment_method: {
                bank: false,
                online: false,
            },
            form_paystack:{
                name:'',
                email: '',
                quantity: '',
                payment_method: 'card',
                contestant_id: this.contestant.id,
            },

            form_bank:{
                name: '',
                bank: '',
                email: '',
                quantity: '',
                payment_method: 'bank',
                contestant_id: this.contestant.id,
            },
            errors: [],
            loading: false,
            bank_payment_complete: false,
            success_message: '',
        }
    },
    methods: {
        paymentMethodOnline(){
            if(this.payment_method.online === false){
                this.payment_method.online = true;
                this.payment_method.bank = false;
            }
        },

        paymentMethodBank(){
            if(this.payment_method.bank === false){
                this.payment_method.bank = true;
                this.payment_method.online = false;
            }
        },

        payOnline(){
            this.loading = true;
            axios.post('/api/home/contestants/'+this.contestant.slug+'/payment/online', this.form_paystack)
                .then((response) => {
                    if(response.data.success === true){
                        this.errors = [];
                        this.loading = false;
                        window.location.href = '/payments/contestant/'+this.contestant.slug+'/paystack';
                    }else{
                        this.errors = response.data.errors;
                    }
                }).catch((error) => {
                    console.log(error);
                });
        },

        payBank(){
            this.loading = true;
            axios.post('/api/home/contestants/'+this.contestant.slug+'/payment/bank', this.form_bank)
                .then((response) => {
                    if(response.data.success === true){
                        // Empty fields
                        this.form_bank['name'] = '';
                        this.form_bank['email'] = '';
                        this.form_bank['quantity'] = '';
                        this.form_bank['bank'] = '';
                        this.loading = false;
                        this.success_message = response.data.success_message;
                    }
                }).catch((error) => {
                console.log(error);
            });
        },

    },

    mounted() {

    }
}
</script>

<style scoped>

</style>
