<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <label for="keyword" class="col-md-4 col-form-label text-md-right">名言</label>
            <div class="col-md-6">
                <input id="keyword" @input="onKeywordInput" type="text" class="form-control " name="keyword" placeholder="人生山あり山あり" autofocus>
            </div>
            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>
            <div class="col-md-6">
                <input id="name" @input="onNameInput" type="text" class="form-control " name="name" placeholder="名無しの偉人" autofocus>
            </div>
            <div class="col-md-8 offset-md-4">
                <button v-on:click="postText" class="btn btn-primary">
                    作成
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div id="preview">
                <p class="keyword">{{keyword}}</p>
                <p class="name">{{name}}</p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import html2canvas from 'html2canvas'; 
    export default {
        data () {
            return {
                name: "",
                keyword: ""
            }
        },
        methods: {

            //名前入力されたらプレビューに反映
            onNameInput: function (event){
                if(event.target.value.length == 0){
                    this.name = ''
                }else{
                    this.name = '-' + event.target.value + '-'   
                }
            },

            // キーワードを入力されたらプレビューに反映
            onKeywordInput: function (event){
                this.keyword = event.target.value   
            },

            // 名言作成ボタンを押下
            postText: function (event){

                const msg = this.keyword

                //スクショ撮影
                html2canvas(document.querySelector('#preview')).then(function(canvas) {

                    const base64 = canvas.toDataURL("image/png")
                    console.log(canvas.toDataURL("image/png"))

                    //サーバーへ送信
                    axios
                    .post('/entry',{
                        text: msg,
                        img : base64                        
                    })
                    .then(response => {
                        console.log(response.data)
                        window.location.href = '/content/' + response.data
                    })

                });
            }
        }
    }
</script>
