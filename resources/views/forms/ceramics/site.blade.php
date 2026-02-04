
  
  
  <!--GENERAL INFORMATION & SITE ROW 1-->
  <div class="row">
    <!--ENTEREDBY-->
    <div class="col">
        <label for="entered_by" class="form-label">Added By</label>
        <input type="text" class="form-control border border-success bg-success-subtle" id="added_by"  name="added_by" value="{{Auth::user()->name}}" required>
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div><!--END COL-->

    <!--DATE ENTERED-->
    <div class="col-3">
      <label for="created_at" class="form-label">Entered Date</label>
      <input type="date" class="form-control border border-success bg-success-subtle" id="created_at"  name="created_at" value="{{date('Y-m-d')}}" required>
      <div class="invalid-feedback">
          Enter a valid date.
      </div>
    </div><!--END COL-->

    <!--FORM-->
    <div class="col-3">
        <label for="completeness" class="form-label">Completeness</label>
        <select class="form-control " id="completeness"  name="completeness" required>
            <option disabled selected value> -- select an option -- </option>
            <option  value="base">base</option>
            <option  value="base/body">base/body</option>
            <option  value="base/body/handle">base/body/handle</option>
            <option  value="base/body/rim">base/body/rim</option>
            <option  value="body">body</option>
            <option  value="body/handle">body/handle</option>
            <option  value="body/hand/rim">body/hand/rim</option>
            <option  value="body/handle/terminal">body/handle/terminal</option>
            <option  value="body/handle/spout">body/handle/spout</option>
            <option  value="body/rim">body/rim</option>
            <option  value="body/shoulder">body/shoulder</option>
            <option  value="body/shoulder/neck">body/shoulder/neck</option>
            <option  value="body/spout">body/spout</option>
            <option  value="detached glaze">detached glaze</option>
            <option  value="finial">finial</option>
            <option  value="finial lid">finial lid</option>
            <option  value="foot">foot</option>
            <option  value="handle">handle</option>
            <option  value="handle terminal">handle terminal</option>
            <option  value="lid">lid</option>
            <option  value="neck">neck</option>
            <option  value="neck/handle terminal/rim">neck/handle terminal/rim</option>
            <option  value="neck/rim">neck/rim</option>
            <option  value="not applicable">not applicable</option>
            <option  value="not recorded">not recorded</option>
            <option  value="rim">rim</option>
            <option  value="shoulder">shoulder</option>
            <option  value="shoulder/handle/terminal">shoulder/handle/terminal</option>
            <option  value="shoulder/neck">shoulder/neck</option>
            <option  value="shoulder/neck/rim">shoulder/neck/rim</option>
            <option  value="spout">spout</option>
            <option  value="unidentifiable">unidentifiable</option>
        </select>
        <div class="invalid-feedback">
            Must select completeness.
        </div>
    </div><!--END COL-->

    <!--ARTIFACT COUNT-->
    <div class="col-2">
        <label for="artifact_count" class="form-label">Artifact Count</label>
        <input type="number" class="form-control " id="artifact_count"  name="artifact_count" min="1" max="99" required>
        <div class="invalid-feedback">
            Artifact count must be entered and less than 99.
        </div>
    </div><!--END COL-->

</div>
<!--END ROW-->

<!--GENERAL INFORMATION & SITE ROW 2-->
<div class="row">

    <!--COLLECTION-->
    <div class="col">
        <label for="collection" class="form-label">Collection</label>
        <input type="text" class="form-control border border-success bg-success-subtle" id="collection"  name="collection" value="{{$collections[0]["collection"]}}" required>
        <div class="invalid-feedback">
            Title: {{$collections[0]["collection"]}}
        </div>
        <input type="number" class="d-none" value="{{$collections[0]["collection_id"]}}" name="collection_id">
    </div><!--END COL-->
           <!--START DATE-->
            <div class="col-3">
                <label for="start_date" class="form-label" >Start Date</label>
                <select class="form-select" name="start_date" id="start_date" onchange="checkRange()" required>
                    <option value="0">--</option>
                    <option >1500</option>
                    <option>1600</option>
                    <option>1700</option>
                    <option>1800</option>
                    <option>1900</option>
                </select>
            </div><!--end OF START DATE-->
            <!--END DATE-->
            <div class="col-2">
                <label for="end_date" class="form-label" >End Date</label>
                <select class="form-select" name="end_date" id="end_date" onchange="checkRange()" required>
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
            </div><!--end OF    end DATE-->



</div><!--END ROW-->


<!--GENERAL INFORMATION & SITE ROW 3-->
<div class="row">
    <!--NOTES-->
    <div class="col">
        <label for="notes" class="form-label">Notes 
            <button type="button" class="btn-xsm" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Field notes describe your artifact notes">
                <i class="fa-solid fa-circle-question"></i>
          </button>
        </label>
        <textarea class="form-control " id="notes"  name="notes" placeholder="(Optional)" rows="3"></textarea>
    </div><!--END COL-->
    <div class="col-4">
        <label for="status_code" class="form-label">Status Code </label>
        <select class="form-select" name="status_code" id="status_code" required>
                    <option value="0">--</option>
                        <option >A - Undocumented Legacy</option>
                        <option >B - Partially Documented</option>
                        <option >C - Documented</option>
                        <option >T - Teaching Collection</option>
                        <option >R - Restricted / Sensitive</option>
                    </select>
        <label for="accession" class="form-label">Year of Recovery/Accession  </label>
        <select class="form-select" name="accession" id="accession" required>
                    <option value="0">--</option>
                    @for ($year = 1900; $year <= now()->year; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                    <option value="9999">Unknown</option>
        </select>
        
        
    </div>
</div>
<!--END ROW-->


