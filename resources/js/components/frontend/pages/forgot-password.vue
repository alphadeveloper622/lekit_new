<template>
    <div class="sg-page-content">
        <div class="content-box">
            <div class="content-head-home">
                <div class="top-address left">
                        <div class="container-xl">
                                Forgotten Password
                        </div>
                </div>  		
            </div>
            <br><br>
            <div class="mid-content mt45">
                <div class="row">
                    <div class="col-md-12 signin">
                        <h3 class="blue fw500">Reset your Lekit access:</h3>
                            <div class="row mt40">
                                <div class="col-md-2"><h5 class="blue">Your email:</h5></div>
                                <div class="col-md-10"><input type="text" placeholder="" /></div>
                            </div>
                        <br/>
                        <button class="my_but2">Reset Access</button>
                    </div>
                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
</template>

<script>

export default {
    name: "forgot_password",
    components: {
    },
    data() {
        return {
            form: {
                email: this.$route.params.email,
                newPassword:"",
                confirmPassword:"",
                resetCode: this.$route.params.code
            },
            loading : false,
        }
    },
    mounted(){
        
    },
    methods: {

        submit(){
            this.loading = true;
            let url = this.getUrl('reset-password')
            axios.post(url,this.form).then((response)=>{
                this.loading = false;
                if (response.data.error)
                {

                    toastr.error(response.data.error, this.lang.Error +' !!' );
                }
                if (response.data.success)
                {
                    this.errors = [];
                    this.form.email = ""
                    toastr.success(response.data.success, this.lang.Success +' !!' );
                }
            }).catch((error)=>{
                this.loading = false;
                if (error.response && error.response.status == 422)
                {
                    this.errors = error.response.data.errors;
                }
            })
        },
        createPassword(){
            let url = this.getUrl('create-new-password');
            this.loading = true;
            axios.post(url,this.form).then((response)=>{
                this.loading = false;
                if (response.data.error)
                {
                    toastr.error(response.data.error, this.lang.Error +' !!' );
                }
                if (response.data.success)
                {
                    this.errors = [];
                    toastr.success(response.data.success, this.lang.Success +' !!' );
                    this.$router.push({name: 'login'});
                }
            }).catch((error)=>{
                this.loading = false;
                if (error.response.status == 422)
                {
                    this.errors = error.response.data.errors;
                }
            })
        }

    },
}
</script>
