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
                    <button @click="start()">Save the queen</button>
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
                .robot{
                    background: url('robot.png');
                    background-size: contain;
                    background-size: cover;
                   
                    
                    
                }
                .queen{
                    background: url('queen.png');
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
                    $('.box-'+this.rbox).removeClass('robot');
                    $('.box-'+this.qbox).removeClass('queen');
                    this.rr = this.rc = this.qr = this.qc = 0;
                    while(this.rr==this.qr && this.rc==this.qc){
                        this.rr = (Math.floor(Math.random() * 10))%8;
                        this.rc = (Math.floor(Math.random() * 10))%8;
                        this.qr = (Math.floor(Math.random() * 10))%8;
                        this.qc = (Math.floor(Math.random() * 10))%8;
                    }
                    this.rbox = this.rr + '' + this.rc;
                    this.qbox = this.qr + '' + this.qc;
                    
                    $('.box-'+this.rbox).addClass('robot');
                    $('.box-'+this.qbox).addClass('queen');
                    $('.robot-queen').removeClass('robot-queen');

                },
                start: function(){
                    var ctime = (500*Math.abs(vm.rc-vm.qc))+500;
                    console.log(ctime);
                    if(vm.rr>vm.qr){
                        for(let i=vm.rr,t = 1;i>=vm.qr;--i,t++){
                           
                            console.log('loop-'+vm.rr+vm.qr);
                            (function (i,t) {
                                
                            setTimeout(function () {
                                console.log('row-'+i);
                                $('.box-'+vm.rbox).removeClass('robot');
                                vm.rbox = i + '' + vm.rc;
                                  vm.rr--;
                                $('.box-'+vm.rbox).addClass('robot');
                                
                            },ctime+ 500*t);
                            })(i,t);
                        }
                        
                    }else if(vm.rr<vm.qr){
                        for(var i=vm.rr,t=1;i<=vm.qr;i++,t++){
                            
                            (function (i) {
                            setTimeout(function () {
                                console.log('row-'+i);
                                $('.box-'+vm.rbox).removeClass('robot');
                                vm.rbox = i + '' + vm.rc;
                                 vm.rr++;
                                $('.box-'+vm.rbox).addClass('robot');
                            }, ctime+500*t);
                            })(i,t);
                            
                            
                            
                        }
                        

                    }
                    if(vm.rc>vm.qc){
                        var x = 0;
                        if(vm.rr==vm.qr) x = 1;
                        for(let i=vm.rc,t = 1;i>(vm.qc-x);--i,t++){
                           
                            
                            (function (i,t) {
                                
                            setTimeout(function () {
                                console.log('col-'+i);
                                $('.box-'+vm.rbox).removeClass('robot');
                                vm.rbox = vm.rr + '' + i;
                                vm.rc--;
                                $('.box-'+vm.rbox).addClass('robot');
                                
                            }, 500*t);
                            })(i,t);
                        }
                        
                    }else if(vm.rc<vm.qc){
                        var x = 0;
                        if(vm.rr==vm.qr) x = 1;
                        for(var i=vm.rc,t = 1;i<(vm.qc+x);i++,t++){
                            
                            (function (i) {
                            setTimeout(function () {
                                console.log('col-'+i);
                                $('.box-'+vm.rbox).removeClass('robot');
                                vm.rbox = vm.rr + '' + i;
                                vm.rc++;
                                $('.box-'+vm.rbox).addClass('robot');
                            }, 500*t);
                            })(i,t);
                            
                            
                            
                        }
                        

                    }

                    setTimeout(() => {
                        $('.box-'+vm.rbox).addClass('robot-queen');
                    }, 500*Math.abs(vm.rr-vm.qr)+ctime+(vm.rr==vm.qr? 0:500));
                }
            },
            mounted(){
                console.log('mounted');
                this.reset();
            }

        })
       </script>
    </body>
</html>
