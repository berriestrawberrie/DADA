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
    public function exportQuery($collection_id, $start, $end)
    {

        return (new QueryExports($collection_id, $start, $end))
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

        /*CLEAR NULL FROM ARTIFACT TYPES
        $artifact_types = array_filter($request->artifact_types);
        //SET THE FIRST TABLE SEARCHED TO FIRST ARTIFACT TYPE SELECTED
        $table0 = $artifact_types[0] . '_tables';


        UNION BASED ON ARTIFACT SELECTION LENGHTS.
        switch (count($artifact_types)) {
            case 1:
                $table0 = $artifact_types[0] . '_tables';
                $merge = DB::table($table0)
                    ->select(DB::raw("$table0.material, 
                    $table0.collection_id,
                    $table0.artifact_id,
                    $table0.collection,
                    $table0.manufacturing_technique,
                    $table0.start_date,
                    $table0.end_date,
                    $table0.photo,
                    $table0.has_photo"));
                break;
            case 2:
                $table1 = $artifact_types[1] . '_tables';
                $data1 = DB::table($table1)
                    ->select(DB::raw(
                        "$table1.material, 
                    $table1.collection_id,
                    $table1.artifact_id,
                    $table1.collection,
                    $table1.manufacturing_technique,
                    $table1.start_date,
                    $table1.end_date,
                    $table1.photo,
                    $table1.has_photo"
                    ));
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
                    ->unionAll($data1);
                break;
            case 3:
                $table1 = $artifact_types[1] . '_tables';
                $data1 = DB::table($table1)
                    ->select(DB::raw(
                        "$table1.material, 
                    $table1.collection_id,
                    $table1.artifact_id,
                    $table1.collection,
                    $table1.manufacturing_technique,
                    $table1.start_date,
                    $table1.end_date,
                    $table1.photo,
                    $table1.has_photo"
                    ));
                $table2 = $artifact_types[2] . '_tables';
                $data2 = DB::table($table2)
                    ->select(DB::raw(
                        "$table2.material, 
                    $table2.collection_id,
                    $table2.artifact_id,
                    $table2.collection,
                    $table2.manufacturing_technique,
                    $table2.start_date,
                    $table2.end_date,
                    $table2.photo,
                    $table2.has_photo"
                    ));
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
                    ->unionAll($data1)
                    ->unionAll($data2);
                break;
            case 4:
                $table1 = $artifact_types[1] . '_tables';
                $data1 = DB::table($table1)
                    ->select(DB::raw(
                        "$table1.material, 
                    $table1.collection_id,
                    $table1.artifact_id,
                    $table1.collection,
                    $table1.manufacturing_technique,
                    $table1.start_date,
                    $table1.end_date,
                    $table1.photo,
                    $table1.has_photo"
                    ));
                $table2 = $artifact_types[2] . '_tables';
                $data2 = DB::table($table2)
                    ->select(DB::raw(
                        "$table2.material, 
                    $table2.collection_id,
                    $table2.artifact_id,
                    $table2.collection,
                    $table2.manufacturing_technique,
                    $table2.start_date,
                    $table2.end_date,
                    $table2.photo,
                    $table2.has_photo"
                    ));
                $table3 = $artifact_types[3] . '_tables';
                $data3 = DB::table($table3)
                    ->select(DB::raw(
                        "$table3.material, 
                    $table3.collection_id,
                    $table3.artifact_id,
                    $table3.collection,
                    $table3.manufacturing_technique,
                    $table3.start_date,
                    $table3.end_date,
                    $table3.photo,
                    $table3.has_photo"
                    ));
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
                    ->unionAll($data1)
                    ->unionAll($data2)
                    ->unionAll($data3);
                break;
            case 5:
                $table1 = $artifact_types[1] . '_tables';
                $data1 = DB::table($table1)
                    ->select(DB::raw(
                        "$table1.material, 
                    $table1.collection_id,
                    $table1.artifact_id,
                    $table1.collection,
                    $table1.manufacturing_technique,
                    $table1.start_date,
                    $table1.end_date,
                    $table1.photo,
                    $table1.has_photo"
                    ));
                $table2 = $artifact_types[2] . '_tables';
                $data2 = DB::table($table2)
                    ->select(DB::raw(
                        "$table2.material, 
                    $table2.collection_id,
                    $table2.artifact_id,
                    $table2.collection,
                    $table2.manufacturing_technique,
                    $table2.start_date,
                    $table2.end_date,
                    $table2.photo,
                    $table2.has_photo"
                    ));
                $table3 = $artifact_types[3] . '_tables';
                $data3 = DB::table($table3)
                    ->select(DB::raw(
                        "$table3.material, 
                    $table3.collection_id,
                    $table3.artifact_id,
                    $table3.collection,
                    $table3.manufacturing_technique,
                    $table3.start_date,
                    $table3.end_date,
                    $table3.photo,
                    $table3.has_photo"
                    ));
                $table4 = $artifact_types[4] . '_tables';
                $data4 = DB::table($table4)
                    ->select(DB::raw(
                        "$table4.material, 
                    $table4.collection_id,
                    $table4.artifact_id,
                    $table4.collection,
                    $table4.manufacturing_technique,
                    $table4.start_date,
                    $table4.end_date,
                    $table4.photo,
                    $table4.has_photo"
                    ));
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
                    ->unionAll($data1)
                    ->unionAll($data2)
                    ->unionAll($data3)
                    ->unionAll($data4);
                break;
            case 6:
                $table1 = $artifact_types[1] . '_tables';
                $data1 = DB::table($table1)
                    ->select(DB::raw(
                        "$table1.material, 
                    $table1.collection_id,
                    $table1.artifact_id,
                    $table1.collection,
                    $table1.manufacturing_technique,
                    $table1.start_date,
                    $table1.end_date,
                    $table1.photo,
                    $table1.has_photo"
                    ));
                $table2 = $artifact_types[2] . '_tables';
                $data2 = DB::table($table2)
                    ->select(DB::raw(
                        "$table2.material, 
                    $table2.collection_id,
                    $table2.artifact_id,
                    $table2.collection,
                    $table2.manufacturing_technique,
                    $table2.start_date,
                    $table2.end_date,
                    $table2.photo,
                    $table2.has_photo"
                    ));
                $table3 = $artifact_types[3] . '_tables';
                $data3 = DB::table($table3)
                    ->select(DB::raw(
                        "$table3.material, 
                    $table3.collection_id,
                    $table3.artifact_id,
                    $table3.collection,
                    $table3.manufacturing_technique,
                    $table3.start_date,
                    $table3.end_date,
                    $table3.photo,
                    $table3.has_photo"
                    ));
                $table4 = $artifact_types[4] . '_tables';
                $data4 = DB::table($table4)
                    ->select(DB::raw(
                        "$table4.material, 
                    $table4.collection_id,
                    $table4.artifact_id,
                    $table4.collection,
                    $table4.manufacturing_technique,
                    $table4.start_date,
                    $table4.end_date,
                    $table4.photo,
                    $table4.has_photo"
                    ));
                $table5 = $artifact_types[5] . '_tables';
                $data5 = DB::table($table5)
                    ->select(DB::raw(
                        "$table5.material, 
                    $table5.collection_id,
                    $table5.artifact_id,
                    $table5.collection,
                    $table5.manufacturing_technique,
                    $table5.start_date,
                    $table5.end_date,
                    $table5.photo,
                    $table5.has_photo"
                    ));
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
                    ->unionAll($data1)
                    ->unionAll($data2)
                    ->unionAll($data3)
                    ->unionAll($data4)
                    ->unionAll($data5);
                break;
            default:
                back()->with('error', 'Artifact not available in query check QueryController {queryCollection}');
                break;
        }
                */


        $table0 = 'ceramics_tables';
        $merge = DB::table($table0)
            ->select(DB::raw("$table0.material, 
            $table0.collection_id,
            $table0.artifact_id,
            $table0.collection,
            $table0.manufacturing_technique,
            $table0.start_date,
            $table0.end_date,
            $table0.photo,
            $table0.has_photo"));

        //RETURN BASED ON PAGINATION LIMIT
        if ($request->input('perpage') == "10") {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->whereBetween('start_date', [$start, $end])
                ->paginate(10)
                ->withQueryString();
        } elseif ($request->input('perpage') == "50") {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->whereBetween('start_date', [$start, $end])
                ->paginate(50)
                ->withQueryString();
        } else {
            $datas = DB::table(DB::raw("({$merge->toSql()}) as combined"))
                ->mergeBindings($merge)
                ->whereBetween('start_date', [$start, $end])
                ->whereBetween('has_photo', [$photostart, $photoend])
                ->paginate(500)
                ->withQueryString();
        }



        return view('results.resultscollection', compact('datas', 'start', 'end', 'collection_id'));
    }


    public function getQueryArtifact()
    {
        $collections = Collection::all();
        return view('queries.artifact', compact('collections'));
    }
}
