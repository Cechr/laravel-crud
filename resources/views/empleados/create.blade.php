<form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data" class="form-horizontal">

    {{ csrf_field() }}
    
    @include('empleados.form', ['Modo'=>'crear'])
    
</form>