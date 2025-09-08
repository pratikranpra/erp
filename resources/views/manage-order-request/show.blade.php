<x-app-layout :title="__('Show Manage Order Request')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $manageOrder->name ?? __('Show') . " " . __('Manage Order Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Show') }} Manage Order Requests</h1>
                            <p class="mt-2 text-sm text-gray-700">Details of {{ __('Manage Order Requests') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('admin.manage.orders.request.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="mt-6 border-t border-gray-100">
                                    <dl class="divide-y divide-gray-100">

                                        @if($manageOrder->bill_no != "" && $manageOrder->bill_no != "0" )
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Bill No</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->bill_no }}</dd>
                                        </div>
                                        @endif
                                        @if($manageOrder->chalan_no != "")
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Chalan No</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->chalan_no }}</dd>
                                        </div>
                                        @endif
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Customer Id</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->getCustomerName() }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Employee Name</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->getEmployeeName() }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Sku</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->sku }}</dd>
                                        </div>
                                        @if($orderItemLists->isNotEmpty())
                                        <div class="px-4 py-6 sm:px-0">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm text-gray-700">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">ID</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Item Name</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Quantity</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Unit</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Item Rate</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Item Discount</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Delivery Date</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Item Custom Data</th>
                                                            <th class="px-4 py-2 text-left font-semibold text-gray-900">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-100">
                                                        @php $cnt = 0; @endphp
                                                        @foreach ($orderItemLists as $key=>$single_order_item)
                                                        <tr>
                                                            <td class="px-4 py-2">{{ $key + 1 }}</td>
                                                            <td class="px-4 py-2">{{ ucfirst($single_order_item->item_name) }}</td>
                                                            <td class="px-4 py-2">{{ $single_order_item->order_item_qty }}</td>
                                                            <td class="px-4 py-2">{{ $single_order_item->order_item_unit }}</td>
                                                            <td class="px-4 py-2">{{ $single_order_item->order_item_rate }}</td>
                                                            <td class="px-4 py-2">{{ $single_order_item->order_item_disc }}</td>
                                                            <td class="px-4 py-2">{{ date("Y-m-d",strtotime($single_order_item->delivery_date)) }}</td>
                                                            <td class="px-4 py-2">
                                                                @php $attributes = json_decode($single_order_item->order_item_custom_data, true); @endphp
                                                                <ul>
                                                                    @foreach($attributes as $attribute)
                                                                    @foreach($attribute as $key => $value)
                                                                    <li><strong>{{ ucfirst(strtolower($key)) }}</strong>: {{ $value }}</li>
                                                                    @endforeach
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            @if($single_order_item->status == 0)
                                                            @php $cnt++; @endphp
                                                            <td class="px-4 py-2 child_order_status_{{ $single_order_item->id}} ">
                                                                <a href="javascript:void(0)" data-child-orderid="{{ $single_order_item->id }}" class="bg-[#218838]  text-white p-2 completeChildOrderBtn_{{ $single_order_item->id }} completeChildOrderBtn">Compelete</a>
                                                            </td>
                                                            @else
                                                            <td class="px-4 py-2">Completed</td>
                                                            @endif
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <input type="hidden" class="remainchildOrder" value="{{ $cnt }}">
                                                </table>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Order Date</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->order_date }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Remark</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->remark }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Product Type</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->product_type == 1?"Manufacture":"ReadyMade" }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Shipping Address Id</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->getShippingAddress() }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Shopping Mode</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ ($manageOrder->shopping_mode == 1)?"Air":(($manageOrder->shopping_mode == 2)?"Road":(($manageOrder->shopping_mode == 3)?"Transport":"Other"))  }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Transporter</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->transporter }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Charge</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->charge }}</dd>
                                        </div>
                                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Status</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ ($manageOrder->status == 0)?"Pending":(($manageOrder->status == 1)?"Completed":"Cancelled") }}</dd>
                                        </div>

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on("click", ".completeChildOrderBtn", function() {
                var child_order_id = $(this).data("child-orderid");
                var remainchildOrder = $(".remainchildOrder").val();
                
                var last_order = (remainchildOrder == 1) ? 1 : 0;
                if(remainchildOrder == 1){
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, complete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                           const { value: bill_no } =  Swal.fire({
                                title: "Please enter Challan/Bill Number",
                                input: "text",
                                inputLabel: "Your Challan/Bill Number",
                                inputPlaceholder: "Enter your Challan/Bill Number",
                                showCancelButton: true,
                                inputValidator: (value) => {
                                    if (!value || !/^\d+$/.test(value)) {
                                        return "You need to enter a valid integer bill number!";
                                    }else{
                                        const bill_no = value;
                                        
                                        $.ajax({
                                            url: "{{ route('admin.manage.orders.request.child.complete') }}",
                                            type: 'POST',
                                            data: {
                                                _token: '{{ csrf_token() }}',
                                                child_order_id: child_order_id,
                                                last_order: last_order,
                                                bill_no: bill_no,
                                            },
                                            success: function(response) {
                                                if(response.status =="error"){
                                                    toastr.error(response.message);
                                                    return false;
                                                }
                                                toastr.success(response.message);
                                                remainchildOrder = remainchildOrder-1;
                                                $(".remainchildOrder").val(remainchildOrder);
                                                $(".child_order_status_" + child_order_id).empty();
                                                $(".child_order_status_" + child_order_id).html("Completed");
                                                Swal.fire({
                                                    title: 'Order Completed',
                                                    text: 'Order has been completed successfully with Bill No: ' + bill_no,
                                                    icon: 'success',
                                                    confirmButtonText: 'OK'
                                                });
                                            },
                                            error: function(xhr) {
                                                toastr.error('An error occurred while completing the order.');
                                            }
                                        });
                                    }
                                }
                            });
                            
                        }
                    });
                }else{
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, complete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('admin.manage.orders.request.child.complete') }}",
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    child_order_id: child_order_id,
                                    last_order: last_order,
                                },
                                success: function(response) {
                                    if(response.status =="error"){
                                        toastr.error(response.message);
                                        return false;
                                    }
                                    toastr.success(response.message);
                                    remainchildOrder = remainchildOrder-1;
                                    $(".remainchildOrder").val(remainchildOrder);
                                    $(".child_order_status_" + child_order_id).empty();
                                    $(".child_order_status_" + child_order_id).html("Completed");
                                    Swal.fire({
                                        title: 'Order Completed',
                                        text: 'Order has been completed successfully with Bill No: ' + bill_no,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    });
                                },
                                error: function(xhr) {
                                    toastr.error('An error occurred while completing the order.');
                                }
                            });
                        }
                    });
                }
                
            });


            // $(document).on('click', '.completeOrderBtn', function() {
            //     var orderId = $(this).data('orderid');
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, complete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //            const { value: bill_no } =  Swal.fire({
            //                 title: "Please enter Challan/Bill Number",
            //                 input: "text",
            //                 inputLabel: "Your Challan/Bill Number",
            //                 inputPlaceholder: "Enter your Challan/Bill Number",
            //                 showCancelButton: true,
            //                 inputValidator: (value) => {
            //                     if (!value || !/^\d+$/.test(value)) {
            //                         return "You need to enter a valid integer bill number!";
            //                     }else{
            //                         const bill_no = value;
            //                          $.ajax({
            //                                 url:"{{ route('admin.manage.orders.request.complete') }}",
            //                                 type: 'POST',
            //                                 data: {
            //                                     _token: '{{ csrf_token() }}',
            //                                     order_id: orderId,
            //                                     bill_no: bill_no,
            //                                 },
            //                                 success: function(response) {
            //                                     toastr.success(response.message);
            //                                     $(".completeOrderBtn_" + orderId).remove();
            //                                     if(response.data != "") {
            //                                         $(".pdfbtnDisplay_" + orderId).html(response.data);
            //                                     } else {
            //                                         $(".pdfbtnDisplay_" + orderId).html('<span class="text-red-500">No PDF available</span>');
            //                                     }
            //                                     $(".status_text_" + orderId).text("Completed");
            //                                     Swal.fire({
            //                                         title: 'Order Completed',
            //                                         text: 'Order has been completed successfully with Bill No: ' + bill_no,
            //                                         icon: 'success',
            //                                         confirmButtonText: 'OK'
            //                                     });
            //                                 },
            //                                 error: function(xhr) {
            //                                     toastr.error('An error occurred while completing the order.');
            //                                 }
            //                         });
            //                     }
            //                 }
            //             });

            //         }
            //     });
            // });

        });
    </script>
    @endpush





</x-app-layout>