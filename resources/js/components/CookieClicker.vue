<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="h3 mb-0 text-gray-800">Cookie Clicker</h1></div>

                    <div class="card-body">
                        <p>Current Score is: {{ score_object }}</p>
                        <a href="javascript:;" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm mb-1" @click="incrementScore" >Score</a>

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

           },

        },
        mounted() {
            console.log('Component mounted.');
        },
        created() {
            window.Echo.channel('channel')
                .listen('.UpdateScore', (e) => {
                    console.log(e);
                    this.score_object = e.score;
                })
        }
    }
</script>
