var admin_type = {
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
            <div  style='display:flex;justify-content: center;align-items: center;width:100%'>
                <div style='display:flex;justify-content: space-between;align-items: center;width:97%;margin-top:10px'>
                    <h3>Товары</h3>
                    <div>
                        <button type="button" class="btn btn-primary"   data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus" style='color:white'></i>
                        </button>
                        <button @click="clearAll()" type="button" form="form-product"  data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>

                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style='max-width:900px;'>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавление элемента</h5>
                        </div>
                        <div class="w3-bar nav nav-tabs">
                            <li class="w3-bar-item w3-button nav-item tablinks" onclick="openCity(event, 'Name')">Наименование</li>
                            <li class="w3-bar-item w3-button tablinks"  onclick="openCity(event, 'desc')">Описание</li>
                        </div>
                        <div class="all_null">Проверьте! вы не указали характеристику в каком-то элементе.</div>
                        <div class='mok-do'>
                            <div class="modal-body mok-dop">
                                <div id="Name" class="w3-container city tabcontent">
                                    <div class="form-group">                                    
                                        <label for="exampleInputEmail1">Название:</label>
                                        <input type="email" class="form-control product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название продукта" v-model="product_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Группа:</label>
                                        <select class="form-select form-control genderer" aria-label="Default select example" @change="genderr($event)">
                                            <option selected>выберит категорию</option>
                                            <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                                        </select>
                                        <div v-for="types of types" v-if='types.gender == genderer'>
                                            <input class="form-control type_url"  v-model='types.url_url' disabled>
                                        </div>
                                        <label for="exampleInputEmail1">Подгруппа:</label>
                                        <select class="form-select form-control product_id" aria-label="Default select example" @change="group($event)">
                                            <option selected>выберит категорию</option>
                                            <option  v-for="groups of groups" v-if="genderer == groups.group_id">{{groups.namin}}</option>
                                        </select>
                                        <div v-for="groups of groups" v-if='groups.namin == product_id'>
                                            <input class="form-control group_url" v-if='groups.group_id == genderer' v-model='groups.url' disabled>
                                        </div>
                                        <label for="exampleInputPassword1" v-text="'Цена:' + currencies"></label>
                                        <input type="number" class="form-control price" placeholder="введите цену товара" id="exampleInputPassword1" v-model="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Описание:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="info">
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Доступность:</label>
                                            <input type="email" class="form-control availability" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="availability">                                           
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Код товара:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="code_product">
                                    </div>   
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Наименование на сайте:</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="name_site">
                                    </div>   
                                </div>

                                <div id="desc" class="w3-container city tabcontent" style="display:none">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Количество товара:</label>
                                        <input type="number" placeholder="Укажите количество товара" class="form-control" minlenght="2" v-model="item">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ткань:</label>
                                        <input type="text" class="form-control" placeholder="Указывать не обязательно" v-model="cotton">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Нить</label>
                                        <input type="text" class="form-control" placeholder="Указывать не обязательно" v-model="thread">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Плотность ткани:</label>
                                        <input type="text" class="form-control" placeholder="Указывать не обязательно" v-model="plotnost">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Размер</label>
                                        <input type="text" class="form-control" placeholder="Указывать не обязательно" v-model="size">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Инструкция</label>
                                        <input type="text" class="form-control" placeholder="Указывать не обязательно"  v-model="settings">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Рекомендация</label>
                                        <label class="checkbox-green">
                                            <input type="checkbox" class='recomend' v-model='recomended'>
                                            <span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Статус</label>
                                        <label class="checkbox-green">
                                            <input type="checkbox" class='recomend' v-model='status'>
                                            <span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
                                        </label>
                                    </div>                                    
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Оценка</label>
                                    <input name="gdskill[2]" id="gdskill2" type="range" min="0" value="0" max="5" step="1" list="ticks"  class='w-100' oninput="Output2.value = gdskill2.value" v-model='stars'/>
                                    <output id="Output2">0</output>

                                    <datalist id="ticks">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </datalist>
                                </div>
                                </div>

                            </div>
                            <div class="modal-body" style='width:50%'>
                                <label for="recipient-name" class="col-form-label" style='width:100%'>Image:</label>
                                    <div>
                                        <div class="bottom" v-for="(number,indexp) of img">
                                            <div class="inputs gap-1" style="display:flex; flex-direction:column; align-items:flex-start;">
                                                    <div style="display:flex; gap:10px;width:100%;">
                                                    <label :for="'upload-photo'+indexp" style="width:100%;cursor: pointer; text-align: center; border-radius:10px; cursor: pointer;background:whitesmoke">
                                                        <i class='bx bx-cloud-download'></i>
                                                        <br>Yuklash
                                                    </label>
                                                    <input type="file" name="photo" :id="'upload-photo'+indexp"  @change="selectFile($event,indexp)" class="form-control d-none img" style="opacity: 0;position:absolute" required>
                                                </div>
                                            </div>
                                            <div style='display:grid;    grid-template-columns: repeat(2,1fr);grid-template-rows: auto; gap: 10px;'>
                                                <div v-for="img of img[indexp].image" style="width:120px; height:120px; border-radius:10px; box-shadow: -1px 1px 4px 3px #efe7e7;display:flex;align-items: center;justify-content: center;" :key="img.id">
                                                <div v-if="img[indexp].image == ''"></div>
                                                <div v-else style="display:flex;height:80%;width:80%;max-height:100%;max-width:100%">
                                                    <img :src="$parent.domain_url+'/storage/'+img" alt="" style="color:grey;width:100%;height:100%;border-radius:10px;">
                                                    <i class="fa-solid fa-xmark" @click="ImgDelete(indexp,$event)" style='cursor:pointer'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </label>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary" @click="addproduct">Add product</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="creation_name deleted" style='width: 100%;justify-content: space-between;padding: 20px;'>
                <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Настройки успешно изменены!
                  <button type="button" class="close" data-dismiss="alert" style='margin-right: 30px;'>×</button>
               </div>
            </div>            
            <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-list"></i> Список товаров</h3>
            </div>
            <div class="panel-body">
              <div id="form-product">
                <div class="table-responsive" style='flex-wrap: wrap;overflow: auto;'>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td style="width: 1px;" class="text-center">CH</td>
                        <td class="text-center">Изображение</td>
                        <td class="text-left"> 
                            <a style='text-decoration:none'>Название</a>
                        </td>
                        <td class="text-left"> 
                            <a style='text-decoration:none'>Классификация</a>
                       </td>
                        <td class="text-left"> 
                            <a style='text-decoration:none'>Код товара</a> 
                        </td>
                        <td class="text-right"> 
                            <a style='text-decoration:none' v-text="'Цена:' + currencies"></a>
                        </td>
                        <td class="text-right"> 
                            <a style='text-decoration:none'>Количество</a>
                        </td>
                        <td class="text-left"> 
                            <a style='text-decoration:none'>Статус</a>
                        </td>
                        <td class="text-right" style='display: flex;justify-content: space-between;border: none;'>Действие</td>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(products,index) of products" :key="index">
                            <td class="text-center">
                              <input type="checkbox" @change='deletion(products.id, $event)'>
                            </td>
                            <td class="text-center" v-for='img of  JSON.parse(products.img)' style='display: flex;justify-content: center;align-items: center;'> 
                                <div style='width:100px;height:100px;display: flex;align-items: center;justify-content: center;'>
                                    <img  :src="$parent.domain_url + '/storage/' + img.image[0]" alt="" class="img-thumbnail" style='width:80%;height:80%;max-width: 100%;'> 
                                </div>
                           </td>
                          <td class="text-left">
                            <span  style = ' 
                                width: 150px;
                                display: flex;
                                overflow: hidden;
                                text-overflow: clip;
                                flex-wrap: wrap;
                                white-space: nowrap;
                                max-width: 150px;'>  
                               {{products.product_name}}
                            </span>
                          </td>
                        <td class="text-left">{{products.gender}}</td>
                        <td class="text-left">{{products.code_product}}</td>
                        <td class="text-right">
                        {{products.price}}
                        </td>
                        <td class="text-right"> 
                         <span class="label activate_item" :class="[{activate_null: products.item == '0'}]">{{products.item}}</span>
                        </td>
                      <td class="text-left" >
                        <span v-if="products.status == 'true'">Вкл</span>
                        <span v-if="products.status == 'false'">Выкл</span>
                        <span v-if="products.status == ''">Не настроенный</span>
                      </td>
                      <td class="text-right">
                            <div style='display:flex'>
                                <a target="_blank" :href="$parent.domain_url + 'api/kid/' + products.url_url + '/' + products.url + '/' + products.id" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Посмотреть" style='margin-right:5px'>
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a  :href="'#edit_type/'+ products.id" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
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
            types:[],
            products:[],
            groups:[],
            // img:[],
            gif:false,
            item:'',
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
            recomended:'',
            code_product:'',
            name_site:'',
            tags:'',
            stars:0,
            img: [{image: []}],
            image:[],
            i:1,
            length_img:'',
            link:[],
            url:'',
            url_url:'',
            status:null,
            currencies:'',
            list:[],
            tasks:[]
        }
    },
    mounted() {    
        this.gif = true
        fetch(this.$parent.domain_url + 'api/group')
        .then( gr => gr.json())
        .then( resp =>{
                this.groups = resp.group
                // console.log(this.groups)
            }            
        )
        fetch(this.$parent.domain_url + 'currency_status')
        .then( gr => gr.json())
        .then( resp =>{
            for(curr of  resp.currency){
                this.currencies =  curr.name
            }
                // console.log(resp)
            }            
        )
        fetch(this.$parent.domain_url + 'product')
        .then( p => p.json())
        .then( pro =>{
                this.gif = false
               this.products = pro.products
            //    console.log(pro)
                // console.log(this.products)
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        fetch(this.$parent.domain_url + 'api/type') 
        .then( p => p.json())
        .then( resp =>{
               this.types = resp.type
                // console.log(this.types) 
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        // fetch(this.$parent.domain_url + 'product/' + this.$route.params.id)
        // .then((res)=>res.json())
        // .then(resp=>{
        //     // console.log(resp.earn)
        //     for(product of resp.pro_edit){
        //         this.product_name = product.product_name
        //         this.product_id = product.product_id
        //         this.genderer = product.genderer
        //         this.price = product.price
        //         this.info = product.info
        //         this.availability = product.availability
        //         this.settings = product.settings
        //         this.plotnost = product.plotnost
        //         this.size = product.size
        //         this.cotton = product.cotton
        //         this.thread = product.thread
        //         this.tags = product.tags
        //         this.name_site = product.name_site
        //         this.recomended = product.recomended
        //         this.status = product.status
        //         this.code_product = product.code_product
        //         // console.log(product)
        //     }   
        // }) 
    },
        methods:{
            // checkbox
            selected_all(id, event){
                for(products of this.products){
                    if(event.target.checked) {
                        this.tasks = products.id;
                        //   console.log(this.list.push(this.tasks))
                        // this.task[list].push(id);
                    } else {
                        for(ind in this.list) {
                            if(this.list[ind]==id) {
                                this.list.splice(ind,1);
                            }
                        }
                    }
                }
            },
            clearAll() {
                let tek = confirm('Вы действительно хотите удалить'  + this.list.length + ' продукт?')
                if(tek){
                    let formdata = new FormData()
                    // console.log(JSON.stringify(this.list))
                        formdata.append("list",JSON.stringify(this.list))
                        formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete_product',{
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        if(resp.status==="deleted!") {
                            location.reload();
                        }
                    })
                }else{
                    return;
                }
              },
            deletion(id, event){                            
                if(event.target.checked) {
                    this.list.push(id);
                } else {
                    for(ind in this.list) {
                        if(this.list[ind]==id) {
                            this.list.splice(ind,1);
                        }
                    }
                }
            },

            // img get
            ImgDelete(indexp,event) {
                this.link = this.img[indexp].image
                
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
                        this.link.splice(indexp,1);
                    }
                });
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
            selectFile(event,index) {
                let formData = new FormData();
                formData.append("photo",event.target.files[0]);
              formData.append("_token",this.$parent.token);
    
              fetch(this.$parent.domain_url + 'get-image', {
                method:"POST",
                body:formData,
              })
              .then(reps=> reps.json())
              .then(resp=>{  
                // console.log(img.data)
                this.img[index].image.unshift(resp.data)
                // this.img.unshift(img.data);
              });
          },  
            open_list(){
                this.$el.querySelector('.card').classList.remove('activate')
                this.$el.querySelector('.list').classList.add('activate')
            },
            open_card(){
                this.$el.querySelector('.list').classList.add('activate')
                this.$el.querySelector('.card').classList.remove('activate')
            },
            addproduct(){               
                for(img of this.img){
                    this.length_img = img.image.length 
                }
                if(this.length_img == 10)
                {
                    alert('Вы не можете больше добавлять фотографий больше 10, последующие добавление фотографий приведет к ошибке')
                    return;
                }else{
                    if(document.querySelector('.price').value.trim().length == 0 ){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    if( document.querySelector('.product_name').value.trim().length == ''){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    if(document.querySelector('.product_id').value.trim().length == ''){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    if(document.querySelector('.genderer').value.trim().length == '' ){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    if(document.querySelector('.availability').value.trim().length == '' ){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    if(document.querySelector('.img').value.trim().length == ''){
                        document.querySelector('.all_null').classList.add('activate')
                        return;
                    }
                    else{
                        if(this.recomended == ""){
                            this.recomended = false
                        }
                        if(this.status == ''){
                            this.status = true
                        }
                        this.url = document.querySelector('.group_url').value
                        this.url_url = document.querySelector('.type_url').value
                        let formdata = new FormData()
                        formdata.append('stars',this.stars)
                        formdata.append('url_url',this.url_url)
                        formdata.append('url',this.url)
                        formdata.append('product_name',this.product_name)
                        formdata.append('recomended',this.recomended)
                        formdata.append('tags',this.tags)
                        formdata.append('name_site',this.name_site)
                        formdata.append('genderer',this.genderer)
                        formdata.append('product_id',this.product_id)
                        formdata.append('img',JSON.stringify(this.img))
                        formdata.append('item',this.item)
                        formdata.append('price',this.price)
                        formdata.append('info',this.info)
                        formdata.append('cotton',this.cotton)
                        formdata.append('thread',this.thread)
                        formdata.append('availability',this.availability)
                        formdata.append('code_product',this.code_product)
                        formdata.append('size',this.size)
                        formdata.append('plotnost',this.plotnost)
                        formdata.append('status',this.status)
                        formdata.append('settings',this.settings)
                        formdata.append('_token',this.$parent.token)

                        fetch(this.$parent.domain_url + 'add-product',{
                            body:formdata,
                            method:'POST',
                        })
                        .then(add => add.json())
                        .then(res => {
                            if (res.status == "ok") {
                                   document.querySelector('.alert').classList.add('activate')
                                    location.reload()
                                }

                                console.log(res)
                        })
                }
            }
            }, 
            genderr($event) {
                console.log($event.target.value);
                this.genderer = $event.target.value;
              },
              group($event) {
                console.log($event.target.value);
                this.product_id = $event.target.value;
              },
            // deleteit(id,index){
            //     let formdata = new FormData()
            //     formdata.append("id",id)
            //     formdata.append("_token",this.$parent.token)
    
            //     fetch(this.$parent.domain_url + 'delete-product', {
            //         method:"POST",
            //         body:formdata
            //     })
            //     .then(res=>res.json())
            //     .then(resp=>{
            //         console.log(resp);
            //         if(resp.status==="deleted"){
            //             document.querySelector('.deleted').classList.add('activate')
            //             this.products.splice(index,1);
            //         }
            //     })
            // },      
            // edit
            // edit_product(){
            //         document.querySelector('.modal1').classList.add('activate')
            //         this.gif = true
            //         let formdata = new FormData();
            //         formdata.append('product_name',this.product_name)
            //         formdata.append('genderer',this.genderer)
            //         formdata.append('product_id',this.product_id)
            //         formdata.append('price',this.price)
            //         formdata.append('info',this.info)
            //         formdata.append('cotton',this.cotton)
            //         formdata.append('thread',this.thread)
            //         formdata.append('availability',this.availability)
            //         formdata.append('code_product',this.code_product)
            //         formdata.append('size',this.size)
            //         formdata.append('plotnost',this.plotnost)
            //         formdata.append('settings',this.settings)
            //         formdata.append('_token',this.$parent.token)
                    
            //         fetch(this.$parent.domain_url + `edit-product`,{
            //             method:"post",
            //             body:formdata
            //         })
            //         .then(res=>res.json())
            //         .then(resp=>{
            //             if (resp.status=="ok!") {
            //                 this.gif = false
            //             } 
            //         })
            // },
        },            
}

var admin_type_edit  = {
    template:`
    <div class="w-100 d-flex flex-column">    
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
                <div class="modal-body">
                  <h3 style="height:60px;">Изменить продукт</h3>
                    <div class="w3-bar nav nav-tabs">
                        <li class="w3-bar-item w3-button nav-item tablinks" onclick="openCity(event, 'London')">Наименование</li>
                        <li class="w3-bar-item w3-button tablinks"  onclick="openCity(event, 'Paris')">Описание</li>
                    </div>
                    
                    <div id="London" class="w3-container tabcontent">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Название:</label>
                            <input type="email" class="form-control product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название продукта" v-model="product_name">
                         </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Группа:</label>
                           <select class="form-select form-control" aria-label="Default select example" @change="genderr($event)">
                                <option selected disabled>{{gender}}</option>
                                <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                            </select>
                            <div v-for="types of types" v-if='types.gender == gender'>
                                <input class="form-control type_url"  v-model='types.url_url' disabled>
                            </div>
                            <label for="exampleInputEmail1">Подгруппа была:{{product_id}}</label>
                            <select class="form-control form-control form-select group_namin" aria-label="Default select example" @change="group($event)">
                                <option>Выберите</option>
                                <option v-for='groups of groups' v-if='gender == groups.group_id' :value='groups.namin'>{{groups.namin}}</option>
                             </select>
                             <div v-for="groups of groups"  v-if='gender == groups.group_id'>
                                 <input class="form-control group_url"  v-if='groups.namin == product_id' v-model='groups.url' disabled>
                            </div>
                            <label for="exampleInputPassword1" v-text="'Цена:' + currencies"></label>
                            <input type="text" class="form-control" placeholder="введите цену товара" id="exampleInputPassword1" v-model="price">
                        </div>
                        <div class="form-group">
                             <label for="exampleInputEmail1">Описание:</label>
                             <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="info">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Доступность:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="availability">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Код товара:</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="code_product">
                        </div>   
                        <div class="form-group">
                            <label for="exampleInputPassword1">Рекомендация</label>
                            <label class="checkbox-green">
                               <input type="checkbox" class='recomend' v-model='rec'>
                               <span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
                           </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Статус</label>
                            <label class="checkbox-green">
                            <input type="checkbox" class='recomend' v-model='status'>
                            <span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
                        </label>
                        </div>
                    </div>
                    <div id="Paris" class="w3-container city tabcontent" style="display:none">
                       <div class="form-group">
                            <label for="exampleInputPassword1">Количество:</label>
                            <input type="text" class="form-control" v-model="item">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ткань:</label>
                            <input type="text" class="form-control" v-model="cotton">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Нить</label>
                            <input type="text" class="form-control" v-model="thread">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Плотность ткани:</label>
                            <input type="text" class="form-control" v-model="plotnost">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Размер</label>
                            <input type="text" class="form-control" v-model="size">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Инструкция</label>
                            <input type="text" class="form-control" v-model="settings">
                        </div>
                        <input name="gdskill[2]" id="gdskill2" type="range" min="0" value="0" max="5" step="1" list="ticks"  class='w-100' oninput="Output2.value = gdskill2.value" v-model='stars'/>
                        <output id="Output2">{{stars}}</output>
                        <datalist id="ticks">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        </datalist>
                        </div>   
                        <div class="bottom" v-for="(image,indexp) of i">
                            <div>                        
                                <div v-for="(image,index)  of img[indexp].image" v-if="index == 0"  :key="image.id">
                                    <div  style='display:flex;justify-content:space-between;align-items:center;border-top: 1px solid #dee2e6;padding: 7px 10px;'>
                                        <td class="text-left">
                                            <a href="" id="thumb-image0" data-toggle="image" class="img-thumbnail">
                                            <div style='width:100px;height:100px;display:flex;align-items:center;justify-content: center;'>
                                                <img :src="$parent.domain_url+'/storage/'+image" alt="" style='width:80%;height:80%;max-width:100%;max-height:100%;'>
                                            </div>
                                            </a>
                                             <input type="hidden" name="product_image[0][image]" value="catalog/demo/canon_logo.jpg" id="input-image0">
                                        </td>
                                           <div style='display: flex;'>
                                                <button type="button" id="button-image" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                    <input style='opacity: 0;position: absolute;margin-top: -27px;margin-left: -15px;   height: 37px;
                                                    width: 44px;' type="file" @change='selectFile($event,image,index,id)'>
                                                </button>
                                                 <button style='margin-left:10%' type="button" @click='deleteimage($event,index,id)' data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Удалить"><i class="fa fa-minus-circle"></i></button>
                                            </div>  
                                        </div>
                               </div>
                               <div v-for="(image,index)  of img[indexp].image" v-if="index !== 0"  :key="image.id">
                                    <div  style='display:flex;justify-content:space-between;align-items:center;border-top: 1px solid #dee2e6;padding: 7px 10px;'>
                                        <td class="text-left">
                                            <a :id="'thumb-image' + index" @click="img_ed(index)" data-toggle="image" class="img-thumbnail">
                                            <div style='width:100px;height:100px;display:flex;align-items:center;justify-content: center;'>
                                                <img :src="$parent.domain_url+'/storage/'+image" alt="" style='width:80%;height:80%;max-width:100%;max-height:100%;'>
                                            </div>
                                            </a>
                                        </td>
                                        <div style='display: flex;'>
                                            <button type="button" id="button-image" class="btn btn-primary">
                                                <i class="fa fa-pencil"></i>
                                                <input style='opacity: 0;position: absolute;margin-top: -27px;margin-left: -15px;   height: 37px;
                                                width: 44px;' type="file" @change='selectFile($event,image,index,id)'>
                                            </button>
                                          <button style='margin-left:10%' type="button" @click='deleteit($event,index,id)' data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Удалить"><i class="fa fa-minus-circle"></i></button>
                                        </div>                                        
                                    </div>
                              </div>
                          </div>
                        <div style='display:flex;flex-direction:row;justify-content:space-between'>
                            <div colspan="2" style='border: 1px solid #ddd;width:100%;' ></div>
                            <div style='padding:10px;border: 1px solid #ddd;'>
                                <span class="text-left">
                                    <button type="button" @click="addImage($event,indexp)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить изображение" style='border: 1px solid #ddd;color:white'>
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div>
                    </div>                    
                    </div>                
                </div>
                <div  v-if="gif_image" style="width: 100%;height: 100%;justify-content: center;">
                    <div class="loader">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="edit_product" class="btn btn-primary">Add product</button>
                </div>
         </div>
     </div>
</div>
                </div>
 </div>    

    `,
//     <div class="inputs gap-1" style="display:flex; flex-direction:column; align-items:flex-start;">
//     <div style="display:flex; gap:10px;width:100%;">
//     <label :for="'upload-photo'+indexp" style="width:100%;cursor: pointer; text-align: center; border-radius:10px; cursor: pointer;background:whitesmoke">
//         <i class='bx bx-cloud-download'></i>
//         <br>Yuklash
//     </label>
//     <input type="file" name="photo" :id="'upload-photo'+indexp" @change="selectFile($event,indexp)" class="form-control d-none img" style="opacity: 0;" required>                                    
// </div>
// </div>
    data(){
        return{
            types:[],
            products:[],
            groups:[],
            gif:false,
            gif_image:false,
            item:'',
            product_name:'',
            gender:'',
            product_id:'',
            price:'',
            info:'',
            availability:'',
            settings:'',
            id:'',
            plotnost:'',
            size:'',
            cotton:'',
            thread:'',
            recomended:'',
            name_site:'',
            code_product:'',
            tags:'',
            stars:'',
            url:'',
            url_url:'',
            ims:[{image: []}],
            img: [{image: []}],
            length_img:'',
            product_id_common:'',
            image_edit:'',
            status:null,
            rec:'',
            i:1,
            currencies:''
        }
    },
    mounted() {
        fetch(this.$parent.domain_url + 'currency_status')
        .then( gr => gr.json())
        .then( resp =>{
                 
                for(curr of  resp.currency){
                    this.currencies =  curr.name
                }
                console.log(resp)
            }            
        )
        fetch(this.$parent.domain_url + 'api/type')
        .then( p => p.json())
        .then( resp =>{
                this.gif = false
                this.types = resp.type
                // console.log(this.products)
            }            
        )
        fetch(this.$parent.domain_url + 'api/group')
        .then( gr => gr.json())
        .then( resp =>{
                this.gif = false
                this.groups = resp.group
                // console.log(this.products)
            }            
        )
        fetch(this.$parent.domain_url + 'api/product')
        .then( p => p.json())
        .then( pro =>{
                this.gif = false
               this.products = pro.product
            }            
        )
        fetch(this.$parent.domain_url + 'product/' + this.$route.params.id)
        .then((res)=>res.json())
        .then(resp=>{
            this.gif = false
            console.log(resp)
            // console.log(resp.product)
            // v-for="(number,indexp) of "
            this.products = resp.pro_edit
            for(product of resp.pro_edit){
                this.id = product.id 
                this.product_id = product.product_id 
                this.url = product.url
                this.url_url = product.url_url
                this.product_name = product.product_name
                this.gender = product.gender
                this.price = product.price
                this.info = product.info
                this.availability = product.availability
                this.settings = product.settings
                this.plotnost = product.plotnost
                this.size = product.size
                this.cotton = product.cotton
                this.rec = product.recomended       
                if(this.rec == 'false'){
                    this.rec = false
                }else if(this.rec == 'true'){
                    this.rec = true
                }      
                this.status = product.status   
                if(this.status == 'false'){
                    this.status = false
                }else if(this.status == 'true'){
                    this.status = true
                }                         
                this.thread = product.thread
                this.code_product = product.code_product
                this.item = product.item
                this.tags = product.tags
                this.name_site = product.name_site            
                this.stars = product.stars
                this.img = JSON.parse(product.img)
            }   
        }) 
    },
        methods:{        
            selectFile(event,image,index,id) {
                    // console.log(image)
                    this.gif_image = true
                    // console.log(index)
                    // console.log(id) 
                    let formdata = new FormData();                    
                    formdata.append("photo",event.target.files[0]);
                    formdata.append("index",index);
                    formdata.append("id",id);
                    formdata.append("image",image);
                    formdata.append('_token',this.$parent.token)

                        fetch(this.$parent.domain_url + 'image_save_edit', {
                        method:"POST",
                        body:formdata,
                        })     
                        .then(res=>res.json())
                        .then(resp=>{
                            if (resp.status=="ok") {  
                                // console.log(resp)
                                this.gif_image = false
                                this.img[0].image.splice(index,1,resp.data)
                            }
                        })        
                    
            },  
            addImage($event,indexp) {
                // this.i++    
                this.img[0].image.push('swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg')
                let formdata = new FormData();
                formdata.append('img',JSON.stringify(this.img))
                formdata.append('_token',this.$parent.token)
                formdata.append("id",this.$route.params.id)

                fetch(this.$parent.domain_url + `add_image-product_edit_1`,{
                    method:"post",
                    body:formdata
                })
                .then(res=>res.json())
                .then(resp=>{
                    console.log(resp.status)
                    if (resp.status=="ok") {                        
                        console.log('status')
                    }else{
                        this.img[0].image.splice(indexp,1)
                    }
                })
            },
            editImage($event,indexp) {
                // this.i++    
                this.img[0].image.push('swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg')
                let formdata = new FormData();
                formdata.append('img',JSON.stringify(this.img))
                formdata.append('_token',this.$parent.token)
                formdata.append("id",this.$route.params.id)

                fetch(this.$parent.domain_url + `add_image-product_edit`,{
                    method:"post",
                    body:formdata
                })
                .then(res=>res.json())
                .then(resp=>{
                    console.log(resp.status)
                    if (resp.status=="ok") {                        
                        console.log('status')
                    }else{
                        this.img[0].image.splice(indexp,1)
                    }
                })
            },
            // Editimage($event,index,id) {
            //     let formdata = new FormData();
            //     formdata.append("index",index);
            //     formdata.append("id",id);
            //     formdata.append('_token',this.$parent.token);

            //     fetch(this.$parent.domain_url + `edit-image_product`,{
            //         method:"post",
            //         body:formdata
            //     })
            //     .then(res=>res.json())
            //     .then(resp=>{
            //         console.log(resp.status)
            //         if (resp.status=="ok") {
            //             console.log('status')
            //         } 
            //     })
            // },
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
            // selectFile(event,index) {
            //     for(img of this.img){
            //         if(img.image.length==7){
            //             alert('у вас остался лишь 2 фотографии которые вы можете добавить')
            //         }
            //     }
            //     let formData = new FormData();
            //     formData.append("photo",event.target.files[0]);
            //     formData.append("_token",this.$parent.token);
  
            //   fetch(this.$parent.domain_url + 'get-image', {
            //     method:"POST",
            //     body:formData,
            //   })
            //   .then(rep=> rep.json())
            //   .then(res=>{
            //     this.img[index].image.unshift(res.data);            
            //   });
            // },
            genderr($event) {
                // console.log($event.target.value);
                this.gender = $event.target.value;
              },
              group($event) {
                // console.log($event.target.value);
                this.product_id = $event.target.value;
              },
            deleteit(event, index,id) {
                console.log(index)
                if(index ==  0){
                    console.log('2')                
                }else{
                    console.log('34')
                    // return;            
                    let formdata = new FormData()
                    formdata.append("index",index);
                    formdata.append("id",id);
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete_image_edit', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        // console.log(resp);
                        if(resp.status==="deleted"){
                            // location.reload()
                            this.img[0].image.splice(index,1)
                        }
                    })
                }
            },  
            deleteimage(event, index,id) {
                    // return;            
                    this.gif_image = true
                    let formdata = new FormData()
                    formdata.append("index",index);
                    formdata.append("id",id);
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete_image_edit_o', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        // console.log(resp);
                        if(resp.status==="deleted"){
                            // location.reload()
                            this.gif_image = false
                            this.img[0].image.splice(index,1,'swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg')
                        }
                    })
            },                
            // edit
            edit_product(){
                this.gif = true
                    // if(this.img){                
                for(img of this.img){
                    this.length_img = img.image.length 
                }
                if(this.product_id == ''){
                    alert('Укажите подкатегорию!')
                    return;
                }   
                console.log('noimages')
                if(this.length_img == 10)
                    {
                        alert('Вы не можете больше добавлять фотографий больше 10, последующие добавление фотографий приведет к ошибке')
                    }else{                        
                        this.url = document.querySelector('.group_url').value
                        this.url_url = document.querySelector('.type_url').value
                    let formdata = new FormData();
                    formdata.append('product_name',this.product_name)
                    formdata.append('item',this.item)
                    formdata.append('url',this.url)
                    formdata.append('url_url',this.url_url)
                    formdata.append('img',JSON.stringify(this.img))
                    formdata.append('product_id',this.product_id)
                    formdata.append('stars',this.stars)
                    formdata.append('recomended',this.rec)
                    formdata.append('status',this.status)
                    formdata.append('tags',this.tags)
                    formdata.append('name_site',this.name_site)
                    formdata.append('gender',this.gender)
                    formdata.append('price',this.price)
                    formdata.append('info',this.info)
                    formdata.append('cotton',this.cotton)
                    formdata.append('thread',this.thread)
                    formdata.append('availability',this.availability)
                    formdata.append('code_product',this.code_product)
                    formdata.append('size',this.size)
                    formdata.append('plotnost',this.plotnost)
                    formdata.append('settings',this.settings)
                    formdata.append('_token',this.$parent.token)
                    formdata.append("id",this.$route.params.id)

                    fetch(this.$parent.domain_url + `edit-product`,{
                        method:"post",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        // console.log(resp.status)
                        if (resp.status=="ok") {
                            this.gif = false
                            this.$router.push("/admin_type")
                        } 
                    })
                }     
            },
        },            
}



var admin_group = {
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
            <div class="creation_name" style='width: 100%;justify-content: space-between;padding: 20px;display:flex;align-items:center'>
                <h3>Товары</h3>
                <button type="button" class="btn btn-secondary" data-toggle="modal" style="margin-top:10px" data-target="#exampleModal">
                    Добавление элемента+
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style='top: 25%;'>
                    <div class="modal-content">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding: 5% 7% 0px;">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление элемента</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" style='border:none;font-size:22px;background:white'>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="London" class="w3-container city">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Группа:</label>
                            <select class="form-select form-control" aria-label="Default select example" @change="genderr($event)">
                                    <option selected>выберит категорию</option>
                                    <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Подгруппа:</label>
                                <input placeholder="напишите подтип" class="form-control" v-model="namin">
                            <label for="exampleInputEmail1">Ссылка для сайта:</label>
                                <div style='display:flex'>
                                <input placeholder="напишите подтип" class="form-control" style="width:50%" value='http://kam/api/.../' disabled>
                                <input placeholder="напишите url" class="form-control" v-model="url" @keyup.enter='additem' required>
                                </div>                  
                            </div>
                            <label for="exampleInputEmail1">Название для сайта:</label>
                            <input placeholder="напишите название" class="form-control" v-model="name_site" @keyup.enter='additem' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="additem">Add product</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="deleted  bg-danger" style='justify-content: center;width: 100%;'>Удалено!</div>
            <div class="creation_name completed" style='width: 100%;justify-content: space-between;padding: 20px;'>
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Настройки успешно изменены!
                <button type="button" class="close" data-dismiss="alert" style='margin-right: 30px;'>×</button>
            </div>
        </div>
            <div id="btnContainer" class='d-flex flex-row justify-content-start w-100 px-3'>
            </div>
            <div  class="w-100 px-3 py-1 messages" style="height: 80vh;flex-wrap: wrap;overflow: auto;">
                <div class="group_div" style='display:flex;    justify-content: space-around;'>
                    <ul v-for="types of types" style='padding: 10px;background-color: #fff;border: 1px solid #d1d3d4;border-radius: 3px;height: 100%;' class='mx-3 h-100'>
                        <h4 style='display:flex; justify-content:center'>{{types.gender}}</h4>
                        <li v-for="(groups,index) of groups" style = 'list-style:none;padding: 3px;display:flex;align-items:center' :key="index" v-if="types.gender == groups.group_id">
                          <span  style='display:flex;align-items:center;width:100%;justify-content:space-between'>
                                <a :href="$parent.domain_url + 'api/kid/' + 'types.url_url' + '/' + groups.url">
                                   <span  :class="'group_id:' + groups.id">{{groups.id}}.{{groups.namin}}</span>
                                </a>
                                <span class='d-flex'>
                                    <a @click="deleteit(groups.id,index,groups.namin)" class="card-link btn btn-danger h-75 my-2 mx-1 d-flex align-items-center"><i class='bx bxs-trash'></i></a>
                                    <a :href="'#edit_gender/'+ groups.id" class="card-link btn btn-secondary h-75 my-2 mx-1 d-flex align-items-center"><i class='bx bxs-pencil'></i></a> 
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
             <div class="modal modal1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example" @change="genderr($event)">
                            <option selected>выберит категорию</option>
                            <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Подгруппа:</label>
                        <select class="form-select form-control" aria-label="Default select example" @change="group($event)">
                            <option selected>выберитe категорию</option>
                            <option  v-for="types of types" :value="types.gender_id">{{types.gender_id}}</option>
                        </select>
                    </div>
               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div></div>
    </div>
</div></div>`,
    data(){
        return{
            gender:'',
            types:[],
            groups:[],
            gif:false,
            group_id:'',
            url:'',
            namin:'',
            namin_upper:'',
            name_site:''
        }
    },
    mounted() {        
        if(localStorage.getItem('status') == 'ok'){
            document.querySelector('.completed').classList.add('activate')
        }     
        if(localStorage.getItem('status_gr') == 'ok'){
            document.querySelector('.completed').classList.add('activate')
        }      

        localStorage.removeItem('status');
        localStorage.removeItem('status_gr');
        fetch(this.$parent.domain_url + 'api/group')
        .then( gr => gr.json())
        .then( resp =>{
                this.gif = false
               this.groups = resp.group
                // console.log(this.groups)
               document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        fetch(this.$parent.domain_url + 'api/type')
        .then( t => t.json())
        .then( res =>{
                this.gif = false
               this.types = res.type
            //    console.log(res.type)
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
    },
        methods:{   
            additem(){
                let formdata = new FormData()
                formdata.append('namin',this.namin.toUpperCase())
                formdata.append('group_id',this.group_id)
                formdata.append('url',this.url)
                formdata.append('name_site',this.name_site)
                formdata.append('_token',this.$parent.token)

                fetch(this.$parent.domain_url + 'add-group',{
                    body:formdata,
                    method:'POST',
                })
                .then(add => add.json())
                .then(res => {
                    if (res.status == "ok") {
                           localStorage.setItem('status_gr',res.status)
                            document.querySelector('.deleted').classList.remove('activate')                           
                            location.reload()
                        }

                        // console.log(res)
                })
            }, 
            genderr($event) {
                // console.log($event.target.value);
                this.group_id = $event.target.value;
              },
            deleteit(id,index,name){
                console.log(name)
                let conf = confirm('удаляться прибавленные товары относящие к этой группе')
                if(conf){
                    let formdata = new FormData()
                    formdata.append("id",id)
                    formdata.append("name",name)
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete-group', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        console.log(resp);
                        if(resp.status==="deleted"){
                            document.querySelector('.deleted').classList.add('activate')
                            document.querySelector('.completed').classList.remove('activate')
                            this.groups.splice(index,1);
                        }
                    })
                }
                else{
                    return;
                }
            },      
            // edit
            edit_product(){
                    document.querySelector('.modal1').classList.add('activate')
                    this.gif = true
                    let formdata = new FormData();
                    formdata.append('namin',this.namin)
                    formdata.append('group_id',this.group_id)
                    formdata.append('url',this.url)
                    formdata.append('_token',this.$parent.token)
                    
                    fetch(this.$parent.domain_url + `edit-product`,{
                        method:"post",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        if (resp.status=="ok!") {
                            this.gif = false
                        } 
                    })
            },
        },            
}




var edit_gender  = {
    template:`
    <div class="w-100 d-flex flex-column align-items-center justify-content-center" style='height:60vh'>    
        <div  class="w-100 d-flex flex-column align-items-center"> 
            <div class="gif" v-if="gif" style='width:100%;justify-content:center'>
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div style="color:grey;font-size:16px;z-index:90;display:flex;align-items:flex-end">Loading....</div>
          </div>
        </div>    
        <div class="creation_name deleted" style='width: 100%;justify-content: space-between;padding: 20px;'>
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Настройки успешно изменены!
                <button type="button" class="close" data-dismiss="alert" style='margin-right: 30px;'>×</button>
            </div>
        </div>
        <h5>Изменение подгруппы</h5>
        <div style='background:white' class='py-4 px-4 w-75'>
            <label for="exampleInputEmail1">Группа:</label>
            <select @change='gen($event)' class='form-control form-control'>
            <option  selected disabled>{{group_id}}</option>
                <option v-for='types of types'>{{types.gender}}</option>
            </select>
            <label for="exampleInputEmail1">Подгруппа:</label>
            <input class='form-control' v-model='namin'>
            <label for="exampleInputEmail1">Ссылка для сайта:</label>
            <input class='form-control' v-model='url'>
            <label for="exampleInputEmail1">Ссылка для сайта:</label>
            <input class='form-control  ' type='text' v-model='name_site' @keyup.enter='edit_product' required>
            <div class="modal-footer">
                <button type="button" @click="edit_product" class="btn btn-primary">Изменить подтип</button>
            </div>
        </div>
    </div>
    `,
    data(){
        return{
            types:[],
            groups:[],
            gif:false,
            group_id:'',
            namin:'',
            gender:'',
            url:'',
            name_site:''
        }
    },
    mounted() {
        fetch(this.$parent.domain_url + 'api/type')
        .then( p => p.json())
        .then( resp =>{
                this.gif = false
                this.types = resp.type
            }            
        )
        fetch(this.$parent.domain_url + 'group/' + this.$route.params.id)
        .then((res)=>res.json())
        .then(resp=>{
            this.gif = false
            // console.log(resp.earn)
            // console.log(resp)
            for(group of resp.groupa){
                this.url = group.url
                this.name_site= group.name_site
                // console.log(group)
                this.group_id = group.group_id
                this.namin = group.namin
            }   
        }) 
    },
        methods:{
              gen($event) {
                // console.log($event.target.value);
                this.gender = $event.target.value;
              },
            // edit
            edit_product(){
                    this.gif = true
                    let formdata = new FormData();
                    formdata.append('url',this.url)
                    formdata.append('group_id',this.group_id)
                    formdata.append('name_site',this.name_site)
                    formdata.append('namin',this.namin)
                    formdata.append("id",this.$route.params.id)
                    formdata.append("_token",this.$parent.token);


                    fetch(this.$parent.domain_url + `edit-group`,{
                        method:"post",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        // console.log(resp.status)
                        if (resp.status=="ok") {
                            this.gif = false
                            localStorage.setItem('status',resp.status)
                            this.$router.push("/admin_group")
                        } 
                    })
            },
        },            
}


var admin_type_class = {
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
                <h3>Одежда</h3>
                <h5>Перезагрузите сайт после перехода к другому элементу</h5>
            </div>
            <div class="deleted btn bg-danger">Удалено!</div>
            <div class="completed btn bg-success">Сохранено!</div>
            <div id="btnContainer" class='d-flex flex-row justify-content-start w-100 px-3'>
            </div>
            <div  class="w-100 px-3 py-1  d-grid" style="height: 80vh;flex-wrap: wrap;overflow: auto;grid-template-columns: repeat(3,1fr);gap: 20px;">
                <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12"  v-for="(prod,index) of prod" :key="index">
                     <div class="product-thumb transition">
                        <div class="image">
                            <a>
                                <img :src="parseJson(prod.img)" alt="Рубашка Женская &quot;ПОЛО&quot; с длинным рукавом" title="Рубашка Женская &quot;ПОЛО&quot; с длинным рукавом" class="img-responsive" style='width:400px;height:300px' />
                            </a>                 
                        </div>
                        <div class="caption">
                            <h4>
                                <a>{{prod.id}}.{{prod.product_name}}</a>
                            </h4>
                            <span class='price'>
                                <span>Количество: </span>
                                <span> {{prod.item}}</span>
                                <td class="d-flex">
                                    <a @click="deleteit(prod.id,index)" style='color:white' class="card-link btn btn-danger h-25 my-2 mx-2 d-flex align-items-center"><i class='bx bxs-trash'></i></a>
                                    <a :href="'#edit_type/'+ prod.id" style='color:white' class="card-link btn btn-secondary h-25 my-2 mx-2 d-flex align-items-center"><i class='bx bxs-pencil'></i></a>
                                </td>
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
            prod:[],
            img:[],
            gif:false,
            item:'',
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
        }
    },
    mounted() {
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
               this.products = pro.product
                // console.log(this.products)
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        fetch(this.$parent.domain_url + 'api/product/') 
        .then( p => p.json())
        .then( resp =>{
                this.gif = false
               this.products = resp.types_gender
                // console.log(resp) 
            }            
        )
        fetch(this.$parent.domain_url + 'api/product_gend/' + this.$route.params.gender) 
        .then( p => p.json())
        .then( resp =>{
                this.gif = false
               this.prod = resp.types_gender
                // console.log(resp) 
                
                // document.querySelector('.deleted').classList.remove('activate')
            }            
        )
    },
        methods:{
            // img get
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
            selectFile(event) {
                let formData = new FormData();
                formData.append("photo",event.target.files[0]);
              formData.append("_token",this.$parent.token);
    
              fetch(this.$parent.domain_url + 'get-image', {
                method:"POST",
                body:formData,
              })
              .then(reps=> reps.json())
              .then(img=>{  
                // console.log(img.data)
                this.img.unshift(img.data);
              });
          },  
            open_list(){
                this.$el.querySelector('.card').classList.remove('activate')
                this.$el.querySelector('.list').classList.add('activate')
            },
            open_card(){
                this.$el.querySelector('.list').classList.add('activate')
                this.$el.querySelector('.card').classList.remove('activate')
            },
            addproduct(){
                if(document.querySelector('.price').value.trim().length == 0 ){
                    document.querySelector('.all_null').classList.add('activate')
                    // console.log('2')
                    return;
                }
                if( document.querySelector('.product_name').value.trim().length == ''){
                    document.querySelector('.all_null').classList.add('activate')
                    // console.log('2')
                    return;
                }
                if(document.querySelector('.product_id').value.trim().length == ''){
                    document.querySelector('.all_null').classList.add('activate')
                    // console.log('2')
                    return;
                }
                if(document.querySelector('.genderer').value.trim().length == '' ){
                    document.querySelector('.all_null').classList.add('activate')
                    console.log('2')
                    return;
                }
                if(document.querySelector('.availability').value.trim().length == '' ){
                    document.querySelector('.all_null').classList.add('activate')
                    // console.log('2')
                    return;
                }
                if(document.querySelector('.img').value.trim().length == ''){
                    document.querySelector('.all_null').classList.add('activate')
                    // console.log('2')
                    return;
                }
                else{
                    let formdata = new FormData()
                    formdata.append('product_name',this.product_name)
                    formdata.append('genderer',this.genderer)
                    formdata.append('product_id',this.product_id)
                    formdata.append('img',JSON.stringify(this.img))
                    formdata.append('item',this.item)
                    formdata.append('price',this.price)
                    formdata.append('info',this.info)
                    formdata.append('cotton',this.cotton)
                    formdata.append('thread',this.thread)
                    formdata.append('availability',this.availability)
                    formdata.append('code_product',this.code_product)
                    formdata.append('size',this.size)
                    formdata.append('plotnost',this.plotnost)
                    formdata.append('settings',this.settings)
                    formdata.append('_token',this.$parent.token)

                    fetch(this.$parent.domain_url + 'add-product',{
                        body:formdata,
                        method:'POST',
                    })
                    .then(add => add.json())
                    .then(res => {
                        if (res.status == "ok") {
                            document.querySelector('.deleted').classList.remove('activate')
                            document.querySelector('.completed').classList.add('activate')
                                location.reload()
                            }

                            // console.log(res)
                    })
            }
            }, 
            genderr($event) {
                // console.log($event.target.value);
                this.genderer = $event.target.value;
              },
              group($event) {
                // console.log($event.target.value);
                this.product_id = $event.target.value;
              },
            deleteit(id,index){
                let formdata = new FormData()
                formdata.append("id",id)
                formdata.append("_token",this.$parent.token)
    
                fetch(this.$parent.domain_url + 'delete-product', {
                    method:"POST",
                    body:formdata
                })
                .then(res=>res.json())
                .then(resp=>{
                    // console.log(resp);
                    if(resp.status==="deleted"){
                        document.querySelector('.deleted').classList.add('activate')
                        this.prod.splice(index,1);
                    }
                })
            },      
            // edit
            edit_product(){
                    document.querySelector('.modal1').classList.add('activate')
                    this.gif = true
                    let formdata = new FormData();
                    formdata.append('product_name',this.product_name)
                    formdata.append('genderer',this.genderer)
                    formdata.append('product_id',this.product_id)
                    formdata.append('price',this.price)
                    formdata.append('info',this.info)
                    formdata.append('cotton',this.cotton)
                    formdata.append('thread',this.thread)
                    formdata.append('availability',this.availability)
                    formdata.append('code_product',this.code_product)
                    formdata.append('size',this.size)
                    formdata.append('plotnost',this.plotnost)
                    formdata.append('settings',this.settings)
                    formdata.append('_token',this.$parent.token)
                    
                    fetch(this.$parent.domain_url + `edit-product`,{
                        method:"post",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        if (resp.status=="ok!") {
                            this.gif = false
                            
                        } 
                    })
            },
        },            
}