@extends('layouts.app')
@section('title') Update Collection @endsection


@section('content')
<div class="updatecollectbanner d-flex justify-content-between mx-2">
<h2>Current Collection Information: #{{$collection[0]['collection_id']}}</h2>
</div>
<p><b>Curorated by: </b>{{$collection[0]['curator']}}</p>
<div class="current-collect d-flex align-items-center">
    <div class="collect-title">
        <h3>{{$collection[0]['collection']}}</h3>
        <p>{{$collection[0]['collection_desc']}}</p>
    </div>

</div>
<hr class="border border-dark border-2 opacity-100">

<form method="POST" action="{{route('push.collections')}}">
    @csrf
    <h3>Change Collection Information:</h3>
        <select class="d-none" name="id">
            <option selected>{{$collection[0]['id']}}</option>
        </select>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title:</span>
            <input type="text" class="form-control" placeholder="{{$collection[0]['collection']}}" aria-label="Username" aria-describedby="basic-addon1" name="title">
          </div>

          
          <div class="input-group mb-3">
            <span class="input-group-text">Curator :</span>
            <input type="text" class="form-control" placeholder="{{$collection[0]['curator']}}" aria-label="Enter curator name and title" name="curator" >
          </div>
          
          <div class="form-text" id="basic-addon4">Collection Description: Write a briew summary of collection</div>
          <div class="input-group">
            <span class="input-group-text">Collection Description</span>
            <textarea class="form-control" aria-label="With textarea"  aria-describedby="basic-addon4" name="text"></textarea>
          </div>
          <div class="input-group mt-2">
            <input type="submit" class="btn btn-primary" value="Update">
          </div>



@endsection