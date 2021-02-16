<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crudapp;
use App\Osstatistic;
use App\Outsource;
use App\Wclient;
use Yajra\Datatables\Facades\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function crudapp()
    {
        $apps = Crudapp::all();
        return view('crudapp', compact('apps'));
    }

    public function bangcong()
    {
        return view('bangcong');
    }

    public function tracuu()
    {
        $clients = Wclient::pluck('WclientsName', 'Id');
        return view('tracuu', compact('clients'));
    }

    public function bangcongData(){
        $data = Osstatistic::join('outsources', 'outsources.id', '=', 'osstatistics.osid')
                            ->select('outsources.*', 'osstatistics.*')
                            ->get();
        return Datatables::of($data)
                            ->editColumn('day_type', function($row){
                                if($row->day_type == 0) return 'Ngày thường';
                            })
                            ->make(true);
    }

    public function kqtracuu(Request $request)
    {
        $congty = $request->get('congty');
        $thang = $request->get('thang');
        $cmt = trim($request->get('cmt'));

        $result = \DB::table('osstatistics')
        ->select('osstatistics.*', 'outsources.*')
        ->leftJoin('outsources', function($join) {
            $join->on('osstatistics.osid', '=', 'outsources.id');
            //$join->where('outsources.cmt', '051061781');
        })
        ->where('cmt', $cmt)
        ->where('congty', $congty)
        ->where('ngay_lam', 'like', $thang.'%')
        ->get();
        
        return view('kqtracuu', compact('result', 'thang'));
    }
}
