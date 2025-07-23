@extends("auth-base")
@section("content")
<div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <label for="username">Enter your username:</label>
            <input type="text" id="username" name="username" />
            <p>
                @error('username')
                    <span class="error bg">{{$message}}</span>
                @enderror
            </p>
        </div>
         <div>
            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password" />
              <p>
                @error('password')
                    <span class="error bg">{{$message}}</span>
                @enderror
            </p>
        </div>
         <div>
            <button type="submit" id="loginBtn" class="btn login-btn">Login</button>
        </div>
    </form>

    <ul class="errors">
    @foreach( $errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    
</div>
@endsection