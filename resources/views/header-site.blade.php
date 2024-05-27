<style>
   .valute_symbol{
      display: none;
    }
</style>
<div id="header">
  <nav id="top">
    <div class="container">
      <div class="pull-left">
        <span>
          <div class="btn-group">
            <select class="form-control val_symbol" @change='valute($event)' style="border:none;background:none;text-shadow:none;box-shadow:none;width: 115 px;">
              <option selected v-text="local + ' Валюта'"></option>
              <option :class="[{valute_symbol:local == valute.symbol}]" v-for='valute of currency' :value='valute.symbol '   v-text="valute.symbol + ' Валюта'"></option>
            </select>
          </div>
          <input type="hidden">
        </span>    
      </div>
          <div id="top-links" class="nav pull-right">
            <ul class="list-inline">
              <li>
                <a :href="domain_url + 'api/contact'">
                  <i class="fa fa-phone"></i>
                </a> <span class="hidden-xs hidden-sm hidden-md">+99892766524</span></li>
              </ul>
            </div>
          </div>
  </nav>
  <header>
    <div class="container">
        <div class="row">
          <div class="col-sm-4">
              <div id="logo">
                  <a :href="domain_url + 'api'">
                    <img src="{{asset('img/ЛОГО.png')}}" style="width:20% ;" title="IH-TEX" alt="IH-TEX" class="img-responsive" />
                  </a>
              </div>
          </div>
          <div class="col-sm-5">
            <div id="search" class="input-group">
              <input type="text" name="title" v-model="search" placeholder="Поиск товара по каталогу" class="form-control input-lg" @keyup.enter='button_href'>
              <span class="input-group-btn">
                <button type="button" @click='button_href'  class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span>
            </div>     
        </div>
      </div>
    </div>
  </header>
  <div class="container"> 
    <nav id="menu" class="navbar">
      <div class="navbar-header"><span id="category" class="visible-xs">Категории</span>
        <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown" v-for='types of types'>
            <a  :href="domain_url + 'api/kid/' + types.url_url"  class="dropdown-toggle" data-toggle="dropdown" v-text="types.gender"></a>
            <div class="dropdown-menu">
                <div class="dropdown-inner">
                  <ul class="list-unstyled" style="grid-template-rows:auto;grid-template-columns:repeat(3,1fr);display: grid;">
                    <li v-for="(groups,index) of groups" :key="index" v-if="types.gender == groups.group_id">
                      <a  :href="domain_url+ 'api/kid/' + types.url_url + '/'  + groups.url" v-text='groups.namin'></a></li>
                  </ul>
              </div>
              <a  :href="domain_url + 'api/kid/' + types.url_url" class="see-all">Показать все <span v-text='types.gender'></span></a> 
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<script>
        var app = new Vue ({
            el:"#header",
            data:{
               token:document.querySelector('meta[name="csrf-token"]').content,
               search:'',
               groups:[],
               types:[],
               pro_recomeds:[],
               url:window.location.href,
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
            fetch(this.domain_url + 'api/currency')
              .then( currenc => currenc.json())
              .then( resp =>{
                // console.log(resp.price[resp.price.length - 1])
                  this.currency = resp.currency
                  // this.val =  setItem('currency', 'this.currency')
                  // console.log(this.val)
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
              button_href(){
                if(this.search == ""){
                  return;
                }
                else{
                 window.location.href = '/search-product/'+ this.search                
                }
              },   
              valute($event){
                this.val = $event.target.value;
                for(currency of this.currency){
                  if(currency.symbol == this.val){
                    this.level = currency.level
                    localStorage.setItem('level', this.level);
                  }
                }
                 localStorage.setItem('currency', this.val);
                 location.reload()
              },
                // localStorage.setItem('text', this.currency);
              //  localStorage.setItem('currency', this.val);
              //  localStorage.getItem('text')
              //  console.log(localStorage.getItem('text'))    
            }
          }, 
        )
	</script>
