
            <form class="AjaxForm" method="Post" action="{{route('stage.update',['stageBedrijven'=>$stageBedrijven, 'stage'=>$stage])}}">
                @method('PUT')
                @include('stageForm',['company'=>$stageBedrijven,'sectors'=>$sectors, 'stage'=>$stage])


       </form>

