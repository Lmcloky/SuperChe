@extends('layouts.app')

@section('title', 'Editar categoria')

@section('body-class','product-page')

@section('content') 
<div class="header header-filter" style="background-image: url('{{ asset('images/logonegro.png') }}');">
</div>

<div class="main main-raised">
<div class="container">

    <div class="section">
        <h2 class="title text-center">Editar categoria seleccionada</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Descripción</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description', $category->description) }}">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Seleccionar departamento de la categoria</label>
                    <select class="form-control" name="department_id">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if($department->id == old('department_id', $category->department_id)) selected @endif>
                            {{ $department->name }} 
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                    <label class="control-label">Selecciona una imagen para la categoria</label>
                    <input type="file"name="image">
                    @if ($category->image)
                    <p class="help-block">
                        Subir sólo si se desea reemplazar <a href="{{ asset('/images/categories/'.$category->image) }} " target="_blank"> la imagen actual</a>
                    </p>
                    @endif
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-6">
                
            </div>
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{ url('/admin/categories') }} " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

@include('includes.footer')
@endsection
