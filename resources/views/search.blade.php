<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Поисковик</title>
    @include('head-site')
    <style>
        .desc{
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          width: 30%;
        }
        .notcategory{
          display: none;
        }
        .notcategory.activate{
          display: block;
        }
    </style>
</head>
<body class="product-search">
@include('header-site')
<div id="app">
<div class="container">
  <ul class="breadcrumb">
        <li><a :href="domain_url + 'api'"><i class="fa fa-home"></i></a></li>
        <li><a :href="domain_url + 'api/kid/search'">Поиск</a></li>
      </ul>
  <div class="row">
    <div id="content" class="col-sm-12">    
      <h1>        
        Поиск - <span  v-text='search_pro'></span>
     </h1>
      <label class="control-label" for="input-search">Критерии поиска</label>
      <div class="row">
        <div class="col-sm-4">
          <input type="text" name="search" value="" placeholder="Ключевые слова" id="input-search" class="form-control" v-model='search_pro'/>
        </div>
        <div class="col-sm-3">
          <select class="form-control" @change='gender($event)'>
          <option selected>По умолчанию</option>
          <optgroup v-for='type of types' :label='type.gender'>
              <option v-for='groups of groups' v-if='type.gender == groups.group_id' v-text="groups.namin"></option>
          </optgroup>
        </select>
        </div>
      </div>
      <p>
        <label class="checkbox-inline" style="padding:0px">
          <input type="checkbox" class='desc' name="description" id="description" @change = 'clicked($event)'/>
          <span style="margin-left: 15px;">Искать в описании товара</span>   
        </label>
      </p>
        <h2>Товары, соответствующие критериям поиска</h2>
        <p class="notcategory">Нет товаров, соответствующих критериям поиска.</p>
            <p><a :href="domain_url + 'api/cart'" id="compare-total">Сравнение товаров (0)</a></p>
      <div class="row" style="display:flex;align-items:center">
        <div class="col-sm-3 hidden-xs">
          <div class="btn-group">
            <button type="button"  id="list-view" class="btn btn-default" data-toggle="tooltip" title="Список"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Сетка"><i class="fa fa-th"></i></button>
          </div>
        </div>
        <div class="col-sm-1 col-sm-offset-2 text-right">
          <label class="control-label" for="input-sort">Сортировать:</label>
        </div>
        <div class="col-sm-3 text-right">
        <select id="input-sort" class="form-control" @change='filterchange($event)'>
                      <option :value="'id' +'&byin=asc'" selected="selected">По умолчанию</option>
                      <option :value="'product_name' +'&byin=asc'">По Имени (A - Я)</option>
                      <option :value="'product_name' + '&byin=desc'">По Имени (Я - A)</option>
                      <option :value="'price' + '&byin=asc'">По Цене (возрастанию)</option>
                      <option :value="'price' + '&byin=desc'">По Цене (убыванию)</option>
                      <option :value="'stars' + '&byin=asc'">По Рейтингу (убыванию)</option>
                      <option :value="'stars' + '&byin=desc'">По Рейтингу (возрастанию)</option>
                      <option :value="'product_id' +'&byin=asc'">По Модели (A - Я)</option>
                      <option :value="'product_id' +'&byin=desc'">По Модели (Я - A)</option>
                    </select>
        </div>
        </div>
      <br />
       <div class="row">    
          <div  v-if='products.length == 0'>
          </div>
           <div v-else class="product-layout product-list col-xs-12" v-for = 'products of searcher'>
              <div class="product-thumb"> 
                <div class="image" style="display: flex;justify-content:center">
                  <a  :href="domain_url + 'api/kid/' + products.url_url + '/' + products.url + '/' +  products.id">
                    <div class='d-flex' v-for='img of  JSON.parse(products.img)' style="color:grey;height:200px;width:200px">
                      <img  :src="domain_url + '/storage/' + img.image[0]"   alt="" style="color:grey;height:200px;width:200px">
                    </div>
                  </a>
                </div>
                <div>
                  <div class="caption" style="min-height: 150px;">
                    <h4>
                      <a v-text='products.product_name'></a>
                    </h4>
                    <p class="desc">
                      <span v-if="products.cotton == 'null'"></span>
                      <span v-else v-text="'Ткань:' + products.cotton "></span>
                      <span v-if="products.thread == 'null'"></span>
                      <span v-else v-text="' Нить:' + products.thread "></span>
                      <span v-if="products.plotnost == 'null'"></span>
                      <span v-else v-text="' плотность:' + products.plotnost"></span>
                      <span v-if="products.size == 'null'"></span>
                      <span v-else v-text="' Размеры:' +  products.size"></span>
                      <span v-if="products.settings == 'null'"></span>
                      <span v-else v-text="'Инструкция по уходу за изделием' + products.settings"></span>
                    </p>
                      <p class="price">
                        <span v-text='(products.price * level).toFixed(num)'></span>
                        <span v-text='local'></span>
                      </p>
                  </div>
             </div>
             </div>
           </div>
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
               search_pro:'',
               products:[],
               pro_recomeds:[],
               links:[],
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
               search: '',
               searching:[],
               url:window.location.href,
               desc:'',
               gend:"По умолчанию",
               page_count:1,  
               perpage:'',
               totals:'',
               search_product:'',
               ind:'',
               filter:'',
               local:'',
               level:0,
               num:2
              //  token: document.querySelector('meta[name="_token"]').content
            },
            mounted() {      
            this.local = localStorage.getItem('currency')
            this.level =  localStorage.getItem('level');
            this.search = decodeURIComponent(window.location.href.split('/')[4])
            this.search_pro = decodeURIComponent(this.url.split('/')[4])        
            console.log(this.search);    
            fetch(this.vallet)
              .then( p => p.json())
              .then( data=>{
                      // console.log(data[23])
                      // console.log(data[18])
                }            
            )
            fetch(this.domain_url + 'api/searching')
              .then( p => p.json())
              .then(resp=>{
                  this.searchen = resp.searching[resp.searching.length-1]
                }            
            )
            fetch(this.domain_url + 'api/product')
              .then( p => p.json())
              .then(resp=>{
                    this.products = resp.pagined.data
                    this.ind = resp.pagined
                    this.links = resp.pagined.links
                    this.totals = resp.pagined.links.length-2
                    console.log(resp)
                }            
            )
            fetch(this.domain_url + 'api/group')
                .then( gr => gr.json())
                .then( resp =>{
                  this.gif = false
                  this.groups = resp.group
                //   console.log(this.groups)
                }            
              )
              fetch(this.domain_url + 'api/type') 
              .then( p => p.json())
              .then( resp =>{
                this.gif = false
                this.types = resp.type
                console.log(resp) 
                }            
              )           
            },
            methods:{
              numeration($event,index) {
                  this.page_count = $event.target.value;
                  // console.log($event);
                  fetch(this.domain_url  + 'api/product?  page=' + this.perpage + '&limit='+this.page_count)
                  .then(res => res.json())
                  .then(ind =>{
                      this.gif=false;
                      // console.log(ind)                      
                      this.ind = ind.pagined.data.length;
                      this.links  = ind.pagined.links
                      this.products = ind.pagined.data;
                      this.totals = ind.pagined.links.length
                      this.pages = ind.pagined
                      
                  });
                }, 
                filterchange($event){
                this.filter = $event.target.value;
                console.log(this.filter)
                fetch(this.domain_url + 'api/product/' + '?filter=' + this.filter)  
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  this.links = resp.pagined.links
                  this.products = resp.pagined.data                  
                  this.ind = resp.pagined
                  this.totals = resp.pagined.links.length-2
                  // console.log(this.totals)
                  console.log(resp)
                  })
              },
                parseJson(jsonArray) {
                  if ( this.isJsonString(jsonArray)) {
                    if( this.isJsonString(jsonArray).length > 0) {
                      return this.domain_url+'storage/' +  this.isJsonString(jsonArray)[0];
                    }
                  } else {
                      return "";
                  }
               },        
                isJsonString(str) {
                    try {
                        JSON.parse(str);
                        return JSON.parse(str);
                    } catch (e) {
                        return false;
                    }
                }, 
                clicked(event){
                  this.desc = event.target.checked
                  // console.log(this.desc)          
                  // console.log(event)

                },
                gender($event) {
                  this.gend = $event.target.value;
                }
            },
            computed:{
              searcher(event){      
                        //  window.location.href = this.search_pro  
                        if(this.search_pro == ''){
                            document.querySelector('.notcategory').classList.add('activate')
                        }else{
                          return this.products.filter(  products => {
                            document.querySelector('.notcategory').classList.remove('activate')
                              if(this.gend == "По умолчанию"){
                                if(this.desc == ""){
                                  return(products.product_name.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                }else if(this.desc){                            
                                  // return(products.thread.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                  return   (products.info.toUpperCase().includes(this.search_pro.toUpperCase()) || products.thread.toUpperCase().includes(this.search_pro.toUpperCase()) || products.size.toUpperCase().includes(this.search_pro.toUpperCase()) || products.plotnost.toUpperCase().includes(this.search_pro.toUpperCase()) || products.settings.toUpperCase().includes(this.search_pro.toUpperCase()));             
                                } 
                                else if(!this.desc){
                                  return(products.product_name.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                }  
                              }else if(this.gend == products.product_id){
                                if(this.desc == ""){
                                  return(products.product_name.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                }else if(this.desc){                            
                                  // return(products.thread.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                  return   (products.info.toUpperCase().includes(this.search_pro.toUpperCase()) || products.thread.toUpperCase().includes(this.search_pro.toUpperCase()) || products.size.toUpperCase().includes(this.search_pro.toUpperCase()) || products.plotnost.toUpperCase().includes(this.search_pro.toUpperCase()) || products.settings.toUpperCase().includes(this.search_pro.toUpperCase()));             
                                } 
                                else if(!this.desc){
                                  return(products.product_name.toUpperCase().includes(this.search_pro.toUpperCase()));     
                                }  
                              }   
                        })
                      }
                      // console.log(this.searching)

              },
            },
        })
</script>
</body></html>