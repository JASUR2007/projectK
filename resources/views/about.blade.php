
<!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('head-site')
<title>О компании</title>
<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    body{
        font-family: 'Open Sans', sans-serif;
        font-weight: 400;
        color: #666;
        font-size: 12px;
        line-height: 20px;
         width: 100%;
    }
    .h4{
        font-size: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        color: #444c;
        line-height: 1.4; 
        text-align: justify;
    }
    .breadcrumb{
        list-style: none;
        background-color: #f5f5f5;
        border-radius: 4px;
    }
    .breadcrumb li::after{
         content: '';
        display: block;
        position: absolute;
        top: -3px;
        right: -5px;
        width: 26px;
        height: 26px;
        border-right: 1px solid #DDD;
        border-bottom: 1px solid #DDD;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .breadcrumb li>a:focus, .breadcrumb li>a:hover {
        color: #23527c;
        text-decoration: none;
    }
    .breadcrumb li> a {
        color: #0256aa;
    } 
    .breadcrumb   li + li:before {
        content: '';
        padding: 0;
    }
    .breadcrumb li>a>.hom{
        font-size: 12px;
    }
</style>
</head>
<body class="information-information">
@include('header-site')
<div id="app">
    <div class="container">
    <ul class="breadcrumb">
            <li>
                <a :href="domain_url + 'api'"><i class="hom fa fa-home"></i></a>
            </li>
            <li>
                <a :href="domain_url + 'api/about-us'">О компании</a>
            </li>
    </ul>
    <div class="row">                
            <div id="content" class="col-sm-12">      
                <h1>О компании</h1>
                <h4 class="h4">ООО «KID KAMILA» под торговой маркой I&H tex 
                    предлагает Вашему вниманию изделия из трикотажа для вас и всей семьи. Мы производим детскую одежду оптом,верхний и бельевой трикотаж оптом для женщин и мужчин, и другие изделия по каталогам, оптовым заказам клиентов.
                    <br><br>
                    Ассортимент включает самые разные изделия, предназначенные для повседневного ношения, дома, работы, для сна и отдыха, занятий спортом и многого другого. На нашем предприятии работают опытные конструктора – технологи, которые постоянно отслеживают последние тенденции моды и создают новые коллекции. ООО «KID KAMILA» — это возможность заказать в одном месте всё, что нужно для счастья в семье.<br><br>
                    Современное оборудование от мировых производителей швейного оборудования, строжайший контроль качества, передовые технологии и материалы, и квалифицированный персонал являются залогом качества производимой нами продукции.
                    <br><br>
                    Вся продукция фабрики ООО «KID KAMILA» отвечает нормам, стандартам качества и безопасна для здоровья человека, что подтверждено международными сертификатами соответствия Узстандарта ISO9001:2015
                    <br><br>
                    В продукции I&H tex нет брака и пересорта. Трехступенчатый контроль производства, проверка каждого заказа перед отправкой – гарантия позитивного завершения сделки и ничем не омрачённой радости от покупки.
                    <br><br>
                    Низкие цены от производителя, гибкая система скидок, ускоренная комплектация заказов и индивидуальный подход позволяют соответствовать самым высоким требованиям наших клиентов. Также мы готовы взяться за производство изделий по вашему индивидуальному заказу, где будут приняты во внимание необходимые модели, размеры, цветовая гамма.
                    <br><br>
                    Удобные условия сотрудничества. Будь то розничный покупатель или дистрибьютор с большим числом заказов, I&H tex всегда стремится идти навстречу пожеланиям клиента.
                    <br>
                    Мы ориентируемся как на наших клиентов – оптовых покупателей, так и на конечного потребителя!
                    <br><br>
                    Мы рады предложить Вам широкий ассортимент по выгодным ценам!
                    <br>
                </h4>
                <h4 class="h4"><br></h4><h4 class="h4">
                    <img src="http://ih-tex.uz/image/catalog/CERT.jpg" style="width: 50%; float: left;">
                    <img src="http://ih-tex.uz/image/catalog/CERTeng.jpg" style="width: 50%; float: left;"><br>
                    <img src="http://ih-tex.uz/image/catalog/425-sert1.jpg" style="width: 50%; float: left;">
                    <img src="http://ih-tex.uz/image/catalog/425-sert2.jpg" style="width: 50%; float: left;"><br>
                    <img src="http://ih-tex.uz/image/catalog/425-sert3.jpg" style="width: 50%;">
                </h4>
            </div>
        </div>
    </div>
    @include('footer-site')
</div>
@include('vue')
</body>
</html>