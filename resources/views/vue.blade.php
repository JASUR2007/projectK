<script>
        var app = new Vue ({
            el:"#app",
            data:{
               image:[],
               groups:[],
               types:[],
               pro_recomeds:[],
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
               search_product:'',
               search:'',
               level:0,
               local:'',
               num:2
            },
            mounted(){      
            this.local = localStorage.getItem('currency')
            this.level =  localStorage.getItem('level');
            fetch(this.vallet)
              .then( p => p.json())
              .then( data=>{
                      console.log(data[23])
                      console.log(data[18])
                }            
            )
            fetch(this.domain_url + 'api/group')
                .then( gr => gr.json())
                .then( resp =>{
                  this.gif = false
                  this.groups = resp.group
                  console.log(this.groups)
                }            
              )
              fetch(this.domain_url + 'api/type') 
              .then( p => p.json())
              .then( resp =>{
                this.gif = false
                this.types = resp.type
                console.log(this.types) 
                }            
              )            
            },
            methods:{
              addsearch() {
                alert('aoskdaoks')
                  let formdata = new FormData()
                  formdata.append('search_product',this.search_product)
                  formdata.append('_token',this.token)

                  fetch(this.domain_url + 'api/add-searching',{
                      body:formdata,
                      method:'POST',
                  })
                  .then(add => add.json())
                  .then(res => {
                      if (res.status == "ok") {
                            window.location.href = 'http://kam/api/kid/search';                  
                          }

                          console.log(res)
                  })
              },  
            }
        })
</script>