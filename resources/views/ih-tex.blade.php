
<!DOCTYPE html>
<html  lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IH-TEX</title>
@include('head-site')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
      <script src="https://kit.fontawesome.com/26d42b736c.js" crossorigin="anonymous"></script>
</head>
<style>
  /* header */
 .navbar-nav>.dropdown>a{
    cursor: pointer;
  }
  .dropdown-menu>a.see-all{
    cursor: pointer;
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
    }
    .valute_symbol{
      display: none;
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
            <div class="swiper-slide"  v-for="(images,index) of image" :key="index" v-if='image[index].source !== "null"'>    
              <div class="item swiperjs" style="display:flex;flex-direction:column;align-items:center;">
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
  <h3>Рекомендуемая одежда</h3>
  <div class="row"> 
  <div v-if='this.pro_recomeds.length==0' style="margin-left:20px">Нету рекомендаций</div>
  <div v-for="(pro_recomeds,index) of pro_recomeds" v-else>
    <div class="product-layout transition col-lg-3 col-md-4 col-sm-6  col-xs-12" >
      <div class='product-thumb'>
        <div class="image">
          <a :href="domain_url + 'api/kid/' + pro_recomeds.url_url + '/' + pro_recomeds.url + '/' +  pro_recomeds.id" style="
          width: 100%;
          display: flex;
          justify-content: center;
          height: 100%;
          align-items: center;
          ">
              <div class='d-flex' v-for='img of  JSON.parse(pro_recomeds.img)' style="width:250px;height:250px;display:flex;align-items: center;">
                <img  :src="domain_url + '/storage/' + img.image[0]"   alt="" style="color:grey;height:100%;width:80%;height:80%;max-height:100%;max-width:100%">
              </div>
            </a>
        </div>
        <div class="caption">
          <h4 style="text-overflow:ellipsis;overflow:hidden;flex-wrap:wrap">
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
  </div>
</div>
@include('footer-site')
</div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var app = new Vue ({
            el:"#app",
            data:{
               token:document.querySelector('meta[name="csrf-token"]').content,
               image:[],
               search:'',
               groups:[],
               types:[],
               search_product:'',
               pro_recomeds:[],
               price:[],
               url:window.location.href,
               man:'МУЖЧИНА',
               domain_url:window.location.origin + '/',
               currency:[],
               val:'',
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
            // fetch(this.domain_url + 'add-searching') 
            //   .then( p => p.json())
            //   .then( resp =>{
            //     this.gif = false
            //     this.searching = resp.searching
            //     // console.log(this.totals)
            //     console.log(resp)
            //     }            
            //   ) 
            fetch(this.domain_url + 'api/swiper')
              .then( p => p.json())
              .then( resp =>{
                  this.gif = false
                   this.image = resp.swpies
                    console.log(resp)                   
                   for(images of this.image){
                      console.log(images.images)
                   }
              }            
            )
            fetch(this.domain_url + 'api/price')
              .then( p => p.json())
              .then( resp =>{
                // console.log(resp.price[resp.price.length - 1])
                  this.price = resp.price
            })     
            fetch(this.domain_url + 'api/group')
                .then( gr => gr.json())
                .then( resp =>{
                  this.gif = false
                  this.groups = resp.group
                  // console.log(this.groups)
              })
              fetch(this.domain_url + 'api/type') 
              .then( p => p.json())
              .then( resp =>{
                this.gif = false
                this.types = resp.type

                
                // console.log(this.types) 
              })            
            },
            methods:{         
                // localStorage.setItem('text', this.currency);
              //  localStorage.setItem('currency', this.val);
              //  localStorage.getItem('text')
              //  console.log(localStorage.getItem('text'))
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
          }, 
        )
	</script>

</body>
</html>