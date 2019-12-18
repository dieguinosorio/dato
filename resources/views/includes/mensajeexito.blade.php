@if(session()->has('success'))
<div id='mensaje-error' class="alert alert-success">
    <ul>
        @foreach(session()->get('success') as $message)
           <li>{{$message}}</li>
        @endforeach
    </ul>
</div>
@endif

