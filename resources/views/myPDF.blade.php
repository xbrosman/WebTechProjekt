<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <h1 class="text-center">{{ $title }}</h1>
    <p>{{ $date }}</p>
    <h2>{{ __('Endpoints') }}</h2>
    <Strong>/generate-pdf</Strong>
    <p>{{ __('The endpoint used to export the description to PDF') }}</p>
    <br>
    <Strong>/language/{locale}</Strong>
    <p>{{ __('The endpoint used to change the language in which the page is displayed') }}</p>
    <br>
    <Strong>/</Strong>
    <p>{{ __('The endpoint used to return to the application login home page') }}</p>
    <br>
</body>
</html>