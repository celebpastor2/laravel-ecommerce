@extends("auth-base")
@section("content")
<div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <label for="username">Enter your username:</label>
            <input type="text" id="username" name="username" />
        </div>
         <div>
            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password" />
        </div>
         <div>
            <button type="submit" id="loginBtn" class="btn login-btn">Login</button>
        </div>
    </form>
</div>
@endsection