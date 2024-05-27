<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn{
            position: absolute;
            top: 20px;
            right: 20px;
            width: 55px;
            height: 30px;
            background-color: #333;
            font-size: 1.5em;
            box-shadow: 5px 5px 15px rgb(0 0 0 / 25%), 5px 5px 30px rgb(0 0 0 / 25%), inset -2px -2px 5px rgb(0 0 0 / 25%), inset 2px 2px 5px rgb(0 0 0 / 25%);
            display: flex;
            justify-content: space-around;
            align-items: center;
            cursor: pointer;
            border-radius: 10px;

        }
        .night{
            color: white;
            transition: 3s;
        }
        .night_class{
            color: black;

            background-color: white;
            display: flex;
            justify-content: center;
            width: 75%;
            margin-left: -10px;
            margin-top: 0px;
            height: 101%;
            transition: 3s;
        }
        .light{
            color: black;
        }
    </style>
</head>
<body>
    <div id="app">
        CSV converting
        <div class="btn">
            <div class="night" @click='night_click'>n</div>
            <div class="light">l</div>
        </div>
    </div>
    <table class="table container-fluid">
        <td></td>
        <td></td>    
    </table>
    <script src="{{asset('extend/vue.txt')}}"></script>
    <script>
        var app = new Vue ({
            el:"#app",
            data:{
                url:window.location.href,
            },
            methods:{
                night_click(){
                    this.$el.querySelector('.night').classList.add('night_class')
                    // this.$el.querySelector('.btn').style.backgroundColor = 'white'
                    // this.$el.querySelector('.night').style.backgroundColor = 'black'
                    // this.$el.querySelector('.night').style.width = '75%'
                    // this.$el.querySelector('.night').style.backgroundColor = 'black'
                    // this.$el.querySelector('.night').style.borderRadius = '10px'
                    // this.$el.querySelector('.night').style.display = 'flex'
                    // this.$el.querySelector('.night').style.justifyContent = 'center'
                    // this.$el.querySelector('.night').style.marginLeft = '-8px'
                    // this.$el.querySelector('.light').style.color = 'white' 
                },
                light_click(){

                }
            }   
        })
    </script>
</body>
</html>