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
            <div class="row m">
                <div class="col">
                <form>
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" id="f" v-model="a[0]" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label for="2">Email</label>
                    <input type="text" class="form-control" id="f2" v-model="a[1]" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="">District</label>
                    <input type="text" class="form-control" id="f3" v-model="a[2]" placeholder="District" name="district">
                </div>
                <div class="form-group">
                    <label for="2">Mobile No</label>
                    <input type="text" class="form-control" id="f4" v-model="a[3]" placeholder="+88099999999">
                </div>
                <div class="form-group">
                    <label for="">Depertment</label>
                    <input type="text" class="form-control" id="f5" v-model="a[4]" placeholder="Depertment">
                </div>
                <div class="form-group">
                    <label for="2">Zip code</label>
                    <input type="text" class="form-control" id="f6" v-model="a[5]" placeholder="Zip">
                </div>
                </form>
                </div>
                <div class="col">
                    <div class="row">name: @{{name}}</div>
                    <div class="row">email: @{{email}}</div>
                    <div class="row">district: @{{district}}</div>
                    <div class="row">mobile: @{{mobile}}</div>
                    <div class="row">depertment: @{{address}}</div>
                    <div class="row">zip: @{{zip}}</div>
                </div>
            </div>

            
            <style>
               
            </style>

       <script src="{{asset('js/app.js')}}"></script>
       <script>
            var vm = new Vue({
                el: '.m',
                data: {
                    name: '',
                    email: '',
                    mobile: '',
                    district: '',
                    zip: '',
                    address: '',
                    a: ['','','','','',''],
                    b: [0,0,0,0,0,0],
                    d: ["Barguna",  "Barisal",        "Bhola",    "Jhalokati",  "Patuakhali", "Pirojpur", 

                    "Bandarban","Brahmanbaria",   "Chandpur", "Chittagong", "Comilla",    "Cox's Bazar","Feni",     "Khagrachhari","Lakshmipur", "Noakhali", "Rangamati",
"Dhaka",    "Faridpur",       "Gazipur",  "Gopalganj",  "Kishoreganj","Madaripur",  "Manikganj","Munshiganj",  "Narayanganj","Narsingdi","Rajbari","Shariatpur","Tangail",
"Bagerhat", "Chuadanga",      "Jessore",  "Jhenaidah",  "Khulna",     "Kushtia",    "Magura",   "Meherpur",    "Narail",     "Satkhira","Jamalpur", "Mymensingh",     "Netrakona","Sherpur","Bogra",    "Chapainawabganj","Joypurhat","Naogaon",    "Natore",     "Pabna",      "Rajshahi", "Sirajganj","Dinajpur", "Gaibandha",      "Kurigram", "Lalmonirhat","Nilphamari", "Panchagarh", "Rangpur",  "Thakurgaon","Habiganj", "Moulvibazar",    "Sunamganj","Sylhet"]
                },
                methods:{
                     editDistance: function(s1, s2) {
                        s1 = s1.toLowerCase();
                        s2 = s2.toLowerCase();

                        var costs = new Array();
                        for (var i = 0; i <= s1.length; i++) {
                            var lastValue = i;
                            for (var j = 0; j <= s2.length; j++) {
                            if (i == 0)
                                costs[j] = j;
                            else {
                                if (j > 0) {
                                var newValue = costs[j - 1];
                                if (s1.charAt(i - 1) != s2.charAt(j - 1))
                                    newValue = Math.min(Math.min(newValue, lastValue),
                                    costs[j]) + 1;
                                costs[j - 1] = lastValue;
                                lastValue = newValue;
                                }
                            }
                            }
                            if (i > 0)
                            costs[s2.length] = lastValue;
                        }
                        return costs[s2.length];
                        },
                        similarity:function(s1, s2) {
                            var longer = s1;
                            var shorter = s2;
                            if (s1.length < s2.length) {
                                longer = s2;
                                shorter = s1;
                            }
                            var longerLength = longer.length;
                            if (longerLength == 0) {
                                return 1.0;
                            }
                            return (longerLength - vm.editDistance(longer, shorter)) / parseFloat(longerLength);
                            }
                },
                watch:{
                    a: function(){
                        vm.name = '';
                        vm.email = '';
                        vm.address = '';
                        vm.district = '';
                        vm.mobile = '';
                        vm.zip = '';
                        for(var i=0;i<6;i++){
                            vm.b[i] = 0;
                        }

                        for(var i=0;i<6;i++){
                            if(/^-{0,1}\d+$/.test(vm.a[i]) && vm.a[i].length==11){
                                vm.mobile = vm.a[i];
                                vm.b[i] = 1;
                            }
                            if(/^\d+$/.test(vm.a[i]) && vm.a[i].length==4){
                                
                                vm.zip = vm.a[i];
                                vm.b[i] = 1;
                            }
                            for(var j=0;j<vm.a[i].length;j++){
                                if(vm.a[i][j]=='@') vm.email = vm.a[i], vm.b[i] = 1;;
                            }
                            for(var j=0;j<vm.d.length;j++){
                                if(vm.similarity(vm.a[i],vm.d[j])>=0.65) vm.district = vm.a[i], vm.b[i] = 1;
                            }
                            if(vm.a[i].split(' ').length>1){
                                vm.name = vm.a[i];
                                vm.b[i] = 1;
                            }

                        }
                        if(vm.name.length>0 &&
                        vm.email.length>0 &&
                        vm.district.length>0 &&
                        vm.mobile.length>0 &&
                        vm.zip.length>0){
                            
                            for(var i=0;i<6;i++){
                                if(vm.b[i]==0) vm.address = vm.a[i];
                            }
                            
                        }

                    }
                }
            });
       </script>
    </body>
</html>
