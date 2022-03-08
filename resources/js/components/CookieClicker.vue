<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cookie Clicker</div>

                    <div class="card-body">
                        <p>Current Score is: {{ score_object }}</p>
                        <a href="javascript:;"  class="btn btn-md btn-primary" @click="incrementScore" >Score</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['score'],
        data() {
            return {
                score_object: this.score
            }
        },
        methods: {
           incrementScore: function() {
               console.log('clicked');
               this.score_object += 1;
               var post_url = '/update-score';
               axios.put(post_url, this.score_object).then(response => {
                   this.score_object = response.data.score;
                   console.log(response.data.score);
               }).catch(error => {
                   console.log(error.response);

               });

           }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
