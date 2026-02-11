@extends('layouts.app')
@section('title') Buckle Form @endsection


@section('page-title')

Buckle Artifact Entry Form

@endsection



@section('content')
@include('forms.preview.popup')
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('submitBuckle/'.$artifact[0]["token"])}}" novalidate enctype="multipart/form-data">
  @csrf
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information</legend>
    @include('forms.buckle.previewsite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
     @include('forms.buckle.previewfieldsI')
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