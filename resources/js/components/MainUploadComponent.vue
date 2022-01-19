<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Subir Video</div>

                    <div class="card-body">
                        
                        <upload-component1 v-if="step == 1" v-on:getFile="saveFile" v-on:validate="step1Validated"></upload-component1>
                        <upload-component2 v-if="step == 2" v-on:getInfo="saveInfo" v-on:validate="step2Validated"></upload-component2>
                        <upload-component3 v-if="step == 3" v-bind:title="title" v-bind:description="description" v-bind:file="file" v-on:uploaded="uploaded"></upload-component3>
                        
                        <div class="d-flex">
                            <button type="button" class="btn btn-success mt-2" v-on:click="previousStep" v-show="step==2 || step==3 && loaded == false">Anterior</button>
                            <button type="button" class="btn btn-success mt-2 ms-auto" v-on:click="nextStep" v-show="step==1 && validateStep1 || step==2 && validateStep2">Siguiente</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UploadComponent1 from './UploadComponent1';
    import UploadComponent2 from './UploadComponent2';
    import UploadComponent3 from './UploadComponent3';

    export default {
        components: {
            UploadComponent1,
            UploadComponent2,
            UploadComponent3
        },
        data(){
            return{
                loaded: false,
                title: "",
                description: "",
                file: "",
                step: 1,
                validateStep1: false,
                validateStep2: false
            }
        },
        methods: {
            loadFile(){
                this.file = this.$refs.file.files[0];
            },
            uploaded(){
                this.loaded = true;
            },
            nextStep(){
                this.step++;
            },
            previousStep(){
                this.step--;
            },
            saveFile(file){
                this.file = file;
            },
            step1Validated(value){
                this.validateStep1 = value;
            },
            step2Validated(value){
                this.validateStep2 = value;
            },
            saveInfo(title,description){
                this.title = title;
                this.description = description;
            }
        }
    }
</script>
