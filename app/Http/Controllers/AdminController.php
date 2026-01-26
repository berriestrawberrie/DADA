<?php

namespace App\Http\Controllers;

use App\Models\Bead;
use App\Models\Buckle;
use App\Models\Button;
use App\Models\Ceramic;
use App\Models\Collection;
use App\Models\Glass;
use App\Models\TobaccoPipe;
use App\Models\Utensil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //GET THE ADMIN DASHBOARD
    public function adminDashboard()
    {
        $allceramics = Ceramic::count();
        $unvalid_ceramics = Ceramic::where('isValid', 0)->count();
        $valid_ceramics = Ceramic::where('isValid', 1)->count();


        return view('admin.dashboard', compact('allceramics', 'unvalid_ceramics', 'valid_ceramics'));
    }

    //GET THE MANAGE COLLECTIONS PAGE
    public function collections()
    {
        $collections = Collection::orderByDesc('id')->get();
        return view('admin.addcollection', compact('collections'));
    }

    //ADD A NEW COLLECTION
    public function collectionsPost(Request $request)
    {
        //VERIFY THAT THE COLLECTION ID IS UNIQUE
        $exists = Collection::where('collection_id', $request->collection_id)->exists();
        if($exists){
            return back()->with('error', 'Collection not created: Collection ID# already exists');
        }
        //USE THE MODEL TO BUILD NEW DATA ENTRY
        $addCollection = new Collection([
            'collection' => $request->title,
            'curator' => $request->curator,
            'collection_desc' => $request->text,
            'isPublic' => $request->isPublic,
            'collection_id' => $request->collection_id,
        ]);
        //SAVE TO DATABASE
        $addCollection->save();


        return redirect(route('collections'))
            ->with("success", "Successfully added collection");
    }

    //NAVIGATE TO UPDATE PAGE BASED ON SELECTION
    public function collectionsUpdate(Request $request)
    {
        $collection = Collection::where('id', $request->selected)->get();

        return view('admin.updatecollection', compact('collection'));
    }

    //NAVIGATE TO UPDATE PAGE BASED ON SELECTION
    public function reUpdate($id)
    {
        $collection = Collection::where('id', $id)->get();

        return view('admin.updatecollection', compact('collection'));
    }



    public function pushUpdate(Request $request)
    {

        //CHECK IF ANYTHING WAS ENTERED
        if ($request->curator || $request->title || $request->text) {
            //IF CURATOR ENTERED UPDATE ONLY DESCRIPTION
            if ($request->curator) {
                Collection::where('id', $request->id)
                    ->update([
                        'curator' => $request->curator
                    ]);
            }
            //IF DESCRIPTION ENTERED UPDATE ONLY DESCRIPTION
            if ($request->text) {
                Collection::where('id', $request->id)
                    ->update([
                        'collection_desc' => $request->text
                    ]);
            }
            //IF TITLE ENTERED UPDATE ONLY TITLE
            if ($request->title) {
                Collection::where('id', $request->id)
                    ->update([
                        'collection' => $request->title
                    ]);
            }
            return redirect()->route('return.update', ['id' => $request->id])
                ->with("success", "You have successfully updated the collection");
        } else {
            return redirect()->route('return.update', ['id' => $request->id])
                ->with("error", "You must enter data to update");
        }
    } //END PUSH FUNCTION


    public function verifyData()
    {
        //REQUIRED PULL TO POPULATE CHECKOUT TABLE
        $ceramics = Ceramic::where('isValid', 0)->get();
        $beads = Bead::where('isValid', 0)->get();
        $buckles = Buckle::where('isValid', 0)->get();
        $buttons = Button::where('isValid', 0)->get();
        $glasses = Glass::where('isValid', 0)->get();
        $utensils = Utensil::where('isValid', 0)->get();
        $pipes = TobaccoPipe::where('isValid', 0)->get();

        $unassigned_ceramics = Ceramic::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_beads = Bead::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_buckles = Buckle::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_buttons = Button::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_glasses = Glass::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_utensils = Utensil::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        $unassigned_pipes = TobaccoPipe::where('isValid', 0)
            ->where('checkout_by', null)
            ->get();
        return view(
            'admin.verifydata',
            compact(
                'ceramics',
                'beads',
                'buckles',
                'buttons',
                'glasses',
                'utensils',
                'pipes',
                'unassigned_ceramics',
                'unassigned_buckles',
                'unassigned_beads',
                'unassigned_buttons',
                'unassigned_glasses',
                'unassigned_utensils',
                'unassigned_pipes'
            )
        );
    }

    public function checkoutData(Request $request)
    {
        //GET THE USER INPUT
        $user = Auth::user()->id;
        $ceramics = intval($request->ceramics);
        $beads =  intval($request->beads);
        $buckles =  intval($request->buckles);
        $buttons =  intval($request->buttons);
        $glasses = intval($request->glasses);
        $utensils = intval($request->utensils);
        $pipes = intval($request->pipes);

        //$bones = intval($request->bones);

        //PULL THE RECORDS REQUESTED
        $assign_ceramics = Ceramic::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($ceramics)->get();
        $assign_beads = Bead::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($beads)->get();
        $assign_buckles = Buckle::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($buckles)->get();
        $assign_buttons = Button::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($buttons)->get();
        $assign_glasses = Glass::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($glasses)->get();
        $assign_utensils = Utensil::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($utensils)->get();
        $assign_pipes = TobaccoPipe::where('isValid', 0)
            ->where('checkout_by', null)
            ->take($pipes)->get();

        //ASSIGN TO THE USER
        foreach ($assign_ceramics as $item) {

            Ceramic::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_beads as $item) {

            Bead::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_buckles as $item) {

            Buckle::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_buttons as $item) {

            Button::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_glasses as $item) {

            Glass::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_utensils as $item) {

            Utensil::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH
        foreach ($assign_pipes as $item) {

            TobaccoPipe::where('id', $item->id)->update([
                'checkout_by' => $user
            ]);
        } //END OF FOREACH


        return redirect()->route('verify.data')
            ->with("success", "Successfully checked out records");
    }

    public function releaseData(Request $request)
    {

        $user = Auth::user()->id;
        $ceramic = $request->input('release_ceramic');
        $bead = $request->input('release_bead');
        $buckle = $request->input('release_buckle');
        $button = $request->input('release_button');
        $glass = $request->input('release_glass');
        $utensil = $request->input('release_utensil');
        $pipe = $request->input('release_pipe');

        //CERAMICS
        if ($ceramic) {
            Ceramic::where('id', $ceramic)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released Ceramic #:" . $ceramic);
        } //END CERAMIC IF


        //BEADS
        if ($bead) {
            Bead::where('id', $bead)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released bead #:" . $bead);
        } //END BEAD IF

        //BUCKLES
        if ($buckle) {
            Buckle::where('id', $buckle)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released buckle #:" . $buckle);
        } //END BUCKLE IF

        //BUTTON
        if ($button) {
            Button::where('id', $button)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released button #:" . $button);
        } //END BUCKLE IF

        //GLASS
        if ($glass) {
            Glass::where('id', $glass)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released glass #:" . $glass);
        } //END BUCKLE IF

        //UTENSIL
        if ($utensil) {
            utensil::where('id', $utensil)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released utensil #:" . $utensil);
        } //END BUCKLE IF

        //TOBACCO PIPE
        if ($pipe) {
            TobaccoPipe::where('id', $pipe)
                ->where('checkout_by', $user)
                ->update([
                    'checkout_by' =>
                    null
                ]);
            return redirect()->route('verify.data')
                ->with("success", "Successfully released pipe #:" . $pipe);
        } //END BUCKLE IF

        return redirect()->route('verify.data')
            ->with("error", "Failed to release. Artifact type not found.");
    }

    public function reviewData($user, $artifact_type, $id)
    {
        //DEFINE THE ARTIFACT TYPE FIRST
        switch ($artifact_type) {
            case "ceramic":
                $artifact = Ceramic::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE CERAMIC REIVEW FORM
                    return view('forms.verify.verifyceramic', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;

            case "bead":
                $artifact = Bead::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE BEAD REIVEW FORM
                    return view('forms.verify.verifybead', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            case "buckle":
                $artifact = Buckle::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE BEAD REIVEW FORM
                    return view('forms.verify.verifybuckle', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            case "button":
                $artifact = Button::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE BUTTON REIVEW FORM
                    return view('forms.verify.verifybutton', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            case "glass":
                $artifact = Glass::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE GLASS REIVEW FORM
                    return view('forms.verify.verifyglass', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            case "utensil":
                $artifact = Utensil::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE UTENSIL REIVEW FORM
                    return view('forms.verify.verifyutensil', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            case "pipe":
                $artifact = TobaccoPipe::where('id', $id)->get();
                //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                if ($artifact[0]["checkout_by"] == $user) {
                    //RETURN THE TOBACCO PIPE REIVEW FORM
                    return view('forms.verify.verifypipe', compact('artifact'));
                } else {

                    //CHANGE ERROR MESSAGE IF RECORD IS NOT YET CHECKED OUT
                    if ($artifact[0]["checkout_by"]) {
                        return redirect()->route('verify.data')
                            ->with("error", "Record is already being reviewed by User #: " . $artifact[0]["checkout_by"]);
                    } else {
                        return redirect()->route('verify.data')
                            ->with("error", "Record needs to be checked out before you can review it");
                    }
                } //VERIFY THAT THE USER REVIEWING IS THE USER THAT CHECKED IT OUT
                break;
            default:
                return back()->with('error', "Artifact type not found in AdminController");
        }
    } //END OF REVIEW DATA

}
