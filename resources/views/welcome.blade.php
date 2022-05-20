<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
        <br>
    </x-slot>
    <div class="container">
    {{ __("You're logged in!") }}
    </div>
    <x-slot name="footer">
        <div class="text-center p-3">
                © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský

        </div>
    </x-slot>
</x-app-layout>
