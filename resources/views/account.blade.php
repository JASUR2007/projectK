<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoriz</title>
    @include('head-site')
</head>
<body>
<div class="1w"></div></div>
<div class="2w"></div>
<div class="3w"></div>
<div class="4w"></div>
<div class="5w"></div>


<div >
    @include('header-site')
    </div>
    <div class='container'>
        <ul class="breadcrumb">
            <li><a :href="domain_url 'api'"><i class="fa fa-home"></i></a></li>
            <li><a :href="domain_url 'api/account'">Личный Кабинет</a></li>
            <li><a href="">Авторизация</a></li> 
        </ul>
        <div class="row">          
                <div id="content" class="col-sm-9">     
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well">

                            <h2>Новый пользователь</h2>
                                
                            <p>
                                <strong>Регистрация</strong>
                            </p>
                            <p>Создание учетной записи поможет делать следующие покупки быстрее (не надо будет снова вводить адрес и контактную информацию), видеть состояние заказа, а также видеть заказы, сделанные ранее. Вы также сможете накапливать при покупках призовые баллы (на них тоже можно что-то купить), а постоянным покупателям мы предлагаем систему скидок.</p>
                            <a :href="domain_url + 'account/register'" class="btn btn-primary">Продолжить</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h2>Я уже зарегистрирован</h2>
                            <p>
                                <strong>Авторизация</strong>
                            </p>
                            <form  @submit.prevent="enter_login()" id="app">
                                <div class="form-group">
                                    <label class="control-label">E-Mail:</label>
                                    <input type="text" placeholder="E-Mail:" id="input-email" class="form-control" v-model='nami'>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Пароль:</label>
                                    <input type="password" placeholder="Пароль:" id="input-password" class="form-control" v-model='password'>
                                    <a href="">Забыли пароль?</a>
                                </div>
                                <button type="submit"  class="btn btn-primary">Войти</button>
                           </form>
                    </div>
                </div>
            </div>
        </div>
        <aside id="column-right" class="col-sm-3 hidden-xs">
            <div class="list-group">
                <a :href="domain_url + 'account'" class="list-group-item">Авторизация</a>
                <a :href="domain_url + 'account/register'" class="list-group-item">Регистрация</a>
                <a class="list-group-item">Напомнить пароль</a>
                <a href = "" class="list-group-item">Личный кабинет</a>
                <a href = "" class="list-group-item">Адреса доставки</a>
                <a href = "" class="list-group-item">Мои закладки</a>
                <a href = "" class="list-group-item">История заказов</a>
                <a href = "" class="list-group-item">Файлы для скачивания</a>
                <a href = "" class="list-group-item">Периодические платежи</a>
                <a href = "" class="list-group-item">Бонусные баллы</a>
                <a href = "" class="list-group-item">Возврат товара</a>
                <a href = "" class="list-group-item">История платежей</a>
                <a href = "" class="list-group-item">Подписка на новости</a>
            </div>
        </aside>
        </div>
        @include('footer-site')
        </div>    
    </div>
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
              token:document.querySelector('meta[name="csrf-token"]').content,
               password:'',
               nami:''
            },
            mounted(){      
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
                enter_login(){
                    let formData = new FormData();
                    formData.append('nami',this.nami)
                    formData.append('password',this.password)
                    formData.append("_token",this.token);

                    fetch(this.domain_url + 'login',{
                    method:"POST",
                    body:formData,
                    })
                        .then(rep=> rep.json())
                        .then(res=>{
                            if (res.status == "ok") {
                                console.log(res.status)
                            }
                            if (res.status == "none") {
                            }		  
                            console.log(res)
                        })
	        	},	
            }
        })
</script>
</body>
</html>