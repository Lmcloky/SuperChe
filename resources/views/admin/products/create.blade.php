@extends('layouts.app')

@section('title', 'Agrega un producto')

@section('body-class','product-page') 
 
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg5.jpeg') }}');">
</div>

<div class="main main-raised">
<div class="container">

    <div class="section">
        <h2 class="title text-center">Registrar nuevo producto</h2>

        
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

        <form method="post" action="{{ url('/admin/products')}} ">
            {{csrf_field()}}
            
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
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
                    <label class="control-label">Seleccionar categoría del producto</label>
                    <select class="form-control" name="category_id">
                        
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Precio</label>
                    <input type="number" class="form-control" name="price" step="any" value=" {{ old('price') }} ">
                </div>
            </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-5">
                
            </div>
            <button class="btn btn-primary">Registrar producto</button>
            <a href="{{ url('/admin/products') }} " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

@include('includes.footer')
@endsection
