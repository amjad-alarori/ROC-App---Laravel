<form class="AjaxForm" method="Post" action="{{route('stageBedrijven.update',['stageBedrijven'=>$stageBedrijven])}}">
                @method('PUT')
                @include('stageBedrijvenForm',['bedrijf'=>$stageBedrijven])
            </form>

