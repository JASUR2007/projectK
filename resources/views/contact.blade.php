<!DOCTYPE html>
<html dir="ltr" lang="ru">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('head-site')
<title>Связаться с нами</title>
</head>
<style>
   .opt.activate{
     display:block;
     color: #a94442;
    }
    .opt{
     display: none;
    }
    .redb{
      display: none;
    }
    .redb.activate{
      display:block;
      color: #a94442;
    }
    .redbu{
      display: none;
    }
    .redbu.activate{
      display:block;
      color: #a94442;
    }
    .redbul{
      display: none;
    }
    .redbul.activate{
      display:block;
      color: #a94442;
    }
    .true{
      display: none;
    }
    .true.activate{
      display: block;
    }
</style>
<body class="information-contact">
@include('header-site')
<div id="app">
  <div class="container">
    <ul class="breadcrumb">
          <li>
              <a :href="domain_url + 'api'"><i class="fa-solid fa-house-chimney"></i></a>
          </li>
          <li>
              <a :href="domain_url + 'api/' + 'contact'">Связаться с нами</a>
          </li>
    </ul>
    <div class="row"  style="display: flex;flex-direction: column;">                
      <div id="content conten" class="col-sm-12"> 
          <h1>Связаться с нами</h1>
          <h3>Наш адрес</h3>
          <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
              <div class="col-sm-3"><img src="{{asset('img/ЛОГО.png')}}"  alt="IH-TEX" title="IH-TEX" class="img-thumbnail"/></div>
                  <div class="col-sm-3">
                    <strong>IP-text</strong>
                    <br/>
                  <address>
                    Узбекистан. г.Наманган. ул.....          
                  </address>
                    <a href="https://www.google.com/maps/place/2J2G%2B3VP,+%D0%9D%D0%B0%D0%BC%D0%B0%D0%BD%D0%B3%D0%B0%D0%BD,+%D0%A3%D0%B7%D0%B1%D0%B5%D0%BA%D0%B8%D1%81%D1%82%D0%B0%D0%BD/@40.9999752,71.6267818,17.44z/data=!4m5!3m4!1s0x38bb4bc973382559:0xd9036a655b37fa39!8m2!3d41.0001785!4d71.6270771?hl=ru" style="width: 105%;" target="_blank" class="btn btn-info">
                      <i class="fa fa-map-marker"></i> 
                      Посмотреть на Google карте
                    </a>
                  </div>
                  <div class="col-sm-3" style="display: flex;flex-direction: column;line-height: 11px;justify-content:center">
                    <strong>Телефон</strong>
                      <br>
                        +99890124042
                      <br/>
                      <br/>
                      <strong>Факс</strong><br>
                        +998692276776     
                        </div>                     
                  </div>
                  <div class="col-sm-3"></div>
              </div>
          </div>
        </div>
        <div   class="form-horizontal"> 
          <fieldset>
            <legend>Форма связи</legend>
            <div class="alert alert-success true"><i class="fa-solid fa-circle-check"></i><span style="margin-left:5px">Ваш отзыв был отправлен успешно!</span></div>
            <div class="opt">У вас есть ошибка!</div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name"><span> Ваше имя </span></label>
                <div class="col-sm-10">
                  <div class="redb">Ваше имя должно состоять как минимум из 3 символов</div>
                  <input type="text" name="name"  id="input-name" class="form-control names"  v-model='name'/>
                </div>
            </div>
            <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-email">E-Mail для связи</label>
                <div class="col-sm-10">
                <div class="redbu">Ваш  email должно состоять как минимум из 3 символов</div>
                  <input type="email" name="email" id="input-email" class="form-control names_email" v-model='email'/>
                </div>
              </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-enquiry">Сообщение</label>
                  <div class="col-sm-10">
                    <div class="redbul">Ваше сообщение должно состоять как минимум из 10 символов</div>
                    <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control names_text" v-model='text'></textarea>
                    </div>
                </div>
            </fieldset>
            <div class="buttons">
                <div class="pull-right">
                  <button class="btn btn-primary"  @click='Send()'>Отправить</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    @include('footer-site')
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
        var app = new Vue ({
            el:"#app",
            data:{
                types:[],
                groups:[],
                email:'',
                search_product:'',
                name:'',
                text:'',
                search:'',
               domain_url:window.location.origin + '/',
            },
            mounted(){
              this.local = localStorage.getItem('currency')
              this.level =  localStorage.getItem('level');
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
              Send(){
                document.querySelector('.true').classList.remove('activate')                
                if(document.querySelector('.names_email').value.trim().length < 3 || 
                document.querySelector('.names').value.trim().length < 3 ||  document.querySelector('.names').value.trim().length > 32 ||
                 document.querySelector('.names_text').value.trim().length < 10 ||  document.querySelector('.names_text').value.trim().length > 3000)
                 {
                  document.querySelector('.opt').classList.add('activate')
                  document.querySelector('.redb').classList.add('activate')
                  document.querySelector('.redbu').classList.add('activate')
                  document.querySelector('.redbul').classList.add('activate')
                      return;
                    }
                      else{
                      let formdata = new FormData()
                      formdata.append('name',this.name)
                      formdata.append('email',this.email)
                      formdata.append('text',this.text)
                      formdata.append('_token',this.token)

                      fetch(this.domain_url + 'api/send-message',{
                          body:formdata,
                          method:'POST',
                      })
                      .then(add => add.json())
                      .then(res => {
                          if (res.status == "ok") {
                              this.show = true;
                              document.querySelector('.true').classList.add('activate')
                              document.querySelector('.opt').classList.remove('activate')
                              document.querySelector('.redb').classList.remove('activate')
                              document.querySelector('.redbu').classList.remove('activate')
                              document.querySelector('.redbul').classList.remove('activate')
                              }
      
                              console.log(res)
                      })
                    }
               },
            }     
        })
</script>
</body></html>