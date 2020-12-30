
<form class="AjaxForm" method="Post" action="{{route('stage.store',['stageBedrijven'=>$stageBedrijven])}}">

                @include('stageForm',['stageBedrijven'=>$stageBedrijven, 'stage'=>null])


       </form>

