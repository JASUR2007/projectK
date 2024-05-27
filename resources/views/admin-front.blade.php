<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin-panel</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
    <script src="https://kit.fontawesome.com/26d42b736c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


</head>
<style>
   body {
    font-family: 'Noto Sans JP', sans-serif;
    background-color: #fef8f8;
    display: block;
  }
  :root {
    --surface-color: #fff;
    --curve: 40;
  }

  * {
    box-sizing: border-box;
  }

  .modal.fade .modal-dialog {
    transform: translate(0, 0%);
 }




  /* diff */
  .deleted{
    display: none;
  }
  .deleted.activate{
    margin-bottom: 0;
    font-weight: normal;
    width: 20%;
    color: black;
    text-align: center;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 10px 0;
    font-size: 13px;
    line-height: 2.428571;
    border-radius: 3px;
    user-select: none;
    z-index: 1000;
    display: block;
  }
  .deletedd.activate{
    background-color: #f5c1bb;
  }

  /* img */
  #upload-photo {
    width: 93%;
    cursor: pointer;
    height: 9%;
    opacity: 0;
    position: absolute;
    z-index: 10;
  }

  .modal1.activate{
    display: block;
  }


  /* table */
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
  .modal-dialog {
      max-width: 660px;
      margin: 1.75rem auto;
  }

  .all_null{
    display: none;
  }
  .all_null.activate{
    padding-left: 20px;
    display: block;
    color: red;
  }
  .completed{
    display: none;
  }
  .completed.activate{
      margin-bottom: 0;
      font-weight: normal;
      text-align: center;
      touch-action: manipulation;
      cursor: pointer;
      background-image: none;
      border: 1px solid transparent;
      white-space: nowrap;
      padding: 8px 13px;
      font-size: 13px;
      line-height: 1.428571429;
      border-radius: 3px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      z-index: 1000;
      display: block;
      color: #fff;
  }

  .feed_delete{
    display: none;
  }
  .feed_delete.activate{
    display: block;
  }

  .product-thumb {
    border-radius:10px;
      background-color: white;
      border: 1px solid #ddd;
      margin-bottom: 20px;
      overflow: auto;
  }
  .product-thumb .image {
      text-align: center;
  }
  .product-thumb .image a {
      display: block;
  }
  .product-thumb .image img {
      margin-left: auto;
      margin-right: auto;
  }
  .product-thumb .caption {
      padding: 0 20px;
      min-height: 120px;
  }
  .col-lg-3 {
      flex: 0 0 auto;
      width: 100%;
  }
  .img-swipe-f{
    width: 312px;
  }
  .product-thumb h4 {
      font-weight: bold;
      font-size: 15px;
      color: #0256aa;
      margin-top: 10px;
      margin-bottom: 10px;
  }
  .caption a {
      color: #0256aa;
  }
  .product-thumb .price {
      color: #D31616;
      font-family: Tahoma;
      font-weight: 600;
      font-size: 24px;
      text-align: right;
      margin: 25px 0 0 0;
  }
  .home_work{
      position: fixed;
      top: 17.5%;
      font-size: 25px;
      right: 47%;
  }
  .product-layout_img{
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
  }
  .hei-vh{
    height: 80vh;
  }
  .button_create_new{
    height:50%
  }
  .creation_name{
    flex-direction: row;
  }
  .group_div{
      flex-direction: row;
    }
  .table_image{
    display: flex;
    gap: 10px;
    width: 100px;
    overflow: auto;
    flex-wrap: nowrap;
  }
  .table_types{
    height: 80vh;
    width: 100%;
    flex-wrap: wrap;
    overflow: auto;
  }
  .message_f{
    height: 80vh;
  }
  .deletion_imag{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .nik{
    grid-template-columns: 1fr 1fr;
    gap:30px;
    display: grid;
  }
  .mok-dop{
    max-width:450px
  }
  .mok-do{
    display: flex;
  }
  .hei-img{
    height: 100%;
    display: grid;
    grid-template-columns:33% 33% 33%;
  }
  .modaly{
    max-width: 650px;
  }

  .message_f>div{
    flex-direction: row;
  }




  .star-get.activate{
    display: block;
  }
  .star-get{
    display: none;
  }
  .star-give{
    display: block;
  }
  .star-give.activate{
    display: none;
  }
  .rec-null{
    display:none;
  }
  .rec-null.activate{
    display: block;
  }

  /* headder */
    .notification {
        align-items: center;
        text-decoration: none;
        padding: 5px 8px;
        position: relative;
        display: flex;
        border-radius: 2px;
    }
    .notification:hover {
      color: black;
    }
    .notification .fa-solid:hover {
      color: black;
    }
    .notification>.fa-bell:hover {
      color: red;
      animation: mymove 2s infinite;
    }
    @keyframes mymove{
      0% {transform:rotate(0deg);}
      50% {transform:rotate(20deg);}
      100% {transform:rotate(0);}
    }
    .notification .badge {
      position: absolute;
        top: 27%;
        right: -15%;
        padding: 1px 6px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }





    /* shtuk */
    .activate_item{
      background:#34a853;
    }
    .activate_null{
      background:#fbbc05;
    }



    /* checkbox */
    .checkbox-green {
    display: inline-block;
    height: 28px;
    line-height: 28px;
    margin-right: 10px;
    position: relative;
    vertical-align: middle;
    font-size: 14px;
    user-select: none;
  }
  .checkbox-green .checkbox-green-switch {
    display: inline-block;
    height: 28px;
    width: 90px;
    box-sizing: border-box;
    position: relative;
    border-radius: 2px;
    background: #848484;
    transition: background-color 0.3s cubic-bezier(0, 1, 0.5, 1);
  }
  .checkbox-green .checkbox-green-switch:before {
    content: attr(data-label-on);
    display: inline-block;
    box-sizing: border-box;
    width: 45px;
    padding: 0 12px;
    position: absolute;
    top: 0;
    left: 45px;
    text-transform: uppercase;
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
    line-height: 28px;
  }
  .checkbox-green .checkbox-green-switch:after {
    content: attr(data-label-off);
    display: inline-block;
    box-sizing: border-box;
    width: 44px;
    border-radius: 1px;
    position: absolute;
    top: 1px;
    left: 1px;
    z-index: 5;
    text-transform: uppercase;
    text-align: center;
    background: white;
    line-height: 26px;
    font-size: 10px;
    color: #777;
    transition: transform 0.3s cubic-bezier(0, 1, 0.5, 1);
  }
  .checkbox-green input[type="checkbox"] {
    display: block;
    width: 0;
    height: 0;
    position: absolute;
    z-index: -1;
    opacity: 0;
  }
  .checkbox-green input[type="checkbox"]:checked + .checkbox-green-switch {
    background-color: #70c767;
  }
  .checkbox-green input[type="checkbox"]:checked + .checkbox-green-switch:before {
    content: attr(data-label-off);
    left: 0;
  }
  .checkbox-green input[type="checkbox"]:checked + .checkbox-green-switch:after {
    content: attr(data-label-on);
    color: #4fb743;
    transform: translate3d(44px, 0, 0);
  }
  .alert_1{
    display: none;
  }
  .alert_1.activate{
    display:block;
  }
  /* Hover */
  .checkbox-green input[type="checkbox"]:not(:disabled) + .checkbox-green-switch:hover {
    cursor: pointer;
  }
  .checkbox-green input[type="checkbox"]:not(:disabled) + .checkbox-green-switch:hover:after {
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4);
  }

  /* Disabled */
  .checkbox-green input[type=checkbox]:disabled + .checkbox-green-switch {
    opacity: 0.6;
    filter: grayscale(50%);
  }

  /* Focus */
  .checkbox-green.focused .checkbox-green-switch:after {
    box-shadow: inset 0px 0px 4px #ff5623;
  }

  .select_group{
    display: block;
  }
  .select_group.activate{
    display: none;
  }
  .tooltip_delete {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
  }

  /*.tooltip_delete .tooltiptext {*/
  /*  visibility: hidden;*/
  /*  width: 150px;*/
  /*  background-color: #555;*/
  /*  color: #fff;*/
  /*  text-align: center;*/
  /*  border-radius: 6px;*/
  /*  padding: 5px 0;*/
  /*  position: absolute;*/
  /*  z-index: 1;*/
  /*  top: 140%;*/
  /*  left: -290%;*/
  /*  opacity: 0;*/
  /*  transition: opacity 0.3s;*/
  /*  -index:1000;*/
  /*}*/

  /*.tooltip_delete .tooltiptext::after {*/
  /*  content: "";*/
  /*  position: absolute;*/
  /*  top: -60%;*/
  /*  left: 80%;*/
  /*  z-index:100;*/
  /*  margin-left: -5px;*/
  /*  border-width: 10px;*/
  /*  border-style: solid;*/
  /*  border-color:  transparent   transparent  #555;*/
  /*}*/

  /*.tooltip_delete:hover .tooltiptext {*/
  /*  visibility: visible;*/
  /*  opacity: 1;*/
  /*}*/
</style>
<link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<body style="overflow-y:none;">
    <div  style="width: 100%;" >
      <b class="b-nav" @click='b_nav'></b>
      @include('header_panel')
      @include('sidebar_panel')
      <div id="content">
        <div  class="maine" id="app">
          <router-view></router-view>
        </div>
      </div>
    </div>
	</div>
  <!-- sidebar -->
  <script src="{{asset('js/menu-fix.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/sidebar.js')}}"></script>
 <link href="{{asset('css/bootstrap_admin.css')}}" type="text/css" rel="stylesheet" />
  <script src="{{asset('js/different.js')}}"></script>
  <script src="{{asset('js/main-page.js')}}"></script>
  <script src="{{asset('js/type.js')}}"></script>
  <script src="{{asset('js/main_js.js')}}"></script>
  <script src="{{asset('js/banners.js')}}"></script>
  <script src="{{asset('js/currency.js')}}"></script>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
  <script>
    var app = new Vue ({
        el:"#menu",
        data:{
          users:[],
          domain_url:window.location.origin + '/',
          token:document.querySelector('meta[name="csrf-token"]').content,
          url:window.location.href,
          back:''
        },
        mounted(){
          localStorage.setItem('url', this.url)
        },
        methods:{
          localstorage(){
            console.log(this.url)
            localStorage.setItem('url', this.url)
            localStorage.getItem('url')
          },
        }
    })
  </script>
	<script>
      var routes =[
        {path:'/',component:main},
        {path:'/banner',component:banner},
        {path:'/register',component:register},
        {path:'/admin_message',component:admin_message},
        {path:'/currency',component:currency},
        {path:'/edit_currency/:id',component:edit_currency},  
        {path:'/image_groups',component:image_groups},
        {path:'/image_home', component:image_home},
        {path:'/admin_recommended', component:admin_recommended},
        {path:'/admin_type', component:admin_type},
        {path:'/admin_type_class/:gender', component:admin_type_class},
        {path:'/edit_type/:id', component:admin_type_edit},
        {path:'/admin_group',component:admin_group},
        {path:'/edit_gender/:id',component:edit_gender},
        {path:'/admin_feedback',component:admin_feedback},
        ]

        var router= new VueRouter({
            routes:routes
        })
        var app = new Vue ({
            router:router,
            el:"#app",
            data:{
              users:[],
              types:'',
              domain_url:window.location.origin + '/',
              token:document.querySelector('meta[name="csrf-token"]').content,
              url:window.location.href,
              feedbacks_length:'',

            },
            mounted(){
              localStorage.setItem('url', this.url);
              // console.log(this.url)
            },
            methods:{
              navbar_click(){
                this.$el.querySelector('#app .sidebar').classList.add('activate')
                this.$el.querySelector('.b-nav').classList.add('activate')
              },
              b_nav (){
                this.$el.querySelector('.b-nav').classList.remove('activate')
                this.$el.querySelector('#app .sidebar').classList.remove('activate')
              },
              localstorage(){
                console.log(this.url)
                localStorage.setItem('url', this.url)
                localStorage.getItem('url')
              },          
            }
        })
	</script>
    <link type="text/css" href="{{asset('css/admin.css')}}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="{{asset('css/admin_front-css-screen.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/screen.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_register.css')}}">
</body>
</html>
