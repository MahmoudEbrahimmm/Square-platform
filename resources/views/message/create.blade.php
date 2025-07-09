{{-- @extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center">{{__('language.CREATEE MESSAGE')}}</h3>
            <form action={{route('message.store')}} method="post" enctype="multipart/form-data">
            @csrf
            <label>{{__('language.ID')}}</label>
            <input type="text" name="id" class="form-control mb-2">
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.NAMEEN')}}</label>
            <input type="text" name="name_en" class="form-control mb-2">
            @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.NAMEAR')}}</label>
            <input type="text" name="name_ar" class="form-control mb-2">
            @error('name_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.EMAIL')}}</label>
            <input type="text" name="email" class="form-control mb-2">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.MESSAGEEN')}}</label>
            <input type="text" name="message_en" class="form-control mb-2">
            @error('message_en')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.MESSAGEAR')}}</label>
            <input type="text" name="message_ar" class="form-control mb-2">
            @error('message_ar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="submit" value="{{__('language.CREATEE MESSAGE')}}" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
 </div>
    
@endsection --}}