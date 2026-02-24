@extends('layouts.app')

@section('title')Select Collection @endsection

@section('page-title')

Add Artifact

@endsection


@section('content')
<select id="max" class="d-none"><option selected value="{{ $collections->max('id') }}">MaxCollections</option></select>

<h2>1. Select a collection </h2>
<p>First you must select the collection for the artifact to be added to</p>
<form method="POST" action="" class="mb-5">
    @csrf
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Select a Collection:</label>
      <div class="col-sm-8">
        
        <select onchange=filterCollection() class="form-select" aria-label="Default select a collection" name="selected" id="selected" required>
            <option value="false">--</option>
            @foreach($collections as $collection)
                <option value="{{$collection->id}}">{{$collection->collection}}</option>
            @endforeach
          </select>

      </div>
    </div>
  </form>
  <h2>2. Select Artifact Type </h2>
  <p class="mb-2">Then you must select the type of artifact to add.  </p>
 
    @for($i=0;$i< count($collections); $i++)
    <div style="display:none;"class="collect container flex-wrap  justify-content-start position-relative" id="{{$collections[$i]["id"]}}">
      <a href="/getForm/{{$collections[$i]["id"]}}/ceramic">
          <div class="d-flex flex-wrap flex-column align-items-center rounded-3 p-2 " >
            <button class="btn btn-outline-dark fs-4 text-capitalize">Ceramic</button>
          </div>
      </a>
     
      <a href="/getForm/{{$collections[$i]["id"]}}/tobacco_pipe">
          <div class="d-flex flex-wrap flex-column align-items-center rounded-3 p-2 " >
            <button class="btn btn-outline-dark fs-4 text-capitalize">Tobacco Pipe</button>
          </div>
      </a>

    </div>
    
   @endfor

   <script src={{asset('storage/js/typeSelect.js')}}>
    </script>

@endsection