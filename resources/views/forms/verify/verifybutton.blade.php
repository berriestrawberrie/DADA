@extends('layouts.app')
@section('title') Button Form @endsection


@section('page-title')

Button Artifact Entry Form

@endsection



@section('content')
@include('forms.verify.popup')
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('validateButton/'.$artifact[0]["artifact_id"])}}" novalidate enctype="multipart/form-data">
  @csrf
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information</legend>
    @include('forms.button.previewsite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
        @include('forms.button.previewfieldsI')
  </fieldset>

  <fieldset>
    <legend>Fields II Information</legend>
        @include('forms.button.previewfieldsII')
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