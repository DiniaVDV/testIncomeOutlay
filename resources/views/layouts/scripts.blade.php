
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		function confirmDelete(name){
			if(confirm('Вы действительно хотите удалить ' + name + '?')){
				return true;
			}else {
				return false;
			}
		}
		$('#datepicker1').change(function(){
			var date = $('#datepicker1').val();
			date = date.replace(/\//g, '_');
			window.location.href = "{{asset('select_by_date')}}/" + date;
		});
		/******Get currency ****************/
        $(function (){
            $.ajax({
                type:"GET",
                url:"{{asset('get_currency_dollar')}}",
                success:function(currencyDollar){
						var table = $('#records').children();
						var sumIncomeGrn = 0;
						var sumIncomeDol = 0;
						var sumOutlayGrn = 0;
						var sumOutlayDol = 0;
						for(var i = 0; i < table.length; i++){
							var incomeGrn = parseFloat($(table[i]).children()[1].innerHTML);
							var outlayGrn = parseFloat($(table[i]).children()[3].innerHTML);
							if(currencyDollar != 1){
								$(table[i]).children()[2].innerHTML = parseFloat(incomeGrn / currencyDollar).toFixed(2);
								$(table[i]).children()[4].innerHTML = parseFloat(outlayGrn / currencyDollar).toFixed(2);
							}else{
								$(table[i]).children()[2].innerHTML = parseFloat(0.00).toFixed(2);
								$(table[i]).children()[4].innerHTML = parseFloat(0.00).toFixed(2);
							}
							var incomeDol = parseFloat($(table[i]).children()[2].innerHTML);
							var outlayDol = parseFloat($(table[i]).children()[4].innerHTML);
							if( !isNaN(incomeGrn)){
								sumIncomeGrn += incomeGrn;
								sumIncomeDol += incomeDol;
							}
							if( !isNaN(outlayGrn)){
								sumOutlayGrn += outlayGrn;
								sumOutlayDol += outlayDol;
							}
						}
						var sumTable = $('.sum').children();
						$(sumTable).children()[1].innerHTML = isNaN(sumIncomeGrn.toFixed(2)) ? '0.00' : sumIncomeGrn.toFixed(2);
						$(sumTable).children()[2].innerHTML = isNaN(sumIncomeDol.toFixed(2)) ? '0.00' : sumIncomeDol.toFixed(2);
						$(sumTable).children()[3].innerHTML = isNaN(sumOutlayGrn.toFixed(2)) ? '0.00' : sumOutlayGrn.toFixed(2);
						$(sumTable).children()[4].innerHTML = isNaN(sumOutlayDol.toFixed(2)) ? '0.00' : sumOutlayDol.toFixed(2);
                },
                error:function(data){
                    console.log(data)
                }
            });
        });
		/*****Get info about record from DB***************/
		function editRec(id){			
			$.ajax({
				type:"GET",
				url:"{{asset('get_record')}}",
				data:{
					id:id,
				},
				success:function(data){
					var outlay = $('#editRec').find('.typeOfRecord')[0];
					var income = $('#editRec').find('.typeOfRecord')[1];
					var amount = $('#editRec').find('#amount')[0];
					var comment = $('#editRec').find('#comment')[0];
					var created_at = $('#editRec').find('#created_at')[0];
					var btn = $('#editRec').find('.btn')[0];
					$(btn).attr("onclick", "changeRec(" + data.id + ")");
					console.log(btn);
					if(data.outlay){
						$(outlay).prop("checked", true);		
						$(amount).val(parseFloat(data.outlay).toFixed(2));
					}else if(data.income){
						$(income).prop("checked", true);
						$(amount).val(parseFloat(data.income).toFixed(2));
					}
					$(comment).val(data.comment);
					$(created_at).val(data.created_at);
				},
				error:function(data){
					console.log(data);
				}
			});
		}
		/********Change record in DB*****************/
		function changeRec(id){	
			console.log(1);
			var outlay = $('#editRec').find('.typeOfRecord')[0];
			var income = $('#editRec').find('.typeOfRecord')[1];
			var amount = $('#editRec').find('#amount')[0];
			var comment = $('#editRec').find('#comment')[0];
			var created_at = $('#editRec').find('#created_at')[0];
			if($(outlay).prop("checked")){
				var typeOfRecord = 'outlay';
			}else if($(income).prop("checked")){
				var typeOfRecord = 'income';
			}
			$.ajax({
				type:"POST",
				url:"{{asset('edit_record')}}/" + id,
				data:{
					typeOfRecord:typeOfRecord,
					amount:$(amount).val(),
					comment:$(comment).val(),	
					created_at:$(created_at).val(),	
				},
				success:function(data){
					location.reload();
				},
				error:function(data){
					console.log(data);
				}
			});
		}
		

	</script>
</body>
</html>