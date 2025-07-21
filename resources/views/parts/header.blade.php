<nav>
    <ul>
        @foreach($navigation as  $nav => $link )
        <li><a href="{{$link}}">{{$nav}}</a></li>
       @endforeach
    </ul>
</nav>