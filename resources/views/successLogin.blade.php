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

                   <form action="/octave?api_key={{ Config::get('app.api_key') }}" method="POST">
                       @csrf
                       <textarea class="form-control" id="query" name="query" rows="7">@if (isset($query)){{ $query }}@endif</textarea>

                       <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>

                   </form>

                   <textarea class="form-control" type="text" id="output" name="output" readonly rows="7"> @if (isset($response))@foreach ($response as $value){{ $value }}@endforeach @endif</textarea>
                  
               </div>
               <div class="btn-group btn-lg btn-block">
                    <a href="/csv" class="btn btn-success">{{__('CSV logs download')}}</a>
                    <a href="/csv/mail" class="btn btn-success">{{__('CSV logs send via email')}}</a>
                </div>
               <x-slot name="footer">
                 
               </x-slot>
       </x-app-layout>
