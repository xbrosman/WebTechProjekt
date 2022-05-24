<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Technical data') }}
        </h2>
        <br>
    </x-slot>
    <div class="container">
        <h1> {{ __('Technical data') }}</h1>
        <div class="container">
            <p>{{ __('All specification is inside docker file and in Readme.md on our github project') }}</p>
        </div>
        <h1> {{ __('Work deal') }}</h1>
        <div class="container">
            <ul class="list-group text-dark">
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Dual language') }}</strong>: Dávid Baranec, Filip Brosman</li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('API to CAS secured by API KEY') }}</strong>: Filip Brosman, Dávid Baranec, Andrej Andrašovič</li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Animation') }}</strong>: Andrej Andrašovič <strong>{{ __('Not completed') }}</strong> </li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Graph synchronized with animation') }}</strong>: Andrej Andrašovič, Alex Teplanský <strong>{{ __('Not completed') }}</strong></li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Check API form') }}</strong>:  Dávid Baranec,Filip Brosman</li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Logs exported to CSV + sending mail') }}</strong>:Alex Teplanský </li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('API description export to PDF') }}</strong>: Dávid Baranec </li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Synchronization access of multiple users') }}</strong>: {{ __('All members') }} <strong>{{ __('Not completed') }}</strong></li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Docker wrapper') }}</strong>: Filip Brosman, Andrej Andrašovič </li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Using github') }}</strong>: {{ __('All members') }} </li>
                <li class="list-group-item list-group-item-dark"><strong>{{ __('Finalization') }}</strong>: {{ __('All members') }}</strong></li>
                
            </ul>
        </div>
        <br>
    </div>

    <x-slot name="footer">
      
    </x-slot>
</x-app-layout>
