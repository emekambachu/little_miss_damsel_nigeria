<template>
    <div class="row">
        <div class="col-12 text-danger text-center">
        <span class=""
              v-for="(error, index) in errors" :key="index">
            {{ error.toString() }}<br>
        </span>
        </div>
    </div>

    <div class="row justify-content-center d-flex">
        <div class="col-md-6">
            <form>
                <fieldset>
                    <div class="form-group">
                        <label class="form-label mt-4">Name</label>
                        <input v-model="form.name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4">Image</label>
                        <input type="file" @change="uploadImage" class="form-control" required>
                        <div v-if="contestant === null && form.image !== null">
                            <img :src="imagePreview" width="100"/>
                            <span @click="form.image = null"
                                  class="pl-1 fa fa-times text-danger"
                                  title="Remove image"></span>
                        </div>
                        <img v-if="contestant !== null && contestant.image"
                             :src="'/photos/'+form.image" width="100" alt=""/>
                        <p v-if="imageErrorMessage !== ''" class="text-center text-danger">
                            {{ imageErrorMessage }}
                        </p>
                    </div>
                    <button v-if="contestant_id === undefined"
                            @click.prevent="submitContestant"
                            type="submit" class="btn btn-primary text-center mt-2">Submit</button>
                    <button v-else
                            @click.prevent="updateContestant"
                            type="submit" class="btn btn-primary text-center mt-2">Update</button>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>
export default {

    data(){
        return{
            // for create form
            form: {
                title: '',
                image: null,
            },
            imagePreview: null,
            validationAlert: '',
            imageErrorMessage: '',
            errors: [],
            contestant_id: null,
            contestant: null,
        }
    },
    methods: {
        uploadImage(event){
            this.validateImage(event);
            //Assign image and path to this variable
            this.form.image = event.target.files[0];
            this.imageErrorMessage = '';
            // create base64 version display of image
            this.imagePreview = URL.createObjectURL(event.target.files[0]);
        },

        validateImage(event){
            // Validate Image
            let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(event.target.files[0].name)){
                this.imageErrorMessage = 'Incorrect image format';
                this.form.image = null;
                return false;
            }
            if(event.target.files[0].size > 5000000){
                this.imageErrorMessage = 'File too large, 5mb max.';
                this.form.image = null;
                return false;
            }
        },

        submitContestant(){

            this.formLoading();
            let formData = new FormData();
            // iterate form object
            let self = this; //you need this because *this* will refer to Object.keys below`
            //Iterate through each object field, key is name of the object field`
            Object.keys(this.form).forEach(function(key) {
                console.log(key); // key
                console.log(self.form[key]); // value
                formData.append(key, self.form[key]);
            });

            let config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            axios.post('/api/admin/contestants/store', formData, config)
                .then((response) => {
                    if(response.data.success === true){
                        this.formSuccess(response);
                        let self = this; //you need this because *this* will refer to Object.keys below`
                        Object.keys(this.form).forEach(function(value) {
                            self.form[value] = '';
                        });
                    }else{
                        this.formError(response);
                    }
                }).catch((error) => {
                    console.log(error);
                });
        },

        populateContestant(id){
            axios.get('/api/admin/contestants/'+id+'/populate')
                .then((response) => {
                    if(response.data.success === true){
                        // populate form object
                        let self = this; //you need this because *this* will refer to Object.keys below`
                        //Iterate through each object field, key is name of the object field`
                        Object.keys(response.data.contestant).forEach(function(key){
                            console.log(key); // key
                            console.log(response.data.contestant[key]); // value
                            self.form[key] = response.data.contestant[key];
                        });
                        this.form['image'] = null;
                    }
                });
        },

        updateContestant(){
            this.formLoading();
            let formData = new FormData();
            // iterate form object
            let self = this; //you need this because *this* will refer to Object.keys below`
            //Iterate through each object field, key is name of the object field`
            Object.keys(this.form).forEach(function(key, value){
                console.log(key); // key
                console.log(self.form[key]); // value
                if(self.form[key] !== null){
                    formData.append(key, self.form[key]);
                }
            });

            formData.append('_method', 'PUT');
            let config = {
                headers: {'content-type': 'multipart/form-data'}
            }

            axios.post('/api/admin/contestants/'+this.contestant_id+'/update', formData, config)
                .then((response) => {
                    if(response.data.success === true){
                        this.formSuccess(response);
                        this.contestant = response.data.contestant;
                    }else{
                        this.formError(response);
                    }

                }).catch((error) => {
                    console.log(error);
                });
        },

        formLoading(){
            // Install sweetalert2 to use
            // Loading
            Swal.fire({
                title: 'Please Wait !',
                html: 'Submitting',// add html attribute if you want or remove
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        },

        formSuccess(response){
            this.errors = [];
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'Submitted'
            });
        },

        formError(response){
            Swal.fire({
                icon: 'error',
                title: 'Error Occurred',
                showConfirmButton: false,
                timer: 2500
            });
            this.errors = response.data.errors;
            console.log(this.errors);
            console.log(response.data.message);
        },

        formEmpty(){
            let self = this; //you need this because *this* will refer to Object.keys below`
            Object.keys(this.form).forEach(function(value) {
                self.form[value] = '';
            });
            this.form['image'] = null;
        }

    },
    mounted() {
        this.contestant_id = this.$route.params.id;
        if(this.contestant_id !== undefined){
            this.populateContestant(this.contestant_id);
        }else{
            this.formEmpty();
        }
    }
}
</script>

<style scoped>

</style>
