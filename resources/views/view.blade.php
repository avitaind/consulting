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
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Location</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Exprience (No. of Years)</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Bio</th>

                    </tr>
                </thead>
                <tbody>
                @foreach( $resume as $resume )
                    <tr class="table-active">
                    <td>{{ $resume->id }}</td>
                    <td>{{ $resume->contact }}</td>
                    <td>{{ $resume->dob }}</td>
                    <td>{{ $resume->gender }}</td>
                    <td>{{ $resume->location }}</td>
                    <td>{{ $resume->qualification }}</td>
                    <td>{{ $resume->bio }}</td>
                   </tr>
             
                @endforeach
                </tbody>
            </thead>
         </table>

    </div> 
  </div> 
 </div> 
 @endsection
