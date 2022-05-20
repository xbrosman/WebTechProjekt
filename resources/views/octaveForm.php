<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Graph</title>

        
    </head>
    <body class="antialiased">
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
</html>
