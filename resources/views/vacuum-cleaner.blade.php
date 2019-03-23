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
            <div class="row" id="game">
                <div class="col">
                @for($i=0;$i < 8 ;$i++)
                    <div class="row">
                        @for($j=0;$j < 8;$j++)
                            <div class="box box-{{$i}}{{$j}}">
                            </div>
                        @endfor
                    </div>
                @endfor
                </div>
                <div class="col">
                    <button @click="reset()">Reset</button>
                    <button @click="start()">Clean</button>
                </div>
            </div>
            
            <style>
                .box{
                    height:60px;
                    width:60px;;
                    background: gray;
                    border: 4px solid white;
                    padding: 0;
                    transition: all .2s ease;
                }
                .dirt{
                    background: url('dirt.png');
                    background-size: contain;
                    background-size: cover;
                   
                    
                    
                }
                .v{
                    background: url('v.png');
                    background-size: contain;
                    background-size: cover;
                    
                }
                .robot-queen{
                    background: url('robot-queen.png');
                    background-size: contain;
                    background-size: cover;
                    
                }
            </style>

       <script src="{{asset('js/app.js')}}"></script>
       <script>
        var vm = new Vue({
            el: '#game',
            data: {
                rr: 0,
                rc: 0,
                qr: 0,
                qc: 0,
                rbox: '00',
                qbox: '00'
            },
            methods:{
                reset: function(){
                    for(var i=0;i<8;i++){
                        for(var j=0;j<8;j++){
                            
                            $('.box-'+i+j).removeClass('dirt'); 
                            
                            
                        }
                    }
                    $('.box-00').addClass('v');
                    for(var i=0;i<8;i++){
                        for(var j=0;j<8;j++){
                            if(i==0 && j==0) continue;
                            var b = Math.floor(Math.random() * 10)%2;
                            if(b){
                                $('.box-'+i+j).addClass('dirt'); 
                            }
                            
                        }
                    }
                    
                },
                start: function(){
                    var cnt = 0;
                    var p1 = 0;
                    var p2 = 0;
                    for(var i=0;i<8;i++){
                        if(i%2==0){
                            for(var j=0;j<8;j++){
                                cnt++;
                                setTimeout((i,j) => {
                                $('.box-'+p1+p2).removeClass('v');
                                $('.box-'+i+j).removeClass('dirt');
                                $('.box-'+i+j).addClass('v');
                                p1 = i, p2 = j;
                                },500*cnt,i,j);
                                    
                               
                                
                            }
                            
                            
                        } else {
                            for(var j=7;j>=0;j--){
                                cnt++;
                                setTimeout((i,j) => {
                                $('.box-'+p1+p2).removeClass('v');
                                $('.box-'+i+j).removeClass('dirt');
                                $('.box-'+i+j).addClass('v');
                                p1 = i, p2 = j;
                                },500*cnt,i,j);
                                
                            }
                            
                            
                        }
                        
                        
                    }
                },
                        

            },
            mounted(){
                console.log('mounted');
                this.reset();
            }

        })
       </script>
    </body>
</html>
