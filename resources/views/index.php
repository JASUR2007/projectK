<!-- <!DOCTYPE html>
<html>
<head>
	<title>Excel Uploading PHP</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<h1>Excel Upload</h1>

	<form method="POST" action="excelUpload.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Upload Excel File</label>
			<input type="file" name="file" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" name="Submit" class="btn btn-success">Upload</button>
		</div>
		<p>Download Demo File from here : <a href="demo.ods"><strong>Demo.ods</strong></a></p>
	</form>
</div>

</body>
</html> -->
var addpro = {
    template: 
    <div class="add-product" style="margin:20px 0;">
        <h1>Add product</h1>
        <form method="post">
        <div class="adding-product">
        <div class="top">
            <div class="inputs">
                <label class="form-label" for="type">Title</label>
                <input v-model="name" class="form-control" name="title" type="text" id="type" placeholder="Title" required>
                <br>
                <label class="form-label" for="type">Brand</label>
                <select  class="form-select" v-model="category" aria-label="Default select example">    
                    <option v-for="category of categ" :key="category.id" :id="'categ'+category.id" @change="changeRadio($event)"  :value="category.title">{{category.title}}</option>
                </select>
                <br>
                <label class="form-label" for="type">Type</label>
                <select  class="form-select" v-model="type" aria-label="Default select example">    
                    <option v-for="type of types" :key="category.id" :id="'types'+type.id" @change="changeType($event)"  :value="type.title">{{type.title}}</option>
                </select>
                <br>
                <label class="form-label" for="type">Description</label>
                <input v-model="description" class="form-control" name="description" type="text" id="type" placeholder="Description" required>
                <br>
            </div>
        </div>
        <label class="form-label">Ram</label>
        <div class="middle">
            <label class="form-label" for="type">Price</label>
            <input v-model="cost" class=" form-control" name="cost" type="number" min="0" id="type" placeholder="Cost" required>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="8GB" value="8GB" v-model="ram">
                <label class="form-check-label" for="8GB">
                    8GB
                </label>
            </div>    
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="16GB" value="16GB" v-model="ram">
                <label class="form-check-label" for="16GB">
                    16GB
                </label>
            </div>
            <div class="form-check">    
                <input class="form-check-input" type="checkbox" id="32GB" value="32GB" v-model="ram">
                <label class="form-check-label" for="32GB">
                    32GB
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="64GB" value="64GB" v-model="ram">
                <label class="form-check-label" for="64GB">
                    64GB
                </label>
            </div>
        </div>


        <label class="form-label">Storage</label>
        <div class="middle">    
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="256GB" value="256GB" v-model="storage">
                <label class="form-check-label" for="256GB">
                    256GB
                </label>
            </div>    
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="512" value="512GB" v-model="storage">
                <label class="form-check-label" for="512GB">
                    512GB
                </label>
            </div>
            <div class="form-check">    
                <input class="form-check-input" type="checkbox" id="1TB" value="1TB" v-model="storage">
                <label class="form-check-label" for="1TB">
                    1TB
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="2TB" value="2TB" v-model="storage">
                <label class="form-check-label" for="2TB">
                    2TB
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="4TB" value="4TB" v-model="storage">
                <label class="form-check-label" for="4TB">
                    4TB
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="8TB" value="8TB" v-model="storage">
                <label class="form-check-label" for="8TB">
                    8TB
                </label>
            </div>
        </div>
        <a class="plus-button btn btn-light" @click = "addInput()">+</a>
        <div class="bottom" v-for="(number,indexp) of i">
            <div class="inputs gap-1" style="display:flex; flex-direction:column; align-items:flex-start;">
                <label class="form-label" for="type">Colorname</label>
                <input @change="changeColorname($event, indexp)" class="form-control" name="colorname" type="text" id="type" placeholder="colorname" required>
                <br>
                <label class="form-label" for="type">Color</label>
                <input @change="changeColor($event, indexp)" class="form-control" name="color" type="color" style="width:50px;height:40px;" id="type" placeholder="Color" required>
                <br>
                <div style="display:flex; gap:10px;">
                    <label :for="'upload-photo'+indexp" style="cursor: pointer; text-align: center; border-radius:10px; padding: 5px; cursor: pointer; box-shadow: -1px 1px 4px 3px #efe7e7">
                        <i class='bx bx-cloud-download'></i>
                        <br>Yuklash
                    </label>
                    <input type="file" name="photo" :id="'upload-photo'+indexp" @change="selectFile($event,indexp)" class="form-control d-none" style="opacity: 0;" required>
                    <div v-for="img of images[indexp].image" style="width:78px; height:58px; border-radius:10px; box-shadow: -1px 1px 4px 3px #efe7e7" :key="img.id">
                        <div v-if="images[indexp].image == ''"></div>
                        <div v-else style="display:flex;height:100%;">
                            <img :src="$parent.domain_url+'/storage/'+img" alt="" style="color:grey;width:100%;height:100%;border-radius:10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex w-100 justify-content-end">
            
        </div>
        </div>
        </form>
        <button class="btn btn-primary" @click = "addProduct()">Product qo'shish</button>
        </div>
    ,
    data() {
        return {
            name: "",
            category: "",
            type: "",
            color: '',
            colorname: "",
            images: [{ color: '', image: [], colorname: '' }],
            categ: [],
            types: [],
            description: "",
            ram: [],
            storage: [],
            cost: "",
            i: 1,
        }
    },
    mounted() {
        fetch(this.$parent.domain_url + category)
            .then(resp => resp.json())
            .then((rep) => {
                this.categ = rep.categ
            })
        fetch(this.$parent.domain_url + protypes)
            .then(resp => resp.json())
            .then((rep) => {
                this.types = rep.type
            })
    },
    methods: {
        changeRadio($event) {
            this.categ = $event.target.value;
        },
        changeType($event) {
            this.type = $event.target.value;
        },
        changeColor($event, index) {
            this.images[index].color = $event.target.value;
            console.log(this.images[index].color);
        },
        changeColorname($event, index) {
            this.images[index].colorname = $event.target.value;
            console.log(this.images[index].colorname);
        },
        selectFile(event, index) {
            let img = new FormData();
            img.append("photo", event.target.files[0]);
            img.append("_token", this.$parent.token);

            fe

tch(this.$parent.domain_url + proimages, {
                method: "POST",
                body: img
            })
                .then(res => res.json())
                .then(resp => {
                    this.images[index].image.push(resp.data);
                })
        },
        addInput() {
            this.i++;
            this.image.push({ color: '', image: [], colorname: '' });
        },
        addProduct() {
            let formdata = new FormData();
            formdata.append("name", this.name)
            formdata.append("category", this.category)
            formdata.append("type", this.type)
            formdata.append("ram", this.ram)
            formdata.append("storage", this.storage)
            formdata.append("description", this.description)
            formdata.append("cost", this.cost)
            formdata.append("_token", this.$parent.token)
            formdata.append("images", JSON.stringify(this.images))

            fetch(this.$parent.domain_url + addpro, {
                method: "POST",
                body: formdata
            })
                .then(res => res.json())
                .then(res => {
                    console.log(res)
                    if (res.status === 'ok') {
                        this.$router.push('/products')
                    }
                })
        },
    }

}