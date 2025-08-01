<x-app-layout>
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
                                                    <th class="px-4 py-2 text-left font-semibold text-gray-900">Item Custom Data</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-100">
                                                @foreach ($orderItemLists  as $key=>$single_order_item) 
                                                  <tr>
                                                    <td class="px-4 py-2">{{  $key + 1 }}</td>
                                                    <td class="px-4 py-2">{{ ucfirst($single_order_item->item_name) }}</td>
                                                    <td class="px-4 py-2">{{ $single_order_item->order_item_qty }}</td>
                                                    <td class="px-4 py-2">{{ $single_order_item->order_item_unit }}</td>
                                                    <td class="px-4 py-2">{{ $single_order_item->order_item_rate }}</td>
                                                    <td class="px-4 py-2">{{ $single_order_item->order_item_disc }}</td>
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
                                                </tr>  
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">Order Date</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->order_date }}</dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">Delivery Date</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $manageOrder->delivery_date }}</dd>
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
</x-app-layout>
