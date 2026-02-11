@extends('layouts.app')

@section('title') Ceramic Form @endsection


@section('page-title')
Verify Ceramic#{{$artifact[0]["id"]}}
@endsection

@section('content')
@include('forms.verify.popup')
<p>The form is pre-populated with the existing inputs for this artifact. Please verify each field,
  if all the fields are correct publish the artifact</p>
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('validateCeramic/'.$artifact[0]["artifact_id"])}}" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
  <!--GENERAL INFORMATION & SITE -->

  <fieldset>
    <legend>Site & General Information Artifact #: {{$artifact[0]["artifact_id"]}}</legend>
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
      <button class="btn btn-success d-flex justify-content-evenly align-items-center" id="btnSubmit">
        Publish
        <span class="loader" id="spinner" style="display:none;"></span>
      </button>
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