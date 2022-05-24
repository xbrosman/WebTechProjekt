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

               <div>

                   <form action="/octave/car?api_key={{ Config::get('app.api_key') }}" method="POST">
                       @csrf
                       <label for=query> Zadajte skok </label>
                    <input type="text" class="form-control" id="query" name="query" rows="7">@if (isset($query)){{ $query }}@endif</input>

                       <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>

                   </form>
                  
               </div>
               <div class="btn-group btn-lg btn-block">
                    <a href="/main" class="btn btn-primary">{{__('Login')}}</a>
                </div>
               <x-slot name="footer">
                 
               </x-slot>
       </x-app-layout>
