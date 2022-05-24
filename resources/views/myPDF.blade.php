<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <h1 class="text-center">{{ $title }}</h1>
    <p>{{ $date }}</p>
    <h2>{{ __('Endpoints') }}</h2>
    <Strong>GET  /generate-pdf</Strong>
    <p>{{ __('The endpoint used to export the description to PDF') }}</p>
    
    <Strong>GET  /language/{locale}</Strong>
    <p>{{ __('The endpoint used to change the language in which the page is displayed') }}</p>
  
    <Strong>GET  /</Strong>
    <p>{{ __('The endpoint used to return to the application login home page') }}</p>
    
    <Strong>GET  /info</Strong>
    <p>{{ __('An endpoint used to display information about the division of labor on a project and completed tasks') }}</p>
    
    <Strong>POST  /octave</Strong>
    <p>{{ __('End point used to display results from the CLI octave') }}</p>
  
    <Strong>GET  /octave</Strong>
    <p>{{ __('End point used to load the form for sending data to the CLI octave') }}</p>
    
    <Strong>GET  /main</Strong>
    <p>{{ __("An endpoint used to display the application's home screen") }}</p>
    
    <Strong>POST  /main/checkLogin</Strong>
    <p>{{ __('An endpoint used to send a request to verify user access to the application') }}</p>
   
    <Strong>GET  /main/successLogin</Strong>
    <p>{{ __('End point used to display the application interface for sending requests to the CLI octave') }}</p>
    
    <Strong>GET  /main/logout</Strong>
    <p>{{ __('The endpoint used to log the user out of the application') }}</p>
    
    <Strong>GET  /registration</Strong>
    <p>{{ __('The end point used to redirect to the registration form for the new user') }}</p>
    
    <Strong>POST  /registration</Strong>
    <p>{{ __('
An endpoint used to authenticate and enroll a new user in the database') }}</p>
    <br>
    <div class="text-center p-3">
     © 2022 Copyright: Andrašovic, Baranec, Brosman, Teplanský
</div>
</body>

</html>