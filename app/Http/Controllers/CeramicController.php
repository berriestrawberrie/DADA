<?php

namespace App\Http\Controllers;

use App\Models\Ceramic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CeramicController extends Controller
{
    //

    //PROCESS THE CERAMIC FORM
    public function saveCeramic(Request $request)
    {
        $token = uniqid();
        $user = Auth::user()->id;

        //PROCESS THE FILE 
        if ($request->has('photo')) {

            $file = $request->file('photo');
            $extension =  $file->getClientOriginalExtension();

            $path = 'uploads/ceramics/';
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        } else {
            $filename = 'null.png';
        }

        //SAVE THE ARTIFACT TO THE DATABASE WITHOUT ARTIFACT ID
        Ceramic::create([
            'created_at' => $request->created_at,
            'entered_by' => $user,
            'status_code' => $request->status_code,
            'accession' => $request->accession,
            'artifact_count' => $request->artifact_count,
            'token' => $token,
            'collection' => $request->collection,
            'collection_id' => $request->collection_id,
            'start_date' => intval($request->start_date),
            'end_date' => intval($request->end_date),
            'material' => $request->material,
            'manufacturing_technique' => $request->manufacturing_technique,
            'ware' => $request->ware,
            'vessel_category' => $request->vessel_category,
            'form' => $request->form,
            'mended_form' => $request->mended_form,
            'completeness' => $request->completeness,
            'paste_color' => $request->paste_color,
            'exterior_surface' => $request->exterior_surface,
            'exterior_color' => $request->exterior_color,
            'interior_surface' => $request->interior_surface,
            'interior_color' => $request->interior_color,
            'oxidized_vs_reduced_fabric' => $request->oxidized_vs_reduced_fabric,
            'evidence_of_burning' => $request->evidence_of_burning,
            'mended' => $request->mended,
            'post_manufacturing_mod' => $request->post_manufacturing_mod,
            'Added By' => $request->added_by,
            'notes' => $request->notes,
            'interior_exterior' => $request->interior_exterior,
            'location' => $request->location,
            'decorative_technique' => $request->decorative_technique,
            'decoration_color' => $request->decoration_color,
            'stylistic_element' => $request->stylistic_element,
            'stylistic_element_number' => $request->stylistic_element_number,
            'motif' => $request->motif,
            'pattern_name' => $request->pattern_name,
            'pattern_notes' => $request->pattern_notes,
            'pattern_reference' => $request->pattern_reference,
            'genre' => $request->genre,
            'base_mark' => $request->base_mark,
            'base_mark_ref' => $request->base_mark_ref,
            'base_mark_color' => $request->base_mark_color,
            'colonoware' => $request->colonoware,
            'colono_rim_form' => $request->colono_rim_form,
            'colono_rim_angle' => $request->colono_rim_angle,
            'max_rim_width' => $request->max_rim_width,
            'colono_decoration_mode' => $request->colono_decoration_mode,
            'colono_base_form' => $request->colono_base_form,
            'colono_footring_form' => $request->colono_footring_form,
            'non_plastic_paste_inclusions' => $request->non_plastic_paste_inclusions,
            'total_paste_inclusion_density' => $request->total_paste_inclusion_density,
            'wear_location' => $request->wear_location,
            'ceramic_completeness' => $request->ceramic_completeness,
            'wear_pattern' => $request->wear_pattern,
            'sherd_thickness' => $request->sherd_thickness,
            'max_sherd_measurement' => $request->max_sherd_measurement,
            'sherd_weight' => $request->sherd_weight,
            'mended_sherd_weight' => $request->mended_sherd_weight,
            'rim_length' => $request->rim_length,
            'rim_diameter' => $request->rim_diameter,
            'mended_rim_diameter' => $request->mended_rim_diameter,
            'base_length' => $request->base_length,
            'base_diameter' => $request->base_diameter,
            'mended_base_diameter' => $request->mended_base_diameter,
            'has_photo' => $request->has_photo,
            'photo' => $filename,
        ]);

        return redirect(route('form.preview', ['token' => $token, 'user' => $user, 'artifact_type' => "ceramic"]));
    } //END OF SAVE CERAMIC

    //PROCESS THE CERAMIC PUBLISH FORM 
    public function submitCeramic(Request $request, $token)
    {
        $ceramic = Ceramic::where('token', $token)->get();

        //GENERATE THE ARTIFACT ID
        $digit_3 = str_pad($ceramic[0]["id"], 3, '0', STR_PAD_LEFT);
        $artifact_id = '31DV' . $ceramic[0]["collection_id"] . 'CE' . $digit_3;

        //PROCESS PHOTO SUBMISSION
        switch ($request->has_photo) {
            //USER KEEPS PHOTO
            case "1":
                //KEEP THE SAME PHOTO
                $filename = $ceramic[0]["photo"];

                break;
            //USER REPLACES PHOTO
            case "2":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($ceramic[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/ceramics/' . $ceramic[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                //UPLOAD THE NEW PHOTO
                $file = $request->file('photo');
                $extension =  $file->getClientOriginalExtension();
                $path = 'uploads/ceramics/';
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);

                break;
            //USER REMOVES PHOTO
            case "0":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($ceramic[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/ceramics/' . $ceramic[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                $filename = 'null.png';

                break;
            default:
                return back()->with('error', 'Issue processing photo submission');
        } //END OF SWITCH


        //REASSIGN THE CERAMIC PROPRETIES TO THE INPUTS
        Ceramic::where('token', $token)
            ->update([
                'created_at' => $request->created_at,
                'artifact_count' => $request->artifact_count,
                'artifact_id' => $artifact_id,
                'status_code' => $request->status_code,
                'accession' => $request->accession,
                'isValid' => 0,
                'collection' => $request->collection,
                'material' => $request->material,
                'manufacturing_technique' => $request->manufacturing_technique,
                'ware' => $request->ware,
                'vessel_category' => $request->vessel_category,
                'form' => $request->form,
                'mended_form' => $request->mended_form,
                'completeness' => $request->completeness,
                'paste_color' => $request->paste_color,
                'exterior_surface' => $request->exterior_surface,
                'exterior_color' => $request->exterior_color,
                'interior_surface' => $request->interior_surface,
                'interior_color' => $request->interior_color,
                'oxidized_vs_reduced_fabric' => $request->oxidized_vs_reduced_fabric,
                'evidence_of_burning' => $request->evidence_of_burning,
                'mended' => $request->mended,
                'post_manufacturing_mod' => $request->post_manufacturing_mod,
                'Added By' => $request->entered_by,
                'changed_by' => $request->changed_by,
                'change_date' => $request->change_date,
                'notes' => $request->notes,
                'interior_exterior' => $request->interior_exterior,
                'location' => $request->location,
                'decorative_technique' => $request->decorative_technique,
                'decoration_color' => $request->decoration_color,
                'stylistic_element' => $request->stylistic_element,
                'stylistic_element_number' => $request->stylistic_element_number,
                'motif' => $request->motif,
                'pattern_name' => $request->pattern_name,
                'pattern_notes' => $request->pattern_notes,
                'pattern_reference' => $request->pattern_reference,
                'genre' => $request->genre,
                'base_mark' => $request->base_mark,
                'base_mark_ref' => $request->base_mark_ref,
                'base_mark_color' => $request->base_mark_color,
                'colonoware' => $request->colonoware,
                'colono_rim_form' => $request->colono_rim_form,
                'colono_rim_angle' => $request->colono_rim_angle,
                'max_rim_width' => $request->max_rim_width,
                'colono_decoration_mode' => $request->colono_decoration_mode,
                'colono_base_form' => $request->colono_base_form,
                'colono_footring_form' => $request->colono_footring_form,
                'non_plastic_paste_inclusions' => $request->non_plastic_paste_inclusions,
                'total_paste_inclusion_density' => $request->total_paste_inclusion_density,
                'wear_location' => $request->wear_location,
                'ceramic_completeness' => $request->ceramic_completeness,
                'wear_pattern' => $request->wear_pattern,
                'sherd_thickness' => $request->sherd_thickness,
                'max_sherd_measurement' => $request->max_sherd_measurement,
                'sherd_weight' => $request->sherd_weight,
                'mended_sherd_weight' => $request->mended_sherd_weight,
                'rim_length' => $request->rim_length,
                'rim_diameter' => $request->rim_diameter,
                'mended_rim_diameter' => $request->mended_rim_diameter,
                'base_length' => $request->base_length,
                'base_diameter' => $request->base_diameter,
                'mended_base_diameter' => $request->mended_base_diameter,
                'has_photo' => intval($request->has_photo),
                'photo' => $filename,
                'checkout_by' => Null,

            ]);

        return redirect(route('home'))
            ->with("success", "Successfully submitted ceramic artifact for validation");
    } //END OF SUBMIT FUNCTION


    //PROCESS THE CERAMIC PUBLISH FORM 
    public function validateCeramic(Request $request, $artifact_id)
    {

        $ceramic = Ceramic::where('artifact_id', $artifact_id)->get();

        //VERIFY IT'S BEING SUBMITTED BY USER THAT CHECKEDOUT & STATUS IS READY FOR VALIDATION
        if (Auth::user()->id != $ceramic[0]["checkout_by"] || $ceramic[0]["isValid"] != 0) {

            return redirect(route('home'))
                ->with("verify.data", "Artifact checked out by another user you cannot validate it.");
        }

        //PROCESS PHOTO SUBMISSION
        switch ($request->has_photo) {
            //USER KEEPS PHOTO
            case "1":
                //KEEP THE SAME PHOTO
                $filename = $ceramic[0]["photo"];

                break;
            //USER REPLACES PHOTO
            case "2":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($ceramic[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/ceramics/' . $ceramic[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                //UPLOAD THE NEW PHOTO
                $file = $request->file('photo');
                $extension =  $file->getClientOriginalExtension();
                $path = 'uploads/ceramics/';
                $filename = time() . '.' . $extension;
                $file->move($path, $filename);

                break;
            //USER REMOVES PHOTO
            case "0":
                //CHECK THAT THE PHOTO ISN'T PLACEHOLDER
                if ($ceramic[0]["photo"] != "null.png") {
                    //DELETE THE OLD PHOTO
                    $image = public_path('uploads/ceramics/' . $ceramic[0]["photo"]);
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                $filename = 'null.png';

                break;
            default:
                return back()->with('error', 'Issue processing photo submission');
        } //END OF SWITCH


        //REASSIGN THE CERAMIC PROPRETIES TO THE INPUTS
        Ceramic::where('artifact_id', $artifact_id)
            ->update([
                'created_at' => $request->created_at,
                'artifact_count' => $request->artifact_count,
                'isValid' => 1,
                'material' => $request->material,
                'status_code' => $request->status_code,
                'accession' => $request->accession,
                'manufacturing_technique' => $request->manufacturing_technique,
                'ware' => $request->ware,
                'vessel_category' => $request->vessel_category,
                'form' => $request->form,
                'mended_form' => $request->mended_form,
                'completeness' => $request->completeness,
                'paste_color' => $request->paste_color,
                'exterior_surface' => $request->exterior_surface,
                'exterior_color' => $request->exterior_color,
                'interior_surface' => $request->interior_surface,
                'interior_color' => $request->interior_color,
                'oxidized_vs_reduced_fabric' => $request->oxidized_vs_reduced_fabric,
                'evidence_of_burning' => $request->evidence_of_burning,
                'mended' => $request->mended,
                'post_manufacturing_mod' => $request->post_manufacturing_mod,
                'Added By' => $request->entered_by,
                'changed_by' => $request->changed_by,
                'change_date' => $request->change_date,
                'notes' => $request->notes,
                'interior_exterior' => $request->interior_exterior,
                'location' => $request->location,
                'decorative_technique' => $request->decorative_technique,
                'decoration_color' => $request->decoration_color,
                'stylistic_element' => $request->stylistic_element,
                'stylistic_element_number' => $request->stylistic_element_number,
                'motif' => $request->motif,
                'pattern_name' => $request->pattern_name,
                'pattern_notes' => $request->pattern_notes,
                'pattern_reference' => $request->pattern_reference,
                'genre' => $request->genre,
                'base_mark' => $request->base_mark,
                'base_mark_ref' => $request->base_mark_ref,
                'base_mark_color' => $request->base_mark_color,
                'colonoware' => $request->colonoware,
                'colono_rim_form' => $request->colono_rim_form,
                'colono_rim_angle' => $request->colono_rim_angle,
                'max_rim_width' => $request->max_rim_width,
                'colono_decoration_mode' => $request->colono_decoration_mode,
                'colono_base_form' => $request->colono_base_form,
                'colono_footring_form' => $request->colono_footring_form,
                'non_plastic_paste_inclusions' => $request->non_plastic_paste_inclusions,
                'total_paste_inclusion_density' => $request->total_paste_inclusion_density,
                'wear_location' => $request->wear_location,
                'ceramic_completeness' => $request->ceramic_completeness,
                'wear_pattern' => $request->wear_pattern,
                'sherd_thickness' => $request->sherd_thickness,
                'max_sherd_measurement' => $request->max_sherd_measurement,
                'sherd_weight' => $request->sherd_weight,
                'mended_sherd_weight' => $request->mended_sherd_weight,
                'rim_length' => $request->rim_length,
                'rim_diameter' => $request->rim_diameter,
                'mended_rim_diameter' => $request->mended_rim_diameter,
                'base_length' => $request->base_length,
                'base_diameter' => $request->base_diameter,
                'mended_base_diameter' => $request->mended_base_diameter,
                'has_photo' => $request->has_photo,
                'photo' => $filename,
                'checkout_by' => Null,

            ]);


        return redirect(route('verify.data'))
            ->with("success", "Ceramic validated and published");
    } //END OF VALIDATE FUNCTION

}
