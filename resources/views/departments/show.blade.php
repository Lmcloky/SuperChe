@extends('layouts.app')

@section('title', 'SuperChe | Dashboard')

@section('body-class','profile-page') 

@section('styles')
    <style>
        .profile {
            margin-left: 390px;
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
                            <img src=" {{ $department->featured_image_url }} " alt="Circle Image" class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">Categoria: {{ $department->name }} </h3>
                        </div>
                        
                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}        
                            </div>
                        @endif    

                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$department->description}}</p>
                </div>
                
                <div class="team text-center">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ $category->featured_image_url }} " alt="{{ $category->name }}" class="img-raised img-rounded">
                                <h4 class="title"> <a href="{{ url('/categories/'.$category->id)}} ">{{$category->name}} </a><br />
                                </h4>
                                <p class="description">{{ $category->description }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Modal Core -->

@include('includes.footer')
@endsection