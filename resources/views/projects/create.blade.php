@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center">{{__('language.INSERTT PROJECT')}}</h3>
            <form action={{route('pro.store')}} method="post" enctype="multipart/form-data">
            @csrf
            <label>
                {{__('language.IMAGE')}}
            </label>
            <input type="file" name="cate_image" class="form-control mb-2">
            @error('cate_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.ID')}}</label>
            <input type="text" name="id" class="form-control mb-2">
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.TITLEEN')}}</label>
            <input type="text" name="title_en" class="form-control mb-2">
            @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.TITLEAR')}}</label>
            <input type="text" name="title_ar" class="form-control mb-2">
            @error('title_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.DESCEN')}}</label>
            <input type="text" name="description_en" class="form-control mb-2">
            @error('description_en')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.DESCAR')}}</label>
            <input type="text" name="description_ar" class="form-control mb-2">
            @error('description_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.LINK')}}</label>
            <input type="text" name="link" class="form-control mb-2">
            @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="submit" value="{{__('language.INSERT PROJECT')}}" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
 </div>
    
@endsection