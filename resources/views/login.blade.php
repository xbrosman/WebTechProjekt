<x-app-layout>
    <x-slot name="header">
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
        <br>
    </x-slot>
    @if(isset(Auth::user()->email))
    <script>window.location = "/main/successLogin";</script>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ url('/main/checkLogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
        <label>{{__('Enter Email')}}</label>
        <input type="email" name="email" class="form-control" />
        </div>

        <div class="form-group">
            <label>{{__('Enter Password')}}</label>
            <input type="password" name="password" class="form-control" />
        </div>

        <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="{{__('Login')}}" />
        </div>
    </form>

    </form>

    <x-slot name="footer">
        <div class="text-center p-3">
            © 2022 Copyright: Andrašovič, Baranec, Brosman, Teplanský
        </div>
    </x-slot>
</x-app-layout>