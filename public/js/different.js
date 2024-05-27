var admin_feedback = {
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
            <div class="deleted">Удалено!</div>
            <h3 style="
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0px 23px;">Сообщения</h3>
            <div class="panel-body">
                <div id="form-product">
                <div class="table-responsive" style='flex-wrap: wrap;overflow: auto;'>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <td style="width: 1px;" class="text-center">ID</td>
                            <td class="text-center">Комменты</td>
                            <td class="text-left"> 
                                <a style='text-decoration:none'>Подгруппа</a>
                            </td>
                            <td class="text-center">Дата обновления</td>
                            <td class="text-right" style='display: flex;justify-content: space-between;border: none;'>Действие</td>
                            </tr>
                        </thead>
                        <tbody v-for='products of products'>
                            <tr v-for="(feedback,index) of feedbacks" :key="index" v-if = 'feedback.product_id == products.id'> 
                                <td class="text-left">{{feedback.product_id}}</td>
                                    <td class="text-left">
                                        <span  style = ' 
                                            width: 150px;
                                            display: flex;
                                            overflow: hidden;
                                            text-overflow: clip;
                                            flex-wrap: wrap;
                                            white-space: nowrap;
                                            max-width: 150px;'>  
                                            {{feedback.feedback}}
                                        </span>
                                    </td>
                                    <td class="text-left">{{feedback.gender}}</td>
                                    <td class="text-right" style='
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        height: 50px;
                                    '> 
                                        {{feedback.created_at}}
                                    </td>
                                <td class="text-right">
                                    <div style='display:flex'>
                                    <a @click="deleteit(feedback.id,index)" class="message_text_a card-link btn btn-danger h-25  d-flex align-items-center"><i class='bx bxs-trash'></i></a>                        
                                    </div>
                                </td>
                            </tr>
                        </tbody>                    
                    </table>
                </div>
                </div>
            </div>
        </div>            
    </div>
</div>
    `,
    data(){
        return{
            feedbacks:[],
            products:[],
            links:[],
            input:15,
            per_page:10,
            gif:false,
        }
    },
    mounted() {
        this.gif = true
        fetch(this.$parent.domain_url + 'feedbacks')
        .then( resp => resp.json())
        .then( feed =>{
                this.gif = false
                this.message  = feed
                this.feedbacks = feed.feedbacks
                
                console.log(feed)
                // for(links of mes.learn){
                    console.log(this.feedbacks)
                // }
                document.querySelector('.deleted').classList.remove('activate')
            }         
        )
        fetch(this.$parent.domain_url + 'product')
        .then( resp => resp.json())
        .then( pro =>{
                this.gif = false
                console.log(pro)
                this.products = pro.products
                
            }         
        )            
    },
        methods:{
            deleteit(id,index){
                let tek = confirm('Вы действительно хотите удалить сообщение?')
                if(tek){
                document.querySelector('.deleted').classList.remove('activate')
                    let formdata = new FormData()
                    formdata.append("id",id)
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete-feedbacks', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        console.log(resp);
                        if(resp.status==="deleted"){
                            document.querySelector('.deleted').classList.add('activate')
                            this.feedbacks.splice(index,1);
                        }
                    })
                }
            else{
                return;
            }
            },              
        },    

}

var admin_message = {
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
            <h3 style="height:60px;">Сообщения</h3>
            <div class="deletedd">Удалено!</div>
            <div id="btnContainer" class='d-flex flex-row justify-content-start w-100 px-3'>
            </div>
            <div  class="w-100  py-1 messages message_f" style="flex-wrap: wrap;overflow: auto;">
            <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Список отзывов</h3>
          </div>
          <div class="panel-body">
            <form id="form-review">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td style="width: 1px;" class="text-center">
                        Ch
                      </td>
                      <td class="text-left"> 
                            <div>Mail</div> 
                     </td>
                      <td class="text-left"> 
                        <div>Автор</div>
                     </td>
                      <td class="text-right">
                         <div>Рейтинг</div>
                     </td>
                      <td class="text-left">
                         <div>Дата добавления</div>
                     </td>
                      <td class="text-right">Действие</td>
                    </tr>
                  </thead>
                  <tbody>                
                       <tr v-for="(messages,index) of messages" :key="index">
                           <td class="text-center">                      
                               <input type="checkbox" name="selected[]" value="2">
                            </td>
                            <td class="text-left">{{messages.mail}}</td>
                            <td class="text-left">{{messages.name}}</td>
                            <td class="text-right">4</td>
                            <td class="text-left">{{messages.created_at}}</td>
                            <td class="text-right">
                                 <a @click="deleteit(messages.id,index)" class="message_text_a card-link btn btn-danger h-25  d-flex align-items-center"><i class='bx bxs-trash'></i></a>
                            </td>
                       </tr>
                    </tbody>                  
                </table>
              </div>
            </form>
          </div>
        </div>
            </div>
        </div>
    </div>    

    `,
    data(){
        return{
            messages:[],
            links:[],
            input:15,
            per_page:10,
            gif:false,
        }
    },
    mounted() {
        this.gif = true
        fetch(this.$parent.domain_url + 'message')
        .then( m => m.json())
        .then( mes =>{
                this.gif = false
                this.message  = mes
                this.messages = mes.learn
                
                console.log(mes)
                // for(links of mes.learn){
                // }
                document.querySelector('.deleted').classList.remove('activate')
            }         
        )         
    },
        methods:{
            deleteit(id,index){
                let tek = confirm('Вы действительно хотите удалить сообщение?')
                if(tek){
                    let formdata = new FormData()
                    formdata.append("id",id)
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete-message', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        console.log(resp);
                        if(resp.status==="deleted"){
                            document.querySelector('.deletedd').classList.add('activate')
                            document.querySelector('.deleted').classList.add('activate')
                            this.messages.splice(index,1);
                        }
                    })
                }
            else{
                return;
            }
            },      
        },    

}



// var image_groups = {
//     template:`
//     <div class="w-100 d-flex flex-column align-items-center">    

//         <div  class="w-100 d-flex flex-column align-items-center"> 
//             <div class="gif" v-if="gif" style="width: 100%;height: 100%;justify-content: center;">
//                     <div class="loader">
//                         <span></span>
//                         <span></span>
//                         <span></span>
//                         <span></span>
//                     </div>
//                 <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
//             </div>
//         </div>
//         <div class="w-100 d-flex justify-content-start px-5">
//             <div class="d-flex w-100 justify-content-center creation_name">    
//                 <h3 style="height:60px;" class='w-100 justify-content-start'>Фотографии для главной странице</h3>
//                 <div class="h-100 w-100 d-flex align-items-center justify-content-end">
//                     <button type="button" class="btn btn-primary button_create_new"  data-toggle="modal" data-target=".bd-example-modal-lg">Create new+</button>
//                 </div>
//             </div>
//         </div>
//         <aside id="column-left" class="col-sm-3 hidden-xs">
//             <div class="swiper mySwiper product-layout_lay_rec product-layout_img">
//                 <div class="swiper-wrapper">
//                     <div class="swiper-slide item"  v-for="(images,index) of image" :key="index">
//                       <img  :src="parseJson(images.img)" alt="no image" class="img-responsive img-responsive_rec img-swipe-f"/>
//                     </div>      
//                 </div>
//             </div>
//         </aside>
//         <div class="deleted btn bg-danger">Удалено!</div>
//             <div class="completed btn bg-success">Сохранено!</div>
//                 <div class='adding-wid'>
//                     <div  class="w-100  messages hei-img hei-vh">
//                         <div class="card text-white product-layout_lay_rec     product-layout_img adding-wid" v-for="(images,index) of image" :key="index">
//                                     <img :src="parseJson(images.img)" class="img-responsive img-responsive_rec"/>
//                                     <p style='position:absolute;top:0'>{{images.created_at}}</p>
//                                     <a @click="deleteit(images.id,index)" style="position: absolute;top: 0%;right: 0%;" class="card-link btn btn-danger my-2 mx-2 d-flex align-items-center justify-content-center"><i class='bx bxs-trash'></i></a>
//                         </div>
//                     </div>
//                 </div>
//                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
//                     <div class="modal-dialog modal-lg">
//                         <div class="modal-content">
//                             <div class="modal-body">
//                                <form>
//                                     <div class="form-group">
//                                          <label for="recipient-name" class="col-form-label">Image:</label>
//                                         <div>
//                                                 <div style="height:100%;width:100%;background-color:whitesmoke;border-radius:5px;display:flex;cursor:pointer" class="align-items-center justify-content-center flex-column">
//                                                     <img src='data:image/png;base64,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' alt="" style="color:grey;width:20px;height:20px">
//                                                         <div style="font-size:10px;color:grey">Upload</div>
//                                                         <input type="file" name="photo" id="upload-photo"  @change = "selectFile($event)"/>                      
//                                                 </div>			                        
//                                                 <div class="d-grid" style="grid-template-columns:1fr 1fr">
//                                                     <div v-for="(img,index) in img" :key="index" style="height:150px;width:150px;background-color:whitesmoke;border-radius:5px;display:flex;cursor:pointer;" class="align-items-center justify-content-center flex-column">
//                                                         <img :src="$parent.domain_url+'storage/'+ img"  alt="" style="color:grey;width:90%;height:90%">
//                                                     </div>
//                                                 </div>
//                                             </label>
//                                         </div>
//                                     </div>
//                                    <div class="form-group">
//                                        <label for="message-text" class="col-form-label">Ссылка сайта:</label>                                       
//                                    </div>
//                                </form>
//                             </div>
//                             <div class="modal-footer">
//                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
//                                 <button type="button" @click='addimage' class="btn btn-primary">Save image</button>
//                            </div>
//                         </div>
//                     </div>
//             </div>
            
//         </div>
            
//     </div>    
//     `,
//     data(){
//         return{
//             image:[],
//             img:[],
//             gif:false,
//             source:'',
//         }
//     },
//     mounted() {
//         this.gif = true
//         fetch(this.$parent.domain_url + 'api/image_type')
//         .then( sw => sw.json())
//         .then( resp =>{
//                 this.gif = false
//                this.image = resp.image_type
//                 console.log(resp.image_type)
//                 document.querySelector('.deleted').classList.remove('activate')
//             }            
//         )
//     },
//         methods:{
//             deleteit(id,index){
//                 document.querySelector('.deleted').classList.remove('activate')
//                 let tek = confirm(" удалять?")
//                 if(tek){
//                     let formdata = new FormData()
//                     formdata.append("id",id)
//                     formdata.append("_token",this.$parent.token)
        
//                     fetch(this.$parent.domain_url + 'delete-image_type', {
//                         method:"POST",
//                         body:formdata
//                     })
//                     .then(res=>res.json())
//                     .then(resp=>{
//                         // console.log(resp);
//                         if(resp.status==="deleted"){
//                             document.querySelector('.deleted').classList.add('activate')
//                             this.image.splice(index,1);
//                         }
//                     })
//                 }
                
                
                
//             },    
//             addimage(){
//                 let formdata = new FormData()
//                 formdata.append('img',JSON.stringify(this.img))
//                 formdata.append('_token',this.$parent.token)

//                 fetch(this.$parent.domain_url + 'add-image_type',{
//                     body:formdata,
//                     method:'POST',
//                 })
//                 .then(add => add.json())
//                 .then(res => {
//                     if (res.status == "ok") {
//                         document.querySelector('.completed').classList.add('activate')
//                             location.reload()
//                         }

//                         console.log(res)
//                 })
//             },  
//             src($event) {
//                 console.log($event.target.value);
//                 this.source = $event.target.value;
//               },
//             // send img
//             selectFile(event) {
//                 let formData = new FormData();
//                 formData.append("photo",event.target.files[0]);
//               formData.append("_token",this.$parent.token);
    
//               fetch(this.$parent.domain_url + 'get-image', {
//                 method:"POST",
//                 body:formData,
//               })
//               .then(reps=> reps.json())
//               .then(img=>{
//                 console.log(img.data)
//                 this.img.unshift(img.data);
//               });
//           },  
//             // get img
//             parseJson(jsonArray) {
//                 if ( this.isJsonString(jsonArray)) {
//                    if( this.isJsonString(jsonArray).length > 0) {
//                     return this.$parent.domain_url+'storage/' +  this.isJsonString(jsonArray)[0];
//                    }
//                 } else {
//                     return "";
//                 }
//             },        
//             isJsonString(str) {
//                     try {
//                         JSON.parse(str);
//                         return JSON.parse(str);
//                     } catch (e) {
//                         return false;
//                     }
                
//             },    
//         },            
// }

var admin_recommended = {
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
          <div class="completed btn bg-success">Сохранено!</div>
            <div class="d-flex flex-row" style='width: 100%;justify-content: space-between;padding: 20px;'>
                <h3>Рекомендации</h3>
            </div>
            <h5 style='color:grey' class='rec-null'>Нету ни одной рекомендации для покупателей</h5>
            <div id="btnContainer" class='d-flex flex-row justify-content-start w-100 px-3'>
            </div>
            <div  class="w-100 px-3 py-1 recomend_div">
                <div class="product-layout_lay_rec"  v-for="(products,index) of products" :key="index">
                     <div class="product-thumb transition">
                        <div class="image">
                            <a>
                                <div class='d-flex' v-for='img of  JSON.parse(products.img)'>
                                        <img  :src="$parent.domain_url + '/storage/' + img.image[0]"   alt="" style="color:grey;height:100%;width:100px;height:100px">
                                </div>
                            </a>                 
                        </div>
                        <div class="caption">
                            <h4 class='d-flex justify-content-between'>
                                <a>{{products.id}}.{{products.product_name}}</a>
                                <span>
                                    <i class="fa-solid fa-star star-get" style='font-weight:200;cursor:pointer;'></i>                                    
                                    <i @click='clicked($event,index)' class="fa-solid fa-star star-give" style='cursor:pointer'></i>
                                </span>
                            </h4>
                            <span class='price'>
                                <span>Количество: </span>
                                <span> {{products.item}}</span>
                            </span>
                        </div>
                </div>
          </div>
            </div>
        </div>
    </div>    

    `,
    data(){
        return{
            types:[],
            products:[],
            groups:[],
            img:[],
            gif:false,
            item:'',
            id:'',
            product_name:'',
            genderer:'',
            product_id:'',
            price:'',
            info:'',
            availability:'',
            settings:'',
            plotnost:'',
            size:'',
            cotton:'',
            thread:'',
            code_product:'',
            recomended:null
        }
    },
    mounted() {
        this.gif = true
        fetch(this.$parent.domain_url + 'api/group')
        .then( gr => gr.json())
        .then( resp =>{
                this.gif = false
                this.groups = resp.group
                // console.log(this.groups)
            }            
        )
        fetch(this.$parent.domain_url + 'api/product_recomended')
        .then( p => p.json())
        .then( pro =>{
                this.gif = false
                if(pro.product.length == 0){
                  document.querySelector('.rec-null').classList.add('activate')
                }else{
                   document.querySelector('.rec-null').classList.add('remove')
                    this.products = pro.product
                    for(id of pro.product){
                            this.id = id.id
                            console.log(this.id)
                    }
                }
            }            
        )
    },
        methods:{
            // img get
            clicked(event,index){           
                console.log(event)
                if(event.target) {
                    this.gif = true
                    let formdata = new FormData();
                    formdata.append('recomended',this.recomended)
                    formdata.append('_token',this.$parent.token)
                    formdata.append("id",this.id)
                    console.log(this.id)
                    fetch(this.$parent.domain_url + `edit-rec`,{
                        method:"post",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        if (resp.status=="ok!") {
                            this.gif = false
                             document.querySelector('.star-get').classList.add('activate')
                             document.querySelector('.star-give').classList.add('activate')
                            location.reload()
                        } 
                    })                    
                } else {
                         document.querySelector('.star-get').classList.remove('activate')
                         document.querySelector('.star-give').classList.remove('activate')
                        alert('неправильно работает обратитесь к разработчику!')
                }
            },
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
            // send img
            open_list(){
                this.$el.querySelector('.card').classList.remove('activate')
                this.$el.querySelector('.list').classList.add('activate')
            },
            open_card(){
                this.$el.querySelector('.list').classList.add('activate')
                this.$el.querySelector('.card').classList.remove('activate')
            },
            genderr($event) {
                console.log($event.target.value);
                this.genderer = $event.target.value;
              },
              group($event) {
                console.log($event.target.value);
                this.product_id = $event.target.value;
              },
            // edit
        },            
}