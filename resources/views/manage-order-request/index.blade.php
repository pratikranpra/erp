<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Orders Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Manage Orders Request') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Manage Orders Request') }}.</p>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Customer Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Sku</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Order Date</th>
									<!-- <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Delivery Date</th> -->
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Remark</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Product Type</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Shopping Mode</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Transporter</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Charge</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($manageOrders as $manageOrder)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->getCustomerName() }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->sku }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ date("Y-m-d",strtotime($manageOrder->order_date)) }}</td>
										<!-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ date("Y-m-d",strtotime($manageOrder->delivery_date)) }}</td> -->
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->remark }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->product_type == 1?"Manufacture":"ReadyMade" }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ($manageOrder->shopping_mode == 1)?"Air":(($manageOrder->shopping_mode == 2)?"Road":(($manageOrder->shopping_mode == 3)?"Transport":"Other")) }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->transporter }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->charge }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 status_text_{{$manageOrder->id}}">{{ ($manageOrder->status == 0)?"Pending":(($manageOrder->status == 1)?"Completed":"Cancelled") }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="#" method="POST">
                                                    @if($manageOrder->status == 0)
                                                    <a href="javascript:void(0)" data-orderid="{{$manageOrder->id}}"  class="bg-[#218838] hover:bg-gray-100 text-white p-2 completeOrderBtn_{{$manageOrder->id}} completeOrderBtn">{{ __('Compelete') }}</a>
                                                    @endif
                                                    <span class="pdfbtnDisplay_{{$manageOrder->id}}">
                                                        @if($manageOrder->status == 1)
                                                            <a href="{{ route('admin.download-purchase-bill.pdf', $manageOrder->id) }}" target="_blank" data-orderid="{{$manageOrder->id}}" class="bg-[#007bff] hover:bg-gray-100 text-white p-2 donwloadPurchaseBill">{{ __('Purchase Bill') }}</a>
                                                        @endif
                                                    </span>
                                                    <a href="{{ route('admin.manage.orders.request.show', $manageOrder->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $manageOrders->withQueryString()->links() !!}
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
            
                $(document).on('click', '.completeOrderBtn', function() {
                    var orderId = $(this).data('orderid');
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
                                                url:"{{ route('admin.manage.orders.request.complete') }}",
                                                type: 'POST',
                                                data: {
                                                    _token: '{{ csrf_token() }}',
                                                    order_id: orderId,
                                                    bill_no: bill_no,
                                                },
                                                success: function(response) {
                                                    toastr.success(response.message);
                                                    $(".completeOrderBtn_" + orderId).remove();
                                                    if(response.data != "") {
                                                        $(".pdfbtnDisplay_" + orderId).html(response.data);
                                                    } else {
                                                        $(".pdfbtnDisplay_" + orderId).html('<span class="text-red-500">No PDF available</span>');
                                                    }
                                                    $(".status_text_" + orderId).text("Completed");
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
                });
                
        });
    </script>   
    @endpush
</x-app-layout>