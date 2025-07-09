@include('temp.navbar')
@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{__('language.USERS')}}
                    <a class="btn btn-success ml-2" href={{route('users.create')}}>{{__('language.CREATEE USER')}}</a>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <h4 class="alert alert-success text-center">{{session('message')}}</h4>
                    @endif
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.NAME')}}</td>
                                <td>{{__('language.EMAIL')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href={{route('users.show',$item->id)}} class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href={{route('users.edit',$item->id)}} class="btn btn-success">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href={{route('users.delete',$item->id)}} class="btn btn-danger">
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