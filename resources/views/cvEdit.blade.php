
<form class="AjaxForm" method="Post" action="{{route('cv.update',['cv'=>$cv])}}">
    @method('PUT')
    @include('cvForm',['cv'=>$cv])


</form>
