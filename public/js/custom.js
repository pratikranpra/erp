$(document).ready(function(){

	$('.status_toggle').on('change', function(){
		var _this = $(this)
		var id = $(this).attr('data-id')
		var module_nm = $(this).attr('data-module')
		
		var status = _this.prop('checked') === true ? 'active' : 'inactive'			
	
		if(module_nm != ''){
			$.ajax({
	            url: 'status/'+module_nm,
	            type: 'POST',
	            data: { id: id, status: status, _token: $('meta[name="csrf-token"]').attr('content')  },
	            success: function(response) {
	                toastr.success(response.message);
	            },
	            error: function(xhr, status, error) {
	            	console.log(error)
	                toastr.error('Error');
	            }
	        });
		}


	})

})