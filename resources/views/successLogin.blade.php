       <x-app-layout>
           <x-slot name="header">
               <br>
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                   {{ __('Welcome') }}
               </h2>
               <br>
           </x-slot>
           <div class="container box">

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

               <div>

                   <form action="/octave?api_key={{ Config::get('app.api_key') }}" method="POST">
                       @csrf
                       <textarea class="form-control" id="query" name="query" rows="7">@if (isset($query)){{ $query }}@endif</textarea>

                       <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>

                   </form>

                   <textarea class="form-control" type="text" id="output" name="output" readonly rows="7"> @if (isset($response))@foreach ($response as $value){{ $value }}@endforeach @endif</textarea>

               </div>

               <x-slot name="footer">
                   <div class="text-center p-3">
                       © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský
                   </div>
               </x-slot>
       </x-app-layout>
