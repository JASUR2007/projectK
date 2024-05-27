
<!DOCTYPE html>
<html dir="ltr" lang="ru">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Регистрация</title>
@include('head-site')
<style>
    .country{
        display: none;
    }
    .check_rul{
        display: none;
    }
    .check_rul.activate{
        display: block;
    }
</style>
</head>
<body class="account-register">
    @include('header-site')
<div id="app">
    <div class="container">
    <ul class="breadcrumb">
            <li><a :href="domain_url + 'api'"><i class="fa fa-home"></i></a></li>
            <li><a :href="domain_url + 'api/account'">Личный Кабинет</a></li>
            <li><a :href="domain_url + 'api/account/register'">Регистрация</a></li>
        </ul>
        <div class="alert alert-danger check_rul">
            <i class="fa fa-exclamation-circle"></i>
             Для регистрации Вы должны быть согласны с документом Правила и условия!
        </div>
        <div class="row">                <div id="content" class="col-sm-9">      <h1>Регистрация</h1>
        <p>Если Вы уже зарегистрированы, перейдите на страницу 
            <a :href="domain_url + 'account'">авторизации</a>.
        </p>
        <form @submit.prevent="addregister()" class="form-horizontal">
            <fieldset id="account">
                <legend>Основные данные</legend>
                <div class="form-group required" style="display: none;">
                    <label class="col-sm-2 control-label">Группа покупателей</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="customer_group_id" value="1" checked="checked" />
                                Default
                            </label>
                        </div>
                   </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-firstname">Имя</label>
                    <div class="col-sm-10">
                    <input type="text" name="firstname" value="" placeholder="Имя" id="input-firstname" class="form-control" v-model='nami'/>
                                </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-lastname">Фамилия</label>
                    <div class="col-sm-10">
                    <input type="text" name="lastname" value="" placeholder="Фамилия" id="input-lastname" class="form-control" v-model='surname'/>
                                </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" v-model='mail'/>
                                </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone">Телефон</label>
                    <div class="col-sm-10">
                        <input type="number" name="telephone" value="" placeholder="Телефон" id="input-telephone" class="form-control" v-model='phone'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-fax">Факс</label>
                    <div class="col-sm-10">
                    <input type="text" name="fax" value="" placeholder="Факс" id="input-fax" class="form-control" v-model='facs'/>
                    </div>
                </div>
           </fieldset>
            <fieldset id="address">
                <legend>Ваш адрес</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-company">Компания</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" value="" placeholder="Компания" id="input-company" class="form-control" v-model='company'/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-address-1">Адрес</label>
                    <div class="col-sm-10">
                      <input type="text" name="address_1" value="" placeholder="Адрес" id="input-address-1" class="form-control" v-model='address'/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-postcode">Индекс</label>
                    <div class="col-sm-10">
                        <input type="text" name="postcode" value="" placeholder="Индекс" id="input-postcode" class="form-control" v-model='index_post'/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-country">Страна</label>
                    <div class="col-sm-10">
                        <select name="country_id" id="input-country" class="form-control" @change='changecountry($event)'>
                            <option value='Uzbekistan'> Uzbekistan </option>                    
                            <option  v-for='(country,index) of country' :key='index' v-bind:value="country.name.official" :class="[{country: country.name.official=='Republic of Uzbekistan'}]"     v-text='country.name.official'></option>
                        </select>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-zone">Регион / Область</label>
                    <div class="col-sm-10">
                        <input type="text" class='form-control' placeholder="Укажите регион" v-model='region'>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-city">Город</label>
                    <div class="col-sm-10">
                    <input type="text" name="city" value="" placeholder="Город" id="input-city" class="form-control" v-model='city'/>
                </div>
                </div>
           </fieldset>
            <fieldset>
                <legend>Ваш пароль</legend>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-password">Пароль</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" value="" placeholder="Пароль" id="input-password" class="form-control" v-model='password'/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-confirm">Подтвердить</label>
                    <div class="col-sm-10">
                       <input type="password" name="confirm" value="" placeholder="Подтвердить" id="input-confirm" class="form-control" v-model='confirm_password'/>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Подписка на новости</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Подписаться</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                          <input type="radio" name="newsletter" value="1" v-model='news'/>
                        Да</label>
                        <label class="radio-inline">
                            <input type="radio" name="newsletter" value="0" checked="checked"/>Нет
                        </label>
                  </div>
                </div>
            </fieldset>
            <div class="buttons">
                <div class="pull-right" style="display:flex;flex-direction:column;width:100%;align-items:flex-end">
                    <div style="width:100%;display: flex;align-items: center;">
                        Мною прочитаны и я даю согласие с документом 
                        <a data-toggle="modal" data-target="#exampleModal"  style="margin: 0px 4px;cursor:pointer">
                            <b> Правила и условия </b>
                        </a>   
                        <input type="checkbox"    style="margin: 2px 3px 0;"  v-model='check_ruler'/>
                    </div>       
                    <button type="submit" class="btn btn-primary" style="display:flex;justify-content: center;">Продолжить</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="display: flex;justify-content: space-between;">
                                <h5 class="modal-title" id="exampleModalLabel">Правила и условия</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               Terms & Conditions
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <aside id="column-right" class="col-sm-3 hidden-xs">
        <div class="list-group">
        <a href="http://ih-tex.uz/index.php?route=account/login" class="list-group-item">Авторизация</a>
         <a href="http://ih-tex.uz/index.php?route=account/register" class="list-group-item">Регистрация</a> <a href="http://ih-tex.uz/index.php?route=account/forgotten" class="list-group-item">Напомнить пароль</a>
        <a href="http://ih-tex.uz/index.php?route=account/account" class="list-group-item">Личный кабинет</a>
        <a href="http://ih-tex.uz/index.php?route=account/address" class="list-group-item">Адреса доставки</a>
         <a href="http://ih-tex.uz/index.php?route=account/wishlist" class="list-group-item">Мои закладки</a> <a href="http://ih-tex.uz/index.php?route=account/order" class="list-group-item">История заказов</a> <a href="http://ih-tex.uz/index.php?route=account/download" class="list-group-item">Файлы для скачивания</a><a href="http://ih-tex.uz/index.php?route=account/recurring" class="list-group-item">Периодические платежи</a> <a href="http://ih-tex.uz/index.php?route=account/reward" class="list-group-item">Бонусные баллы</a> <a href="http://ih-tex.uz/index.php?route=account/return" class="list-group-item">Возврат товара</a> <a href="http://ih-tex.uz/index.php?route=account/transaction" class="list-group-item">История платежей</a> <a href="http://ih-tex.uz/index.php?route=account/newsletter" class="list-group-item">Подписка на новости</a>
    </div>
    </aside>
    </div>
    </div>
    @include('footer-site')
</div>
<script>
        var app = new Vue ({
            el:"#app",
            data:{
               groups:[],
               types:[],
               country:[],
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
                // reg
                nami:'',
                surname:'',
                mail:'',
                phone:'',
                facs:'',
                company:'',
                address:'',
                city:'',
                index_post:'',
                country:'',
                region:'',
                confirm_password:'',
                news:'',
                password:'',
                check_ruler:'',
                token:document.querySelector('meta[name="csrf-token"]').content,
                
            },
            mounted(){      
                fetch(this.vallet)
                .then( p => p.json())
                .then( data=>{
                        console.log(data[23])
                        console.log(data[18])
                    }            
                )
                fetch('https://restcountries.com/v3.1/all')
                    .then( gr => gr.json())
                    .then( resp =>{
                    this.gif = false
                    this.country = resp
                    console.log(resp)
                })
                fetch(this.domain_url + 'api/group')
                .then( gr => gr.json())
                .then( resp =>{
                    this.gif = false
                    this.groups = resp.group
                    console.log(this.groups)
                })
                fetch(this.domain_url + 'api/type') 
                .then( p => p.json())
                .then( resp =>{
                    this.gif = false
                    this.types = resp.type
                    console.log(this.types) 
                })                          
            },
            methods:{
                check_rule(event){
                    console.log(event.target.checked)
                    if(event.target.checked){
                    
                    }else{  
                    }                
                },
                addregister(){
                    if(this.check_ruler == true){
                       this.$el.querySelector('.check_rul').classList.remove('activate')                     
                        let formdata = new FormData()
                        formdata.append('nami',this.nami)
                        formdata.append('surname',this.surname)
                        formdata.append('mail',this.mail)
                        formdata.append('phone',this.phone)
                        formdata.append('facs',this.facs)
                        formdata.append('company',this.company)
                        formdata.append('address',this.address)
                        formdata.append('city',this.city)
                        formdata.append('index_post',this.index_post)
                        formdata.append('country',this.country)
                        formdata.append('region',this.region)
                        formdata.append('confirm_password',this.confirm_password)
                        formdata.append('news',this.news)
                        formdata.append('password',this.password)
                        formdata.append('_token',this.token)

                        fetch(this.domain_url + 'add-users',{
                            body:formdata,
                            method:'POST',
                        })
                        .then(add => add.json())
                        .then(res => {
                            if (res.status == "ok") {
                                }

                                console.log(res)
                        })
                   }else{
                      this.$el.querySelector('.check_rul').classList.add('activate')                    
                   }
                },
                changecountry($event) {
                    this.country = $event.target.value;
              },
            }
        })
</script>
</body>
</html>

