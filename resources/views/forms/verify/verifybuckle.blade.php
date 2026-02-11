@extends('layouts.app')
@section('title') Buckle Form @endsection


@section('page-title')

Buckle Artifact Entry Form :  

@endsection



@section('content')
<div class="d-flex justify-content-end">
<span style="font-size: 40px; color: green; width: 50px; height:50px; padding: 5px;"><i class="fa-solid fa-user-tie"></i></span>
</div>
@include('forms.verify.popup')
<form id="artifactForm"  class=" needs-validation" method="POST" action="{{url('validateBuckle/'.$artifact[0]["artifact_id"])}}" novalidate enctype="multipart/form-data">
  @csrf
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information Artifact #: {{$artifact[0]["artifact_id"]}}</legend>
    @include('forms.buckle.previewsite')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
     @include('forms.buckle.previewfieldsI')
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