@if(!Illuminate\Support\Facades\Auth::check())
    <a href="#">Login</a>
@else
    Hello
@endif
