@extends('layouts.app')

@section('title') Preview Ceramic @endsection


@section('page-title')

Review Ceramic

@endsection

@section('content')



<form class=" needs-validation" novalidate enctype="multipart/form-data">
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



</form>


<script>
    //INITIALIZE THE POPP OVERS
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)) 
</script>
<script>
  //DISABLE FORM
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input, select, textarea').forEach(el => {
            el.setAttribute('disabled', true);
        });
    });
</script>
<script src="{{asset('storage/js/verifynextform.js')}}"></script>
<script src="{{asset('storage/js/query_collection.js')}}"></script>

@endsection