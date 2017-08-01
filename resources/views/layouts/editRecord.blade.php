
<div class="modal fade" id="editRec" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" arial-label="Close"><span arial-hidden="true">&times;</span></button>
				<h4 id="recHead">Редактирование</h4>
			</div>
			<div class="modal-body">
				<p>Укажите комментарий, выберите тип записи, укажите сумму</p>
					@include('layouts.form', ['submitButtonText' => 'Изменить!'])
				@include('errors.list')
			</div>
		</div>
	</div>
</div>

