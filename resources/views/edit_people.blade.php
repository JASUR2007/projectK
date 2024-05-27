<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Person</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css" rel="stylesheet" type="text/css"/>
</head>
<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}

details[open] summary ~ * {
  animation: open 0.3s ease-in-out;
}

@keyframes open {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
details summary::-webkit-details-marker {
  display: none;
}

details summary {
  width: 100%;
  padding: 0.5rem 0;
  border-top: 1px solid black;
  position: relative;
  cursor: pointer;
  font-size: 1.25rem;
  font-weight: 300;
  list-style: none;
}

details summary:after {
  content: "+";
  color: black;
  position: absolute;
  font-size: 1.75rem;
  line-height: 0;
  margin-top: 0.75rem;
  right: 0;
  font-weight: 200;
  transform-origin: center;
  transition: 200ms linear;
}
details[open] summary:after {
  transform: rotate(45deg);
  font-size: 2rem;
}
details summary {
  outline: 0;
}
details p {
  font-size: 0.95rem;
  margin: 0 0 1rem;
  padding-top: 1rem;
}



</style>
<body>
<div class="container guitaritation">
    <div class="main-body">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a :href="domain_url + 'admin-page#/worker'">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page" v-for = 'personal of person' v-text='personal.id_person'>
                <span v-text='personal.id'></span>
              </li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img v-for='worker of person' v-if="worker.img !== null" :src="worker.img" v-bind:alt="worker.name"  class="rounded-circle" width="150">
                    <div v-else v-for='worker of person'>
                      <div v-if="worker.gender == 'ayol'">
                          <img src=' https://alter-com.ru/wp-content/uploads/2019/02/incognito-woman.jpg' v-bind:alt="worker.name" class="rounded-circle" width="150">                                           
                      </div>
                      <div v-if="worker.gender == 'erkak'">
                          <img src='https://bootdey.com/img/Content/avatar/avatar7.png' v-bind:alt="worker.name" class="rounded-circle" width="150">
                      </div>
                   </div>
                    <div class="mt-3" v-for = 'person_inf of person'>
                      <h4 v-text='person_inf.name'></h4>
                      <p class="text-secondary mb-1" v-text="person_inf.otdel + ',' + person_inf.classification + ',' + person_inf.letters"></p>
                      <p class="text-muted font-size-sm" v-text='person_inf.gender'></p>
                    </div>
                    <details style="width:100%;" v-for='worker of person'>
                      <summary style='display:flex'>
                        More
                      </summary>
                      <div style="display:flex;justify-content: space-between;width:100%">
                        <span>Ish_olingan:</span>
                        <span v-text='worker.Ish_olingan'></span>
                      </div>
                      <div style="display:flex;justify-content: space-between;width:100%">
                        <span>Code barcode:</span>
                        <span v-text='worker.product_code'></span>
                      </div>
                      <div style="display:flex;justify-content: space-between;width:100%">
                        <span>Oylik:</span>
                        <span v-text='worker.earning'></span>
                      </div>
                    </details>
                  </div>
                </div>
              </div>
              <div class="card mt-3" v-for = 'personal of person'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">seriya passport</h6>
                    <span class="text-secondary" v-text='personal.seriya'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">JSHSHIR</h6>
                    <span class="text-secondary" v-text='personal.JSHSHIR'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Prikaz nomer</h6>
                    <span class="text-secondary" v-text='personal.Prikaz_nomer'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">KIM_vidan</h6>
                    <span class="text-secondary" v-text='personal.KIM_vidan'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Pass_vidan</h6>  
                    <span class="text-secondary" v-text='personal.Pass_vidan'></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">birth</h6>
                    <span class="text-secondary" v-text='personal.birth'></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3" v-for='personal of person'>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">IFO</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" v-text="personal.name + ' ' + personal.surname + ' ' +  personal.patronomyc">                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" v-text='personal.phone_num'>                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" v-text='personal.street'>                     
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Transport</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" v-text='personal.transport'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">potokni nomeri:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" v-text='personal.potok_number'>                      
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" target="__blank" :href="domain_url + 'admin-page/edit_people/' +   personal.id + '/' + personal.id_person">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <!-- <img src="{!!QrCode::format('png')->generate('Embed me into an e-mail!')!!}"> -->
                  <img src="{!! QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png'!!}">
                </div>
                QrCode::format('png')->generate('Welcome to Makitweb');
              </div>
            </div>
          </div>
        </div>
    </div>
      <script>
          var app = new Vue ({
              el:".guitaritation",
              data:{            
                  domain_url:window.location.origin + '/',
                  token:document.querySelector('meta[name="csrf-token"]').content,
                  url:window.location.href,
                  person:[],
                
              },
              mounted(){
                console.log(this)
                fetch(this.domain_url + 'kid/' + this.url.split('/')[5] + '/' + this.url.split('/')[6]) 
                .then( w => w.json())
                .then( work =>{
                    this.gif=false;
                    this.person = work.worker
                    console.log(work)
                  });
              },
              methods:{
              }     
          })
          
    </script>
</body>
</html>