<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                       
                       <div class="row">
                           <div class="col col-6 offset-3">
                                <div class="input-group">
                    
                                    <input type="text" class="form-control" v-model="search" name="title" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" v-on:click="searchVideos">Buscar</button>
                                
                                </div>
                            </div>
                       </div>
                        
                        <div class="row mt-2">
                        
                            <div class="col-6 col-lg-4 mt-2" v-for="video in videos" v-bind:key="video.id">
                                
                                <a class="linkVideo" :href="'/video/'+video.id">
                                    <div class="card" id="cardVideo">
                                        <div class="card-header">{{video.title}}</div>

                                        <div class="card-body d-flex justify-content-center">
                                            <img src="img/video.png">
                                        </div>
                                    </div>
                                </a>
                            
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                videos: [],
                search: ""
            }
        },
        created(){
            console.log(this.search);
            this.searchVideos();
        },
        methods: {
            video(){
                return 1;
            },
            searchVideos(){
                axios.get(`/allvideos/${this.search}`)
                .then(response => {
                    this.videos = response.data;
                });
            }
        }
    }
</script>
