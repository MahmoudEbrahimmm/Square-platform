@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
                <h3 class="text-center mb-3">{{__('language.DETAILSMESSAGE')}}</h3>
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.NAME')}}</td>
                                <td>{{__('language.EMAIL')}}</td>
                                <td>{{__('language.MESSAGE')}}</td>
                                <td>{{__('language.CREATED')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$result->id}}</td>
                                <td>{{$result->name}}</td>
                              
                                <td>{{$result->email}}</td>
                                <td>{{$result->message}}</td>
                               
                                <td>{{$result->created_at}}</td>
                                <td>
                                    <a href={{route('message')}} class="btn btn-secondary">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>

@endsection