
<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Карта сайта</title>
@include('head-site')
</head>
<body class="information-sitemap">
<div id="app">
@include('header-site')
<div class="container">
  <ul class="breadcrumb">
        <li><a  :href="domain_url + 'api'"><i class="fa fa-home"></i></a></li>
        <li><a  :href="domain_url + 'api/sitemap'">Карта сайта</a></li>
      </ul>
  <div class="row">                
    <div id="content" class="col-sm-12">     
         <h1>Карта сайта</h1>
            <div class="row">
                <div class="col-sm-6">
                    <ul v-for='type of types'>
                        <li>
                            <a :href="domain_url + 'api/kid/' + type.url_url" v-text='type.gender'></a>
                            <ul>
                                <li v-for='groups of groups' v-if='type.gender == groups.group_id'>
                                    <a :href="domain_url + 'api/kid/' +  type.url_url + '/' + groups.url" v-text='groups.namin'></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul>
                        <li>
                         <a :href="domain_url + 'api/special'">Товары со скидкой</a>
                        </li>
                        <li>
                         <a :href="domain_url + 'api/cart'">Корзина покупок</a>
                        </li>
                        <li>
                         <a :href="domain_url + 'api/cart'">Оформление заказа</a>
                        </li>
                        <li>
                          <a :href="domain_url + 'search-product'">Поиск</a>
                       </li>
                        <li>
                            Информация  
                            <ul>
                                <li>
                                    <a :href="domain_url + 'api/about-us'">О компании</a>
                                </li>
                                <li>
                                    <a :href="domain_url + 'api/delivery'">Информация о доставке</a>
                                </li>
                                <li>
                                    <a :href="domain_url + 'api/privacy'"> Правила Конфиденциальности</a>
                                </li>
                                <li>
                                    <a :href="domain_url + 'api/privacy'">Правила и условия</a>
                                </li>
                                <li>
                                    <a :href="domain_url + 'api/terms'">Связаться с нами</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
      </div>
    </div>
</div>
 @include('footer-site')
</div>
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
              addsearch(){
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
</body>
</html>