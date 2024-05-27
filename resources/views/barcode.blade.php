 <!DOCTYPE html>
<html>
<head>
    <script src="{{asset('extend/vue.txt')}}"></script>
    <script src="{{asset('extend/router.txt')}}"></script>
    <title>How to Generate Bar Code in Laravel? - codingspoint.com</title>
</head>
<style>
    #qrcode {
  width:160px;
  height:160px;
  margin-top:15px;
}
</style>
<body>
   
<div id="app">
       <input v-model="surname" placeholder="name">
       <input v-model="name" placeholder="surname">
       <p v-text="message"> </p>
       <button @click="red">open</button>\
       <pre style="display: flex;flex-direction: column; gap:10px;">
            <img style="width:300px;height:100px"  :src="codes" class='img'>
       </pre>
       
</div>
<input id="text" type="text" value="https://hogangnono.com" style="width:80%" /><br />
<div id="qrcode"></div>
<script>
        var app = new Vue ({
            el:"#app",
            data:{
                codes: '2awde',
                name:'',
                surname:'',
                message:'', 
                domain_url:window.location.origin + '/',          
            },
            mounted() {

            },
            methods: {
                makeCode () {    

                },

                red() {
                    let form = new FormData();
                    // form.append('name', this.name);
                    // form.append('surname', this.surname);
                    form.append('_token', "{{csrf_token()}}");
                    // console.log(this.name, this.surname);

                    fetch(this.domain_url+'generate-barcode', {
                        method: 'post',
                        body: form
                    })
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.codes = res.code;
                    });
                }
            }     
        })
	</script>
</body>
</html> 