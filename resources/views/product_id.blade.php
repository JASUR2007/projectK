<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
@include('head-site')
<style>
    .mark{
      display: none;
    }
    .mark.activate{
      display: block;
    }
    .text_write{
      display: none;
    }
    .text_write.activate{
      display: block;
    }
    .text_name{
      display: none;
    }
    .text_name.activate{
      display: block;
    }
    .correct{
      display: none;
    }
    .correct.activate{
      display: block;
    }
    .card_rev {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 80%;
    }

    .card_rev:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container_rev {
      padding: 2px 16px;
    }
    .review_feed{
      padding-top: 20px;
      height: 200px;
      flex-wrap: unset;
      width: 100%;
      overflow: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
    .review_feed.activate{
      height: 0px;
    }
    .img_thumb{
      height: 400px;
      width: 350px;
    }
    .img_thumb_slide{
      width: 540px;
      height: 540px;
    }
    .mfp-close:hover, .mfp-close:focus {
      opacity: 1;
    } 
    .close{
      color: white;
      opacity: 0.65;
    }
    .close:hover{
      opacity: 1;
    }
    .close:active{
      top: -6.7%;
    }
    .mfp-close{
      color: white;
      right: -6px;
      text-align: right;
      padding-right: 6px;
      width: 100%;
      overflow: visible;
      cursor: pointer;
      background: transparent;
      top: -7%;
      right: 0%;
      border: 0;
      -webkit-appearance: none;
      display: block;
      outline: none;
      padding: 0;
      z-index: 1046;
      -webkit-box-shadow: none;
      box-shadow: none;
      width: 44px;
      height: 44px;
      line-height: 44px;
      position: absolute;
      text-decoration: none;
      text-align: center;
      opacity: 0.65;
      padding: 0 0 18px 10px;
      color: white;
      font-style: normal;
      font-size: 28px;
      font-family: Arial, Baskerville, monospace;
    }
    .mfp-close:hover, .mfp-close:focus {
      opacity: 1;
    }
    .next-slide{
      position: fixed;
      top: 48%;
      right: 5%;
      color: white;
      opacity: 0.64;
      font-size: 40px;
    }
    .next-slide:hover{
      color: white;
      opacity: 1;
    }
    .next-slide:active{
      top: 48.5%;
    }
    .prev-slide{
      position: fixed;
      top: 48%;
      left: 5%;
      color: white;
      opacity: 0.64;
      font-size: 40px;
    }
    .prev-slide:hover{
      color: white;
      opacity: 1;
    }
    .prev-slide:active{
      top: 48.5%;
    }
    .span_add.activate{
      display: none;
    }
    .thread_si{
      display: block;
    }
    .thread_si.activate{
      display: none;
    }
    .size_size{
      display: block;
    }
    .size_size.activate{
      display: none;
    }
    .cotton_site{
      display: block;
    }
    .cotton_site.activate{
      display: none;
    }
    
    .plotnosts{
      display: block;
    }
    .plotnosts.activate{
      display: none;
    } 
    .carousel {
        background: white;
      }
    @media screen and (max-width:768px) {      
      .carousel {
        background: #00000052;
      }
      .sliderjs{
        color: black;
      }
    }
    .mess{
      display: none;
    }
    .mess.activate{
      display: block;
      font-weight: 400;
      color: #666;
      font-size: 12px;
      line-height: 20px;
      width: 100%;
      margin: 0 0 10px;
    }
    .mfp-counter{
      right: 0;
      color: #cccccc;
      font-size: 12px;
      line-height: 18px;
    }
    .mfp-title{
      text-align: left;
      line-height: 18px;
      color: #f3f3f3;
      word-wrap: break-word;
      padding-right: 36px;
    }
    .activate{
      display: none;
    }
</style>
  <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>  
</head>
<body class="product-product-65">
@include('header-site')
<div id="app">
<div class="container">
  <ul class="breadcrumb" style="display:flex ;">   
    <li>
      <a :href="domain_url + 'api'"><i class="fa fa-home"></i></a>
    </li>
    <li>
    <span v-for='type of types'>
      <span v-for='group of groups'>
        <span v-for='product of products' v-if="url == domain_url +'api/kid/' + type.url_url + '/'+ group.url + '/' + product.id">
          <a    v-if='group.group_id == type.gender'  :href="domain_url + 'api/kid/' + type.url_url">
            <span v-text='type.gender'></span>  
          </a>
        </span>
      </span>
    </span>
      <!-- <a  :href="domain_url  + 'api/kid/' + types.gender">МУЖЧИНАМ</a> -->
    </li>
    <li> 
    <span v-for='type of types'>
        <span v-for='group of groups'>
          <span  v-for='product of products'v-if="url == domain_url +'api/kid/' + type.url_url + '/'+ group.url + '/' + product.id">
            <a   v-if='group.group_id == type.gender'  :href="domain_url + 'api/kid/' + type.url_url+ '/'+ group.url">
              <span v-text='group.namin'></span>
            </a>
          </span>
        </span>
      </span>
    </li>
    <div>
      <span v-for='type of types' v-if='type'>
        <span v-for='groups of groups' class="span_add">
          <div  v-if='product.product_id == groups.namin' v-for='product of products'>
              <li v-if="url == domain_url + 'api/kid/' + type.url_url + '/' + groups.url + '/' + product.id">
                <a :href=" domain_url + 'api/kid/' + type.url_url + '/' + groups.url + '/' + product.id" style="margin-left: 20px;" class="value" v-text='product.product_name'></a>
              </li>
            </div>
        </span>
      </span>
    </div>
  </ul>
  <div class="row">            
        <div id="content" class="col-sm-12">     
           <div class="row" v-for='product of products'>
              <div class="col-sm-8">
                 <ul class="thumbnails">
                    <li>                    
                      <a class="thumbnail" title="Спортивный костюм комплект" data-toggle="modal" data-target="#myModal">
                        <div style="justify-content: center;display: flex;" v-for='img of  JSON.parse(product.img)' @click='changeImg(0)'>
                          <img  :src="domain_url + '/storage/' + img.image[0]" class="img_thumb" style="height: 400px;width: 350px;"   alt="" style="color:grey;height:100%;width:250px;height:250px"> 
                        </div>
                      </a>
                    </li>
                    <div class="mess"></div>
                    <div class="modal fade" style="top: 13%;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <button type="button" style="position: fixed;color: white;" class="close mfp-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-content" style="border-radius:0px">
                          <div class="modal-body" style="padding:0">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="">
                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox" style="display: flex;width:100%;justify-content: center;">
                                  <div class="item" style="display: block;">
                                    <img :src="domain_url + '/storage/' + JSON.parse(product.img)[0].image[index]" ref='foo'  class="img_thumb_slide item" style="width: 500px;height: 540px;">    
                                  </div>
                              </div>                              
                            </div>
                          </div>                          
                        </div>
                          <div class="mfp-bottom-bar" style="display:flex;justify-content: space-between;">
                          <div class="mfp-title" v-text='product.product_name'></div>
                          <div class="mfp-counter" v-text="'images:' + lenght_image"></div>
                        </div>
                      </div>
                    </div>                  
                       <li  v-for='img of  JSON.parse(product.img)'>
                          <div v-for='(imag,index) of img.image'  class="image-additional" :key='index'>
                              <a   class="thumbnail"  v-bind:title="product.product_name" data-toggle="modal" data-target="#myModal" @click='changeImg(index)'>  
                                <img :src="domain_url + '/storage/' + imag" style="width:80px;height:80px"   alt="">
                              </a>
                          </div>
                      </li>
                  </ul>
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab">Описание</a></li>
                    <li><a href="#tab-review" data-toggle="tab">Отзывы (<span v-text='lenght_feed'></span>)</a></li>
                 </ul>
                 <div class="tab-content">                  
                         <div class="tab-pane active" id="tab-description">
                            <h4>
                              <span v-if="product.cotton == 'null'" style="font-weight: bold;" class="cotton_site">
                              </span>
                              <span style="font-weight: bold;" class="cotton_site" v-else>
                                Ткань:
                              </span>
                            </h4>
                            <p v-if="product.cotton == 'null'"></p>
                            <p v-else v-text='product.cotton'></p>
                            <h4>
                              <span  v-if="product.thread == 'null'"  style="font-weight: bold;" class='thread_si'></span>
                              <span v-else style="font-weight: bold;" class='thread_si'>Нить:</span>
                            </h4>
                            <p v-if="product.thread == 'null'"></p>
                            <p v-else v-text='product.thread'></p>
                            <h4>
                              <span style="font-weight: bold; background-color: rgb(255, 255, 255);" class="plotnosts" v-if="product.plotnost == 'null'"></span>
                              <span style="font-weight: bold; background-color: rgb(255, 255, 255);" class="plotnosts" v-else>Плотность ткани:</span>
                            </h4>                    
                            <p v-if=" product.plotnost == 'null'"></p>
                            <p v-else v-text='product.plotnost'></p>
                            <h4>
                              <span style="font-weight: bold;" class="size_size" v-if=" product.size == 'null'"></span>
                              <span style="font-weight: bold;" class="size_size" v-else>Размеры:</span>
                            </h4>
                            <p v-if=" product.size == 'null'"></p>
                            <p v-else v-text='product.size'></p>
                            <h4>
                              <span style="font-weight: bold;">Инструкция по уходу<br>за изделием:</span>
                            </h4>
                            <p v-if="product.settings == 'null'"></p>
                            <p v-else v-text='product.settings'><br></p>
                          </div>
                          <div class="tab-pane" id="tab-review">
                              <form class="form-horizontal" id="form-review">
                              <div  v-if="lenght_feed==0">Нет отзывов об этом товаре.</div>
                                <div v-else>
                                  <span  style="display:flex;flex-direction:column-reverse">
                                    <span  id="review" class="review_feed" v-if="url == domain_url + 'api/kid/' + product.url_url + '/' + product.url + '/' + product.id">
                                        <div  class="card_rev" v-for='feedback of feedbacks' v-if='feedback.product_id == product.id'>
                                          <div class="container_rev">
                                            <h4><b v-text='feedback.name'></b></h4> 
                                            <p v-text='feedback.feedback' style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"></p> 
                                            <i class="fa-solid fa-star"  v-for="i of feedback.stars"></i>
                                            <i class="fa-solid fa-star" style="font-weight: 200;" v-for="i of '5' -  feedback.stars"></i>
                                          </div> 
                                        </div>
                                      </span>
                                  </span>
                                </div>
                                <p></p>
                                <div class="alert alert-success correct"><i class="fa-solid fa-circle-check"></i><span style="margin-left:5px">Ваш отзыв был отправлен успешно!</span></div>
                                <div class="alert alert-danger mark"><i class="fa fa-exclamation-circle"></i> Пожалуйста поставьте оценку!</div>
                                <div class="alert alert-danger text_write"><i class="fa fa-exclamation-circle"></i> Текст Отзыва должен быть от 25 до 1000 символов!</div>
                                 <div class="alert alert-danger text_name"><i class="fa fa-exclamation-circle"></i>  Имя должно быть от 3 до 25 символов!</div>
                                  <h2>Написать отзыв</h2>
                                <div class="form-group required">
                              <div class="col-sm-12">
                                <label class="control-label" for="input-name">Ваше имя:</label>
                                <input type="text" name="name" value="" id="input-name" class="form-control inp_name" v-model='name'/>
                              </div>
                           </div>
                            <div class="form-group required">
                              <div class="col-sm-12">
                                <label class="control-label" for="input-review">Ваш отзыв</label>
                                <textarea name="text" rows="5" id="input-review" class="form-control inp_write" v-model='feedback'></textarea>
                                <div class="help-block"><span class="text-danger">Внимание:</span> HTML не поддерживается! Используйте обычный текст!</div>
                              </div>
                            </div>
                            <div class="form-group required">
                              <div class="col-sm-12">
                                <label class="control-label">Рейтинг</label>
                                &nbsp;&nbsp;&nbsp; Плохо&nbsp;
                                <input type="radio" name="rating" value="1" v-model='stars'/>
                                &nbsp;
                                <input type="radio" name="rating" value="2" v-model='stars'/>
                                &nbsp;
                                <input type="radio" name="rating" value="3" v-model='stars'/>
                                &nbsp;
                                <input type="radio" name="rating" value="4" v-model='stars' />
                                &nbsp;
                                <input type="radio" name="rating" value="5" v-model='stars'/>
                                &nbsp;Хорошо</div>
                             </div>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Загрузка..." @click='feed' class="btn btn-primary">Продолжить</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
         <div class="col-sm-4">
            <h1 v-text='product.product_name' style="overflow: auto;"></h1>
            <ul class="list-unstyled">
              <li>Производитель: <a :href="domain_url + 'api/IP-text'">"IP Textile"</a></li>
              <li>Код товара: <span v-text='product.code_product'></span></li>
              <li>Доступность: <span v-text='product.availability'></span></li>
            </ul>
                    <ul class="list-unstyled">
                      <li>
                        <h2>
                          <span v-text='(product.price * level).toFixed(num) * price'></span>
                          <span v-text='local'></span>
                        </h2>
                     </li>
                    </ul>
                    <div id="product">
                      <div class="form-group">
                        <label class="control-label" for="input-quantity">Кол-во</label>
                          <input type="text" name="quantity" v-model='price' size="2" id="input-quantity" class="form-control" />
                          <input type="hidden" name="product_id" value="65" />
                            <br/>          
                      </div>
                    </div>
         <div   class="rating">
            <p>
                          <div   v-for='product of products'>
                              <i class="fa-solid fa-star"  v-for="i of product.stars"></i>
                              <i class="fa-solid fa-star" style="font-weight: 200;" v-for="i of '5' -  product.stars"></i>
                          </div>
                      <a @click="click_feed" style="cursor:pointer"  onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><span v-text='lenght_feed'></span> отзывов</a>
                        /
                        <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Написать отзыв</a>
              </p>
            <hr>
          </div>
          <div class="addthis_toolbox addthis_default_style">
               <a class="addthis_button_pinterest_pinit at300b"></a> 
               <div class="addthis_toolbox addthis_default_style">
                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> 
                  <a class="addthis_button_tweet"></a> 
                  <a class="addthis_button_pinterest_pinit"></a>
                  <a class="addthis_counter addthis_pill_style"></a>
                </div>
              <div class="atclear"></div>
            </div>
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
              active:true,
              errorClass:false,
              groups:[],
              types:[],
              products:[],
              pro_recomeds:[],
              feedbacks:[],
              price:1, 
              url:window.location.href,
              vallet:'https://nbu.uz/exchange-rates/json',
              domain_url:window.location.origin + '/',
              product_id:'',
              name:'',
              stars:'',
              gender:'',
              feedback:'',
              lenght_feed:'',
              tochka:'',
              token:document.querySelector('meta[name="csrf-token"]').content,
              search_product:'',
              lenght_image:'',
              image_mounted:'',            
              search:'',
              local:'',
              level:0,
              num:2,
              index_img:'',
              index:0
            },
            mounted(){
              this.local = localStorage.getItem('currency')
              this.level =  localStorage.getItem('level');                   
              fetch(this.vallet)
              .then( p => p.json())
              .then( data=>{
                      // console.log(data[23])
                      // console.log(data[18])
                }            
            )
            fetch(this.domain_url + 'api/products/' + this.url.split('/')[7])
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  this.products = resp.pagined.data   
                  console.log(resp)
                  // console.log(resp.pagined.data)
                  for(product of resp.pagined.data){
                    console.log(JSON.parse(product.img)[0].image[0])
                   for(img of JSON.parse(product.img)){
                      this.image = img.image
                      this.lenght_image = img.image.length
                    }
                  }                                    
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
              fetch(this.domain_url + 'api/feedbacks/' + this.url.split('/')[7])
                .then( gr => gr.json())
                .then( resp =>{
                  this.gif = false
                  console.log(resp)
                  this.lenght_feed = resp.feedbacks.length
                  this.feedbacks = resp.feedbacks
                  // console.log(this.types)
                }            
              )
              fetch(this.domain_url + 'api/type') 
                .then( p => p.json())
                .then( resp =>{
                  this.gif = false
                  this.types = resp.type
                  // for(type of this.types){
                  //   for(groups of this.groups)
                  //   for(product of this.products){
                  //     console.log(product)
                  //     if(this.url == this.domain_url + 'api/kid/' + type.url_url + '/' + groups.url + '/' + product.id){
                  //       for(feedback of this.feedbacks){
                  //         console.log(feedback.id)                     
                  //         if(feedback.id == product.id){
                  //           console.log(2)
                  //         }     
                  //         console.log(this.feedbacks)
                  //       }
                  //     }
                  //   }

                  // } 
                })                          
            },
            methods:{
              changeImg(indexp){
                this.index = indexp
              },
              next(index){
                console.log(index)
                this.index_img = index+1
              },
              click_feed(){
                document.querySelector('#tab-review').click();
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
              feed(){
                for(pro of this.products){
                    this.product_id =   pro.id
                    this.gender =   pro.product_id  
                }
                if(this.stars == ''){
                    document.querySelector('.mark').classList.add('activate');    
                    document.querySelector('.text_write').classList.remove('activate');
                    document.querySelector('.text_name').classList.remove('activate');
                    // document.querySelector('.correct').classList.remove('activate');
                    return;
                }
                if(document.querySelector('.inp_write').value.trim().length < 25 || document.querySelector('.inp_write').value.trim().length > 1000) {
                    document.querySelector('.mark').classList.remove('activate');
                    document.querySelector('.text_write').classList.add('activate');
                    document.querySelector('.text_name').classList.remove('activate');
                    // document.querySelector('.correct').classList.remove('activate');
                    return;
                }
                if(document.querySelector('.inp_name').value.trim().length < 3 || document.querySelector('.inp_name').value.trim().length > 25) {
                    document.querySelector('.mark').classList.remove('activate');
                    document.querySelector('.text_write').classList.remove('activate');
                    document.querySelector('.text_name').classList.add('activate');
                    // document.querySelector('.correct').classList.remove('activate');
                    return;
                }else{
                  let formdata = new FormData()
                  formdata.append('name',this.name)
                  formdata.append('feedback',this.feedback)
                  formdata.append('stars',this.stars)
                  formdata.append('gender',this.gender)
                  formdata.append('product_id',this.product_id)
                  formdata.append('_token',this.token)

                  fetch(this.domain_url + 'api/add-feedbacks',{
                      body:formdata,
                      method:'POST',
                  })
                  .then(add => add.json())
                  .then(res => {
                      if (res.status == "ok") {
                          // document.querySelector('.correct').classList.add('activate');
                          document.querySelector('.mark').classList.remove('activate');
                          document.querySelector('.text_write').classList.remove('activate');
                          document.querySelector('.text_name').classList.remove('activate');
                          location.reload()                        
                        }
                        // console.log(res)
                  })
                }
        },
            }
        })
</script>
</body>
</html>
