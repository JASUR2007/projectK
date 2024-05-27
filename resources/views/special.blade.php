
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
    .swiper-button-next{
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
    .swiper-initialized:hover  .swiper-button-next{
      transition: 1s;
      opacity: 1;
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
</style>
<body class="common-home">
<div id="app">
   @include('header-site')
  <div class="container">
    <div class="row">                
       <div  class="col-sm-12"><div id="slideshow0" class="owl-carousel" style="opacity: 1;">
       </div>
       <div class="swiper mySwiper">
         <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(images,index) of image" :key="index">    
              <div class="item" style="height: 380px;display:flex;flex-direction:column;align-items:center" >
                <a href="http://ih-tex.uz/ih-tex-for-men"><img :src="parseJson(images.images)" alt="Мужская одежда" class="img-responsive" /></a>
             </div>
           </div>
        </div>
        <div class="owl-next"><span class="swiper-button-next"></span></div>
        <div class="owl-prev"><span class="swiper-button-prev"></span></div>
    </div>
    <div class="swiper-pagination pagination-swiper" style="margin-top:20px;"></div>
  </div>
  <h3>Рекомендуемые</h3>
  <div class="row">
    <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12" v-for="(pro_recomeds,index) of pro_recomeds" :key="index">
     <div class="product-thumb transition">
        <div class="image" v-for='img of  JSON.parse(pro_recomeds.img)'>
          <a :href = "domain_url + 'api/kid/' + pro_recomeds.url_url + '/' + pro_recomeds.url + '/' +  pro_recomeds.id">
            <img :src="'http://kam' + '/storage/' + img.image[0]" alt="Рубашка мужская &quot;Поло&quot; с коротким рукавом" style="height:300px" title="Рубашка мужская &quot;Поло&quot; с коротким рукавом" class="img-responsive" />
          </a>
        </div>        
          <div class="caption">
            <h4>
              <a :href = "domain_url + 'api/kid/' + pro_recomeds.url_url + '/' + pro_recomeds.url + '/' +  pro_recomeds.id" v-text='pro_recomeds.product_name'></a>
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
     <h4>Товары со скидкой</h4>
    <p>В данный момент товары со скидкой недоступны</p>
    <div class="pull-right">
        <a :href="domain_url + 'api'" class="btn btn-primary">Продолжить</a>
    </div>
</div>
</div>
@include('footer-site')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var app = new Vue ({
            el:"#app",
            data:{
               image:[],
               groups:[],
               types:[],
               pro_recomeds:[],
               man:'МУЖЧИНА',
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
               search:'',
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
                        // console.log(pro)
                    }            
                )
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
            fetch(this.domain_url + 'api/swiper')
              .then( p => p.json())
              .then( resp =>{
                  this.gif = false
                   this.image = resp.swpies
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
                  // console.log(this.groups)
                }            
              )
              fetch(this.domain_url + 'api/type') 
              .then( p => p.json())
              .then( resp =>{
                this.gif = false
                this.types = resp.type
                // console.log(this.types) 
                }            
              )            
            },
            methods:{
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