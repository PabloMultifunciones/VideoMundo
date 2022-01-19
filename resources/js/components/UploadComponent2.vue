<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <form>

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Titulo</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" v-model="title">
                                    
                        <div class="alert alert-danger mt-1" role="alert" v-show="titleError">
                            <strong>{{titleErrorMessage}}</strong>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Descripcion</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control" name="description" v-model="description">
                    
                        <div class="alert alert-danger mt-1" role="alert" v-show="descriptionError">
                            <strong>{{descriptionErrorMessage}}</strong>
                        </div>
                    </div>
                </div>
            </form>
            
            <button type="button" class="btn btn-primary" v-on:click="validateInfo">Guardar</button>
            
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                title: "",
                description: "",
                titleError: false,
                descriptionError: false,
                titleErrorMessage: "",
                descriptionErrorMessage: ""
            }
        },
        mounted(){
            this.$emit('validate',false)
        },
        methods: {
            validateInfo(){
                this.existError = false;

                let formData = new FormData();
                formData.append('title',this.title);
                formData.append('description',this.description);

                axios.post('/validateinfo', formData)
                .then((result) => {
                    this.$emit('validate',true);
                    this.$emit('getInfo',this.title,this.description);
                    if(result.status == 200){
                        this.titleError = false;
                        this.descriptionError = false;
                    }
                })
                .catch((error) => {
                    if(error.response.data.errors.title){
                        this.titleError = true;
                        this.titleErrorMessage = error.response.data.errors.title[0];
                    }
                     if(error.response.data.errors.description){
                        this.descriptionError = true;
                        this.descriptionErrorMessage = error.response.data.errors.description[0];
                    }
                    this.$emit('validate',false);
                    this.existError = true;
                    this.message = error.response.data.message;
                });
            }
        }
    }
</script>
