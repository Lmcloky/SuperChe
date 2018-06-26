@extends('layouts.app')

@section('title', 'Lista de categorias')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('images/logonegro.png') }}');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Listado de Categorias</h2>

        <div class="team">
            <div class="row">
                <a href="{{url('/admin/categories/create')}} " class="btn btn-primary btn-round">Nueva Categoria</a>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th class="text-center">#</th> -->
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-4 text-center">Descripcion</th>
                            <th class="col-md-2 text-center">Departamento</th>
                            <th class="col-md-2 text-center">Imagen</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <!-- <td class="text-center">{{$category->id}}</td> -->
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->department_name }}</td>
                            <td>
                                <img src="{{$category->featured_image_url }} " height="59">
                            </td>
                            <td class="td-actions text-right">
                                <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="" type="button" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                    </a>
                                    <a href="{{ url('/admin/categories/'.$category->id.'/edit') }} " type="button" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
<!--                                     <button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>     -->                                
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>

    </div>

</div>

</div>

@include('includes.footer')
@endsection
