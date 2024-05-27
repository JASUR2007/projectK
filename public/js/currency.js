var currency = {
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
            <div style='
                display: flex;
                justify-content: space-between;
                padding: 10px 15px;
                align-items: center;
                width:100%'>
                <h3 style="
                    height: 22px;
                    padding: 0px;
                    margin: 0px;">
                    Валюта 
                </h3>
                <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal" style='font-size:20px;color:white;padding: 0px 10px;'>
                    +
                </button>
            </div>
            <div class="alert_1 alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Настройки успешно изменены!
                <button type="button" class="close" data-dismiss="alert" style='margin-right: 30px;'>×</button>
            </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style='top: 25%;'>
                <div class="modal-content">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding: 5% 7% 0px;">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление валюты</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" style='border:none;font-size:22px;background:white'>
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название:</label>
                            <input placeholder="напишите название валюты" class="form-control" v-model="name">            
                        </div>
                        <label for="exampleInputEmail1">Символ:</label>
                        <div  style='display:flex'>
                            <input placeholder="напишите символ" class="form-control" v-model='symbol'>                        
                        </div> 
                        <label for="exampleInputEmail1">Значение:</label>
                        <div  style='display:flex'>
                            <input placeholder="напишите значение" class="form-control" v-model='level'>                        
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="addcurrency">Add product</button>
                </div>
            </div>
        </div>
        </div>
            <div class="panel-body">
                <div id="form-product">
                <div class="table-responsive" style='flex-wrap: wrap;overflow: auto;'>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">Символ</td>
                                <td class="text-center">Название</td>
                                <td class="text-left"> 
                                    <a style='text-decoration:none'>Значение</a>
                                </td>
                                <td class="text-center">Дата обновления</td>
                                <td class="text-right" style='display: flex;justify-content: space-between;border: none;'>Действие</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(currency,index) of currencies" :key="index"> 
                                <td class="text-left">{{currency.symbol}}</td>
                                <td class="text-left" style='display: flex;align-items: center;justify-content: center;'>{{currency.name}}</td>
                                <td class="text-left">{{currency.level}}</td>
                                <td class="text-right" style='
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    height: 50px;
                                '> 
                                    {{currency.created_at}}
                                </td>
                                <td class="text-right">
                                    <div style='display:flex'>
                                    <a @click="deleteit(currency.id,index)" class="message_text_a card-link btn btn-danger h-25  d-flex align-items-center"><i class='bx bxs-trash'></i></a>      
                                    <a data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Редактировать" :href="'#edit_currency/' + currency.id" style='margin-left:5px'>
                                          <i class="fa fa-pencil"></i>
                                    </a>
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
            currencies:[],
            gif:false,
            name:'',
            symbol:'',
            level:''
        }
    },
    mounted() {
        this.gif = true
        fetch(this.$parent.domain_url + 'currency')
        .then( resp => resp.json())
        .then( curr =>{
            this.gif = false
            this.currencies = curr.currency
            
            console.log(curr)
            document.querySelector('.alert_1').classList.remove('activate')
        })         
    },
        methods:{
            deleteit(id,index){
                let tek = confirm('Вы действительно хотите удалить?')
                if(tek){
                    document.querySelector('.alert_1').classList.remove('activate')
                    let formdata = new FormData()
                    formdata.append("id",id)
                    formdata.append("_token",this.$parent.token)
        
                    fetch(this.$parent.domain_url + 'delete-currency', {
                        method:"POST",
                        body:formdata
                    })
                    .then(res=>res.json())
                    .then(resp=>{
                        console.log(resp);
                        if(resp.status==="deleted!"){
                            this.currencies.splice(index,1);
                            document.querySelector('.alert_1').classList.add('activate')
                        }
                    })
                }
            else{
                return;
            }
            },    
            addcurrency(){
                let formdata = new FormData();
                formdata.append('name',this.name)
                formdata.append('symbol',this.symbol)
                formdata.append('level',this.level)
                formdata.append('_token',this.$parent.token)

                fetch(this.$parent.domain_url + `add-currency`,{
                    method:"post",
                    body:formdata
                })
                .then(res=>res.json())
                .then(resp=>{
                    console.log(resp.status)
                    if (resp.status=="ok") {      
                        document.querySelector('.alert_1').classList.add('activate')
                        location.reload()
                    }
                })
            }  
        },    

}
var edit_currency = {
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
            <div style='
                display: flex;
                justify-content: space-between;
                padding: 10px 15px;
                align-items: center;
                width:100%'>
                <h3 style="
                    height: 22px;
                    padding: 0px;
                    margin: 0px;">
                    Изменение валюты 
                </h3>
                <button type="submit" form="form-user" data-toggle="tooltip" title="" data-original-title="Сохранить" class="btn btn-primary" style="color: white;" @click = 'edit_currency'>
                    <i class="fa fa-save"></i>
                </button>
            </div>
            <div class="panel-body">
                <div id="form-product" class='container-fluid'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название:</label>
                        <input placeholder="напишите название валюты" class="form-control" v-model="name">            
                    </div>
                    <label for="exampleInputEmail1">Символ:</label>
                    <div  style='display:flex'>
                        <input placeholder="напишите символ" class="form-control" v-model='symbol'>                        
                    </div> 
                    <label for="exampleInputEmail1">Значение:</label>
                    <div  style='display:flex'>
                        <input placeholder="напишите значение" class="form-control" v-model='level'>                        
                    </div> 
                </div>
            </div>
        </div>            
    </div>
</div>
    `,
    data(){
        return{
            currencies:[],
            gif:false,
            name:'',
            symbol:'',
            level:''
        }
    },
    mounted() {
        this.gif = true
        fetch(this.$parent.domain_url + 'currency/' + this.$route.params.id)
        .then( resp => resp.json())
        .then( curr =>{
            this.gif = false
            this.currencies = curr.currency
            for(currency of curr.currency){
                this.name = currency.name
                this.symbol = currency.symbol
                this.level = currency.level
            }
            console.log(curr)
        })         
    },
        methods:{
            edit_currency(){
                this.gif = true
                let formdata = new FormData();
                formdata.append('name',this.name)
                formdata.append('id',this.$route.params.id)
                formdata.append('symbol',this.symbol)
                formdata.append('level',this.level)
                formdata.append('_token',this.$parent.token)
                
                fetch(this.$parent.domain_url + `edit-currency`,{
                    method:"post",
                    body:formdata
                })
                .then(res=>res.json())
                .then(resp=>{
                    if (resp.status=="ok!") {
                        this.gif = false
                        this.$router.push("/currency")
                    } 
                })
            },
        },    

}