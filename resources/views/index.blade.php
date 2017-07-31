@extends('app')

@section('content')
<div class="col-md-12 app">
	<h2>Учёт личных доходов и расходов</h2>
    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>
					<p>Комментарий</p>
				</th>
                <th class="сenterTab">
					<p>Доход (грн)</p>
				</th>
                <th class="сenterTab">
					<p>Доход ($) </p>
				</th>
                <th class="сenterTab">
					<p>Расход (грн)</p>
				</th>
                <th class="сenterTab">
					<p>	Расход ($)</p>	
				</th>
                <th class="сenterTab data">
					<div class="col-md-4">
						{!! Form::label('datepicker1', 'Дата:') !!}
					</div>
					<div class="col-md-8">
						<div class="form-group">
							{!! Form::text('datepicker1', null, ['class' => 'form-control']) !!}
						</div>
					</div>
				</th>
                <th class="сenterTab">
					<p>Действия</p>
				</th>
            </tr>
            </thead> 
			<tbody id="records">
				@foreach($allRecords as $record)
					<tr>
						<td>{{$record->comment}}</td>
						<td align="center">{{number_format($record->income, 2, '.', '')}}</td>   
						<td align="center"></td>                   
						<td align="center">{{number_format($record->outlay, 2, '.', '')}}</td>                   
						<td align="center"></td>                   
						<td align="center">{{$record->created_at->format('Y-m-d')}}</td>                   
						<td align="center">
							<ul class="nav navbar-top-links">
								<li class="action">
									<a data-toggle="modal" data-target="#editRec" onclick="editRec({{$record->id}})" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								</li>
								<li class="action">
									<a href="{{asset('delete')}}/{{$record->id}}" onclick="return confirmDelete('запись')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</li>
							</ul>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tbody class="sum">
				<tr>
					<td align="right"><strong>Итого</strong></td>
					<td align="center"></td>   
					<td align="center"></td>                   
					<td align="center"></td>                   
					<td align="center"></td>                   
					<td align="center"></td>                   
				<tr>
			</tbody>
        </table>
		@include('layouts.pagination', ['paginate' => $allRecords])
		<button class="btn btn-success" data-toggle="modal" data-target="#addRec">
			Добавить запись
		</button>
    </div>
@endsection