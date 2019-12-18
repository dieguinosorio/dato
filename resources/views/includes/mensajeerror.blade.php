@if(isset($errors) && $errors->any())
<div id='mensaje-error' class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

