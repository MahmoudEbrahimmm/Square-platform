@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center">
                {{__('language.CREATEE TEAM')}}
            </h3>
            <form action={{route('teams.store')}} method="post" enctype="multipart/form-data">
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
            <input type="text" name="name_en" class="form-control mb-2">
            @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.TITLEAR')}}</label>
            <input type="text" name="name_ar" class="form-control mb-2">
            @error('name_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.EMAIL')}}</label>
            <input type="text" name="email" class="form-control mb-2">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.PASSWORD')}}</label>
            <input type="text" name="password" class="form-control mb-2">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.ABOUTEN')}}</label>
            <input type="text" name="about_en" class="form-control mb-2">
            @error('about_en')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.ABOUTAR')}}</label>
            <input type="text" name="about_ar" class="form-control mb-2">
            @error('about_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="submit" value="{{__('language.INSERTT HUMAN')}}" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
 </div>
    
@endsection