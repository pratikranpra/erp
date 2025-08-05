$(document).ready(function () {
	const BASE_URL = window.location.origin;
	const pathSegments = window.location.pathname.split('/');
	const guardPrefix = pathSegments[1]; // 'admin' or 'employee'


	$('.status_toggle').on('change', function () {
		var _this = $(this)
		var id = $(this).attr('data-id')
		var module_nm = $(this).attr('data-module')

		if (module_nm == 'gst-masters') {
			var status = _this.prop('checked') === true ? 'a' : 'd'
		} else {
			var status = _this.prop('checked') === true ? 'active' : 'inactive'
		}

		if (module_nm != '') {
			$.ajax({
				url: 'status/' + module_nm,
				type: 'POST',
				data: { id: id, status: status, _token: $('meta[name="csrf-token"]').attr('content') },
				success: function (response) {
					toastr.success(response.message);
				},
				error: function (xhr, status, error) {
					console.log(error)
					toastr.error('Error');
				}
			});
		}
	})

	$('.product_type').on('change', function () {
		var _this = $(this)
		var id = $(this).attr('data-id')
		var module_nm = $(this).attr('data-module')
		var employee_id = $(this).attr('data-employee-id')
		var product_type = _this.val()
		
		if (module_nm != '' && product_type == 'mfg') {
			$.ajax({
				url: `${BASE_URL}/${guardPrefix}/items/load-item-type-data`,
				type: 'POST',
				data: { employee_id: employee_id, _token: $('meta[name="csrf-token"]').attr('content') },
				success: function (response) {
					//toastr.success(response.message);
		//			alert(response.data);
					$(".product_type_data_item").html(response.data);
					$("#add-product-type").show();
				},
				error: function (xhr, status, error) {
					//console.log(error)
					toastr.error('Error');
				}
			});
		}else{
			$(".product_type_data_item").html('');
			$("#add-product-type").hide();	
		}
	});
	$('#add-product-type').on('click', function () {
		var employee_id = $(this).attr('data-employee-id')
		$.ajax({
				//url: 'load-item-type-data/',
				url: `${BASE_URL}/${guardPrefix}/items/load-item-type-data`,
				type: 'POST',
				data: { employee_id: employee_id, _token: $('meta[name="csrf-token"]').attr('content') },
				success: function (response) {
					//toastr.success(response.message);
					//alert(response.data);
					$(".product_type_data_item").append(response.data);
					$("#add-product-type").show();
				},
				error: function (xhr, status, error) {
					//console.log(error)
					toastr.error('Error');
				}
			});
	});

	$(document).on('click', '.remove-btn', function () {
		var itemID = $(this).attr('data-itemID');
		//alert("Item ID: " + itemID);
		// Remove the product type section with the specified itemID);
		$(".product_type_data_" + itemID).remove();
	});

	//funcation for customer billing address
	$(document).on('change', '.customer_id', function () {
		var customerId = $(this).val();
		var module = $(this).attr('data-module');
		if (customerId != '') {
			$.ajax({
				url: `${BASE_URL}/${guardPrefix}/manage-orders/customer-billing-address`,
				type: 'POST',
				data: { customer_id: customerId, _token: $('meta[name="csrf-token"]').attr('content') },
				success: function (response) {
					if (response.status == 'success') {
						if(response.data != ''){
							$(".customer_shipping_address").html(response.data);
						}
						
					} else {
						toastr.error(response.message);
					}
				},
				error: function (xhr, status, error) {
					console.log(error)
					toastr.error('Error');
				}
			});
		} else {
			//$(".customer_shipping_address").html('');
		}
	});

	flatpickr("#order_date", {
        enableTime: false,
        dateFormat: "Y-m-d",
        altInput: false,
        altFormat: "F j, Y - h:i K",
		minDate: "today"
    });
	flatpickr("#delivery_date", {
		enableTime: false,
		dateFormat: "Y-m-d",
		altInput: false,
		altFormat: "F j, Y - h:i K",
		minDate: "today",
	});
});
