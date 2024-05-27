<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('head-site')
</head>
<body>
    <div id="app">
        <div class="container">
        <ul class="breadcrumb">
            <li>
                <a :href="domain_url + 'api'"><i class="fa-solid fa-house-chimney"></i></a>
            </li>
            <li>
                <a :href="domain_url + 'api/' + 'cart'">Корзина покупок</a>
            </li>
        </ul>
        <div class="row">         
            <div id="content" class="col-sm-12">    
                <h1>Корзина покупок</h1>
                <p>В корзине пусто</p>
                <div class="buttons">
                    <div class="pull-right"><a href="domain_url + 'api'" class="btn btn-primary">Продолжить</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('footer-site')
    <script>
        var app = new Vue ({
            el:"#app",
            data:{
               vallet:'https://nbu.uz/exchange-rates/json',
               domain_url:window.location.origin + '/',
            },
        })
</script>    
</body>
</html>