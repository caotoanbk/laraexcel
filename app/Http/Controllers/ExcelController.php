<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Wclient;
use Excel;

class ExcelController extends Controller
{
    public function importExport()
    {
		$clients = Wclient::pluck('WclientsName', 'Id');
        return view('importExport', compact('clients'));
    }

    //file export code
    public function downloadExcel(Request $request, $type){
        $data = Item::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data){
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    //import file to database code
    public function importExcel(Request $request)
	{
		dd($request->all());
		if($request->hasFile('import_file')){
			$file = $request->file('import_file');
			$path = $file->getRealPath();
			//dd($request->file('import_file'));
			$destinationPath = 'uploads';
			$file->move($destinationPath,$file->getClientOriginalName());
			//dd('hello');
			
			$public_path = public_path('uploads/'.$file->getClientOriginalName());
			$data = Excel::load($public_path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $value) {
					$arr = $data->toArray();
					dd($arr[1][11]);
					if(!empty($value)){
						foreach ($value as $v) {		
							$insert[] = ['title' => $v['title'], 'description' => $v['description']];
						}
					}
				}

				
				if(!empty($insert)){
					Item::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}


			}


		}


		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}
