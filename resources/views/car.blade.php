<x-app-layout>
           <x-slot name="header">
               <br>
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                   {{ __('Welcome') }}
               </h2>
               <br>
           </x-slot>
           <div class="container box">
                <br>
               @if (isset(Auth::user()->email))
                   <div class="alert alert-danger success-block">
                       <strong>{{ __('Welcome') }} {{ Auth::user()->email }}</strong>
                       <br />
                       <a href="{{ url('/main/logout') }}">{{ __('Logout') }}</a>
                   </div>
               @else
                   <script>
                       window.location = "/main";
                   </script>
               @endif
               @if (isset($data)){{ $data }}@endif
               <div>
                    <!-- <form action="/octave/car?api_key={{ Config::get('app.api_key') }}" method="POST">
                    @csrf -->
                        <label for=query> {{ __('Enter value in range -0.11 to 0.11') }}</label>
                        <br>
                        <label for=query> {{ __('For right view of animation, let the animation end after 500. value of T') }}</label>
                        <input type="text" class="form-control" id="query" name="query">@if (isset($query)){{ $query }}@endif</input>
                        <button id="anim" class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>
                    <!-- </form> -->

                     <div class="my-3" id='myDiv'>
                            <!-- Plotly chart will be drawn inside this DIV -->
                    </div>
                    <div id="container"></div>
               </div>
               <x-slot name="footer">
                 
               </x-slot>
               <script>
                   
                   $('#anim').click(function () {
                       x1 = [];
                       x3 = [];
                        var query = $('#query').val();
                        const csrfToken = document.querySelector("[name='csrf-token']").content

                        fetch('/octave/car?api_key={{ Config::get('app.api_key') }}&q=' + query,
                        {
                        method: 'POST',
                        headers: {
                            "X-CSRF-Token": csrfToken, // 👈👈👈 Set the token
                            "Content-Type": "application/json"
                        },
                        })
                        .then(response => response.json())
                        .then(
                        (data) =>{ 
                            x1 = data.x1[0];
                            x3 = data.x2[0];
                            console.log(x3);
                            var trace1 = {
                        y: [],
                        type: 'scatter'
                    };

                    var trace2 = {
                        y: [],
                        type: 'scatter'
                    };
                    var datam = [trace1, trace2];
                    var div = document.getElementById('myDiv');
                    var layout = {
                        xaxis: {
                            rangemode: "nonnegative",
                            autorange: true,
                            title: 't',
                        },
                        yaxis: {
                            autorange: true,
                            title: 'y'
                        },
                        margin: {
                            l: 50,
                            r: 50,
                            b: 100,
                            t: 100,
                            pad: 4
                        },
                    };

                    var config = {
                        responsive: true
                    }
                    Plotly.newPlot(div, datam, layout, config);

                    let i = 0;
                    var interval = setInterval(function () {
                        i++;
                        Plotly.extendTraces(div, {
                            y: [
                                [parseFloat(x1[i]).toFixed(20)],
                                [parseFloat(x3[i]).toFixed(20)],
                            ]
                        }, [0, 1])

                        if (i > 490) {
                            clearInterval(interval)
                        }
                    }, 1);

                    var stage = new Konva.Stage({
                        container: 'container',
                        width: 600,
                        height: 600,
                    });

                    var layer = new Konva.Layer();

                    var tire = new Konva.Circle({
                        x: 200,
                        y: 250,
                        radius: 40,
                        fill: 'black'
                    });
                    var road = new Konva.Rect({
                        x: 0,
                        y: 300,
                        width: 400,
                        height: 10,
                        fill: 'green',
                    });
                    var car = new Konva.Rect({
                        x: 100,
                        y: 130,
                        width: 200,
                        height: 50,
                        fill: 'blue',
                    });

                    // layer.add(road);
                    layer.add(car);

                    // add the triangle shape to the layer
                    layer.add(tire);

                    // add the layer to the stage
                    stage.add(layer);

                    var carY = 130;
                    var m = 0;
                    var anim = new Konva.Animation(function (frame) {
                        car.y(
                            carY - ((parseFloat(x1[m]).toFixed(20)) * 1000)
                        );
                        tire.y(
                            carY - ((parseFloat(x1[i]).toFixed(20)) * 1000) - (parseFloat(x3[m]).toFixed(20)) * 10000 + 120
                        );
                        m++;
                        if (m > 480) {
                            anim.stop();
                        }
                    }, layer);

                    anim.start();}
                        );
                        
                        

                    });               


                   
               </script>
       </x-app-layout>
