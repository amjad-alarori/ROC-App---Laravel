
<form class="AjaxForm" method="Post" action="{{route('stage.update',['stageBedrijven'=>$stageBedrijven, 'stage'=>$stage])}}">
                @method('PUT')
                @include('stageForm',['company'=>$stageBedrijven])

            </form>

