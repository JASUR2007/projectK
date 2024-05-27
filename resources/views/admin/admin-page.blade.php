<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  	<title>Document</title>
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
    <script src="https:////cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>
<style>  
  #upload-photo {
    opacity: 0;
    position: absolute;
    z-index: 10;
    width: 420px;
    height: 200px;
  }
  tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
  }
  .import_incognito{
    width: 100px;
    height: 150px;
  }
  .btn_1{
    background-color: #4285f4;
    color: #fff;
    border-color: #197bb0;
    box-shadow: 0 1px 0 rgb(0 0 0 / 5%);
    border: 1px solid transparent;
    font-size: 1rem;
    border-radius: 2px;
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    vertical-align: middle;
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
  }
  .btn_1:hover{
    color: white;
  }
  .btn_1.active, .btn_1.focus, .btn_1:active, .btn_1:active:focus, .btn_1:active:hover, .btn_1:focus {
    color: #fff;
    box-shadow: inset 0 2px 0 #1266f1;
    background-color: #2572f2;
    border-color: #0c57d3 #2572f2 #2572f2;
    background-image: none;
}
  .none_next{
    display: none;
  }
  .right{
    color: #fff;
    box-shadow: inset 0 2px 0 #1266f1;
    background-color: #2572f2;
    border-color: #0c57d3 #2572f2 #2572f2;
    background-image: none;
  }  
  /* .person_date{ */
    /* display: none; */
  /* } */
</style>
<body>
 <div  style="display: flex;width: 100%;" > 
 <!-- <header id="header" class="navbar navbar-static-top" style="height: 50px;">
  <div class="container-fluid" style="padding-left:0px;">
    <a id="button-menu-fix" style="height: 50px;display: flex;align-items: center;padding-left:20px;    text-decoration: none;">
      <i class="fa-solid fa-bars"></i>
    </a>  
    <ul class="nav navbar-nav navbar-right ul-nat">
      <li class="dropdown" v-for='users of users'>
        <a href="#register" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;list-style:none;border:none;display:flex;align-items: center;">
          <div st yle="width: 55px;height: 45px;">
           <img :src="domain_url+'storage/' + users.img" v-bind:alt="users.nami" title="admin_ihtexuz" id="user-profile" class="img-circle" style='width:80%;height:80%;max-width:100%;max-height:100%;'/>
          </div>
          <span v-text='users.nami'></span>
          <i class="fa fa-caret-down fa-fw"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" style="text-decoration:none;list-style:none;border:none">
          <li>
            <a href="#register" style="text-decoration:none;list-style:none;border:none">
              <i class="fa fa-user-circle-o fa-fw"></i> 
              Ваш профиль
            </a>
          </li>
          <li role="separator" class="divider"></li>
          <li class="dropdown-header">Магазины</li>
          <li>
            <a :href="domain_url + 'api'" target="_blank" style="text-decoration:none;list-style:none;border:none">Ваш магазин</a>
          </li>
          <li role="separator" class="divider"></li>
        </ul>
      </li>
      <li style="height: 50px;align-items:center;display:flex">
         <a style="text-decoration: none;">
            <form  action="{{url('/logout-system')}}" method="post">
                  <i class="fa fa-sign-out"></i> 
                  <input type="hidden" value="{{csrf_token()}}" name="_token">
                  <button class="hidden-xs hidden-sm hidden-md" style="padding-left:3px;border:none;background:none;font-size:14px">Выход</button>
            </form>
          </a>          
      </li>
    </ul>
    </div>
</header> -->



<div  style="width: 100%;" >
      @include('header_panel')
        @include('sidebar_work') 
        <div  class="mainer" id="content">
          <router-view></router-view>
        </div>
      @include('admin_footer')
    </div>
  </div>
    <script src="{{asset('extend/vue.txt')}}"></script>
    <script src="{{asset('extend/router.txt')}}"></script>

    <script src="{{asset('js/menu-fix.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
  <link href="{{asset('css/bootstrap_admin.css')}}" type="text/css" rel="stylesheet" />
    <script src="{{asset('js/adm-workers.js')}}"></script>
    <script src="{{asset('js/adm-classification.js')}}"></script>
    <script src="{{asset('js/admin-panel.js')}}"></script>
    <script src="{{asset('js/adm-otdel.js')}}"></script>
    <script src="{{asset('js/adm-letter.js')}}"></script>
    <script src="{{asset('js/adm-potok-num.js')}}"></script>
    <script src="{{asset('js/adm-transport.js')}}"></script>
    <script src="{{asset('js/adm-earning.js')}}"></script>
    <script src="{{asset('js/worker_date.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
   <!-- <script>
$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
 
    // DataTable
    var tab  =  worker                  
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
          this.api()
            .columns()
            .every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
              });
        },
    });
});
   </script> -->
	<script>
		 var routes =[
//      {path:'/date_r', component:date},
//      {path: '/date_w', component:dare},
//      {path: '/date_u', component:dake}, 
//      {}

        {path:'/worker_date',component:worker_date},
        {path:'/worker',component:worker},
        {path:'/add_worker', component: add},
        {path:'/adm_classification', component: adm_classification},
        {path:'/edit_classification/:id',component:edit_classification},
      
        {path:'/adm_otdel', component:adm_otdel},
        {path:'/edit_otdel/:id',component:edit_otdel},
        {path:'/adm_earning', component: adm_earning},
        {path:'/edit_earning/:id',component:edit_earning},
        {path:'/adm_potok_num', component:adm_potok_num},
        {path:'/edit_potok_num/:id',component:edit_potok_num},
        {path:'/adm_transport', component:adm_transport},
        {path:'/edit_transport/:id',component:edit_transport},
        {path:'/adm_letter', component:adm_letter},
        {path:'/edit_letter/:id',component:edit_letter},
        ]
         var router= new VueRouter({
            routes:routes
        })
        var app = new Vue ({
            router:router,
            el:".mainer",
            data:{
               users:[],
               openation:false,
               domain_url:window.location.origin + '/',
               token:document.querySelector('meta[name="csrf-token"]').content,
            },
            mounted(){
              // fetch(this.domain_url + 'reg_save')
              //       .then(rep=> rep.json())
              //       .then (res => {
              //       console.log(res)
              //    });        

            },
            methods:{
                 parseJson(jsonArray) {
                     if ( this.isJsonString(jsonArray)) {
                        if( this.isJsonString(jsonArray).length > 0) {
                         return this.$parent.domain_url+'storage/' +  this.isJsonString(jsonArray)[0];
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
            // open file creator
        })
        
	</script>
  <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      width : 100,
      height : 100
    });

    function makeCode () {		
      var elText = document.getElementById("");
      var elText = document.getElementById("");
      var elText = document.getElementById("text");
      

      qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#text").
      on("blur", function () {
        makeCode();
      }).
      on("keydown", function (e) {
        if (e.keyCode == 13) {
          makeCode();
        }
      });
  </script>
    <link type="text/css" href="{{asset('css/admin.css')}}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="{{asset('css/admin_front-css-screen.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/screen.css')}}">
</body>
</html>









<!-- info -->
<!-- admin -->
<!-- login -->
<!-- changer -->
<!-- info like writer -->
<!-- admin couldnot see everything  while can -->
<!-- login might be protected not public -->
<!-- changer -> turn from ACS to hash  -->
