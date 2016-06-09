$(document).ready(function () {
	function date(){var d = new Date();
		var curr_date = d.getDate();
		var curr_month = d.getMonth() + 1;
		var curr_year = d.getFullYear();
		var curr_hours = d.getHours();
		var curr_minutes = d.getMinutes();
		time = (curr_year + "-" + curr_month + "-" + curr_date + "-" + curr_hours + "-" + curr_minutes);
		console.log(time);
	}
	refresh();
	function refresh(){
		$('.results').empty();
		flag = false;
		$.ajax({
			url: 'katalog.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	}
	function custommodal(msg,error){
		$('.container').after('<div class="modal fade" id='+msg+' role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">'+error+'</h4></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>');
		$("#"+msg+"").modal();
	}
	$(".btn-group").on('click','#refresh',function (){
		refresh();
		return false;
	});
	$(".container").on('click','.addMat',function(){
		var cech;
		switch ($('.selectpicker option:selected').text()){
			case ('Склад'):
			cech = 'sklad';
			break;
			case ('Цех 1'):
			cech = 'cech1';
			break;
			case ('Цех 2'):
			cech = 'cech2';
			break;
			case ('Цех 3'):
			cech = 'cech3';
			break;
		}
		date();
		var id = $('#id').val();
		var mat_name = $('#Mat_name').val();
		var cost = $('#Cost').val();
		var count = $('#Count').val();
		var myData = 'id='+id+'&Mat_name='+mat_name+'&Cost='+cost+'&Count='+count+'&Date='+time+'&Store_name='+$('.selectpicker option:selected').text()+'&Cech='+cech;
		console.log(myData);
		$.post({
			url: 'addMat.php',
			data: myData,
			success: function(data) {
				custommodal('success','success');
			}
		});
	});
	$(".container").on('click','.addCech',function(){
		var cech;
		switch ($('.selectpicker option:selected').text()){
			case ('Цех 1'):
			cech = 'cech1';
			break;
			case ('Цех 2'):
			cech = 'cech2';
			break;
			case ('Цех 3'):
			cech = 'cech3';
			break;
		}
		date();
		var id = $('#id').text();
		var mat_name = $('#Mat_name').text();
		var cost = $('#Cost').text();
		var count = $('#Count').text();
		var myData = 'id='+id+'&Mat_name='+mat_name+'&Cost='+cost+'&Count='+count+'&Date='+time+'&Store_name='+$('.selectpicker option:selected').text()+'&Cech='+cech;
		console.log(myData);
		$.post({
			url: 'outgoing.php',
			data: myData,
			success: function(data) {
				custommodal('success','success');
			}
		});
	});
	$(".container").on('click','.item',function(){
		$('.results').empty();
		var myId = 'Id=' + $(this.closest('div')).find('#id').text();
		console.log(myId);
		$.post({
			url: 'katalogitem.php',
			data: myId,
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#arrived',function(){
		$('.results').empty();
		$.ajax({
			url: 'arrived.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#cech1',function(){
		$('.results').empty();
		$.ajax({
			url: 'cech1.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#cech2',function(){
		$('.results').empty();
		$.ajax({
			url: 'cech2.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#cech3',function(){
		$('.results').empty();
		$.ajax({
			url: 'cech3.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#outgoing',function(){
		$('.results').empty();
		$.ajax({
			url: 'outgoing.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".nav_menu").on('click','#history',function(){
		$('.results').empty();
		$.ajax({
			url: 'history.php',
			success: function(data) {
				$('.results').html(data);
			}
		});
	});
	$(".container").on('click','#submit',function(){
		var form=$("#form").serialize()+'&Mat_name='+mat_name+'&Store_name='+store_name+'&old_count='+old_count+'&id='+id+'&Name='+currentUser;
		var count = $('#Count').val();
		$.post({
			url: 'request.php',
			data: form,
			success: function(){
				$('#myModal').modal();
				refresh();

			}
		});	
		return false;
	});
	$(".container").on('click','.add',function(){
		var form=$("#form").serialize()+'&Date='+time;
		console.log(form);
		$.post({
			url: 'addmat.php',
			data: form,
			success: function(){
				$('#myModal').modal();
				refresh();
			}
		});	
		return false;
	});
	$(".container").on('click','.delete',function(){
		var form=$("#deleteform").serialize()+'&Date='+time;
		console.log(form);
		$.post({
			url: 'deletemat.php',
			data: form,
			success: function(){
				$('#myModal').modal();
				refresh();
			}
		});	
		return false;
	});
});
