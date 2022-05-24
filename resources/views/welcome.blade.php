<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
        <br>
    </x-slot>
    <div class="container">
    <h3 class="font-semibold text-xl text-gray-800 leading-tight font-weight-bold">
    {{ __("Final assignment for the WEBTE2  used to calculate and simulate the tire suspension of a motor vehicle") }}
    </h3>
    </div>
    
   <div class="container margin=auto">
   <button type="submit"  class=" text-white btn  btn-lg btn-block"><a href="{{ url('/main/logout') }}">{{ __('Login') }}</a></button>
   </div>
    <x-slot name="footer">
        <div class="text-center p-3">
                © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský

        </div>
    </x-slot>
</x-app-layout>
