@if(!Illuminate\Support\Facades\Auth::check())
    <a href="{{ route("login")  }}">Login</a>
@else
    <div class="row">
        <div class="col">
            <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->getEmail()) }}?s=128&d=mm&r=g" class="w-15 h-15 rounded-full" alt="profile">
        </div>
        <div class="col">
            <span class="font-bold">{{ auth()->user()->getName() }}</span>
        </div>
    </div>
@endif
