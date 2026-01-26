@extends('layouts.app')
@section('title')Home @endsection

@section('page-title')
#About the Project
@endsection

@section('content')

<div>

  <p>This web application is designed to digitize and manage an archaeology archive, streamlining the preservation and accessibility of archaeological data. Built with Laravel 12, it provides a robust and scalable backend, while Bootstrap 5 powers a responsive and user-friendly frontend interface. The application utilizes a MySQL database to securely store and organize digitized records, including artifacts, excavation notes, images, and metadata. Key features include advanced search and filtering, user role management, and intuitive data entry forms, enabling researchers and archivists to efficiently catalog, retrieve, and analyze archaeological information.</p>
  <p>The Digital Archive of Davidson Archaeology is currently in its Pre-Alpha stage, where the core infrastructure is actively being developed. This early phase focuses on building essential systems—such as database architecture, backend logic, and frontend components while gathering feedback to guide future enhancements. Though not yet feature-complete, the groundwork is being laid for a stable, scalable platform that will support rich archaeological data and collaborative research. It’s a time of rapid iteration, thoughtful design, and a shared vision for preserving history through technology.
</p>
  

</div>


<div class="d-none">
    <div class="collections">
      <div class="card card-style1">
          <img src="{{asset('storage/images/picture.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title mx-auto">Collection (1)</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
  </div>

</div>

@endsection