@if(Auth::user()->image)
<!--<img src="{{url('user/avatar/'.Auth::user()->image)}}"/> De esta manera se puede imprimir img tambien-->
<div class="container-avatar">
    <img src="{{action("HomeController@getImageCompany",Auth::user()->image)}}"/>
</div>
@endif

