@include('temp.navbar')
@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    {{__('language.TEAM')}}
                    <a class="btn btn-success ml-2" href={{route('teams.create')}}>{{__('language.INSERTT HUMAN')}}</a>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <h4 class="alert alert-success text-center">{{session('message')}}</h4>
                    @endif  
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.IMAGE')}}</td>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.NAME')}}</td>
                                <td>{{__('language.ABOUT')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                            <tr>
                                <td>
                                    <img style="width: 60px" src={{asset("img/img_teams/".$item->cate_image)}}>
                                </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->about}}</td>
                                <td>
                                    <a href={{route('teams.show',$item->id)}} class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href={{route('teams.edit',$item->id)}} class="btn btn-success">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href={{route('teams.delete',$item->id)}} class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>  
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection