<template>
    <div class="container">
        <div class="row justify-content-center" v-if="uploaded == false">
            
            <div class="col col-2 offset-2">
                Titulo    
            </div>
            <div class="col col-8 card-header">
                {{title}}
            </div>
            <div class="col col-2 offset-2">
                Descripcion    
            </div>
            <div class="col col-8 card-header">
                {{description}}
            </div>
            <div class="col col-2 offset-2">
                Video    
            </div>
            <div class="col col-8 card-header">
                {{file.name}}
            </div>
            <button type="button" class="btn btn-primary mt-2" v-on:click="upload">Subir</button>
        </div>
        <div class="alert alert-success text-center" v-else>
            <strong>El video se ha subido exitosamente</strong>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'title',
            'description',
            'file'
        ],
        data(){
            return{
                uploaded: false
            }
        },
        methods: {
            upload(){
                this.uploaded = true;
                this.$emit('uploaded');
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('description', this.description);
                formData.append('video', this.file);

                const headers = { 'Content-Type': 'multipart/form-data' };

                axios.post('/upload', formData, {headers});
            }
        }
    }
</script>
