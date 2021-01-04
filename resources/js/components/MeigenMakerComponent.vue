<template>
<div class="container">
    <div class="row p-3 justify-content-center">
        <div class="col-md-6">
            <label for="name" class="col-form-label mr-3">お名前</label>
            <input id="name" @input="onNameInput" type="text" class="form-control" name="name" placeholder="名無しの偉人" autofocus>
        </div>
    </div>
    <div class="row p-3 justify-content-center">
        <div class="col-md-6">
            <label for="keyword" class="col-form-label mr-3">人生の名言</label>
            <input id="keyword" @input="onKeywordInput" type="text" class="form-control" name="keyword" placeholder="人生山あり山あり" autofocus>
        </div>
    </div>
    <div class="row p-3 justify-content-center">
        <div class="col-md-6 text-right">
            <button v-on:click="postText" class="btn btn-primary">
                作成
            </button>
        </div>
    </div>
    <div class="row p-3 justify-content-center">
        <div class="col-md-6">
            <label for="preview" class="col-form-label mr-3">プレビュー</label>
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
