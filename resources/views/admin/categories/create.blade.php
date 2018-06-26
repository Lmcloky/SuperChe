@extends('layouts.app')

@section('title', 'Agrega una categoria')

@section('body-class','product-page') 
 
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('images/logonegro.png') }}');">
</div>

<div class="main main-raised">
<div class="container">

    <div class="section">
        <h2 class="title text-center">Registrar nueva categoria</h2>

        
       <!--  Mostrar los mensajes de error
 -->
         
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ url('/admin/categories')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" value=" {{ old('name')}} ">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Descripción</label>
                    <input type="text" class="form-control" name="description" value=" {{ old('description')}} ">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Selecciona el departamento de la categoría</label>
                    <select class="form-control" name="department_id">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                    <label class="control-label">Selecciona una imagen para la categoria</label>
                    <input type="file"name="image">
            </div>
             <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-6">
                
            </div>
            <button class="btn btn-primary">Registrar categoría</button>
            <a href="{{ url('/admin/categories') }} " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

@include('includes.footer')
@endsection
