<template>
    <div class="container">
        <button type="button" class="btn btn-success rounded-pill " v-on:click="pushLike">
            なるほど！<span class="badge badge-success badge-light">{{likeCnt}}</span>
        </button>
    </div>
</template>

<script>
    export default {
        props : ['postId','likeCnt'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            pushLike: function (event){

                console.log(this.postId)
                                    //サーバーへ送信
                axios
                .post('/content',{
                    post_id: this.postId,
                })
                .then(response => {
                    console.log(response.data)
                    this.likeCnt += 1
                })

            }
        }
    }
</script>
