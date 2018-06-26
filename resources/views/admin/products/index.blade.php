@extends('layouts.app')

@section('title', 'Lista de productos')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg5.jpeg') }}');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>

        <div class="team">
            <div class="row">
                <a href="{{url('/admin/products/create')}} " class="btn btn-primary btn-round">nuevo Producto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="col-md-2 text-left">Nombre</th>
                            <th class="col-md-5 text-left">Descripcion</th>
                            <th>Categoria</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category_name }}</td>
                            <td class="text-right">&euro; {{$product->price}}</td>
                            <td class="td-actions text-right">
                                <form method="post" action="{{ url('/admin/products/'.$product->id.'/delete') }}">
                                    {{ csrf_field() }}
                                    <a href="{{ url('/products/'.$product->id) }} " type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                    <i class="fa fa-info"></i>
                                    </a>
                                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }} " type="button" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" type="button" rel="tooltip" title="Imágenes del producto" class="btn btn-warning  btn-simple btn-xs">
                                    <i class="fa fa-image"></i>
                                    </a>
                                    <button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>                                    
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>

    </div>

</div>

</div>

@include('includes.footer')
@endsection
