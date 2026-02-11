@extends('layouts.app')
@section('title') Collection Queries @endsection

@section('page-title') 
Query by Collection
@endsection

@section('content')

<form class=" needs-validation" method="GET" action="{{route('query.collection')}}" novalidate enctype="multipart/form-data">

    <p>View artifacts from from collections. You may select artifacts by..</p>

    <fieldset>
        <legend>Filters</legend>
        <div class="row">
            <!--COLLECTION-->
            <div class="col d-flex flex-column mb-4">
                <label for="collection" class="form-label" >Collection Title:<span class="text-danger">*</span></label>
                <select class="form-select" name="collection_id" id="collection_id" required>
                    @for($i = 0 ; $i < count($collections); $i++)
                    <option value="{{$collections[$i]["collection_id"]}}">{{$collections[$i]["collection"]}}</option>
                    @endfor
                </select>
                <div class="invalid-feedback">
                    Required field..
                </div>
            </div><!--END OF COLLECTION-->

            <!--START DATE-->
            <div class="col-2">
                <label for="start_date" class="form-label" >Start Date</label>
                <select class="form-select" name="start_date" id="start_date" onchange="checkRange()">
                    <option value="0">--</option>
                    <option value="1500">1500</option>
                    <option>1600</option>
                    <option>1700</option>
                    <option>1800</option>
                    <option>1900</option>
                </select>
            </div><!--end OF START DATE-->
            <!--END DATE-->
            <div class="col-2">
                <label for="end_date" class="form-label" >End Date</label>
                <select class="form-select" name="end_date" id="end_date" onchange="checkRange()">
                    <option value="0">--</option>
                    <option>1500</option>
                    <option>1600</option>
                    <option>1700</option>
                    <option>1800</option>
                    <option>1900</option>
                </select>
                    <div class="invalid-feedback " id="end_error">
                    End Date cannot be earlier than start date.
                    </div>
            </div><!--end OF END DATE-->

        </div><!--END OF ROW-->

        
        <div class="row">
        <!--ARTIFACT TYPES-->
        <div class="col ">
            <label for="artifact_types[]" class="form-label" >Artifact Types:<span class="text-danger">*</span></label>
            <div class="d-flex gap-4">
               <!--@include('queries.collectionsartifactcheck')-->
            </div>
            <div class="invalid-feedback">
                Required field.
            </div>
            </div><!--END OF COLLECTION-->
            <div class="col border rounded-3 p-2">
                <label class="form-label">Has Photo?</label>
                <!--HAS PHOTO/FILE-->
                <div class="form-check">
                <input class="form-check-input" type="radio" name="has_photo" id="has_photoNo" value="0">
                <label class="form-check-label" for="has_photoNo" ">
                    No
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="has_photo" id="has_photoYes"  value="1">
                <label class="form-check-label" for="has_photoYes">
                    Yes
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="has_photo" id="has_photoUnk"  value="2" checked>
                <label class="form-check-label" for="has_photoUnk">
                    Include Both
                </label>
                </div>
                <!--END OF PHOTO RADIOS-->
            </div>
            <div class="col-2">
                <label for="perpage" class="form-label" >Artifacts Per Page</label>
                <select class="form-select" name="perpage" id="perpage">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="500">Max</option>
                </select>
            </div>



        </div><!--END OF ROW-->

    </fieldset>
    <fieldset class="mt-2">
        <button type="submit" class="float-end btn btn-success" id="btnSubmit">Search</button>
    </fieldset>
</form>

<script src="{{asset('storage/js/query_collection.js')}}"></script>
@endsection