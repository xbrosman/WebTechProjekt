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
    <div class="container border border-primary rounded-bottom rounded-top padding-bottom">
    <p class="lead  text-center">
    {{ __("Enter API_KEY") }}
    </p>
    <form action="/octave" method="POST">
            @csrf
            <textarea class="form-control" id="input" name="query" rows="1" ></textarea>
           
            <button type="submit"  class="btn btn-primary btn-lg btn-block">{{__('Send')}}</button>
         
    </form>
    </div>
   
    <x-slot name="footer">
        <div class="text-center p-3">
                © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský

        </div>
    </x-slot>
</x-app-layout>
