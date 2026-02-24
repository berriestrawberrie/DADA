@extends('layouts.app')
@section('title') Collection Results @endsection

@section('page-title') 

@endsection

@section('content')


<div>
    <h3>Search Results:</h3>
    <a href="users/exportQuery/{{$table0}}/{{$collection_id}}/{{$start}}/{{$end}}"><button class="btn btn-success">Download</button></a>
    {{$datas->links('pagination::bootstrap-5')}}
    <div class="pagination">

     </div>

    <table class="table table-striped text-center">
        <tr>
            <th>Artifact ID</td>
            <th>Collection</th>
            <th>Material</th>
            <th>Manufacturing Technique</th>
            <th>Start Period</th>
            <th>End Period</th>
            <th>Photo</th>
        </tr>
        
        <tr>
            @foreach($datas as $data)
            <td>
                @include('results.components.linktoview')
            </td>
            <td>{{$data->collection}}</td>
            <td>{{$data->material}}</td>
            <td>{{$data->manufacturing_technique}}</td>
            <td>{{$data->start_date}}</td>
            <td>{{$data->end_date}}</td>
            <!--IMAGE CELL-->
            <td><img src="{{asset('uploads/ceramics/'.$data->photo)}}" width="50"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->artifact_id}}">
             <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$data->artifact_id}}" tabindex="-1" aria-labelledby="exampleModal{{$data->artifact_id}}" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--HEADER-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{asset('uploads/ceramics/'.$data->photo)}}" class="img-fluid">
                    </div>
                    <div class="modal-footer">
                    <!--FOOTER-->
                    </div>
                </div>
                </div>
            </div> <!--END OF MODAL-->
            </td><!--END OF IMAGE CELL-->
        </tr>
        @endforeach
    </table>

    <a href="/query/bycollection"><button class="btn btn-primary">New Query</button></a>
</div>



<script>
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>

@endsection