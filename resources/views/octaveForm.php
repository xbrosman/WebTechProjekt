       
<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
        <br>
    </x-slot>
    <form action="/octave" method="POST">
            @csrf
            <textarea class="form-control" id="input" name="query" rows="7"></textarea>
           
            <button type="submit"  class="btn btn-primary btn-lg btn-block">{{__('Send')}}</button>
         
    </form>
    
    <textarea class="form-control" type="text" id="output" name="output" readonly rows="7">
            @if ($response != null)
                {{ $response }}
            @endif
        </textarea>
    <x-slot name="footer">
        <div class="text-center p-3">
                © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský

        </div>
    </x-slot>
</x-app-layout>


<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Graph</title>

       
    </head>
    <body class="p-3 mb-2 bg-dark text-white">
           <h1>Octave output</h1>
            

           <form action="/octave" method="POST">
            @csrf
            <input type="text" name="query">
            <input type="submit">

        </form>
        <br>
        <textarea name="" id="" cols="30" rows="10">
            @if ($response != null)
                {{ $response }}
            @endif
        </textarea>

        <a href="/createCSV"></a>
    </body>
</html> -->
