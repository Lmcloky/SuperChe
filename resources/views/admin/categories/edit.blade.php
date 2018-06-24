@extends('layouts.app')

@section('title', 'Editar categoria')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg5.jpeg') }}');">
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

        <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
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
            </div><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-7">
                
            </div>
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{ url('/admin/categories') }} " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

@include('includes.footer')
@endsection
