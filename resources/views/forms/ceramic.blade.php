@extends('layouts.app')

@section('title') Ceramic Form @endsection


@section('page-title')

Ceramic Artifact Entry Form

@endsection

@section('content')
@include('forms.formkey')
<form class=" needs-validation" method="POST" action="{{route('save.ceramic')}}" novalidate enctype="multipart/form-data">
  @csrf
  <!--GENERAL INFORMATION & SITE -->
  <fieldset>
    <legend>Site & General Information</legend>
    @include('forms.ceramics.site')
  </fieldset>

  <fieldset>
    <legend>Fields I Information</legend>
    @include('forms.ceramics.fieldsI')
  </fieldset>

  <fieldset>
    <legend>Fields II Information</legend>
    @include('forms.ceramics.fieldsII')
  </fieldset>

  <fieldset class="mt-2">
    <button class="btn btn-primary" id="btnSubmit">   Save</button>
  </fieldset>


</form>


<script>
    //INITIALIZE THE POPP OVERS
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)) 
</script>
<script src="{{asset('storage/js/nextform.js')}}"></script>
<script src="{{asset('storage/js/query_collection.js')}}"></script>

@endsection