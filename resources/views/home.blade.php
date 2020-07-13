@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Fill The Details Below</h1>
   
   @if(Session::has('success'))
   <div class="alert alert-success">
       {{ Session::get('success') }}
       @php
           Session::forget('success');
       @endphp
   </div>
   @endif

   <form method="POST" action="{{ url('user/create') }}">

       {{ csrf_field() }}

       <div class="form-group">
           <strong>Location:</strong>
           <input type="text" name="location" class="form-control" placeholder="location">
           @if ($errors->has('location'))
               <span class="text-danger">{{ $errors->first('location') }}</span>
           @endif
       </div>

       <div class="form-group">
           <strong>Qualification:</strong>
           <input type="text" name="qualification" class="form-control" placeholder="Qualification">
           @if ($errors->has('qualification'))
               <span class="text-danger">{{ $errors->first('qualification') }}</span>
           @endif
       </div>

       <div class="row">

       <div class="form-group col-md-6">
           <strong>Gender:</strong>
           <select name="gender" class="form-control" id="gender" >
           <option value="">--- Select ---</option>
           <option value="male">Male</option>
           <option value="female">Female</option>
           <option value="other">Rather Not Say</option>
           </select>

           @if ($errors->has('gender'))
               <span class="text-danger">{{ $errors->first('gender') }}</span>
           @endif
       </div>

     <div class="form-group col-md-6">

        <strong>Date of Birth:</strong>
        <input class="date form-control"  type="date" id="datepicker" name="date">
        @if ($errors->has('dob'))
            <span class="text-danger">{{ $errors->first('dob') }}</span>
        @endif
    </div>

      </div>


      <div class="row">
      
      <div class="form-group col-md-6">

        <strong>Total Exprience:</strong>
        <input type="text" name="exprience" class="form-control" placeholder="No. of Year">
        @if ($errors->has('exprience'))
            <span class="text-danger">{{ $errors->first('exprience') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        <strong>Contact:</strong>
        <input type="text" name="contact" class="form-control" placeholder="Mobile No.">
        @if ($errors->has('contact'))
            <span class="text-danger">{{ $errors->first('contact') }}</span>
        @endif
    </div>
     
   </div>
      <div class="form-group">
           <strong>Bio:</strong>
           <textarea name="bio" class="form-control" placeholder="Please Describe Yourself">
           @if ($errors->has('bio'))
               <span class="text-danger">{{ $errors->first('bio') }}</span>
           @endif
           </textarea>
       </div>

       <div class="form-group">
           <strong>Resume:</strong>
           <input type="file" name="resume" class="form-control" placeholder="Upload Your Resume">
           @if ($errors->has('qualification'))
               <span class="text-danger">{{ $errors->first('resume') }}</span>
           @endif
       </div>

       <div class="form-group">
           <button class="btn btn-success btn-submit">Submit</button>
       </div>
   </form>


        </div>
    </div>
    
</div>

@endsection
