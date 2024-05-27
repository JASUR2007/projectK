<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
@include('head-site')
<meta name="description" content="СПОРТИВНЫЕ КОСТЮМЫ" />
<meta name="keywords" content= "СПОРТИВНЫЕ КОСТЮМЫ" />
<link href="{{asset('extend/carusel.css')}}" type="text/css" rel="stylesheet" media="screen" />
<link href="{{asset('extend/transition.css')}}" type="text/css" rel="stylesheet" media="screen" />
</head>
<style>
.man.activate {
   color: #444444;
    background: #eeeeee;
    border: 1px solid #DDDDDD;
    text-shadow: 0 1px 0 #fff;
}
@media (max-width: 767px) {
  .img-prod{
    width: 300px;
    height: 300px;
  }
}
@media (min-width: 767px) {
  .img-prod{
    height: 180px;
    width: 200px;
  }
}


/* header */
  .navbar-nav>.dropdown>a{
    cursor: pointer;
  }
  .dropdown-menu>a.see-all{
    cursor: pointer;
  }
  .main_all{
    display: none;
  }
  .active{
    display: block;
  }
  .page-link.activate{
    display: none;
  }
  .left_page{
    display: none;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<body class="product-category-59_137">
</header> 
@include('header-site')
<div id="app">
    <div class="container">
      </div>
      <div class="container">
        <ul class="breadcrumb">
          <li><a :href="domain_url + 'api'"><i class="fa fa-home"></i></a></li>
          <li>
            <span v-for='type of types'>
              <span v-for='group of groups' v-if="url == domain_url +'api/kid/' + type.url_url + '/'+ group.url">
                <a   v-if='group.group_id == type.gender'  :href="domain_url + 'api/kid/' + type.url_url">
                  <span v-text='type.gender'></span>
                </a>
              </span>
            </span>
            <!-- <a  :href="domain_url  + 'api/kid/' + types.gender">МУЖЧИНАМ</a> -->
          </li>
          <li>
            <span v-for='type of types'>
              <span v-for='group of groups' v-if="url == domain_url +'api/kid/' + type.url_url + '/'+ group.url">
                <a   v-if='group.group_id == type.gender'  :href="domain_url + 'api/kid/' + type.url_url+ '/'+ group.url">
                  <span v-text='group.namin'></span>
                </a>
              </span>
            </span>
            <!-- <a  :href="domain_url  + 'api/kid/' + types.gender">МУЖЧИНАМ</a> -->
          </li>
       </ul>
        <div class="row">
          <aside id="column-left" class="col-sm-3 hidden-xs">
              <div class="list-group">
                <span v-for='type of types'>
                <a :href="domain_url + 'api/kid/' + type.url_url"  class="list-group-item" :class="[{active: checkUrl(type.url_url)}]" v-text="type.gender"></a>
                <span class="main_all" :class="[{active: checkUrl(type.url_url)}]" v-for="(groups,index) of groupss" :key="index" v-if="type.gender == groups.group_id">
                   <a :href="domain_url+ 'api/kid/' + type.url_url + '/'  + groups.url" v-text="'-' + groups.namin" class="list-group-item" :class="[{active: cheUrl(groups.url)}]"></a>
                </span>
              </div>              
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide item " v-for='image_types of image_type'>
                     <img :src="domain_url + '/storage/' +  image_types.img" alt="Мужчинам" class="img-responsive" />
                  </div>       
                </div>
              </div>
         </aside> 
          <div id="content" class="col-sm-9"> 
            <span v-for='type of types'> 
              <div  v-for='group of groups' v-if="url == domain_url + 'api/kid/' + type.url_url + '/sport-wears'">     
                  <span v-for='group of groups' v-if='group.group_id == types.gender'>
                     <h2 v-if='group.namin   == product.product_id' v-text='product.product_name'></h2>
                  </span>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <!-- <h4  style="display:flex;">Одежда для 
                    <span >
                      <span style="font-style: italic;margin-left:5px" v-for='group of groups' v-if='group.group_id == type.gender' v-text='type.title'></span>
                        <br>                             
                    </span> 
                  </h4> -->
                </div>
              </div>  
            </span> 
              <h2 v-for='groups of groups' v-text="groups.namin"></h2>
              <div class="row">
                <div   v-for='groups of groups' v-if="groups.name_site !== ''" class="col-sm-10">
                  <h4>
                  <span style="font-style: italic;"  v-text='groups.name_site'></span>
                    <br>
                  </h4>
                </div>
                <div v-else class="col-sm-10">
                  <h4>
                    <span style="font-style: italic;">Нету описание к этому товару!</span>
                    <br>
                  </h4>
                </div>
              </div>
            <div class="row">
                <span> 
                    <ul style="grid-template-columns: repeat(3,1fr);display: grid;grid-template-rows: auto;"  v-for='types of types' v-if="url == domain_url + 'api/kid/' + types.url_url">
                        <li v-for='group of groups' v-if='group.group_id == types.gender'>
                          <a v-text='group.namin'></a>
                        </li>
                    </ul>
                </span>
              </div>
                <hr>
                 <p v-if='products.length !== 0'> 
                  <!-- <a href="" id="compare-total">Сравнение товаров (0)</a> -->
                </p>
                <div class="row"  style="display: flex;align-items:center"> 
                  <div class="col-md-4">
                    <div class="btn-group hidden-xs">
                      <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"><i class="fa fa-th-list"></i></button>
                      <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip"><i class="fa fa-th"></i></button>
                    </div>
                  </div>
                 <div class="col-md-2 text-right">
                   <label class="control-label" for="input-sort">Сортировать:</label>
                 </div>
                 <div class="col-md-3 text-right">
                    <select id="input-sort" class="form-control" @change='filterchange($event)'>
                      <option :value="'id' +'&byin=asc'" selected="selected">По умолчанию</option>
                      <option :value="'product_name' +'&byin=asc'">По Имени (A - Я)</option>
                      <option :value="'product_name' + '&byin=desc'">По Имени (Я - A)</option>
                      <option :value="'price' + '&byin=asc'">По Цене (возрастанию)</option>
                      <option :value="'price' + '&byin=desc'">По Цене (убыванию)</option>
                      <option :value="'stars' + '&byin=asc'">По Рейтингу (убыванию)</option>
                      <option :value="'stars' + '&byin=desc'">По Рейтингу (возрастанию)</option>
                    </select>
                 </div>
        <div class="col-md-2 text-right">
          <label class="control-label" for="input-limit">Показывать:</label>
        </div>
        <div class="col-md-2 text-right">
              <select id="input-limit" class="form-control"  @change='numeration($event)'>
                    <option value=15>15</option>
                    <option value=25>25</option>
                    <option value=50>50</option>
                    <option value=75>75</option>
                    <option value=100>100</option>
               </select>
        </div>
      </div>    
        <p   v-if='products.length == 0'>В этой категории нет товаров.</p>
        <div class="buttons"  v-if='products.length == 0'>
          <div class="pull-right">
            <a :href="domain_url + 'api'" class="btn btn-primary">Продолжить</a>
          </div>
        </div>
      </span>    
      <br />
      <div class="row">
        <div  v-if='products.length == 0'>
        </div>
         <div v-else class="product-layout product-list col-xs-12" v-for = 'products of products'>
            <div class="product-thumb"> 
               <div class="image">
                  <a  :href="domain_url + 'api/kid/' + products.url_url + '/' + products.url + '/' +  products.id">
                    <div class='d-flex' v-for='img of  JSON.parse(products.img)'>
                      <img  :src="domain_url + '/storage/' + img.image[0]"   :alt="products.name" style="color:grey;width:200px;height:200px">
                    </div>
                  </a>
                </div>
                <div>
                  <div class="caption">
                    <h4>
                      <a v-text='products.product_name'></a>
                    </h4>
                    <p class="price">
                      <span v-text='(products.price * level).toFixed(num)'></span>
                      <span v-text='local'></span>
                    </p>
                  </div>
                </div>
             </div>
       </div>
      </div>
      <div v-if='products.length == 0'></div>
          <div class="row"  v-else>
            <div class="col-sm-6 text-left">
              <span  v-if='links.length == 3'></span>                     
              <span v-else>
                <ul class="pagination">
                  <li style="cursor:pointer" v-if='ind.current_page !== 1'>
                    <a @click='clickable(ind.first_page_url)'>|&lt;</a>
                  </li>
                  <li style="cursor:pointer" v-if='ind.current_page !== 1'>
                    <a @click='clickable(ind.prev_page_url)'>&lt;</a>
                  </li>
                    <li v-for='(link,index) of links' :key='index' :class="[{active: link.active}]">
                    <a style="cursor:pointer" :class="[{left_page:index == links.length-1},{left_page: index == 0}]"  @click='clickable(link.url)'  class="page-link"  v-text='link.label'></a>
                    </li>
                    <li style="cursor:pointer" v-if='ind.current_page !== ind.total'>
                      <a  @click='clickable(ind.next_page_url)'>&gt;</a>
                    </li>
                    <li style="cursor:pointer" v-if='ind.current_page !== ind.total'>
                    <a @click='clickable(ind.last_page_url)'>|&gt;</a>
                  </li>
                </ul>
              </span>
                <span class="page-item">
              </span>
            </div>
            <div class="col-sm-6 text-right" v-text="'Показано с ' + ind.from + ' по ' + ind.to + ' из ' +  ind.total + ' (всего ' + totals + ' страниц) '">
            </div>
          </div>
          </div>

 </div>
</div>
</div>
@include('footer-site')

<script>
        var app = new Vue ({
            el:"#app",
            data:{
               image:[],
               groups:[],
               groupss:[],
               types:[],
               image_type:[],
               swiper:[],
               domain_url:window.location.origin + '/',
               url:window.location.href,
               gender:'',
               id_1:'',
               products:[],
               inc:'',
               url_gender:[],
               links:[],
               pro:[],
               page_count:1,
               perpage:'',
               totals:'',
               pages:'',
               type:[],
               search_product:'',
               ind:'',
               search:'', 
               filter:'',
               local:'',
               level:0,
               num:2
            },
            mounted(){
              this.local = localStorage.getItem('currency')
              this.level =  localStorage.getItem('level');
              var swiper = new Swiper(".mySwiper", {});
              fetch(this.domain_url  + `api/group`)
                .then(resp => resp.json())
                .then((resp) => {
                  this.groupss = resp.group
                  // console.log(resp)
                  for(group of resp.group){
                      this.id= group.namin
                    }
                })
              fetch(this.domain_url  + `api/group_type/` + this.url.split('/')[6])
                .then(resp => resp.json())
                .then((resp) => {
                  this.groups = resp.group
                  // console.log(resp)

                })
                fetch(this.domain_url + 'api/product_id/' + this.url.split('/')[6])  
                .then( p => p.json())
                .then( ind =>{
                  this.gif = false
                  this.ind = ind.pagined
                  this.links  = ind.pagined.links
                  this.products = ind.pagined.data
                  this.perpage = ind.pagined.current_page;
                  this.totals = ind.pagined.links.length-2
                  // console.log(this.totals)
                  console.log(ind)
                  }            
                ) 
              // console.log(this)
              fetch(this.domain_url + 'api/type') 
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  var types = resp.type
                  this.types = resp.type
                  console.log(resp)
                  for(type of types){
                    this.type = type
                      // console.log(this.type)
                  }
                  // console.log(resp)
                })     
                fetch(this.domain_url + 'api/image_type') 
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  console.log(resp)
                  this.image_type = resp.image_type
                })     
            },
            methods: { 
              clickable(index) {
               fetch(index+'&limit= '+ this.page_count)
                  .then(res => res.json())
                  .then(ind =>{
                      this.gif=false;
                      // console.log(ind)
                      this.ind = ind.pagined
                      this.links  = ind.pagined.links
                      this.products = ind.pagined.data
                      this.perpage = ind.pagined.current_page;
                      this.totals = ind.pagined.links.length-2
                  });
                  // console.log(index+'&limit='+this.page_count)
              },      
               numeration($event,index) {
                  this.page_count = $event.target.value;
                  var conts = this.url.split('/')[6]
                  // console.log(conts)
                  fetch(this.domain_url  + 'api/product_id/' + conts + '/?page=' + this.perpage + '&limit='+this.page_count)
                  .then(res => res.json())
                  .then(ind =>{
                      this.gif=false;
                      // console.log(ind)                      
                      this.ind = ind.pagined
                      this.links  = ind.pagined.links
                      this.products = ind.pagined.data;
                      this.totals = ind.pagined.links.length
                      this.pages = ind.pagined
                      
                  });
               },
               filterchange($event){
                this.filter = $event.target.value;
                var conts = this.url.split('/')[6]
                fetch(this.domain_url + 'api/product_id/' + conts  + '/?filter=' + this.filter)  
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  this.links = resp.pagined.links
                  this.products = resp.pagined.data                  
                  this.ind = resp.pagined
                  this.totals = resp.pagined.links.length-2
                  // console.log(this.totals)
                  // console.log(resp)
                  })
              },
              checkUrl(url) {
                return window.location.href.split('/')[5]==url;
              },
              cheUrl(url) {
                return window.location.href.split('/')[6]==url;
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
            }
        })
	</script>
</body>
</html>