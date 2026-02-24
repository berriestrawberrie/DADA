<?php

namespace App\Http\Controllers;

use App\Models\TobaccoPipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TobaccoPipeController extends Controller
{
    //SAVE TOBACCO ARTIFACT
    public function saveTobaccoPipe(Request $request)
    {
        $token = uniqid();
        $user = Auth::user()->id;

        //PROCESS THE FILE 
        if ($request->has('photo')) {

            $file = $request->file('photo');
            $extension =  $file->getClientOriginalExtension();

            $path = 'uploads/pipes/';
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        } else {
            $filename = 'null.png';
        }

        //SAVE THE ARTIFACT TO THE DATABASE WITHOUT ARTIFACT ID
        TobaccoPipe::create([
            'collection' => $request->input('collection'),
            'collection_id' => $request->input('collection_id'),
            'entered_by' => $user,
            'status_code' => $request->input('status_code'),
            'accession' => $request->input('accession'),
            'completeness' => $request->input('completeness'),
            'artifact_count' => $request->input('artifact_count'),
            'non_plastic_inclu' => $request->input('non_plastic_inclu'),
            'material' => $request->input('material'),
            'manufacturing_technique' => $request->input('manufacturing_technique'),
            'glaze_type' => $request->input('glaze_type'),
            'paste_color' => $request->input('paste_color'),
            'bowl_base_type' => $request->input('bowl_base_type'),
            'mouthpiece_form' => $request->input('mouthpiece_form'),
            'glaze_color' => $request->input('glaze_color'),
            'maker' => $request->input('maker'),
            'post_manu_mod' => $request->input('post_manu_mod'),
            'conservation' => $request->input('conservation'),
            'mended' => $request->input('mended'),
            'manufact_location' => $request->input('manufact_location'),
            'conserved' => $request->input('conserved'),
            'motif_location' => $request->input('motif_location'),
            'decorative_motif' => $request->input('decorative_motif'),
            'mark_type' => $request->input('mark_type'),
            'motif_manu_method' => $request->input('motif_manu_method'),
            'text_location' => $request->input('text_location'),
            'text_frame_motif' => $request->input('text_frame_motif'),
            'mark_notes' => $request->input('mark_notes'),
            'slogan' => $request->input('slogan'),
            'bowl_volume' => $request->input('bowl_volume'),
            'stem_length' => $request->input('stem_length'),
            'exterior_stem_diameter' => $request->input('exterior_stem_diameter'),
            'bore_diameter' => $request->input('bore_diameter'),
            '64_bore_diameter' => $request->input('64_bore_diameter'),
            'bowl_height' => $request->input('bowl_height'),
            'max_bowl_diameter' => $request->input('max_bowl_diameter'),
            'bowl_rim_diameter' => $request->input('bowl_rim_diameter'),
            'weight' => $request->input('weight'),
            'max_sherd' => $request->input('max_sherd'),
            'has_photo' => $request->input('has_photo'),
            'photo' => $filename,
            'isValid' => 2,
            'token' => $token,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'Added By' => $request->input('added_by'),

        ]);

        return redirect(route('form.preview', ['token' => $token, 'user' => $user, 'artifact_type' => "pipe"]));
    } //END OF SAVE TOBACCO

    //SUBMIT THE TOBACCO PIPE FORM FOR VALIDATION
    public function submitTobaccoPipe(Request $request, $token)
    {
        //RETRIEVE THE RECORD
        $pipe = TobaccoPipe::where('token', $token)->get();

        //GENERATE THE ARTIFACT ID
        $digit_3 = str_pad($pipe[0]["id"], 3, '0', STR_PAD_LEFT);
        $acode = substr($request->input('status_code'), 0, 1);
        $artifact_id = '31MK' . $pipe[0]["collection_id"] .$acode .'-TP' . $digit_3;

        //PROCESS PHOTO SUBMISSION
        switch ($request->has_photo) {
            //USER KEEPS PHOTO
            case "1":
                //KEEP THE SAME PHOTO
                $filename = $pipe[0]["photo"];

                break;
            //USER REPLACES PHOTO
            case "2":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($pipe[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/pipes/' . $pipe[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                //UPLOAD THE NEW PHOTO
                $file = $request->file('photo');
                $extension =  $file->getClientOriginalExtension();
                $path = 'uploads/pipes/';
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);

                break;
            //USER REMOVES PHOTO
            case "0":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($pipe[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/pipes/' . $pipe[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                $filename = 'null.png';

                break;
            default:
                return back()->with('error', 'Issue processing photo submission');
        } //END OF SWITCH

    

        //REASSIGN THE pipe PROPRETIES TO THE INPUTS
        TobaccoPipe::where('token', $token)
            ->update([
                'completeness' => $request->input('completeness'),
                'artifact_count' => $request->input('artifact_count'),
                'non_plastic_inclu' => $request->input('non_plastic_inclu'),
                'status_code' => $request->input('status_code'),
                'accession' => $request->input('accession'),
                'material' => $request->input('material'),
                'manufacturing_technique' => $request->input('manufacturing_technique'),
                'glaze_type' => $request->input('glaze_type'),
                'paste_color' => $request->input('paste_color'),
                'bowl_base_type' => $request->input('bowl_base_type'),
                'mouthpiece_form' => $request->input('mouthpiece_form'),
                'glaze_color' => $request->input('glaze_color'),
                'maker' => $request->input('maker'),
                'artifact_id' => $artifact_id,
                'post_manu_mod' => $request->input('post_manu_mod'),
                'conservation' => $request->input('conservation'),
                'mended' => $request->input('mended'),
                'manufact_location' => $request->input('manufact_location'),
                'conserved' => $request->input('conserved'),
                'motif_location' => $request->input('motif_location'),
                'decorative_motif' => $request->input('decorative_motif'),
                'mark_type' => $request->input('mark_type'),
                'motif_manu_method' => $request->input('motif_manu_method'),
                'text_location' => $request->input('text_location'),
                'text_frame_motif' => $request->input('text_frame_motif'),
                'mark_notes' => $request->input('mark_notes'),
                'slogan' => $request->input('slogan'),
                'bowl_volume' => $request->input('bowl_volume'),
                'stem_length' => $request->input('stem_length'),
                'exterior_stem_diameter' => $request->input('exterior_stem_diameter'),
                'bore_diameter' => $request->input('bore_diameter'),
                '64_bore_diameter' => $request->input('64_bore_diameter'),
                'bowl_height' => $request->input('bowl_height'),
                'max_bowl_diameter' => $request->input('max_bowl_diameter'),
                'bowl_rim_diameter' => $request->input('bowl_rim_diameter'),
                'weight' => $request->input('weight'),
                'max_sherd' => $request->input('max_sherd'),
                'has_photo' => $request->input('has_photo'),
                'photo' => $filename,
                'isValid' => 0,
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),

            ]);

        return redirect(route('home'))
            ->with("success", "Successfully submitted tobacco pipe artifact for validation");
    } //END OF SUBMIT pipe

    //PROCESS THE TOBACCO PIPE PUBLISH FORM 
    public function validateTobaccoPipe(Request $request, $artifact_id)
    {

        $pipe = TobaccoPipe::where('artifact_id', $artifact_id)->get();

        //VERIFY IT'S BEING SUBMITTED BY USER THAT CHECKEDOUT & STATUS IS READY FOR VALIDATION
        if (Auth::user()->id != $pipe[0]["checkout_by"] || $pipe[0]["isValid"] != 0) {

            return redirect(route('home'))
                ->with("verify.data", "Artifact checked out by another user you cannot validate it.");
        }

        //PROCESS PHOTO SUBMISSION
        switch ($request->has_photo) {
            //USER KEEPS PHOTO
            case "1":
                //KEEP THE SAME PHOTO
                $filename = $pipe[0]["photo"];

                break;
            //USER REPLACES PHOTO
            case "2":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($pipe[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/pipes/' . $pipe[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                //UPLOAD THE NEW PHOTO
                $file = $request->file('photo');
                $extension =  $file->getClientOriginalExtension();
                $path = 'uploads/pipes/';
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);

                break;
            //USER REMOVES PHOTO
            case "0":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($pipe[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/pipes/' . $pipe[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                $filename = 'null.png';

                break;
            default:
                return back()->with('error', 'Issue processing photo submission');
        } //END OF SWITCH


        //REASSIGN THE pipe PROPRETIES TO THE INPUTS
        TobaccoPipe::where('artifact_id', $artifact_id)
            ->update([
                'completeness' => $request->input('completeness'),
                'artifact_count' => $request->input('artifact_count'),
                'non_plastic_inclu' => $request->input('non_plastic_inclu'),
                'material' => $request->input('material'),
                'manufacturing_technique' => $request->input('manufacturing_technique'),
                'glaze_type' => $request->input('glaze_type'),
                'paste_color' => $request->input('paste_color'),
                'bowl_base_type' => $request->input('bowl_base_type'),
                'mouthpiece_form' => $request->input('mouthpiece_form'),
                'glaze_color' => $request->input('glaze_color'),
                'maker' => $request->input('maker'),
                'artifact_id' => $artifact_id,
                'post_manu_mod' => $request->input('post_manu_mod'),
                'conservation' => $request->input('conservation'),
                'mended' => $request->input('mended'),
                'manufact_location' => $request->input('manufact_location'),
                'conserved' => $request->input('conserved'),
                'motif_location' => $request->input('motif_location'),
                'decorative_motif' => $request->input('decorative_motif'),
                'mark_type' => $request->input('mark_type'),
                'motif_manu_method' => $request->input('motif_manu_method'),
                'text_location' => $request->input('text_location'),
                'text_frame_motif' => $request->input('text_frame_motif'),
                'mark_notes' => $request->input('mark_notes'),
                'slogan' => $request->input('slogan'),
                'bowl_volume' => $request->input('bowl_volume'),
                'stem_length' => $request->input('stem_length'),
                'exterior_stem_diameter' => $request->input('exterior_stem_diameter'),
                'bore_diameter' => $request->input('bore_diameter'),
                '64_bore_diameter' => $request->input('64_bore_diameter'),
                'bowl_height' => $request->input('bowl_height'),
                'max_bowl_diameter' => $request->input('max_bowl_diameter'),
                'bowl_rim_diameter' => $request->input('bowl_rim_diameter'),
                'weight' => $request->input('weight'),
                'max_sherd' => $request->input('max_sherd'),
                'has_photo' => $request->input('has_photo'),
                'photo' => $filename,
                'isValid' => 1,
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'checkout_by' => null,
            ]);


        return redirect(route('verify.data'))
            ->with("success", "Tobacco pipe validated and published");
    } //END OF VALIDATE FUNCTION

}
