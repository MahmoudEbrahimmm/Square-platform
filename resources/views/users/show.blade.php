@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
                <h3 class="text-center mb-3">{{__('language.DETAILSUSER')}}</h3>
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.NAME')}}</td>
                                <td>{{__('language.EMAIL')}}</td>
                                <td>{{__('language.PASSWORD')}}</td>
                                <td>{{__('language.UNIVIRCITY')}}</td>
                                <td>{{__('language.AGE')}}</td>
                                <td>{{__('language.CITY')}}</td>
                                <td>{{__('language.PHONE')}}</td>
                                <td>{{__('language.ROLE')}}</td>
                                <td>{{__('language.STATUS')}}</td>
                                <td>{{__('language.CREATED')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$result->id}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{$result->email}}</td>
                                <td>{{$result->password}}</td>
                                <td>{{$result->univircity}}</td>
                                <td>{{$result->age}}</td>
                                <td>{{$result->city}}</td>
                                <td>{{$result->phone}}</td>
                                <td>{{$result->role}}</td>
                                <td>{{$result->status}}</td>
                                <td>{{$result->created_at}}</td>
                                <td>
                                    <a href={{route('users')}} class="btn btn-outline-primary">
                                        <i class="fa-solid fa-house"></i>

                                    </a>
                                </td>
                            </tr>
                        </tbody>

@endsection