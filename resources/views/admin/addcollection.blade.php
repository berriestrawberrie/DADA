@extends('layouts.app')
@section('title') New Collection @endsection

@section('page-title')

Admin Manage Collections

@endsection

@section('content')

  <!--COLLECTIONS ACCORDION-->
<h2>All Current Collections:</h2>


<div class="accordion" id="accordionExample">
    
    @foreach($collections as $collection)
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$collection->id}}" aria-expanded="true" aria-controls="collapse{{$collection->id}}">
                {{$collection->collection}} 
                #{{$collection->collection_id}}
                (@if($collection->isPublic ==1)
                  Public
                  @else 
                  Private
                  @endif
                )
            </button>
            </h2>
            <div id="collapse{{$collection->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Curator: {{$collection->curator}}</strong> 
                <p>{{$collection->collection_desc}}</p>
            </div>
            </div>
        </div>
    @endforeach
  
</div>

<!--END OF ACCORDION-->


<!--COLLECTIONS CRUD -->
<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Add Collection</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Update Collection</button>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active border p-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <h2>Adding a New Collection:</h2>
      <p>Use this page to create and catalog a new archival collection. 
          Provide key details such as the collection title, description, 
          date range, associated people or organizations, and relevant subjects or formats. 
          Attach any finding aids or digitized materials, and assign access levels to control visibility. 
          This form helps ensure your archival records are well-organized, searchable, and preserved for long-term access.
      </p>
        <form method="POST" action="{{route('collections.post')}}">
            @csrf
            <h3>Enter Collection Information:</h3>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isPublic" value="1" id="isPublic-1" checked>
                  <label class="form-check-label" for="isPublic-1">
                    <b>Public Collection: </b>
                  </label>
                  <p>Public collection showcases a diverse array of artifacts that highlight cultural, historical, and artistic achievements from around the world. Open to all visitors, it invites exploration and discovery through carefully curated exhibits and interactive displays.</p>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isPublic" id="isPublic-2" value="0">
                  <label class="form-check-label" for="radioDefault2">
                    <b>Private Collection:</b>
                  </label>
                  <p>Access is strictly limited to administrative users to ensure the integrity and confidentiality of the items. Each piece holds significant cultural or historical value, offering unique insights not available to the general public. 
                    The collection is securely housed in a restricted digital archive with advanced access controls.</p>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Title *</span>
                    <input type="text" class="form-control" placeholder="Enter the collection title" aria-label="Username" name="title" required>
                  </div>
    
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text">Curator *</span>
                    <input type="text" class="form-control" placeholder="Enter curator name & title" aria-label="Enter curator name and title"  name="curator" required>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Collection ID *</span>
                    <input type="number" class="form-control" placeholder="Unique Numeric Identifier" aria-label="Enter curator name and title"  name="collection_id" required>
                  </div>
                  
                  <div class="form-text" id="basic-addon4">Collection Description: Write a briew summary of collection</div>
                  <div class="input-group">
                    <span class="input-group-text">Collection Description *</span>
                    <textarea class="form-control" aria-label="With textarea" name="text" required></textarea>
                  </div>
                  <div class="input-group mt-2">
                    <input type="submit" class="btn btn-primary">
                  </div>
    </form>
    </div><!--END OF HOME TAB-->


    <div class="tab-pane fade  border" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <p>You can update the collection assigned curator, artifacts list, display image, or published description</p>
        <form method="POST" action="{{route('update.collections')}}">
            @csrf
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Select a Collection :</label>
              <div class="col-sm-8">
                
                <select class="form-select" aria-label="Default select a collection" name="selected" required>
                    <option value="false">--</option>
                    @foreach($collections as $collection)
                        <option value="{{$collection->id}}">{{$collection->collection}}</option>
                    @endforeach
                  </select>
        
              </div>
              <button type="submit" class="col-sm-1 btn btn-primary">Update</button>
            </div>
          </form>
        
    </div><!--END OF PROFILE TAB-->

  </div>

<!--COLLECTIONS CRUD END-->






@endsection