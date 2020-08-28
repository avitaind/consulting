@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
                <tbody>
                @foreach( $resumes as $resume )
                    <tr class="table-active">
                    <td>{{ $resume->user_id }}</td>
                    <td>{{ $resume->name }}</td>
                    <td>{{ $resume->email }}</td>
                    <td>{{ $resume->contact }}</td>
                    <td>{{ $resume->location }}</td>
                    <td>
                    
                    <div class="col-md-10 col-md-offset-4">
                          <a href="{{ route('resume.view', $resume->id ) }}" class="btn btn-primary">View</a>
                    </div>
                    
                    </td>
                   </tr>
             
                @endforeach
                </tbody>
            </thead>
         </table>

    </div> 
  </div> 
 </div> 
 @endsection
