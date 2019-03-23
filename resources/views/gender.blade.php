<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>artificial intelligence</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
    </head>
    <body>
        <div class="m">
            Enter a name
            <input type="text" v-model="name">
            <button @click="check()">Check</button>
            
            <h3>@{{res}}</h3>
        </div>
        

       <script src="{{asset('js/app.js')}}"></script>
       <script>
        var vm = new Vue({
            el: '.m',
            data: {
                res: '',
                name: ''
            },
            methods:{
                check: function(){
                    axios.get('https://api.genderize.io/?name='+vm.name)
                    .then(function (response) {
                        vm.res = response.data.gender;
                        console.log(response);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
  
                    
                }
            },
            watch:{
                name: function(){
                    vm.res = '';
                }
            }

        });
       </script>
    </body>
</html>
