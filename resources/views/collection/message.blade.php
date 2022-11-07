{{--сообщение об успешном выполнении из сессии--}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

{{--сообщение об ошибке из сессии--}}
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

