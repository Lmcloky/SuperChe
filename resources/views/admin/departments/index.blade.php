@extends('layouts.app')

@section('title', 'Lista de departamentos')
 
@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('images/logonegro.png') }}');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Listado de Departamentos</h2>

        <div class="team">
            <div class="row">
                <a href="{{url('/admin/departments/create')}} " class="btn btn-primary btn-round">Nuevo Departamento</a>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th class="text-center">#</th> -->
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-5 text-center">Descripcion</th>
                            <th class="col-md-2 text-center">Imagen</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                        <tr>
                            <!-- <td class="text-center">{{$department->id}}</td> -->
                            <td>{{$department->name}}</td>
                            <td>{{$department->description}}</td>
                            <td>
                                <img src="{{$department->featured_image_url }} " height="59">
                            </td>
                            <td class="td-actions text-right">
                                <form method="post" action="{{ url('/admin/departments/'.$department->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="" type="button" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                    </a>
                                    <a href="{{ url('/admin/departments/'.$department->id.'/edit') }} " type="button" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
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
                {{ $departments->links() }}
            </div>
        </div>

    </div>

</div>

</div>

@include('includes.footer')
@endsection
