@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center">{{__('language.EDIT COURSE')}}</h3>
            <form action={{route('courses.save')}} method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_id" value={{$result->id}}>

            <label>
                {{__('language.IMAGE')}}
            </label>
            <input type="file" name="cate_image" class="form-control mb-2">
            @error('cate_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.ID')}}</label>
            <input type="text" name="id" class="form-control mb-2" value={{$result->id}}>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.TITLEEN')}}</label>
            <input type="text" name="title_en" class="form-control mb-2" value={{$result->title_en}}>
            @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.TITLEAR')}}</label>
            <input type="text" name="title_ar" class="form-control mb-2" value="{{$result->title_ar}}">
            @error('title_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.DESCEN')}}</label>
            <input type="text" name="description_en" class="form-control mb-2" value={{$result->description_en}}>
            @error('description_en')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.DESCAR')}}</label>
            <input type="text" name="description_ar" class="form-control mb-2" value="{{$result->description_ar}}">
            @error('description_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.PRICE')}}</label>
            <input type="text" name="price" class="form-control mb-2" value={{$result->price}}>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.PARENT')}}</label>
            <input type="text" name="parent_id" class="form-control mb-2" value={{$result->parent_id}}>
            @error('parent_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="submit" value="{{__('language.SAVE EDIT')}}" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
 </div>
    
@endsection