@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
                <h3 class="text-center mb-3">
                    <td>
                        <img class="mb-3" style="width: 150px" src={{asset("img/img_teams/".$result->cate_image)}}>
                    </td>
                    <br>
                    {{__('language.DETAILS TEAM')}}</h3>
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.TITLEEN')}}</td>
                                <td>{{__('language.TITLEAR')}}</td>
                                <td>{{__('language.EMAIL')}}</td>
                                <td>{{__('language.ABOUTEN')}}</td>
                                <td>{{__('language.ABOUTAR')}}</td>
                                <td>{{__('language.CREATED')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$result->id}}</td>
                                <td>{{$result->name_en}}</td>
                                <td>{{$result->name_ar}}</td>
                                <td>{{$result->email}}</td>
                                <td>{{$result->about_en}}</td>
                                <td>{{$result->about_ar}}</td>
                                <td>{{$result->created_at}}</td>
                                <td>
                                    <a href={{route('teams')}} class="btn btn-secondary">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>

@endsection