var banner   = {
    template:`
    <div class="w-100 d-flex flex-column align-items-center">    
        <div  class="w-100 d-flex flex-column align-items-center"> 
            <div class="gif" v-if="gif" style="width: 100%;height: 100%;justify-content: center;">
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
            </div>
        </div>
        <div>
          <div  class="panel panel-default" style='display:flex;width:100%;justify-content:space-between;align-items: center;padding:0px 20px'>
            <div class="panel-heading">
              <h3 class="panel-title">
                <i class="fa fa-list"></i>
                Список баннеров
              </h3>
            </div>
        </div>
        <div class="panel-body">
          <form  id="form-banner">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td style="width: 1px;" class="text-center">
                        ID
                    </td>
                    <td class="text-left">
                        Название баннера
                    </td>
                    <td class="text-right">
                        Действие
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">                 
                      1
                    </td>
                    <td class="text-left">Слайд-шоу домашней страницы</td>
                    <td class="text-right">
                        <a data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Редактировать" href='#image_home'>
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                  <td class="text-center">                 
                    2
                  </td>
                  <td class="text-left">Слайд-шоу страницы в категориях</td>
                  <td class="text-right">
                      <a data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Редактировать" href='#image_groups'>
                          <i class="fa fa-pencil"></i>
                      </a>
                  </td>
                </tr>                
              </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
  </div>    
    `,
    data(){
        return{
            gif:false,
            swipe:''
        }
    },
    mounted() {
      this.gif = true
      fetch(this.$parent.domain_url + 'swiper')
      .then( p => p.json())
      .then( res =>{
        this.gif = true
        this.gif = false
        this.swipe = res.swpipe
        console.log(res.swpipe)
       })
      fetch(this.$parent.domain_url + 'image_type')
      .then( sw => sw.json())
      .then( resp =>{   
        this.gif = true
        this.gif = false        
        this.image = resp.image_type
        console.log(resp.image_type)
      })
    },
        methods:{
            
        },            
}
var image_home = {
  template:`
  <div class="w-100 d-flex flex-column align-items-center">    
      <div  class="w-100 d-flex flex-column align-items-center"> 
          <div class="gif" v-if="gif" style="width: 100%;height: 100%;justify-content: center;">
              <div class="loader">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
              <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
          </div>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="language1">
          <div class="panel-heading" 
            style=' display: flex;align-items: center;justify-content: space-between;width: 100%;padding:20px 65px 10px 5px'>
            <h3 class="panel-title"><i class="fa fa-pencil"></i>Изображение</h3>
          </div>
          <table id="images1" class="table table-striped table-bordered table-hover" v-for="(image,index) of i">
            <thead>
              <tr>
                <td class="text-left">ID</td>
                <td class="text-left">Ссылка</td>
                <td class="text-center">Изображение</td>
                <td>Дата создания</td>
                <td>Действие</td>
              </tr>
            </thead>
            <tbody>
              <tr :id="'image-row' +  index" v-for="(swipe_image,index) of swipe_images" :key="index">
                <td class="text-left">
                  <input type="text" name="banner_image[1][0][title]" :value="swipe_image.id" placeholder="Заголовок" class="form-control" disabled>
                </td>
                <td class="text-left" style="width: 30%;">
                  <select class='form-control' @change='gend($event,swipe_image.id)' v-model='swipe_images[index].source'>
                    <option v-for='types of types' :value="'kid/' + types.url_url">{{types.gender}}</option>
                  </select>
                  <input type="text" disabled :value="swipe_image.source" placeholder="Ссылка" class="form-control" v-if="swipe_images[index].source !== 'null' && swipe_images[index].source !== null">
                </td>
                <td class="text-center" style='display:flex;justify-content:center'>
                  <a :id="'thumb-image' + index" data-toggle="image" class="img-thumbnail" style='display:flex;justify-content:center;flex-direction:column;align-items:center;width:300px;height:100px' @click='show_edit($event,index)'>
                    <img :src="$parent.domain_url+'storage/' + swipe_image.images" alt="" title="" style='width:90%;height:90%;max-width:100%;max-height:100%;' :id="'img' + index">
                    <div :class="'change' + index" style='display:none'>
                      <button type="button" class="btn btn-primary" 
                        style='
                        width: 30px;
                        height: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: center;'>
                        <i class="fa-solid fa-pen-clip" style='
                        color: #FFFFFF;
                        font-size:10px;
                        background-color: transparent;
                        text-align: center;
                        width: 10px;
                        height: 10px;
                        padding-top: 0px;
                        vertical-align: unset;
                        display: block;'></i> 
                      </button>
                      <input type='file'
                     style='    
                      position: absolute;
                      height: 30px;
                      width: 30px;
                      margin-top: -30px;
                      opacity: 0;
                      z-index:1000' @change='changeimage($event,swipe_image.id,index)'>
                    </div>
                  </a>
                  <input type="hidden" name="banner_image[1][0][image]" value="catalog/demo/banners/MacBookAir.jpg" id="input-image0">
                </td>
                <td>
                  {{swipe_image.created_at}}
                </td>
                <td class="text-left">
                  <button type="button" @click='deleteit(swipe_image.id,index)' data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Удалить">
                    <i class="fa fa-minus-circle"></i>
                  </button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4"></td>
                <td class="text-left">
                  <button type="button" @click="addproduct($event,index)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить баннер">
                    <i class="fa fa-plus-circle" style='color:white'></i>
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
</div>    
  `,
  data(){
      return{
          swipe_images:[],
          image:'',
          gif:false,        
          // this.$parent.domain_url + 'api'
          source: '',
          types:[],
          swipe_images_null:[],
          i:1,
          index_show:[],
      }
  },
  mounted() {
      this.gif = true
      fetch(this.$parent.domain_url + 'swiper')
      .then( sw => sw.json())
      .then( resp =>{
        this.gif = false
        console.log(resp)
        this.swipe_images = resp.swiper
      })
      fetch(this.$parent.domain_url + 'swiper_null')
      .then( sw => sw.json())
      .then( resp =>{
        this.gif = false
        this.swipe_images_null = resp.swiper_null
      })
      fetch(this.$parent.domain_url + 'api/type')
      .then( p => p.json())
      .then( res =>{
        this.gif = false
        // console.log(res)
        this.types = res.type
      })
  },
      methods:{
          changeimage(event,id,index){
            this.gif_image = true   
            // console.log(this.link)
            let formdata = new FormData()
            console.log(event.target.files[0])
            formdata.append("photo",event.target.files[0]);
            formdata.append("id",id);          
            formdata.append('_token',this.$parent.token)

            fetch(this.$parent.domain_url + 'save-banner', {
                method:"POST",
                body:formdata 
                
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp);
                if(resp.status==="ok"){
                  // console.log(this.swipe_images.splice(1,1,1))
                  // return;
                  console.log(document.getElementById('img' + index))
                  document.getElementById('img' + index).src = this.$parent.domain_url+ 'storage/' + resp.data  
                }
            });    
          },
          show_edit($event,index){
            console.log(this.index_show.length)
              if(document.querySelector('.change' + index).style.display == 'none'){       
                this.index_show.push(index)
                document.querySelector('.change' + index).style.marginTop = '-52px'
                document.querySelector('.change' + index).style.marginLeft = '260px'
                document.querySelector('.change' + index).style.display = 'block'
                document.querySelector('.change' + index).style.position = 'absolute'   
                return;           
              }
            if(document.querySelector('.change' + index).style.display == 'block'){
              this.index_show.splice(this.index_show[index],1)
              document.querySelector('.change' + index).style.marginTop = '0px'
              document.querySelector('.change' + index).style.marginLeft = '0px'
              document.querySelector('.change' + index).style.display = 'none'
              document.querySelector('.change' + index).style.position = 'absolute'              
              return;
            }
          },
          ImgDelete(event,index) {
              this.link = this.images
              // console.log(this.link)
              let formdata = new FormData()
              formdata.append("link",this.link)
              formdata.append("_token",this.$parent.token)
  
              fetch(this.$parent.domain_url + 'delete-image_work', {
                  method:"POST",
                  body:formdata
              })
              .then(res=>res.json())
              .then(resp=>{
                  // console.log(resp);
                  if(resp.status==="deleted!"){
                      this.link.splice(index,1);                    
                  }
              });
          },
          deleteit(id,index){
            this.gif = true
            let formdata = new FormData()
            formdata.append("id",id)
            formdata.append("_token",this.$parent.token)

            fetch(this.$parent.domain_url + 'delete-image', {
                method:"POST",
                body:formdata
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp);
                if(resp.status==="deleted"){
                  this.gif = false
                    this.swipe_images.splice(index,1);
                }
            })
          },    
          addproduct($event,index) {
            // this.i++    
            var date = new Date()
            if(date.getMonth()+1 == 1 && date.getMonth()+1 == 2 && date.getMonth()+1 == 3 && date.getMonth()+1 == 4 && date.getMonth()+1 == 5 && date.getMonth()+1 == 6 && date.getMonth()+1 == 7 && date.getMonth()+1 == 8 && date.getMonth()+1 == 9){ 
              var dop = date.getMonth()+1
              var month = '0' + dop
            }else{
              var month = date.getMonth()+1
            }
            if(date.getHours() == 1 || date.getHours() == 2 || date.getHours() == 3 || date.getHours() == 4 || date.getHours() == 5 || date.getHours() == 6 || date.getHours() == 7 || date.getHours() == 8 || date.getHours() == 9){ 
              var hour = '0' + date.getHours()
              console.log('3')
            }else{
              console.log('22')
              var hour = date.getHours()
            }
            if(date.getMinutes() == 1 || date.getMinutes() == 2 || date.getMinutes() == 3 || date.getMinutes() == 4 || date.getMinutes() == 5 || date.getMinutes() == 6 || date.getMinutes() == 7 || date.getMinutes() == 8 || date.getMinutes() == 9){ 
              var min = '0' + date.getMinutes()
            }else{
              var min = date.getMinutes()
            }
            if(date.getSeconds() == 1 || date.getSeconds() == 2 || date.getSeconds() == 3 || date.getSeconds() == 4 || date.getSeconds() == 5 || date.getSeconds() == 6 || date.getSeconds() == 7 || date.getSeconds() == 8 || date.getSeconds() == 9){ 
              var sec = '0' + date.getSeconds()
            }else{
              
              var sec = date.getSeconds()
            }
            var year = date.getFullYear()  + '-' + month + '-' + date.getDate()  + ' ' + hour + ':' + min + ':' + sec
            // console.log(index)
            this.swipe_images.push({images:'swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg',source:null,id:this.swipe_images_null[this.swipe_images_null.length-1].id+1,created_at: year}) 
            let formdata = new FormData();
            formdata.append('images','swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg')
            formdata.append('source',null)
            formdata.append('_token',this.$parent.token)

            fetch(this.$parent.domain_url + `add-swiper`,{
                method:"post",
                body:formdata
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp.status)
                if (resp.status=="ok") {                        
                    console.log(resp)
                }else{
                    this.swipe_images.splice(index,1)
                }
            })
        },
          gend($event,id) {
              // console.log($event.target.value);
              // console.log(id)
              if(this.image == ''){
                  this.image='swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg'
              }
              console.log(this.image)
              this.source =  $event.target.value;
              let formdata = new FormData()
              formdata.append('id',id)
              formdata.append('source',this.source)
              formdata.append('images',this.image)
              formdata.append('_token',this.$parent.token)

              fetch(this.$parent.domain_url + 'save-swiper',{
                  body:formdata,
                  method:'POST',
              })
              .then(add => add.json())
              .then(res => {
                if (res.status == "ok") {
                    console.log(res)
                }
              })
            },
          // send img
          selectFile(event) {
              let formData = new FormData();
              formData.append("photo",event.target.files[0]);
            formData.append("_token",this.$parent.token);
  
            fetch(this.$parent.domain_url + 'get-image', {
              method:"POST",
              body:formData,
            })
            .then(reps=> reps.json())
            .then(images=>{
              // console.log(images.data)
              this.images.unshift(images.data);
            });
          },  
          // get img
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
      },            
}



var image_groups = {
  template:`
  <div class="w-100 d-flex flex-column align-items-center">    
      <div  class="w-100 d-flex flex-column align-items-center"> 
          <div class="gif" v-if="gif" style="width: 100%;height: 100%;justify-content: center;">
              <div class="loader">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
              <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
          </div>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="language1">
          <div class="panel-heading" 
            style=' display: flex;align-items: center;justify-content: space-between;width: 100%;padding:20px 65px 10px 5px'>
            <h3 class="panel-title"><i class="fa fa-pencil"></i>Изображение</h3>
          </div>
          <table id="images1" class="table table-striped table-bordered table-hover" v-for="(image,index) of i">
            <thead>
              <tr>
                <td class="text-left">ID</td>
                <td class="text-center">Изображение</td>
                <td>Дата создания</td>
                <td>Действие</td>
              </tr>
            </thead>
            <tbody>
              <tr :id="'image-row' +  index" v-for="(swipe_image,index) of swipe_images" :key="index">
                <td class="text-left">
                  <input type="text" name="banner_image[1][0][title]" :value="swipe_image.id" placeholder="Заголовок" class="form-control" disabled>
                </td>
                <td class="text-center" style='display:flex;justify-content:center'>
                  <a :id="'thumb-image' + index" data-toggle="image" class="img-thumbnail" style='display:flex;justify-content:center;flex-direction:column;align-items:center;width: 280px;height: 180px;' @click='show_edit($event,index)'>
                    <img :src="$parent.domain_url+'storage/' + swipe_image.img" alt="" title="" style='width:90%;height:90%;max-width:100%;max-height:100%;' :id="'img' + index">
                    <div :class="'change' + index" style='display:none'>
                      <button type="button" class="btn btn-primary" 
                        style='
                        width: 30px;
                        height: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: center;'>
                        <i class="fa-solid fa-pen-clip" style='
                        color: #FFFFFF;
                        font-size:10px;
                        background-color: transparent;
                        text-align: center;
                        width: 10px;
                        height: 10px;
                        padding-top: 0px;
                        vertical-align: unset;
                        display: block;'></i> 
                      </button>
                      <input type='file'
                     style='    
                      position: absolute;
                      height: 30px;
                      width: 30px;
                      margin-top: -30px;
                      opacity: 0;
                      z-index:1000' @change='changeimage($event,swipe_image.id,index)'>
                    </div>
                  </a>
                  <input type="hidden" name="banner_image[1][0][image]" value="catalog/demo/banners/MacBookAir.jpg" id="input-image0">
                </td>
                <td>
                  {{swipe_image.created_at}}
                </td>
                <td class="text-left">
                  <button type="button" @click='deleteit(swipe_image.id,index)' data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Удалить">
                    <i class="fa fa-minus-circle"></i>
                  </button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4"></td>
                <td class="text-left">
                  <button type="button" @click="addproduct($event,index)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить баннер">
                    <i class="fa fa-plus-circle" style='color:white'></i>
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
</div>    
  `,
  data(){
      return{
          swipe_images:[],
          img:'',
          gif:false,        
          // this.$parent.domain_url + 'api'
          source: '',
          types:[],
          swipe_images_null:[],
          i:1,
          index_show:[],
      }
  },
  mounted() {
      this.gif = true
      fetch(this.$parent.domain_url + 'image_type')
      .then( sw => sw.json())
      .then( resp =>{
        this.gif = false
        console.log(resp)
        this.swipe_images = resp.image_type
      })
      fetch(this.$parent.domain_url + 'image_type_null')
      .then( sw => sw.json())
      .then( resp =>{
        this.gif = false
        this.swipe_images_null = resp.image_type
      })
      fetch(this.$parent.domain_url + 'api/type')
      .then( p => p.json())
      .then( res =>{
        this.gif = false
        // console.log(res)
        this.types = res.type
      })
  },
      methods:{
          changeimage(event,id,index){
            this.gif_image = true   
            // console.log(this.link)
            let formdata = new FormData()
            console.log(event.target.files[0])
            formdata.append("photo",event.target.files[0]);
            formdata.append("id",id);          
            formdata.append('_token',this.$parent.token)

            fetch(this.$parent.domain_url + 'save-image_type', {
                method:"POST",
                body:formdata
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp);
                if(resp.status==="ok"){
                  // console.log(this.swipe_images.splice(1,1,1))
                  // return;
                  console.log(document.getElementById('img' + index))
                  document.getElementById('img' + index).src = this.$parent.domain_url+ 'storage/' + resp.data  
                }
            });    
          },
          show_edit($event,index){
            console.log(this.index_show.length)
              if(document.querySelector('.change' + index).style.display == 'none'){       
                this.index_show.push(index)
                document.querySelector('.change' + index).style.marginTop = '-150px'
                document.querySelector('.change' + index).style.marginLeft = '250px'
                document.querySelector('.change' + index).style.display = 'block'
                document.querySelector('.change' + index).style.position = 'absolute'   
                return;           
              }
            if(document.querySelector('.change' + index).style.display == 'block'){
              this.index_show.splice(this.index_show[index],1)
              document.querySelector('.change' + index).style.marginTop = '0px'
              document.querySelector('.change' + index).style.marginLeft = '0px'
              document.querySelector('.change' + index).style.display = 'none'
              document.querySelector('.change' + index).style.position = 'absolute'              
              return;
            }
          },
          ImgDelete(event,index) {
              this.link = this.images
              // console.log(this.link)
              let formdata = new FormData()
              formdata.append("link",this.link)
              formdata.append("_token",this.$parent.token)
  
              fetch(this.$parent.domain_url + 'delete-image_work', {
                  method:"POST",
                  body:formdata
              })
              .then(res=>res.json())
              .then(resp=>{
                  // console.log(resp);
                  if(resp.status==="deleted!"){
                      this.link.splice(index,1);                    
                  }
              });
          },
          deleteit(id,index){
            this.gif = true
            let formdata = new FormData()
            formdata.append("id",id)
            formdata.append("_token",this.$parent.token)

            fetch(this.$parent.domain_url + 'delete-image_type', {
                method:"POST",
                body:formdata
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp);
                if(resp.status==="deleted"){
                  this.gif = false
                    this.swipe_images.splice(index,1);
                }
            })
          },    
          addproduct($event,index) {
            // this.i++    
            var date = new Date()
            if(date.getMonth()+1 == 1 && date.getMonth()+1 == 2 && date.getMonth()+1 == 3 && date.getMonth()+1 == 4 && date.getMonth()+1 == 5 && date.getMonth()+1 == 6 && date.getMonth()+1 == 7 && date.getMonth()+1 == 8 && date.getMonth()+1 == 9){ 
              var dop = date.getMonth()+1
              var month = '0' + dop
            }else{
              var month = date.getMonth()+1
            }
            if(date.getHours() == 1 || date.getHours() == 2 || date.getHours() == 3 || date.getHours() == 4 || date.getHours() == 5 || date.getHours() == 6 || date.getHours() == 7 || date.getHours() == 8 || date.getHours() == 9){ 
              var hour = '0' + date.getHours()
              console.log('3')
            }else{
              console.log('22')
              var hour = date.getHours()
            }
            if(date.getMinutes() == 1 || date.getMinutes() == 2 || date.getMinutes() == 3 || date.getMinutes() == 4 || date.getMinutes() == 5 || date.getMinutes() == 6 || date.getMinutes() == 7 || date.getMinutes() == 8 || date.getMinutes() == 9){ 
              var min = '0' + date.getMinutes()
            }else{
              var min = date.getMinutes()
            }
            if(date.getSeconds() == 1 || date.getSeconds() == 2 || date.getSeconds() == 3 || date.getSeconds() == 4 || date.getSeconds() == 5 || date.getSeconds() == 6 || date.getSeconds() == 7 || date.getSeconds() == 8 || date.getSeconds() == 9){ 
              var sec = '0' + date.getSeconds()
            }else{
              var sec = date.getSeconds()
            }
            var year = date.getFullYear()  + '-' + month + '-' + date.getDate()  + ' ' + hour + ':' + min + ':' + sec
            // console.log(index)
            this.swipe_images.push({img:'swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg',id:this.swipe_images_null[this.swipe_images_null.length-1].id+1,created_at: year}) 
            let formdata = new FormData();
            formdata.append('img','swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg')
            formdata.append('_token',this.$parent.token)

            fetch(this.$parent.domain_url + `add-img_swipe`,{
                method:"post",
                body:formdata
            })
            .then(res=>res.json())
            .then(resp=>{
                console.log(resp.status)
                if (resp.status=="ok") {                        
                    console.log(resp)
                }else{
                    this.swipe_images.splice(index,1)
                }
            })
        },
          // send img
          selectFile(event) {
              let formData = new FormData();
              formData.append("photo",event.target.files[0]);
            formData.append("_token",this.$parent.token);
  
            fetch(this.$parent.domain_url + 'get-image', {
              method:"POST",
              body:formData,
            })
            .then(reps=> reps.json())
            .then(images=>{
              // console.log(images.data)
              this.images.unshift(images.data);
            });
          },  
          // get img
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
      },            
}