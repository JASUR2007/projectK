var main = {
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
        <div class="row">                                                                 
            <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile tile-primary">
                <div class="tile-heading">
                    Всего товара
                </div>
                <div class="tile-body"> 
                    <i class="fa-solid fa-cart-shopping" style='    background-image: linear-gradient(225deg, #00acc1 0, #25c5da 100%);'></i>
                    <h2 class="pull-right">{{product_length}}</h2>
                </div>
                 <div class="tile-footer"><a href="#admin_type">Подробнее...</a></div>
            </div>
        </div>
   </div>
        <li class="list-group-item">
            <div style='padding: 5px;'>
              <button type="button" value="logs" data-toggle="tooltip" title="" class="btn btn-success calcFolder" data-original-title="Посчитать размер папки">{{type_length}}</button>
               <span>Всего добавлено было категорий</span>
            </div>
           <div style='padding: 5px;'>
             <button type="button" value="logs" data-toggle="tooltip" title="" class="btn btn-danger calcFolder" data-original-title="Посчитать размер папки">{{type_length_null}}</button>
              <span>Всего удалено было категорий</span>
           </div>
        </li>
        <li class="list-group-item">
            <div style='padding: 5px;'>
               <button type="button" value="logs" data-toggle="tooltip" title="" class="btn btn-success calcFolder" data-original-title="Посчитать размер папки">{{group_length}}</button>
               <span>Всего добавлено было Подкатегорий</span>  
            </div>          
            <div style='padding: 5px;'>
                <button type="button" value="logs" data-toggle="tooltip" title="" class="btn btn-danger calcFolder" data-original-title="Посчитать размер папки">{{group_length_null}}</button>
                <span>Всего удалено было категорий</span>
           </div>
        </li>
        <li class="list-group-item">
            <button type="button" value="logs" data-toggle="tooltip" title="" class="btn btn-success calcFolder" data-original-title="Посчитать размер папки">{{type_length}}</button>
            <span>Всего добавлено было баннеров</span>
        </li>
</div>    
    `,
    data(){
        return{
            gif:false,
            product_length:'',
            type_length:'',
            group_length:'',
            type_length_null:"",
            group_length_null:'',
        }
    },
    mounted() {    
        this.gif = true
        fetch(this.$parent.domain_url + 'product')
        .then( p => p.json())
        .then( pro =>{
            this.gif = false
            this.product_length = pro.products.length
        })
        fetch(this.$parent.domain_url + 'admin_type')
        .then( t => t.json())
        .then( type =>{
            this.gif = false
            this.type_length = type.type.length
        })
        fetch(this.$parent.domain_url + 'admin_type_null')
        .then( t => t.json())
        .then( type =>{
            this.gif = false
            this.type_length_null = type.type.length
        })
        fetch(this.$parent.domain_url + 'admin_group')
        .then( g => g.json())
        .then( gr =>{
            this.gif = false
            this.group_length = gr.group.length
            console.log(gr)
        })
        fetch(this.$parent.domain_url + 'admin_group_null')
        .then( g => g.json())
        .then( gr =>{
            this.gif = false
            this.group_length_null = gr.group.length
            console.log(gr)
        })
    },
    methods:{
    }        
}

var register = {
    template:`
    <div class="container-fluid">
        <div style="display:flex;justify-content:flex-end;width:100%;padding-top: 20px;">
            <div class="pull-right">
              <button type="submit" @click='take_user' form="form-user" style='color:White' data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить">
                <i class="fa fa-save"></i>
            </button>
            </div>  
        </div>
            <div class="creation_name saved" style='width: 100%;justify-content: space-between;padding: 20px;'>
                <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Настройки успешно изменены!
                <button type="button" class="close" data-dismiss="alert" style='margin-right: 30px;'>×</button>
            </div>
       </div>     
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> Редактирование</h3>
        </div>
        <div class="panel-body">
            <form  @submit.prevent="Register()" class="form-horizontal">
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-firstname">Имя</label>
                <div class="col-sm-10">
                  <input type="text" name="firstname"  v-model='nami' placeholder="Имя" id="input-firstname" class="form-control">
               </div>
            </div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-lastname">Фамилия</label>
                <div class="col-sm-10">
                  <input type="text" name="lastname" v-model='surname' placeholder="Фамилия" id="input-lastname" class="form-control">
                </div>
            </div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                <div class="col-sm-10">
                    <input type="text" name="email" v-model='mail' placeholder="E-Mail" id="input-email" class="form-control">
                </div>
            </div>
            <label class="col-sm-2 control-label" for="input-image">Изображение</label>
            <div class="col-sm-10" style='display: flex;justify-content: space-between;'>
                <div  id="thumb-image" data-toggle="image" class="img-thumbnail" style='width:100px;height:100px;display:flex;justify-content:center;align-items:center'>
                    <div style='display:flex;justify-content:center;flex-direction:column;align-items:center'>
                    <img :src=" $parent.domain_url+'storage/' + img" alt="" title="" style='width:80%;height:80%;max-width:100%;max-height:100%;'>
                    </div>
                </div>
                <input type="hidden" name="image" value="catalog/cart.png" id="input-image">
                <div style='display:flex;align-items: center;'>
                    <button @click="ImgDelete($event,id)" type="button" data-toggle="tooltip" title="" data-original-title="Удалить" class="btn btn-danger" style="height:35px;margin-right:5px">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                    </button>
                    <div class="bottom">
                        <div class="inputs gap-1" style="display: flex; flex-direction: column; align-items: flex-start;">
                            <div style="display: flex; width: 100px;">
                            <label for="upload-photo0" style="width: 100%; cursor: pointer; text-align: center; border-radius: 10px; background: whitesmoke;display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                <i class="bx bx-cloud-download" style='font-size: 40px;'></i>   Yuklash
                                <input type="file" name="photo" id="upload-photo0" required="required" class="form-control d-none img" style="opacity: 0; position: absolute;    width: 85px;margin-top: 0px;height: 60px;" @change='upload($event)'>
                            </label>
                        </div>
                    </div> 
                </div>
            </div></div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-password">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" v-model='password' value="" placeholder="Пароль"  class="controller controller_2" autocomplete="off">
                    <small class='controller_1'>Пароль должен содержать до 4 символов</small>
                </div>
            </div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-confirm">Подтверждение пароля</label>
                <div class="col-sm-10">
                  <input class="controller_3" type="password" name="confirm" v-model='confirm' placeholder="Подтверждение пароля">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    `,  
    data(){
        return{
            gif:false,
            nami:'',
            mail:'',
            surname:'',
            img:[{}],
            password:'',
            id:'',
            confirm:'',
            pass:'',
        }
    },
    mounted() {    
        fetch(this.$parent.domain_url + 'user')
        .then( r => r.json())
        .then( reg =>{
            this.gif = false
            this.users = reg.register 
            for(user of reg.register){
                this.nami = user.nami
                this.surname = user.surname
                this.mail = user.mail
                this.img = user.img
                this.id = user.id
                this.pass = user.password
            }
            console.log(this.img)
            console.log(reg)
        })
        fetch(this.$parent.domain_url + 'api/type')
        .then( t => t.json())
        .then( type =>{
            this.gif = false
            this.type_length = type.type.length
        })
        fetch(this.$parent.domain_url + 'admin_group')
        .then( g => g.json())
        .then( gr =>{
            this.gif = false
            this.group_length = gr.group.length
            console.log(gr)
        })
    },
    methods:{
        backdown(){
            this.back = localStorage.getItem('url')
            window.location.href = this.back
            console.log(window.location.href)
          },

         //   image
         ImgDelete(event,id) {
            let formdata = new FormData()
            this.img = 'swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg'
            formdata.append("img",this.img)
            formdata.append("id",id)
            formdata.append("_token",this.$parent.token)

            fetch(this.$parent.domain_url + 'delete-image_edit', {
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
          upload($event){
                let formData = new FormData();
                formData.append("photo",event.target.files[0]);
                formData.append("_token",this.$parent.token);

                fetch(this.$parent.domain_url + 'get-image', {
                    method:"POST",
                    body:formData,
                })
                .then(reps=> reps.json())
                .then(resp=>{  
                    this.img = resp.data

                    // this.img.unshift(img.data);
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
          take_user($event){
                if(this.password !== ''){
                    if(document.querySelector('.controller_2').value.length < 4){
                        document.querySelector('.controller').classList.add('activate')
                        document.querySelector('.saved').classList.remove('activate')
                        document.querySelector('.controller_3').classList.add('activate')
                        document.querySelector('.controller_1').classList.add('activate')
                    }else{
                        if(this.confirm == this.password){
                            let formdata = new FormData()
                            formdata.append('password',this.password)
                            formdata.append('nami',this.nami)
                            formdata.append('mail',this.mail)
                            formdata.append('surname',this.surname)
                            formdata.append('img',this.img)
                            formdata.append('confirm',this.confirm)
                            formdata.append('id',this.id)
                            formdata.append('_token',this.$parent.token)
                
                            fetch(this.$parent.domain_url + 'edit_user',{
                                body:formdata,
                                method:'POST',
                            })
                            .then(add => add.json())
                            .then(res => {
                                if (res.status == "ok!") {

                                    console.log('1')
                                    this.password = ''
                                    this.confirm = ''
                                    location.reload()
                                }    
                            })
                        }else{

                
                        }
                    }
                }else{
                    if(this.confirm == this.password){
                        let formdata = new FormData()
                        formdata.append('password',this.pass)
                        formdata.append('nami',this.nami)
                        formdata.append('mail',this.mail)
                        formdata.append('surname',this.surname)
                        formdata.append('img',this.img)
                        formdata.append('confirm',this.pass)
                        formdata.append('id',this.id)
                        formdata.append('_token',this.$parent.token)
            
                        fetch(this.$parent.domain_url + 'edit_user',{
                            body:formdata,
                            method:'POST',
                        })
                        .then(add => add.json())
                        .then(res => {
                            if (res.status == "ok!") {
                        console.log('2')

                               location.reload()
                            }    
                        })
                    }else{
                    }     
                }            
        }, 
    }        
}