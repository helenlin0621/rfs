<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class AnalysisAnalysisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $mission_list_id=Auth::user()->mission_list_id;

        if($mission_list_id != 1) {

            //讀取mission_list 名稱
            $mission_list_names = DB::table('mission_lists')
                ->select('mission_name','mission_list_id')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($mission_list_names);

            //讀取mission所有資料
            $missions = DB::table('missions')
                ->orderBy('country_or_city_input')
                ->orderBy('township_or_district_input')
                ->orderBy('location')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($missions);
            $mission_new_locations =  DB::table('mission_new_locations')
                ->where('mission_list_id', $mission_list_id)
                ->orderBy('analysis_time')
                ->get();
//            dd($mission_new_locations);





        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;
        }
//dd($missions);
        return view('manage_pages.analysis_manage')
            ->with('mission_list_names', $mission_list_names)
            ->with('missions', $missions)
            ->with('mission_new_locations', $mission_new_locations);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
        $inputs=$request->except('_token');

//        dd($inputs);
        $location=$request->get('location_name') ;
        $severe_level=$request->get('severe_level');
        $situation=$request->get('situation');
        $victim_number=$request->get('victim_number');
        $calls = $request->get('calls');
//        dd($calls);
        $mission_list_id=Auth::user()->mission_list_id;
        $mission_new_locations_id=DB::table('mission_new_locations')->select(DB::raw('count(*) as total'))->where('mission_list_id','=',$mission_list_id)->get();
//        dd($mission_new_locations_id[0]->total);
        DB::insert('insert into mission_new_locations (mission_new_locations_id,mission_list_id, location,severe_level,situation,victim_number,analysis_time) values (?,?,?,?,?,?,?)', array($mission_new_locations_id[0]->total+1,$mission_list_id, $location,$severe_level,$situation,$victim_number,date('Y-m-d H:i:s')));

//        $missions_index = DB::table('missions')->select('mission_id')->where('mission_list_id', $mission_list_id)->get();
//
//        dd($missions_index);
//        foreach($missions_index as $mission)
//        {
////            dd($mission->mission_id);
//            if(isset($inputs[$mission->mission_id]) && $inputs[$mission->mission_id]!='請選擇')
//            {
//
//                DB::table('missions')->where('mission_id', $mission->mission_id)->update(['mission_list_id' => $inputs[$mission->mission_id]]);
//
//            }
//        }

        return Redirect::to('analysis/manage');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
//        $inputs=$request->except('_token');
//
//        dd($inputs);
        $mission_new_locations_id=$request->get('mission_new_locations_id');
        $location=$request->get('location_name') ;
        $severe_level=$request->get('severe_level');
        $situation=$request->get('situation');
        $victim_number=$request->get('victim_number');

//        DB::insert('insert into mission_new_locations (mission_list_id, location,severe_level,situation,victim_number,analysis_time) values (?,?,?,?,?,?)', array($mission_list_id, $location,$severe_level,$situation,$victim_number,date('Y-m-d H:i:s')));

        DB::table('mission_new_locations')->where('mission_new_locations_id',$mission_new_locations_id)->update(['location' => $location,'severe_level'=>$severe_level,'situation'=>$situation,'victim_number'=>$victim_number]);
        return Redirect::to('analysis/manage');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
