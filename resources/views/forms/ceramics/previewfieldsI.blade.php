<!--FIELDS I ROW IMAGE-->
<div class="row">

    <div class="col-5">
        <!--MANUFACTURING-->
        <div class="col">
            <label for="manufacturing_technique" class="form-label">Manufacturing Tech.</label>
            <select class="form-control border" id="manufacturing_technique" name="manufacturing_technique" required>
                <option   value="{{$artifact[0]["manufacturing_technique"]}}">{{$artifact[0]["manufacturing_technique"]}}</option>
                <option value="handbuild coil">handbuild coil</option>
                <option value="handbuild unidentifiable">handbuild unidentifiable</option>
                <option value="missing">missing</option>
                <option value="not applicable">not applicable</option>
                <option value="press molded">press molded</option>
                <option value="slip cast">slip cast</option>
                <option value="unidentifiable">unidentifiable</option>
                <option value="wheel thrown">wheel thrown</option>
            </select>
            <div class="invalid-feedback">
                Must select a manufacturing technique
            </div>
        </div><!--END COL-->

        <!--MATERIAL-->
        <div class="col">
            <label for="material" class="form-label">Material</label>
            <select class="form-control border" id="material" name="material" required>
                <option   value="{{$artifact[0]["material"]}}"> {{$artifact[0]["material"]}}</option>
                <option value="coarse earthenware">Coarse Earthenware</option>
                <option value="porcelain">Porcelain</option>
                <option value="refined earthenware">Refined Earthenware</option>
                <option value="stoneware">Stoneware</option>
                <option value="unidentifiable">Unidentifiable</option>

            </select>
            <div class="invalid-feedback">
                Must select ceramic material.
            </div>
        </div><!--END COL-->

        <!--WARE-->
        <div class="col">
            <label for="ware" class="form-label">Ware</label>
            <select class="form-select border" id="ware" name="ware" required>
                <option   value="{{$artifact[0]["ware"]}}"> {{$artifact[0]["ware"]}} </option>
                <option value="afro-caribbean ware">afro-caribbean ware</option>
                <option value="agate refined">agate refined</option>
                <option value="american stoneware">american stoneware</option>
                <option value="astbury type">astbury type</option>
                <option value="bennington/rockingham">bennington/rockingham</option>
                <option value="black basalt">black basalt</option>
                <option value="british stoneware">british stoneware</option>
                <option value="buckley">buckley</option>
                <option value="burslem">burslem</option>
                <option value="canary ware">canary ware</option>
                <option value="carolina creamware">carolina creamware</option>
                <option value="coarse earthenware unidentified">coarse earthenware unidentified</option>
                <option value="colonware">colonware</option>
                <option value="creamware">creamware</option>
                <option value="delftware dutch/british">delftware dutch/british</option>
                <option value="derbyshire">derbyshire</option>
                <option value="faience">faience</option>
                <option value="frechen brown">frechen brown</option>
                <option value="french coarse earthenware">french coarse earthenware</option>
                <option value="fulham type">fulham type</option>
                <option value="german stoneware">german stoneware</option>
                <option value="iberian ware">iberian ware</option>
                <option value="ironstone/white granite">ironstone/white granite</option>
                <option value="jackfield type">jackfield type</option>
                <option value="jasperware">jasperware</option>
                <option value="native american/unidentified">native american/unidentified</option>
                <option value="north devon gravel tempered">north devon gravel tempered</option>
                <option value="north devon plain">north devon plain</option>
                <option value="nottingham">nottingham</option>
                <option value="pearlware">pearlware</option>
                <option value="porcelain chinese">porcelain chinese</option>
                <option value="porcelain english bone china">porcelain english bone china</option>
                <option value="porcelain french">porcelain french</option>
                <option value="porcelain japanese">porcelain japanese</option>
                <option value="porcelain unidentifiable">porcelain unidentifiable</option>
                <option value="porcellaneous english hard paste">porcellaneous english hard paste</option>
                <option value="post-medieval london-area redware">post-medieval london-area redware</option>
                <option value="red agate coarse">red agate coarse</option>
                <option value="red agated refined">red agated refined</option>
                <option value="red sandy ware">red sandy ware</option>
                <option value="redware">redware</option>
                <option value="redware refined">redware refined</option>
                <option value="refined earthenware modern">refined earthenware modern</option>
                <option value="refined earthenware unidentifiable">refined earthenware unidentifiable</option>
                <option value="refined stoneware unidentifiable">refined stoneware unidentifiable</option>
                <option value="rosso antico">rosso antico</option>
                <option value="shaw stoneware">shaw stoneware</option>
                <option value="slip dip">slip dip</option>
                <option value="slipware north italian">slipware north italian</option>
                <option value="slipware north midlands/staffordshire">slipware north midlands/staffordshire</option>
                <option value="spanish coarse earthenware">spanish coarse earthenware</option>
                <option value="staffordshire brown stoneware">staffordshire brown stoneware</option>
                <option value="staffordshire mottled glaze">staffordshire mottled glaze</option>
                <option value="stoneware unidentifiable">stoneware unidentifiable</option>
                <option value="tin-enameled unidentified">tin-enameled unidentified</option>
                <option value="turner type">turner type</option>
                <option value="unidentifable">unidentifable</option>
                <option value="wedgwood green">wedgwood green</option>
                <option value="westerwald/rhenish">westerwald/rhenish</option>
                <option value="whieldon-type ware">whieldon-type ware</option>
                <option value="white salt gaze">white salt gaze</option>
                <option value="whiteware">whiteware</option>
                <option value="yellow ware">yellow ware</option>

            </select>
            <div class="invalid-feedback">
                Must select a ware material.
            </div>
        </div><!--END COL-->

        <!--FORM-->
        <div class="col">
            <label for="form" class="form-label">Ceramic Form</label>
            <select class="form-control border" id="form" name="form" required>
                <option   value="{{$artifact[0]["form"]}}">{{$artifact[0]["form"]}}</option>
                <option value="basket">basket</option>
                <option value="berry dish">berry dish</option>
                <option value="bottle">bottle</option>
                <option value="bottle blacking">bottle blacking</option>
                <option value="bowl">bowl</option>
                <option value="bowl punch">bowl punch</option>
                <option value="bowl slop">bowl slop</option>
                <option value="box">box</option>
                <option value="castor">castor</option>
                <option value="chafing dish">chafing dish</option>
                <option value="chamberpot">chamberpot</option>
                <option value="coffee pot">coffee pot</option>
                <option value="colander">colander</option>
                <option value="creamer">creamer</option>
                <option value="cup">cup</option>
                <option value="cup lidded">cup lidded</option>
                <option value="dish (>10" diameter)">dish (>10" diameter)</option>
                <option value="dish (7" -10" diameter)">dish (7"-10" diameter)</option>
                <option value="drinking pot">drinking pot</option>
                <option value="drug jar/salve pot">drug jar/salve pot</option>
                <option value="flower pot">flower pot</option>
                <option value="gaming piece">gaming piece</option>
                <option value="griddle">griddle</option>
                <option value="inkwell">inkwell</option>
                <option value="jar">jar</option>
                <option value="jar mustard">jar mustard</option>
                <option value="jug">jug</option>
                <option value="kiln furniture">kiln furniture</option>
                <option value="lid">lid</option>
                <option value="milk pan">milk pan</option>
                <option value="mold jelly">mold jelly</option>
                <option value="mug/can">mug/can</option>
                <option value="not applicable">not applicable</option>
                <option value="not mended">not mended</option>
                <option value="not recorded">not recorded</option>
                <option value="patty pan">patty pan</option>
                <option value="pipkin">pipkin</option>
                <option value="pitcher/ewer">pitcher/ewer</option>
                <option value="plate">plate</option>
                <option value="platter">platter</option>
                <option value="porringer">porringer</option>
                <option value="pot/butter pot">pot/butter pot</option>
                <option value="saucer">saucer</option>
                <option value="sea kale pot">sea kale pot</option>
                <option value="serving dish misc">serving dish misc</option>
                <option value="storage jar">storage jar</option>
                <option value="storage vessel">storage vessel</option>
                <option value="strainer">strainer</option>
                <option value="tankard">tankard</option>
                <option value="tea caddy">tea caddy</option>
                <option value="teabowl">teabowl</option>
                <option value="teacup">teacup</option>
                <option value="teapot">teapot</option>
                <option value="tureen">tureen</option>
                <option value="unid: tableware">unid: tableware</option>
                <option value="unid:teware">unid:teware</option>
                <option value="unid:utilitarian">unid:utilitarian</option>
                <option value="unidentifable">unidentifable</option>
                <option value="vegetable dish">vegetable dish</option>
                <option value="water cooler">water cooler</option>

            </select>
            <div class="invalid-feedback">
                Must select ceramic form.
            </div>
        </div><!--END COL-->

    </div>

    <div class="col border me-2 rounded d-flex justify-content-evenly align-items-center">

        <!--HAS IMAGE -->
        <div class="col-2 form-check d-flex flex-column ">
            <p style="margin-left: -30px;">Photo</p>
            
            <label class="form-check-label" for="has_photo1">
                <input onchange="showImgUpload(this)" class="form-check-input" type="radio" name="has_photo" id="has_photo1" value="1"checked >Keep</label>
            <label class="form-check-label mt-3" for="has_photo2">
                <input onchange="showImgUpload(this)" class="form-check-input" type="radio" name="has_photo" id="has_photo2" value="0">Remove</label>
            <label class="form-check-label mt-3" for="has_photo3">
                <input onchange="showImgUpload(this)" class="form-check-input" type="radio" name="has_photo" id="has_photo3" value="2">Replace</label>

            <div class="invalid-feedback">
                Must make a selection.
            </div>
        </div><!--END COL-->

        <div class="col-8">
            <img  id="file-ip-1-preview" src="{{asset('uploads/ceramics/'.$artifact[0]["photo"])}}"style="width: 200px; ">
            <img id="file-noimage" src="{{asset('uploads/ceramics/null.png')}}" style="width: 200px; display:none; opacity: .5;">
            <!--IMAGE UPLOAD -->
            <div class="position-relative"id="image-uploader" style="opacity: 0;">
                <label for="photo" class="form-label">Upload Photo</label>
                <input onchange="showPreview(event);" type="file" class="form-control " id="file-ip-1" name="photo" accept="image/png, image/jpeg, image/jpg"/>
                <div class="invalid-feedback">
                    Must include image (png, jpeg).
                </div>
                <button class="d-none position-absolute top-0 end-0 btn-x" type="button" id="cancel_photo"><i class="fa-solid fa-circle-xmark"></i></button>
            </div><!--END COL-->
        </div>


    </div>



</div><!--END ROW-->

<!--FIELDS I  ROW OXIDIEZED , EVIDENCE OF BURN, VESSEL-->
<div class="row mt-4">
    <!--OXIDIEZED VS REDUCED-->
    <div class="col">
        <label for="oxidized_vs_reduced_fabric" class="form-label">Oxidized vs. Reduced Fabric</label>
        <select class="form-control border" id="oxidized_vs_reduced_fabric" name="oxidized_vs_reduced_fabric" required>
            <option   value="{{$artifact[0]["oxidized_vs_reduced_fabric"]}}"> {{$artifact[0]["oxidized_vs_reduced_fabric"]}} </option>
            <option value="not recorded">not recorded</option>
            <option value="not reduced">not reduced</option>
            <option value="reduced">reduced</option>
            <option value="unidentifiable">unidentifiable</option>
        </select>
        <div class="invalid-feedback">
            Must select ceramic form.
        </div>
    </div><!--END COL-->

    <!--EVIDENCE OF BURNING-->
    <div class="col">
        <label for="evidence_of_burning" class="form-label">Evidence of Burning</label>
        <select class="form-control border" id="evidence_of_burning" name="evidence_of_burning" required>
            <option   value="{{$artifact[0]["evidence_of_burning"]}}"> {{$artifact[0]["evidence_of_burning"]}} </option>
            <option value="both interior and exterior">both interior and exterior</option>
            <option value="exterior burned">exterior burned</option>
            <option value="interior burned">interior burned</option>
            <option value="not recorded">not recorded</option>
            <option value="sides burned">sides burned</option>
            <option value="unburned">unburned</option>

        </select>
        <div class="invalid-feedback">
            Must select make a selection for burning.
        </div>
    </div><!--END COL-->


    <!--VESSEL CATEGORY-->
    <div class="col-2">
        <label for="vessel_category" class="form-label">Vessel Category</label>
        <select class="form-control border" id="vessel_category" name="vessel_category" required>
            <option   value="{{$artifact[0]["vessel_category"]}}"> {{$artifact[0]["vessel_category"]}} </option>
            <option value="vessel_category">vessel_category</option>
            <option value="hollow">hollow</option>
            <option value="flat">flat</option>
            <option value="unidentifiable">unidentifiable</option>

        </select>
        <div class="invalid-feedback">
            Must select a vessel category.
        </div>
    </div><!--END COL-->

</div><!--END ROW-->

<!--FIELDS I  ROW MANUFAC MOD , INTERIOR EXTERIOR LOCATION-->
<div class="row mt-2">

    <!--POST MANUFACTURING MOD-->
    <div class="col">
        <label for="post_manufacturing_mod" class="form-label">Post Manufact. Mod</label>
        <select class="form-control border" id="post_manufacturing_mod" name="post_manufacturing_mod" required>
            <option   value="{{$artifact[0]["post_manufacturing_mod"]}}"> {{$artifact[0]["post_manufacturing_mod"]}}</option>
            <option value="yes">yes</option>
            <option value="no">no</option>
            <option value="not recorded">not recorded</option>

        </select>
        <div class="invalid-feedback">
            Must select a post manufacturing modification.
        </div>
    </div><!--END COL-->

    <!--INTERIOR EXTERIOR-->
    <div class="col">
        <label for="interior_exterior" class="form-label">Interior Exterior
            <button type="button" class="btn btn-secondary btn-xsm" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Helpful field explainer here?">
                <i class="fa-solid fa-circle-question"></i> </button>
        </label>
        <select class="form-control border" id="interior_exterior" name="interior_exterior" required>
            <option   value={{$artifact[0]["interior_exterior"]}}> {{$artifact[0]["interior_exterior"]}} </option>
            <option value="exterior">exterior</option>
            <option value="interior">interior</option>
            <option value="perforate">perforate</option>
        </select>
        <div class="invalid-feedback">
            Must select an interior exterior
        </div>
    </div><!--END COL-->

    <!--LOCATION-->
    <div class="col-2">
        <label for="location" class="form-label">Location??</label>
        <select class="form-control border" id="location" name="location" required>
            <option   value="{{$artifact[0]["location"]}}">{{$artifact[0]["location"]}}</option>
            <option value="base">base</option>
            <option value="body">body</option>
            <option value="finial">finial</option>
            <option value="foot ring">foot ring</option>
            <option value="handle">handle</option>
            <option value="lid">lid</option>
            <option value="neck">neck</option>
            <option value="proximal rim">proximal rim</option>
            <option value="rim">rim</option>
            <option value="shoulder">shoulder</option>
            <option value="spout">spout</option>
            <option value="terminal">terminal</option>
            <option value="unidentified">unidentified</option>

        </select>
        <div class="invalid-feedback">
            Must select location for?
        </div>
    </div><!--END COL-->

</div><!--END ROW-->

<!--FIELDS I  ROW MENDED-->
<div class="row mt-3">

    <!--CERAMIC COMPLETENESS-->
    <div class="col">
        <label for="ceramic_completeness" class="form-label">Ceramic Completeness</label>
        <select class="form-control border" id="ceramic_completeness" name="ceramic_completeness" required>
            <option   value="{{$artifact[0]["ceramic_completeness"]}}">{{$artifact[0]["ceramic_completeness"]}}</option>
            <option value="base">base</option>
            <option value="body">body</option>
            <option value="finial">finial</option>
            <option value="finial lid">finial lid</option>
            <option value="foot">foot</option>
            <option value="handle">handle</option>
            <option value="handle terminal">handle terminal</option>
            <option value="lid">lid</option>
            <option value="neck">neck</option>
            <option value="rim">rim</option>
            <option value="shoulder">shoulder</option>
            <option value="spout">spout</option>
            <option value="unidentifiable">unidentifiable</option>

        </select>
        <div class="invalid-feedback">
            Must select ceramic form.
        </div>
    </div><!--END COL-->

    <!--MENDED-->
    <div class="col-2">
        <label for="mended" class="form-label">Mended?</label>
        <select class="form-control border" id="mended" name="mended" required onchange="getMended()">
            <option   value="{{$artifact[0]["mended"]}}"> {{$artifact[0]["mended"]}} </option>
            <option value="yes">yes</option>
            <option value="no">no</option>
            <option value="not recorded">not recorded</option>

        </select>
        <div class="invalid-feedback">
            Must select mended option.
        </div>
    </div><!--END COL-->

    <!--MENDED FORM-->
    <div class="col">
        <label for="mended_form" class="form-label">Mended Form</label>
        <select class="form-control border" id="mended_form" name="mended_form" required>
            <option   value="{{$artifact[0]["mended_form"]}}"> {{$artifact[0]["mended_form"]}} </option>
            <option value="basket">basket</option>
            <option value="berry dish">berry dish</option>
            <option value="bottle">bottle</option>
            <option value="bottle blacking">bottle blacking</option>
            <option value="bowl">bowl</option>
            <option value="bowl punch">bowl punch</option>
            <option value="bowl slop">bowl slop</option>
            <option value="box">box</option>
            <option value="castor">castor</option>
            <option value="chafing dish">chafing dish</option>
            <option value="chamberpot">chamberpot</option>
            <option value="coffee pot">coffee pot</option>
            <option value="colander">colander</option>
            <option value="creamer">creamer</option>
            <option value="cup">cup</option>
            <option value="cup lidded">cup lidded</option>
            <option value="dish (>10" diameter)">dish (>10" diameter)</option>
            <option value="dish (7" -10" diameter)">dish (7"-10" diameter)</option>
            <option value="drinking pot">drinking pot</option>
            <option value="drug jar/salve pot">drug jar/salve pot</option>
            <option value="flower pot">flower pot</option>
            <option value="gaming piece">gaming piece</option>
            <option value="griddle">griddle</option>
            <option value="inkwell">inkwell</option>
            <option value="jar">jar</option>
            <option value="jar mustard">jar mustard</option>
            <option value="jug">jug</option>
            <option value="kiln furniture">kiln furniture</option>
            <option value="lid">lid</option>
            <option value="milk pan">milk pan</option>
            <option value="mold jelly">mold jelly</option>
            <option value="mug/can">mug/can</option>
            <option value="not applicable">not applicable</option>
            <option value="not mended" id="change_not_mend">not mended</option>
            <option value="not recorded" id="change_not_record">not recorded</option>
            <option value="patty pan">patty pan</option>
            <option value="pipkin">pipkin</option>
            <option value="pitcher/ewer">pitcher/ewer</option>
            <option value="plate">plate</option>
            <option value="platter">platter</option>
            <option value="porringer">porringer</option>
            <option value="pot/butter pot">pot/butter pot</option>
            <option value="saucer">saucer</option>
            <option value="sea kale pot">sea kale pot</option>
            <option value="serving dish misc">serving dish misc</option>
            <option value="storage jar">storage jar</option>
            <option value="storage vessel">storage vessel</option>
            <option value="strainer">strainer</option>
            <option value="tankard">tankard</option>
            <option value="tea caddy">tea caddy</option>
            <option value="teabowl">teabowl</option>
            <option value="teacup">teacup</option>
            <option value="teapot">teapot</option>
            <option value="tureen">tureen</option>
            <option value="unid: tableware">unid: tableware</option>
            <option value="unid:teware">unid:teware</option>
            <option value="unid:utilitarian">unid:utilitarian</option>
            <option value="unidentifable">unidentifable</option>
            <option value="vegetable dish">vegetable dish</option>
            <option value="water cooler">water cooler</option>

        </select>
        <div class="invalid-feedback">
            Must select mended form.
        </div>
    </div><!--END COL-->

    <!--PASTE COLOR-->
    <div class="col-2">
        <label for="paste_color" class="form-label">Paste Color</label>
        <input type="text" class="form-control border" id="paste_color" name="paste_color" value="{{$artifact[0]["paste_color"]}}">
    </div><!--END COL-->


</div><!--END ROW-->


<!--FIELDS I  ROW EXTERIOR SURFACE, EXTERIOR COLOR,-->
<div class="row">
    <!--EXTERIOR SURFACE-->
    <div class="col">
        <label for="exterior_surface" class="form-label">Exterior Surface</label>
        <select class="form-control border" id="exterior_surface" name="exterior_surface" required>
            <option   value="{{$artifact[0]["exterior_surface"]}}"> {{$artifact[0]["exterior_surface"]}} </option>
            <option value="albany slip">albany slip</option>
            <option value="alkaline glaze">alkaline glaze</option>
            <option value="bristol glaze">bristol glaze</option>
            <option value="feldspathic glaze">feldspathic glaze</option>
            <option value="glaze unidentifiable">glaze unidentifiable</option>
            <option value="lead glaze">lead glaze</option>
            <option value="missing">missing</option>
            <option value="not applicable">not applicable</option>
            <option value="not recorded">not recorded</option>
            <option value="salt glaze">salt glaze</option>
            <option value="tin glaze">tin glaze</option>
            <option value="unglazed/bisque">unglazed/bisque</option>
            <option value="unidentifiable">unidentifiable</option>
            <option value="wash">wash</option>
            <option value="zinc emulsion glaze">zinc emulsion glaze</option>
        </select>
        <div class="invalid-feedback">
            Must select exterior surface.
        </div>
    </div><!--END COL-->

    <!--EXTERIOR COLOR-->
    <div class="col-2">
        <label for="exterior_color" class="form-label">Exterior Color</label>
        <input type="text" class="form-control border" id="exterior_color" name="exterior_color" value="{{$artifact[0]["exterior_color"]}}" required>
        <div class="invalid-feedback">
            Must enter an exterior color.
        </div>
    </div><!--END COL-->

    <!--INTERIOR SURFACE-->
    <div class="col">
        <label for="interior_surface" class="form-label">Interior Surface</label>
        <select class="form-control border" id="interior_surface" name="interior_surface" required>
            <option   value="{{$artifact[0]["interior_surface"]}}">{{$artifact[0]["interior_surface"]}}</option>
            <option value="albany slip">albany slip</option>
            <option value="alkaline glaze">alkaline glaze</option>
            <option value="bristol glaze">bristol glaze</option>
            <option value="feldspathic glaze">feldspathic glaze</option>
            <option value="glaze unidentifiable">glaze unidentifiable</option>
            <option value="lead glaze">lead glaze</option>
            <option value="missing">missing</option>
            <option value="not applicable">not applicable</option>
            <option value="not recorded">not recorded</option>
            <option value="salt glaze">salt glaze</option>
            <option value="tin glaze">tin glaze</option>
            <option value="unglazed/bisque">unglazed/bisque</option>
            <option value="unidentifiable">unidentifiable</option>
            <option value="wash">wash</option>
            <option value="zinc emulsion glaze">zinc emulsion glaze</option>


        </select>
        <div class="invalid-feedback">
            Must select interior surface.
        </div>
    </div><!--END COL-->

    <!--EXTERIOR COLOR-->
    <div class="col-2">
        <label for="interior_color" class="form-label">Interior Color</label>
        <input type="text" class="form-control border" id="interior_color" name="interior_color" value="{{$artifact[0]["interior_color"]}}" required>
        <div class="invalid-feedback">
            Must enter an interior color.
        </div>
    </div><!--END COL-->

</div><!--END ROW-->

<!--FIELDS I ROW GENRE, MOTIF, DECORATIVE-->
<div class="row">

    <!--GENRE -->
    <div class="col">
        <label for="genre" class="form-label">Genre</label>
        <select class="form-control border" id="genre" name="genre" required>
            <option   value="{{$artifact[0]["genre"]}}">{{$artifact[0]["genre"]}}</option>
            <option value="an hua">an hua</option>
            <option value="applied powder crystals purple">applied powder crystals purple</option>
            <option value="barley">barley</option>
            <option value="bartmann">bartmann</option>
            <option value="batavian">batavian</option>
            <option value="bead and reel">bead and reel</option>
            <option value="blue and gray">blue and gray</option>
            <option value="blue molded/stamped/incised">blue molded/stamped/incised</option>
            <option value="cauliflower">cauliflower</option>
            <option value="decalcomania">decalcomania</option>
            <option value="dot/diaper/basketweave">dot/diaper/basketweave</option>
            <option value="feather edge">feather edge</option>
            <option value="flow transfer print blue">flow transfer print blue</option>
            <option value="flow transfer print purple/black">flow transfer print purple/black</option>
            <option value="handpainted blue">handpainted blue</option>
            <option value="imari">imari</option>
            <option value="littlers blue">littlers blue</option>
            <option value="luster decoration">luster decoration</option>
            <option value="molded edge decoration other">molded edge decoration other</option>
            <option value="not applicable">not applicable</option>
            <option value="overglaze handpainted">overglaze handpainted</option>
            <option value="polychrome cool">polychrome cool</option>
            <option value="polychrome other">polychrome other</option>
            <option value="polychrome warm">polychrome warm</option>
            <option value="purple molded/stamped/incised">purple molded/stamped/incised</option>
            <option value="queens shape">queens shape</option>
            <option value="royal pattern">royal pattern</option>
            <option value="scratch blue">scratch blue</option>
            <option value="scratch brown">scratch brown</option>
            <option value="shell edge blue">shell edge blue</option>
            <option value="shell edge green">shell edge green</option>
            <option value="shell edge mulberry">shell edge mulberry</option>
            <option value="shell edge unidentifiable">shell edge unidentifiable</option>
            <option value="slipware factory made">slipware factory made</option>
            <option value="sponge/spatter">sponge/spatter</option>
            <option value="transfer print over">transfer print over</option>
            <option value="transfer print under black">transfer print under black</option>
            <option value="transfer print under blue">transfer print under blue</option>
            <option value="transfer print under brown">transfer print under brown</option>
            <option value="transfer print under gray">transfer print under gray</option>
            <option value="transfer print under green">transfer print under green</option>
            <option value="transfer print under light blue">transfer print under light blue</option>
            <option value="transfer print under pink">transfer print under pink</option>
            <option value="transfer print under polychrome">transfer print under polychrome</option>
            <option value="transfer print under purple">transfer print under purple</option>
            <option value="transfer print under red">transfer print under red</option>
            <option value="transfer print under unidentifiable">transfer print under unidentifiable</option>
            <option value="victorian majolica">victorian majolica</option>

        </select>
        <div class="invalid-feedback">
            Must select a genre.
        </div>
    </div><!--END COL-->

    <!--MOTIF-->
    <div class="col-2">
        <label for="motif" class="form-label">Motif</label>
        <select class="form-control border" id="motif" name="motif" required>
            <option value="{{$artifact[0]["motif"]}} "> {{$artifact[0]["motif"]}} </option>
            <option value="adjacent combination b">adjacent combination b</option>
            <option value="adjacent/stacked combo a">adjacent/stacked combo a</option>
            <option value="adjacent/stacked combo b">adjacent/stacked combo b</option>
            <option value="individual a">individual a</option>
            <option value="individual b">individual b</option>
            <option value="individual c">individual c</option>
            <option value="individual d">individual d</option>
            <option value="individual e">individual e</option>
            <option value="individual f">individual f</option>
            <option value="individual g">individual g</option>
            <option value="individual h">individual h</option>
            <option value="individual i">individual i</option>
            <option value="individual j">individual j</option>
            <option value="individual repeated a">individual repeated a</option>
            <option value="individual repeated b">individual repeated b</option>
            <option value="individual repeated c">individual repeated c</option>
            <option value="not applicable">not applicable</option>
            <option value="scene combination a">scene combination a</option>
            <option value="scene combination b">scene combination b</option>
            <option value="stacked combination a">stacked combination a</option>
            <option value="stacked combination b">stacked combination b</option>

        </select>
        <div class="invalid-feedback">
            Must select a motif
        </div>
    </div><!--END COL-->

    <!--DECORATIVE TECHNIQUE-->
    <div class="col">
        <label for="decorative_technique" class="form-label">Decorative Technique</label>
        <select class="form-control border" id="decorative_technique" name="decorative_technique" required>
            <option  value="{{$artifact[0]["decorative_technique"]}}">{{$artifact[0]["decorative_technique"]}}</option>
            <option value="applied clay">applied clay</option>
            <option value="applied powder/crystals">applied powder/crystals</option>
            <option value="bulls eye inlay">bulls eye inlay</option>
            <option value="burnished (w/ visible facets)">burnished (w/ visible facets)</option>
            <option value="cord marked">cord marked</option>
            <option value="cut">cut</option>
            <option value="decalcomania">decalcomania</option>
            <option value="dendritic">dendritic</option>
            <option value="dipped">dipped</option>
            <option value="impressed">impressed</option>
            <option value="impressed/ fabric">impressed/ fabric</option>
            <option value="impressed/ fingerprints">impressed/ fingerprints</option>
            <option value="incised/free hand">incised/free hand</option>

        </select>
        <div class="invalid-feedback">
            Must select a decorative technique.
        </div>
    </div><!--END COL-->

    <!--DECORATIVE COLOR -->
    <div class="col-2">
        <label for="decoration_color" class="form-label">Decorative Color</label>
        <input type="text" value="decoration_color"class="form-control border" id="decoration_color" name="decoration_color" required>
        <div class="invalid-feedback">
            Must select enter decoration color.
        </div>
    </div><!--END COL-->

</div><!--END ROW-->


<!--FIELDS I ROW STYLISTIC-->
<div class="row">
    <!--STYLISTIC ELEMENT-->
    <div class="col">
        <label for="stylistic_element" class="form-label">Stylistic Element I</label>
        <select class="form-control border" id="stylistic_element" name="stylistic_element" required>
            <option disabled   value="{{$artifact[0]["stylistic_element_1"]}}">{{$artifact[0]["stylistic_element_1"]}}</option>
            <option value="acanthus leaves">acanthus leaves</option>
            <option value="angular edge">angular edge</option>
            <option value="animal">animal</option>
            <option value="bamboo">bamboo</option>
            <option value="band">band</option>
            <option value="barley">barley</option>
            <option value="basket weave">basket weave</option>
            <option value="basketwork">basketwork</option>
            <option value="bead and reel">bead and reel</option>
            <option value="beaded band">beaded band</option>
            <option value="bird">bird</option>
            <option value="bird stylized">bird stylized</option>
            <option value="boat">boat</option>
            <option value="botanical band">botanical band</option>
            <option value="botanical composite">botanical composite</option>
            <option value="botanical sprig">botanical sprig</option>
            <option value="botanical">botanical</option>
            <option value="bridge">bridge</option>
            <option value="bulls eye">bulls eye</option>
            <option value="butterfly">butterfly</option>
            <option value="cable band">cable band</option>
            <option value="cartouche">cartouche</option>
            <option value="cats eye combed">cats eye combed</option>
            <option value="cats eye single">cats eye single</option>
            <option value="checkerboard band">checkerboard band</option>
            <option value="checkerboard/diamonds">checkerboard/diamonds</option>
            <option value="checkerboard/dot">checkerboard/dot</option>
            <option value="child">child</option>
            <option value="chinese characters">chinese characters</option>
            <option value="church christian">church christian</option>
            <option value="circle">circle</option>
            <option value="circle band">circle band</option>
            <option value="circle open">circle open</option>
            <option value="cloud band">cloud band</option>
            <option value="clouded">clouded</option>
            <option value="columns">columns</option>
            <option value="combed">combed</option>
            <option value="common cable">common cable</option>
            <option value="cord and hanging fern">cord and hanging fern</option>
            <option value="cord and herringbone">cord and herringbone</option>
            <option value="cordoned">cordoned</option>
            <option value="cordoned wavy">cordoned wavy</option>
            <option value="crab stock">crab stock</option>
            <option value="crenelated edge">crenelated edge</option>
            <option value="not applicable">not applicable</option>
            <option value="dart band">dart band</option>
            <option value="dash band">dash band</option>
            <option value="dendritic">dendritic</option>
            <option value="dentil band">dentil band</option>
            <option value="diamond band">diamond band</option>
            <option value="diaper/1 dot">diaper/1 dot</option>
            <option value="diaper/4 dot">diaper/4 dot</option>
            <option value="diaper/5 dot">diaper/5 dot</option>
            <option value="diaper/dot band">diaper/dot band</option>
            <option value="diaper/star">diaper/star</option>
            <option value="diced squares">diced squares</option>
            <option value="dogtooth band">dogtooth band</option>
            <option value="dot band">dot band</option>
            <option value="dot cluster">dot cluster</option>
            <option value="dot dash band">dot dash band</option>
            <option value="dot plume edge">dot plume edge</option>
            <option value="dots">dots</option>
            <option value="dotted/terraced rectangle">dotted/terraced rectangle</option>
            <option value="facet/panel">facet/panel</option>
            <option value="fanning">fanning</option>
            <option value="feather edge">feather edge</option>
            <option value="fence">fence</option>
            <option value="fish">fish</option>
            <option value="fish roe">fish roe</option>
            <option value="fish roe band">fish roe band</option>
            <option value="flag/banner">flag/banner</option>
            <option value="floral medallion">floral medallion</option>
            <option value="floral radiating bloom">floral radiating bloom</option>
            <option value="fluted">fluted</option>
            <option value="folded rim">folded rim</option>
            <option value="fruit">fruit</option>
            <option value="garland">garland</option>
            <option value="geometric band">geometric band</option>
            <option value="geometric circle">geometric circle</option>
            <option value="geometric column">geometric column</option>
            <option value="geometric">geometric</option>
            <option value="granulated band">granulated band</option>
            <option value="grass">grass</option>
            <option value="grass and leaves molded edge">grass and leaves molded edge</option>
            <option value="half-circle band">half-circle band</option>
            <option value="not applicable">not applicable</option>


        </select>
        <div class="invalid-feedback">
            Must select at least (1) stylish element.
        </div>
    </div><!--END COL-->


    <!--STYLISTIC ELEMENT NUMBER-->
    <div class="col-2">
        <label for="stylistic_element_number" class="form-label">Stylistic Element No.</label>
        <input type="number" value="{{$artifact[0]["stylistic_element_number"]}}" class="form-control border" id="stylistic_element_number" name="stylistic_element_number" min="1" max="60">
        <div class="invalid-feedback">
            Stylistic number must be at least (1) and less than (60).
        </div>
    </div><!--END COL-->


</div><!--END ROW-->