
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
                <a href=""><i class="hom fa fa-home"></i></a>
            </li>
            <li>
                <a href="">Правила Конфиденциальности</a>
            </li>
    </ul>
    <div class="row">                
            <div id="content" class="col-sm-12">      
                <h1>Права Конфиденциальности</h1>
                <p style="margin: 0 0 10px;">Privacy Policy</p>
            </div>
            <h4></h4>
        </div>
    </div>
</div>
@include('footer-site')
@include('vue')
</body>
</html>