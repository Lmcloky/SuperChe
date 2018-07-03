@extends('layouts.app')

@section('title', 'SuperChe | Dashboard')

@section('body-class','profile-page') 

@section('styles')
    <style>
        .profile {
            margin-left: 360px;
        }
        .team {
            padding-bottom: 50px;
        }
        .team .row. .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row > [class*='col-']{
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection

@section('content')

    <div class="header header-filter" style="background-image: url('/images/logonegro3.png');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile text-center">
                        <div class="avatar">
                            <img src=" {{ $category->featured_image_url }} " alt="{{ $category->name }} " class="img-circle img-responsive img-raised">
                        </div>
                        <div class="namer">
                            <h3 class="title">Productos de la categoría: {{ $category->name }} </h3>
                        </div>
<!--                         @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}        
                            </div>
                        @endif     -->
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$category->description}}</p>
                </div>
                
                <div class="team text-center">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ $product->featured_image_url }} " alt="Thumbnail Image" class="img-raised img-rounded">
                                <h4 class="title"> <a href="{{ url('/products/'.$product->id)}} ">{{$product->name}} </a><br />
                                    <small class="text-muted">{{ $product->category_name }} 
                                    <br>Precio del producto: ${{ $product->price }}
                                    
                                    </small>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@include('includes.footer')
@endsection