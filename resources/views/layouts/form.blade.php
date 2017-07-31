
<div class="form-group">
	{!! Form::label('comment', 'Комментарий:') !!}
	{!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	<label>Bыберите тип записи:</label>
	<label class="radio-inline">
		<input type="radio" name="typeOfRecord" value="outlay" class="typeOfRecord" checked>Расход
	</label>
	<label class="radio-inline">
		<input type="radio" name="typeOfRecord" value="income" class="typeOfRecord">Доход
	</label>
</div>	
<div class="form-group">
	{!! Form::label('created_at', 'Дата события:') !!}
	{!! Form::input('date', 'created_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('amount', 'Сумма в грн:') !!}
	{!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Добавить!', ['class' => 'btn btn-primary form-control']) !!}
</div>
