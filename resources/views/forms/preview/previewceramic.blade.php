@extends('layouts.app')

@section('title') Preview Ceramic @endsection


@section('page-title')

Review Ceramic

@endsection

@section('modal')
@include('forms.preview.popup')
@endsection

@section('content')

<form class=" needs-validation" method="POST" action="{{url('submitCeramic/'.$artifact[0]["token"])}}" novalidate enctype="multipart/form-data">
  @csrf
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information</legend>
    @include('forms.ceramics.previewsite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
    @include('forms.ceramics.previewfieldsI')
  </fieldset>

  <fieldset>
    <legend>Fields II Information</legend>
    @include('forms.ceramics.previewfieldsII')
  </fieldset>

  <fieldset class="mt-2">
    <input type="submit" class="btn btn-success" value="Submit Data for Validation">
  </fieldset>


</form>


<script>
    //INITIALIZE THE POPP OVERS
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)) 
</script>
<script src="{{asset('storage/js/verifynextform.js')}}"></script>
<script src="{{asset('storage/js/query_collection.js')}}"></script>

@endsection