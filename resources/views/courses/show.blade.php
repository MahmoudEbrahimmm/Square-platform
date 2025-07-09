@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-10 m-auto">
                <h3 class="text-center mb-3">
                    <td>
                        <img class="mb-3" style="width: 150px" src={{asset("img/img_courses/".$result->cate_image)}}>
                    </td>
                    <br>
                    {{__('language.DETAILSCOURS')}}</h3>
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <td>{{__('language.ID')}}</td>
                                <td>{{__('language.TITLEEN')}}</td>
                                <td>{{__('language.TITLEAR')}}</td>
                                <td>{{__('language.DESCEN')}}</td>
                                <td>{{__('language.DESCAR')}}</td>
                                <td>{{__('language.PRICE')}}</td>
                                <td>{{__('language.PARENT')}}</td>
                                <td>{{__('language.CREATED')}}</td>
                                <td>{{__('language.OPERATION')}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$result->id}}</td>
                                <td>{{$result->title_en}}</td>
                                <td>{{$result->title_ar}}</td>
                                <td>{{$result->description_en}}</td>
                                <td>{{$result->description_ar}}</td>
                                <td>{{$result->price}}</td>
                                <td>{{$result->parent_id}}</td>
                                <td>{{$result->created_at}}</td>
                                <td>
                                    <a href={{route('courses')}} class="btn btn-secondary">
                                        <i class="fa-solid fa-house"></i>

                                    </a>
                                </td>
                            </tr>
                        </tbody>

@endsection