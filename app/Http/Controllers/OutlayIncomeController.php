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
		$check = $this->checkTypeOfRecord($inputData['typeOfRecord'], $inputData['amount']);
		$record[array_keys($check)[0]] = array_shift($check);
		OutlayIncome::create($record);
		
		return redirect('/');
	}

	public function editRecord(Request $request, $id)
	{
		$inputData = $request->all();
		$record['comment'] = $inputData['comment'];
		$record['created_at'] = $inputData['created_at'];
		$check = $this->checkTypeOfRecord($inputData['typeOfRecord'], $inputData['amount']);
		$record[array_keys($check)[0]] = array_shift($check);
		$editRec = OutlayIncome::findOrFail($id);
		$editRec->update($record);
	}
	
	private function checkTypeOfRecord($typeOfRecord, $amount)
	{
		if($typeOfRecord == 'outlay'){
			$record['outlay'] = $amount;
		}elseif($typeOfRecord == 'income'){
			$record['income'] = $amount;
		}
		return $record;
	}
	
	public function getRecord(Request $request)
	{
		return OutlayIncome::findOrFail($request->input('id'));
	}
	
	public function deleteRecord($id)
	{
		OutlayIncome::findOrFail($id)->delete();
		return redirect('/');
	}
	
	public function selectByDate($date)
	{
		$dateCorFormat = \Carbon\Carbon::parse(str_replace('_', '/', $date))->format('Y-m-d H:i:s');
		$allRecords = OutlayIncome::where('created_at', '<=', $dateCorFormat)->orderBy('created_at', 'decs')->paginate(10);
		return view('index', compact('allRecords'));		
	}
}
