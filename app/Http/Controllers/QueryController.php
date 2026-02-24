<?php

namespace App\Http\Controllers;

use App\Exports\QueryExports;
use App\Exports\UserExports;
use App\Models\Ceramic;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class QueryController extends Controller
{
    //
    public function getQueryCollection()
    {
        $collections = Collection::all();
        return view('queries.collections', compact('collections'));
    }

    //EXPORT DATA
    public function export()
    {
        return Excel::download(new UserExports, 'users.xls');
    }
    //EXPORT QUERY DATA
    public function exportQuery($table,$collection_id, $start, $end)
    {

        return (new QueryExports($table,$collection_id, $start, $end))
            ->download('query.xlsx');
    }


    //RETURN DATA
    public function queryCollection(Request $request)
    {

        //VARIABLES PASSING ON TO THE VIEW:
        $collection_id = $request->input('collection_id');
        //HANDLE CASES WHEN DATES LEFT EMPTY
        if ($request->input('start_date')) {
            $start = $request->input('start_date');
        } else {
            $start = 1500;
        }
        if ($request->input('end_date')) {
            $end = $request->input('end_date');
        } else {
            $end = 1900;
        }
        //DETERMINE WHICH PHOTOS TO INCLUDE
        if (intval($request->input('has_photo')) === 0) {
            $photostart = 0;
            $photoend = 0;
        } elseif (intval($request->input('has_photo')) === 1) {
            $photostart = 1;
            $photoend = 2;
        } else {
            $photostart = 0;
            $photoend = 2;
        }

        //SET THE FIRST TABLE SEARCHED TO FIRST ARTIFACT TYPE SELECTED
        $table0 = $request->input('artifact_type') . '_tables';
                
        $merge = DB::table($table0)
                    ->select(DB::raw("$table0.material, 
                    $table0.collection_id,
                    $table0.artifact_id,
                    $table0.collection,
                    $table0.manufacturing_technique,
                    $table0.start_date,
                    $table0.end_date,
                    $table0.photo,
                    $table0.has_photo"))
                    ->where("$table0.collection_id", $collection_id)
                    ->whereBetween('start_date', [$start, $end])
                ->whereBetween('has_photo', [$photostart, $photoend]);



        //RETURN BASED ON PAGINATION LIMIT
        if ($request->input('perpage') == "10") {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->paginate(10)
                ->withQueryString();
        } elseif ($request->input('perpage') == "50") {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->paginate(50)
                ->withQueryString();
        } else {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->paginate(500)
                ->withQueryString();
        }



        return view('results.resultscollection', compact('datas', 'start', 'end','table0', 'collection_id'));
    }


    public function getQueryArtifact()
    {
        $collections = Collection::all();
        return view('queries.artifact', compact('collections'));
    }
}
