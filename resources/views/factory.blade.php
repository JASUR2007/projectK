
<!DOCTYPE html>
<html  lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
@include('head-site')
<title>IH-TEX</title>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
      <script src="https://kit.fontawesome.com/26d42b736c.js" crossorigin="anonymous"></script>
</head>
<style>
  /* click card */
  product-layout_1.activate{
    width: 100%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
  }
  /* header */
 .navbar-nav>.dropdown>a{
    cursor: pointer;
  }
  .dropdown-menu>a.see-all{
    cursor: pointer;
  }

  .left_page{
     display: none;
  }
  .pagination-swiper>span{
    display: block;
    width: 11px;
    height: 11px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 20px;
    box-shadow: inset 0 0 3px rgb(0 0 0 / 30%);
  }
  .pagination-swiper{
    text-align: center;
    top: 0px;
    position: relative;
    display: flex;
    height: 20px;
    justify-content: center;
  }
  .mySwiper:hover .owl-next{
      opacity: 1;
      transition: 2s;
    }
    .mySwiper{
      border: 4px solid #fff;
      box-shadow: 0 1px 4px rgb(0 0 0 / 20%);
    }
    .swiper-button-next>.nexa{
      width: 28px;
      font-size: 600;
      display: inline-block;
      font: normal normal normal 40px FontAwesome;
      color: rgba(0,0,0,0.8);
      z-index: 1000;
      opacity: 0;
      text-shadow: 1px 1px 0 rgb(255 255 255 / 30%);
      font-size: 40px;
      margin: -20px 0 0;
      transition: all .3s ease;
      transition: 0.3s;
    }
    .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after {
      display: none;
    }
    .swiper-button-next{
      width: 28px;
      font-size: 600;
      display: inline-block;
      font: normal normal normal 14px/1 FontAwesome;
      color: rgba(0,0,0,0.8);
      text-shadow: 1px 1px 0 rgb(255 255 255 / 30%);
      font-size: 40px;
      margin: -20px 0 0;
      transition: all .3s ease;
      transition: 0.3s;
    }
    .swiper-initialized:hover  .swiper-button-next>.nexa{
      transition: 1s;
      opacity: 1;
    }
    .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after {
      content: 'prev';
      display: none;
    }
    .swiper-button-prev{
      width: 28px;
      font-size: 600;
      display: inline-block;
      font: normal normal normal 14px/1 FontAwesome;
      opacity: 0;
      color: rgba(0,0,0,0.8);
      text-shadow: 1px 1px 0 rgb(255 255 255 / 30%);
      font-size: 40px;
      margin: -20px 0 0;
      transition: all .3s ease;
      transition: 0.3s;
    }
    .swiper-initialized:hover  .swiper-button-prev {
      transition: 1s;
      opacity: 1;
    }
    .pagination-swiper> span{
      background: rgba(0, 0, 0, 0.5);
    }
    .pagination-swiper>.swiper-pagination-bullet{
      display: block;
        width: 11px;
        height: 11px;
        background: rgba(0, 0, 0, 0.9);
        border-radius: 20px;
        box-shadow: inset 0 0 3px rgb(0 0 0 / 30%);
    }
    @media screen and (min-width: 768px){
      .span_swipe{
        min-width:600px;
      }
      .swiperjs{
        height:320px;
      }
    }
    @media screen and (max-width: 768px){
      .span_swipe{
        min-width:100%;
      }
      .swiperjs{
        height:100%;
      }
      /* pagination */
      .active{
         display: block;
      }
      .page-link.activate{
        display: none;
      }
      .main_otasi.activate{
        flex-direction: column;
      }

    }
</style>
<body class="common-home">
   @include('header-site')
<div id="app">
  <div class="container">
    <div class="row span_swipe">                 
       <div  class="col-sm-12"><div id="slideshow0" class="owl-carousel" style="opacity: 1;">
       </div>
       <div class="swiper mySwiper">
         <div class="swiper-wrapper">
            <div class="swiper-slide"  v-for="(images,index) of image" :key="index">    
              <div class="item swiperjs" style="display:flex;flex-direction:column;align-items:center" >
               <a :href="images.source">
                  <img :src="domain_url + '/storage/' + images.images" alt="Мужская одежда" class="img-responsive swiperjs" />
                </a>
             </div>
           </div>
        </div>
        <div class="owl-next">          
          <span class="swiper-button-next">
           <i class="fa fa-chevron-right fa-1x nexa"></i>
          </span>
        </div>
        <div class="owl-prev">
          <span class="swiper-button-prev">
             <i class="fa fa-chevron-left fa-1x"></i>
          </span>
        </div>
    </div>
    <div class="swiper-pagination pagination-swiper" style="margin-top:20px;"></div>
  </div>
  <h3>Рекомендуемые</h3>
    <div class="row">
       <div v-for="(pro_recomeds,index) of pro_recomeds">
            <div class="product-layout transition col-lg-3 col-md-4 col-sm-6  col-xs-12" >
                <div class='product-thumb'>
                    <div class="image">
                        <a :href="domain_url + 'api/kid/' + pro_recomeds.url_url + '/' + pro_recomeds.url + '/' +  pro_recomeds.id">
                            <div class='d-flex' v-for='img of  JSON.parse(pro_recomeds.img)'>
                                <img  :src="domain_url + '/storage/' + img.image[0]"   alt="" style="color:grey;height:100%;width:250px;height:250px">
                            </div>
                        </a>
                    </div>
                    <div class="caption">
                        <h4>
                            <a :href="domain_url + 'api/kid/' + pro_recomeds.url_url + '/' + pro_recomeds.url + '/' +  pro_recomeds.id" v-text='pro_recomeds.product_name'></a>
                        </h4>
                        <p class="dollar"></p>
                        <p class="price">
                          <span v-text='(pro_recomeds.price * level).toFixed(num)'></span>
                          <span v-text='local'></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <h2>ООО "KID-KAMILA"</h2>
  <p><a href="" id="compare-total"> Сравнение товаров (0)</a></p>
  <div class="row">
        <div class="col-sm-3">
          <div class="btn-group hidden-xs">

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
        <div class="col-sm-1 text-right">
          <label class="control-label" for="input-limit">Показывать:</label>
        </div>
        <div class="col-sm-2 text-right">
          <select id="input-limit" class="form-control" @change='numeration($event)'>
                <option value=15>15</option>
                <option value=25>25</option>
                <option value=50>50</option>
                <option value=75>75</option>
                <option value=100>100</option>
            </select> 
        </div>
      </div>
      </div>
  <div class="row main_otasi product-layout_1">
        <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12"  v-for = 'products of products'> 
            <div class="product-thumb"> 
               <div class="image">
                  <a  :href="domain_url + 'api/kid/' + products.url_url + '/' + products.url + '/' +  products.id">
                    <div class='d-flex' v-for='img of  JSON.parse(products.img)'>
                      <img  :src="domain_url + '/storage/' + img.image[0]"   alt="" style="color:grey;height:100%;width:250px;height:250px">
                    </div>
                  </a>
                </div>
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
    <div class="row">
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
@include('footer-site')
</div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var app = new Vue ({
            el:"#app",
            data:{
               image:[],
               groups:[],
               types:[],
               pro_recomeds:[],
               search:'',
               price:[],
               products:[],
               links:[],
               url:window.location.href,
               token:document.querySelector('meta[name="csrf-token"]').content,
               man:'МУЖЧИНА',
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
              search_product:'',
              ind:'',
              page_count:1,
              perpage:'',
              totals:'',
              pages:'',
              local:'',
              level:0,
              num:2
            },
            mounted(){
              this.local = localStorage.getItem('currency')
              this.level =  localStorage.getItem('level');
              fetch(this.domain_url + 'api/product_recomended')
                .then( p => p.json())
                .then( pro =>{
                  this.gif = false
                  this.pro_recomeds = pro.product
                  console.log(pro)
                })
              var swiper = new Swiper(".mySwiper", {
              spaceBetween: 30,
              centeredSlides: true,
              autoplay: {
                delay: 2000,
                disableOnInteraction: false,
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
              });
              fetch(this.domain_url + 'api/product') 
                .then( p => p.json())
                .then( resp =>{
                  this.links = resp.pagined.links
                  this.products = resp.pagined.data                  
                  this.ind = resp.pagined
                  this.totals = resp.pagined.links.length-2
                  this.gif = false
                  // console.log(this.totals)
                  console.log(resp)
                  }            
                ) 
                // fetch(this.domain_url + 'api/add-searching') 
                // .then( p => p.json())
                // .then( resp =>{
                //   this.gif = false
                //   this.searching = resp.searching
                //   // console.log(this.totals)
                //   console.log(resp)
                //   }            
                // ) 
            fetch(this.domain_url + 'api/swiper')
              .then( p => p.json())
              .then( resp =>{
                  this.gif = false
                   this.image = resp.swpies
              }            
            )
            fetch(this.domain_url + 'api/price')
              .then( p => p.json())
              .then( resp =>{
                // console.log(resp.price[resp.price.length - 1])
                  this.price = resp.price
              }            
            )
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
              list(){              
                document.querySelector('.main_otasi').classList.add('activate')

              },
              filterchange($event){
                this.filter = $event.target.value;
                fetch(this.domain_url + 'api/product'  + '/?filter=' + this.filter)  
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
              card(){
                document.querySelector('.main_otasi').classList.remove('activate')          
              }, 
            clickable(index) {
               fetch(index+'&limit= '+ this.page_count)
                  .then(res => res.json())
                  .then(ind =>{
                      this.gif=false;
                      this.ind = ind.pagined
                      console.log(ind)
                      this.links  = ind.pagined.links
                      this.products = ind.pagined.data
                      this.perpage = ind.pagined.current_page;
                      this.totals = ind.pagined.links.length-2

                  });
                  console.log(index+'&limit='+this.page_count)
              },      
               numeration($event,index) {
                  this.page_count = $event.target.value;
                  console.log($event);
                  fetch(this.domain_url  + 'api/product?page=' + this.perpage + '&limit='+this.page_count)
                  .then(res => res.json())
                  .then(ind =>{
                      this.gif=false;
                      this.ind = ind.pagined  
                      this.links  = ind.pagined.links
                      this.totals = ind.pagined.links.length-2
                      this.products = ind.pagined.data;
                      this.pages = ind.pagined
                      
                  });
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