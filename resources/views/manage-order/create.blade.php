<x-app-layout :title="__('Add Order')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} Manage Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create') }} Manage Order</h1>
                            <p class="mt-2 text-sm text-gray-700">Add a new {{ __('Manage Order') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ (Auth::guard('employee')->check())? route('employee.manage-orders.index'): route('manage-orders.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ (Auth::guard('employee')->check())? route('employee.manage-orders.store') : route('manage-orders.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('manage-order.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // Add event listener for the remove button
            // $(document).on('click', '.remove-btn', function() {
            //     var itemID = $(this).data('itemid');
            //     $('.product_type_data_' + itemID).remove();
            // });

            // // Add more items dynamically
            // $('#add_more_item').on('click', function() {
            //     var newItem = $('.product_type_data_{{$rand_num}}').first().clone();
            //     var newRandNum = Math.floor(Math.random() * 10000);
            //     newItem.removeClass('product_type_data_{{$rand_num}}').addClass('product_type_data_' + newRandNum);
            //     newItem.find('.remove-btn').data('itemid', newRandNum);
            //     $('.all_item_list').append(newItem);
            // });
           
            $(document).on("change", ".order_item_id", function() {
                var selectedOption = $(this).find('option:selected');
                var randNum = selectedOption.data('rand-num');
                var unit = selectedOption.data('unit');
                var unit_name = selectedOption.data('unit-name');
                var discount = selectedOption.data('discount');
                var qty = selectedOption.data('qty');
                var rate = selectedOption.data('rate');
                 
                $('.order_item_qty_' + randNum).val(0); // Default quantity
                $('.order_item_unit_' + randNum).val(unit);
                $('.order_item_rate_' + randNum).val(rate);
                $('.order_item_discount_' + randNum).val(discount);
                $('.order_item_unit_name_' + randNum).val(unit_name);
                $('.order_item_unit_name_' + randNum).html(unit_name);
            });

            $(document).on("click", ".add_more", function() {    
                var randNum = $(this).data('rand-num');
                var cnt = $(this).data('cnt');
                cnt++;
                
                var newItem = $('.custom_data_single_' + randNum + '_'+parseInt(cnt-1)).first().clone();
                
                newItem.removeClass('custom_data_single_' + randNum + '_' + (cnt - 1)).addClass('custom_data_single_' + randNum + '_' + cnt);
                //newItem.find('.remove_this').data('cnt', cnt);
                $(".remove_this_"+randNum).data('cnt', cnt);
                $(".add_more_"+randNum).data('cnt', cnt);
                $('.custom_data_'+randNum).append(newItem);
            });
            
            $(document).on("click", ".remove_this", function() {  
                var randNum = $(this).data('rand-num');
                var cnt = $(this).data('cnt');
                
                if (cnt > 1) {
                    $('.custom_data_single_' + randNum + '_' + cnt).remove();
                    cnt--;
                    $(this).data('cnt', cnt);
                    $(".remove_this_"+randNum).data('cnt', cnt);
                    $(".add_more_"+randNum).data('cnt', cnt);
                } else {
                    alert("At least one field is required.");
                }
            });
            //code for remove button in order item form
            $(document).on("click", ".order-remove-btn", function() {
                var itemID = $(this).data('itemid');
                $('.product_type_data_' + itemID).remove();
            });

            $(document).on("click", "#add-more-item", function() {  
                var employee_id = $(this).attr('data-employee-id');
                
                var guardPrefix = "{{ auth()->guard('employee')->check() ? 'employee' : 'admin' }}";
                $.ajax({
                        //url: 'load-item-type-data/',
                        url: `${BASE_URL}/${guardPrefix}/manage-orders/load-more-item-data`,
                        type: 'POST',
                        data: { employee_id: employee_id, _token: $('meta[name="csrf-token"]').attr('content') },
                        success: function (response) {
                            //toastr.success(response.message);
                            $(".all_item_list").append(response.data);
                            $("#add-more-item").show();
                            initDatePickers();

                        },
                        error: function (xhr, status, error) {
                            //console.log(error)
                            toastr.error('Error');
                        }
                    });
            });
            flatpickr(".delivery_date", {
                    enableTime: false,
                    dateFormat: "Y-m-d",
                    altInput: false,
                    altFormat: "F j, Y - h:i K",
                    minDate: "today",
                });
            function initDatePickers() {
                flatpickr(".delivery_date", {
                    enableTime: false,
                    dateFormat: "Y-m-d",
                    altInput: false,
                    altFormat: "F j, Y - h:i K",
                    minDate: "today",
                });
            }
        });
    </script>

    @endpush
</x-app-layout>
