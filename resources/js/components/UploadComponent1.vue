<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
             
                <input hidden id="video" ref="file" type="file" class="form-control" name="video" v-on:change="loadFile()">
                
                <div v-bind:class="{dropzoneover : isDropZoneOver, dropzoneleave: isDropZoneLeave}" @drop="dragFile" v-on:click="select" @dragover="dragover" @dragleave="dragleave" @dragover.prevent @drop.prevent>
                    <strong class="d-flex align-items-start justify-content-center">Haga click o arraste el video hasta aqui</strong>
                    
                    <img src="img/upload.png" >
                    
                </div>
                
                <div class="alert alert-danger mt-2" role="alert" v-show="existError">
                    <strong>{{message}}</strong>
                </div>
                <div class="alert alert-success mt-2" role="alert" v-show="validate">
                    <strong>El archivo se ha validado exitosamente</strong>
                </div>
                  
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                message: "",
                existError: false,
                file: "",
                validate: false,
                isDropZoneOver: false,
                isDropZoneLeave : true
            }
        },
        mounted(){
            this.$emit('validate',false)
        },
        methods: {
            dragover(){
                this.isDropZoneOver = true;
                this.isDropZoneLeave = false;
            },
            dragleave(){
                this.isDropZoneOver = false;
                this.isDropZoneLeave = true;
            },
            dragFile(file){
                this.dragleave();
                this.isActive = false;
                this.file = file.dataTransfer.files[0];
                this.$emit('validate',false);
                this.validateVideo();
            }, 
            select(){
                this.$refs.file.click();
            },
            validateVideo(){
                this.existError = false;
                this.validate = false;

                let formData = new FormData();
                formData.append('video',this.file)

                const headers = { 'Content-Type': 'multipart/form-data' };

                axios.post('/validatevideo', formData, {headers})
                .then(() => {
                    this.validate = true;
                    this.$emit('validate',true);
                    this.$emit('getFile',this.file);
                })
                .catch((error) => {
                    this.$emit('validate',false);
                    this.existError = true;
                    this.message = error.response.data.message;
                });
            },
            loadFile(){
                this.file = this.$refs.file.files[0];
                this.validateVideo();
            },
        }
    }
</script>
