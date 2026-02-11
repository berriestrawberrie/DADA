@extends('layouts.app')

@section('title') Bead Form @endsection


@section('page-title')

Bead Artifact Entry Form

@endsection

@section('content')
@include('forms.preview.popup')
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('submitBead/'.$artifact[0]["token"])}}" novalidate enctype="multipart/form-data">
  @csrf
  @method('POST')
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information</legend>
      @include('forms.bead.previewsite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
          @include('forms.bead.previewfieldsI')
  </fieldset>

  <fieldset>
    <legend>Fields II Information</legend>
          @include('forms.bead.previewfieldsII')
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