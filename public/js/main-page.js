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
          <div class="completed btn bg-success">Сохранено!</div>
            <div class="d-flex flex-row" style='width: 100%;justify-content: space-between;padding: 20px;'>
                <h3>Товары</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" style="margin-top:10px" data-target="#exampleModal">
                Добавление элемента+
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление элемента</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w3-bar nav nav-tabs">
                        <li class="w3-bar-item w3-button nav-item" onclick="openCity('London')">Наименование</li>
                        <li class="w3-bar-item w3-button" onclick="openCity('Paris')">Описание</li>
                    </div>
                    <div id="London" class="w3-container city">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Название:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название продукта" v-model="product_name">
                         </div>
                        <div class="form-group">
                        <select class="form-select" aria-label="Default select example" @change="genderr($event)">
                                <option selected>выберит категорию</option>
                                <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                            </select>
                            <label for="exampleInputPassword1">Цена</label>
                            <input type="text" class="form-control" placeholder="введите цену товара" id="exampleInputPassword1" v-model="price">
                        </div>
                        <div class="form-group">
                             <label for="exampleInputEmail1">Описание:</label>
                             <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="info">
                             <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Доступность:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="availability">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Код товара:</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="code_product">
                           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>   
                    </div>

                    <div id="Paris" class="w3-container city" style="display:none">
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
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="addproduct">Add product</button>
                </div>
                </div>
            </div>
            </div>
            <div class="deleted btn bg-danger">Удалено!</div>
            <div class="completed btn bg-success">Сохранено!</div>
            <div id="btnContainer" class='d-flex flex-row justify-content-start w-100 px-3'>
            </div>
            <div  class="w-100 px-3 py-1 messages" style="height: 80vh;flex-wrap: wrap;overflow: auto;">
            <table id="customers" class="card1">
                <tr>
                    <th>ID</th>
                    <th>Фотография</th>
                    <th>Наименовани</th>
                    <th>Классификация</th>
                    <th>Размер</th>
                    <th>Код продукта</th>
                    <th>Количество</th>
                    <th>Дата сохранения</th>
                </tr>
                <tr v-for="(products,index) of products" :key="index">
                    <td>{{products.id}}</td>
                    <td>{{products.img}}</td>
                    <td>{{products.product_name}}</td>
                    <td>{{products.gender}}</td>
                    <td>{{products.size}}</td>
                    <td>{{products.code_product}}</td>
                    <th>{{products.item}}</th>
                    <td class="d-flex align-items-center">
                        <span>{{products.created_at}}</span>
                        <a @click="deleteit(products.id,index)" class="card-link btn btn-danger h-25 my-2 mx-2 d-flex align-items-center"><i class='bx bxs-trash'></i></a>
                        <a :href="'#edit_man/'+ products.id" class="card-link btn btn-secondary h-25 my-2 mx-2 d-flex align-items-center"><i class='bx bxs-pencil'></i></a>
                    </td>
                </tr>
            </table>
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
                                <div class="w3-bar nav nav-tabs">
                                <li class="w3-bar-item w3-button nav-item" onclick="openCity('London')">London</li>
                                <li class="w3-bar-item w3-button" onclick="openCity('Paris')">Paris</li>
                            </div>
                            <div id="London" class="w3-container city">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Название:</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название продукта" v-model="product_name">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Группа:</label>
                                <select class="form-select" aria-label="Default select example" @change="genderr($event)">
                                        <option selected>выберит категорию</option>
                                        <option  v-for="types of types" :value="types.gender">{{types.gender}}</option>
                                    </select>
                                    <label for="exampleInputPassword1">Цена</label>
                                    <input type="number" class="form-control" placeholder="введите цену товара" id="exampleInputPassword1" v-model="price">
                                </div>
                                <label for="exampleInputEmail1">Подгруппа:</label>
                                <select class="form-select" aria-label="Default select example" @change="group($event)">
                                        <option selected>выберитe категорию</option>
                                        <option  v-for="types of types" :value="types.gender_id">{{types.gender_id}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание:</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="info">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Доступность:</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="availability">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Код товара:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите описание продукта" v-model="code_product">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>   
                            </div>
                            <div id="Paris" class="w3-container city" style="display:none">
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Image:</label>
                                <div>
                                        <div style="" class="align-items-center justify-content-center flex-column">
                                                <div style="font-size:10px;color:grey">Upload</div>
                                                <input type="file" name="photo" id=""  @change = "selectFile($event)"/>                      
                                        </div>			                        
                                        <div class="d-grid" style="grid-template-columns:1fr 1fr">
                                            <div v-for="(images,index) in images" :key="index" style="height:150px;width:150px;background-color:whitesmoke;border-radius:5px;display:flex;cursor:pointer;" class="align-items-center justify-content-center flex-column">
                                                <img :src="$parent.domain_url+'storage/'+ images"  alt="" style="color:grey;width:90%;height:90%">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ткань:</label>
                                    <input type="text" class="form-control" v-model="cotton" placeholder='выберите ткань'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Нить</label>
                                    <input type="text" class="form-control" v-model="thread" placeholder='выберите нить'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Плотность ткани:</label>
                                    <input type="text" class="form-control" v-model="plotnost"  placeholder='выберите плотность ткани'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Размер</label>
                                    <input type="text" class="form-control" v-model="size"  placeholder='выберите размер'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Инструкция</label>
                                    <input type="text" class="form-control" v-model="settings"  placeholder='выберите инструкция'>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
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
            gif:false,
            item:0,
            product_id:'',
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
        fetch(this.$parent.domain_url + 'api/product')
        .then( p => p.json())
        .then( pro =>{
                this.gif = false
               this.products = pro.product
                console.log(this.products)
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        fetch(this.$parent.domain_url + 'api/type') 
        .then( p => p.json())
        .then( resp =>{
                this.gif = false
               this.types = resp.type
                console.log(this.types) 
                document.querySelector('.deleted').classList.remove('activate')
            }            
        )
        fetch(this.$parent.domain_url + 'product/' + this.$route.params.id)
        .then((res)=>res.json())
        .then(resp=>{
            this.gif = false
            // console.log(resp.earn)
            for(product of resp.pro_edit){
                this.product_name = product.product_name
                this.product_id = product.product_id
                this.genderer = product.genderer
                this.price = product.price
                this.info = product.info
                this.availability = product.availability
                this.settings = product.settings
                this.plotnost = product.plotnost
                this.size = product.size
                this.cotton = product.cotton
                this.thread = product.thread
                this.code_product = product.code_product
                console.log(this.thread)
            }   
        }) 
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
            open_list(){
                this.$el.querySelector('.card').classList.remove('activate')
                this.$el.querySelector('.list').classList.add('activate')
            },
            open_card(){
                this.$el.querySelector('.list').classList.add('activate')
                this.$el.querySelector('.card').classList.remove('activate')
            },
            addproduct(){
                let formdata = new FormData()
                formdata.append('product_name',this.product_name)
                formdata.append('genderer',this.genderer)

                formdata.append('_token',this.$parent.token)

                fetch(this.$parent.domain_url + 'add-product',{
                    body:formdata,
                    method:'POST',
                })
                .then(add => add.json())
                .then(res => {
                    if (res.status == "ok") {
                        document.querySelector('.completed').classList.add('activate')
                            location.reload()
                        }

                        console.log(res)
                })
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
                    console.log(resp);
                    if(resp.status==="deleted"){
                        document.querySelector('.deleted').classList.add('activate')
                        this.products.splice(index,1);
                    }
                })
            },      
        },            
}

