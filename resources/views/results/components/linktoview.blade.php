<a href="viewartifact
@if(str_contains($data->artifact_id, 'CE'))
/ceramic/{{$data->artifact_id}}
@elseif(str_contains($data->artifact_id, 'BE'))
/bead/{{$data->artifact_id}}
@elseif(str_contains($data->artifact_id, 'BU'))
/buckle/{{$data->artifact_id}}
@elseif(str_contains($data->artifact_id, 'BN'))
/button/{{$data->artifact_id}}
@elseif(str_contains($data->artifact_id, 'GL'))
/glass/{{$data->artifact_id}}
@elseif(str_contains($data->artifact_id, 'TP'))
/pipe/{{$data->artifact_id}}
@else
/utensil/{{$data->artifact_id}}
@endif
" target="blank">{{$data->artifact_id}}</a>