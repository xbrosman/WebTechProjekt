<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration') }}
        </h2>
        <br>
    </x-slot>

    @if (isset($success))
        <div class="alert alert-success alert-block">
            <strong>{{ $success }}</strong>
        </div>
    @endif

    <div class="pt-4">


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/registration') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>{{ __('Enter Name') }}</label>
                <input type="text" name="name" class="form-control" />
            </div>

            <div class="form-group">
                <label>{{ __('Enter Email') }}</label>
                <input type="email" name="email" class="form-control" />
            </div>

            <div class="form-group">
                <label>{{ __('Enter Password') }}</label>
                <input type="password" name="password" class="form-control" />
            </div>

            <div class="form-group">
                <div class="btn-group btn-lg btn-block">
                    <input type="submit" name="login" class="btn btn-primary" value="{{ __('Register') }}" />
                    <a href="/main" class="btn btn-primary">{{__('Login')}}</a>
                </div>
            </div>
        </form>
    </div>

    <x-slot name="footer">
       
    </x-slot>
</x-app-layout>
