<?php


namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;
use DataTables;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->ajax() ) {

            $data=Holiday::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a  href="' . route("holiday.edit",$row->id) .'"  class="edit btn btn-primary btn-sm edit-btn">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('HR.Holidays.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HR.Holidays.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'title'                         => 'required',
            'Date'                          => 'required'
     
          ]);

          Holiday::create([
           
            'title'                                => $request->title,
            'Date'                                 => $request->Date,
           
          
          ]);

          return redirect()->route('holiday.index')
            ->with('success','Holiday added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday)
    {
        return view('HR.Holidays.edit',compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        request()->validate([

            'title'                         => 'required',
            'Date'                          => 'required'
     
          ]);

          $holiday->title=$request->title;
          $holiday->Date=$request->Date;
          $holiday->update();


          return redirect()->route('holiday.index')
          ->with('success','Holiday update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Holiday::find($id)->delete();
        return response()->json(['success'=>'Holiday deleted successfully.']);
    }
}
