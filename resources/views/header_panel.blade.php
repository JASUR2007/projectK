<!-- <header class="header" style="height:10%;display:flex;padding: 0 40px 0 0;box-shadow:10px 1px 10px white;background-color:white;border:none" >
   <div style="margin:0;display:flex;width: 100%;" class="header_main"> 
      <div class="dropdown_head" style="display: flex;justify-content: flex-end;margin-top:5px"> 
         <div class="dropdown d-flex align-items-center">
            <div>
               
            </div>  
         </div>
      </div>   
   </div>
   <a href='' class="notification">
      <i class="fa-solid fa-bell" style='font-size:20px'></i>
   </a>
   <div class="navbar-click">
     <i @click='navbar_click' class="fa-solid fa-bars"></i>
  </div>
</header>       -->




<header id="header" class="navbar navbar-static-top" style="height: 50px;">
  <div class="container-fluid" style="padding-left:0px;">
      <a id="button-menu-fix" style="height: 50px;display: flex;align-items: center;padding-left:20px;    text-decoration: none;">
        <i class="fa-solid fa-bars"></i>
      </a>  
      <ul class="nav navbar-nav navbar-right ul-nat">
        <li class="dropdown" v-for='users of users'>
          <a href="#register" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;list-style:none;border:none;display:flex;align-items: center;">
            <div style="width: 55px;height: 45px;">
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
                      <div> 
                        <p>
                          
                        </p>
                      </div>
                </form>
              </a>          
          </li>
        </ul>
    </div>
</header>
<style>
  @media (max-width: 768px) {
    .ul-nat{
      display: none;
    }
  }
</style>  
<script>
  var app = new Vue ({
      el:"#header",
      data:{
        users:[],
        domain_url:window.location.origin + '/',
        token:document.querySelector('meta[name="csrf-token"]').content,
        url:window.location.href,   
        user:'',
      },
      mounted(){ 
          fetch(this.domain_url + 'user') 
          .then( us => us.json())
          .then( resp =>{
            this.gif = false
            this.users = resp.register
            console.log(resp)
          })      
      },
  })
</script>