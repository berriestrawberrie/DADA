@extends('layouts.app')

@section('title') Bead Form @endsection


@section('page-title')

Bead Artifact Entry Form : {{$artifact[0]["artifact_id"]}}

@endsection

@section('content')
@include('forms.verify.popup')
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('validateBead/'.$artifact[0]["artifact_id"])}}" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information Artifact #: {{$artifact[0]["artifact_id"]}}</legend>
      @include('forms.bead.verifysite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
          @include('forms.bead.verifyfieldsI')
  </fieldset>

  <fieldset>
    <legend>Fields II Information</legend>
          @include('forms.bead.verifyfieldsII')
  </fieldset>

  <fieldset class="mt-2">
    <input type="submit" class="btn btn-success" value="Publish">
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