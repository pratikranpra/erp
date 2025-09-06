<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Manage Orders') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Manage Orders') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ (Auth::guard('employee')->check())? route('employee.manage-orders.create'): route('manage-orders.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form name="filter" method="get" action="{{ route(Auth::guard('employee')->check() ? 'employee.manage-orders.index' : 'manage-orders.index') }}" class="flex flex-wrap gap-4 items-end">
                            <!-- By Customer -->
                            <div class="w-56">
                                <label for="customer" class="block text-sm font-medium text-gray-700">By Customer</label>
                                <select id="customer_id" name="customer_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">-- Select Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- By Item Name -->
                            <div class="w-56">
                                <label for="item_id" class="block text-sm font-medium text-gray-700">By Item Name</label>
                                <select id="item_id" name="item_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">-- Select Item --</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" {{ request('item_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->sku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- From Date -->
                            <div class="w-56">
                                <label for="from_date" class="block text-sm font-medium text-gray-700">From Date</label>
                                <x-text-input id="from_date" name="from_date" type="text"
                                    class="mt-1 block w-full date_picker_cls from_date"
                                    value="{{ request('from_date') }}"
                                    autocomplete="off"
                                    placeholder="Select Date" />
                            </div>

                            <!-- To Date -->
                            <div class="w-56">
                                <label for="to_date" class="block text-sm font-medium text-gray-700">To Date</label>
                                <x-text-input id="to_date" name="to_date" type="text"
                                    class="mt-1 block w-full date_picker_cls to_date"
                                    value="{{ request('to_date') }}"
                                    autocomplete="off"
                                    placeholder="Select Date" />
                            </div>


                            <!-- Search Button -->
                            <div class="flex gap-2 self-end">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 rounded-md bg-indigo-600 text-white font-semibold shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                    Search
                                </button>
                                <a href="{{ route(Auth::guard('employee')->check() ? 'employee.manage-orders.index' : 'manage-orders.index') }}"
                                    class="inline-flex items-center px-4 py-2 rounded-md bg-gray-500 text-white font-semibold shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">
                                    Clear
                                </a>
                            </div>
                        </form>
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
									<!-- <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Product Type</th> -->
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
										<!-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->product_type == 1?"Manufacture":"ReadyMade" }}</td> -->
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ($manageOrder->shopping_mode == 1)?"Air":(($manageOrder->shopping_mode == 2)?"Road":(($manageOrder->shopping_mode == 3)?"Transport":"Other")) }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->transporter }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $manageOrder->charge }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ($manageOrder->status == 0)?"Pending":(($manageOrder->status == 1)?"Completed":"Cancelled") }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('manage-orders.destroy', $manageOrder->id) }}" method="POST">
                                                    <a href="{{ route('admin.download-order-invoice.pdf', $manageOrder->id) }}" target="_blank" data-orderid="{{$manageOrder->id}}" class="text-gray-600 font-bold hover:text-gray-900 mr-2 donwloadPurchaseBill">{{ __('Invoice Download') }}</a>
                                                    <a href="{{ (Auth::guard('employee')->check())? route('employee.manage-orders.show', $manageOrder->id): route('manage-orders.show', $manageOrder->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <!-- <a href="{{ route('manage-orders.edit', $manageOrder->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a> -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <a href="{{ route('manage-orders.destroy', $manageOrder->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a> -->
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
    <script type="text/javascript">
        $(document).ready(function(){
            const fromDate = flatpickr(".from_date", {
                enableTime: false,
                dateFormat: "Y-m-d",
                altInput: false,
                altFormat: "F j, Y",
                //minDate: "today",
                onChange: function (selectedDates) {
                    if (selectedDates.length > 0) {
                        // Set minDate of to_date as the next day
                        toDate.set("minDate", new Date(selectedDates[0].getTime() + 86400000));
                    }
                }
            });

            const toDate = flatpickr(".to_date", {
                enableTime: false,
                dateFormat: "Y-m-d",
                altInput: false,
                altFormat: "F j, Y",
                minDate: "today"
            });

        })
    </script>
    @endpush
</x-app-layout>