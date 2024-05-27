<footer>
  <div class="container">
    <div class="row">
            <div class="col-sm-3">
        <h5>Информация</h5>
        <ul class="list-unstyled">
                    <li><a :href= "this.domain_url + 'api/about-us'">О компании</a></li>
                    <li><a :href= "this.domain_url + 'api/delivery'">Информация о доставке</a></li>
                    <li><a :href= "this.domain_url + 'api/privacy'">Правила Конфиденциальности</a></li>
                    <li><a :href= "this.domain_url + 'api/terms'">Правила и условия</a></li>
                  </ul>
      </div>
            <div class="col-sm-3">
        <h5>Служба поддержки</h5> 
        
        <ul class="list-unstyled">
          <li><a :href= "this.domain_url + 'api/contact'">Связаться с нами</a></li>
          <li><a :href="this.domain_url + 'api/sitemap'">Карта сайта</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
</footer>
