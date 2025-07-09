@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <h3 class="text-center">{{__('language.EDIT USER')}}</h3>
            <form action={{route('users.save')}} method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_id" value={{$result->id}}>
            <label>{{__('language.ID')}}</label>
            <input type="text" name="id" class="form-control mb-2" value={{$result->id}}>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.NAME')}}</label>
            <input type="text" name="name" class="form-control mb-2" value={{$result->name}}>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.EMAIL')}}</label>
            <input type="text" name="email" class="form-control mb-2" value={{$result->email}}>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.PASSWORD')}}</label>
            <input type="text" name="password" class="form-control mb-2" value={{$result->password}}>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.UNIVIRCITY')}}</label>
            <input type="text" name="univircity" class="form-control mb-2" value={{$result->univircity}}>
            @error('univircity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label>{{__('language.AGE')}}</label>
            <input type="text" name="age" class="form-control mb-2" value={{$result->age}}>
            @error('age')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.CITY')}}</label>
            <input type="text" name="city" class="form-control mb-2" value={{$result->city}}>
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.PHONE')}}</label>
            <input type="text" name="phone" class="form-control mb-2" value={{$result->phone}}>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.ROLE')}}</label>
            <input type="text" name="role" class="form-control mb-2" value={{$result->role}}>
            @error('role')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>{{__('language.STATUS')}}</label>
            <input type="text" name="status" class="form-control mb-2" value={{$result->status}}>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="submit" value="{{__('language.SAVE EDIT')}}" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
 </div>
    
@endsection