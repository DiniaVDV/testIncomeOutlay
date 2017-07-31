<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OutlayIncomeRequest;
use App\OutlayIncome;

class OutlayIncomeController extends Controller
{
	
	public function index()
	{
		$allRecords = OutlayIncome::orderBy('created_at', 'decs')->paginate(10);
		return view('index', compact('allRecords'));
	}
    
	public function addRecord(OutlayIncomeRequest $request)
	{		
		$inputData = $request->all();
		$record['comment'] = $inputData['comment'];
		$record['created_at'] = $inputData['created_at'];
		if($inputData['typeOfRecord'] == 'outlay'){
			$record['outlay'] = $inputData['amount'];		
		}elseif($inputData['typeOfRecord'] == 'income'){
			$record['income'] = $inputData['amount'];
		}
		OutlayIncome::create($record);
		
		return redirect('/');
	}
	
	public function getRecord(Request $request)
	{
		return OutlayIncome::find($request->input('id'));
	}
	
	public function deleteRecord($id)
	{
		OutlayIncome::findOrFail($id)->delete();
		return redirect('/');
	}
	
	public function selectByDate($date)
	{
		$dateCorFormat = \Carbon\Carbon::parse(str_replace('_', '/', $date))->format('Y-m-d H:i:s');
		$allRecords = OutlayIncome::where('created_at', '>=', $dateCorFormat)->orderBy('created_at', 'decs')->paginate(10);
		return view('index', compact('allRecords'));		
	}
}
