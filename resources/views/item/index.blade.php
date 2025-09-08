<x-app-layout :title="__('Manage Item')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Items') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Items') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" target="_blank" href="{{ (Auth::guard('employee')->check())? route('employee.items.download.pdf'):route('admin.items.download.pdf') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">DownLoad PDF</a>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ (Auth::guard('employee')->check())? route('employee.items.create'):route('items.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form name="filter" method="get" action="{{ route(Auth::guard('employee')->check() ? 'employee.items.index' : 'items.index') }}" class="flex flex-wrap gap-4">
                            <!-- By Customer -->
                            <div class="w-56">
                                <label for="item_id" class="block text-sm font-medium text-gray-700">By Item Name </label>
                                <select id="item_id" name="item_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">-- Select Item Name --</option>
                                    @foreach ($items_all as $single_item)
                                        <option value="{{ $single_item->id }}" {{ request('item_id') == $single_item->id ? 'selected' : '' }}>
                                            {{ $single_item->name }}
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

                            <!-- Buttons Row -->
                            <div class="w-full flex gap-2 mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 rounded-md bg-indigo-600 text-white font-semibold shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                    Search
                                </button>
                                <a href="{{ route(Auth::guard('employee')->check() ? 'employee.manage-orders.index' : 'items.index') }}"
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
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Sku</th>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Main Image</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Description</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Category</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Subcategory</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Unit</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Weight</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Gst</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Rate</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Discount</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Quantity</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Product Type</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($items as $item)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->sku }}</td>
                                        @if(!empty($item->imageDetails) && isset($item->imageDetails[0]))
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><img class="rounded-lg" src="{{ url('storage/images/items/') }}/{{ $item->imageDetails[0]->name }}" style="height: 75px;width: 75px;object-fit: cover;"></td>
                                        @else
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">N/A</td>
                                        @endif
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->description }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->parent_category_name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->parent_subcategory_name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->unit_name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->weight }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->gst }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->rate }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->discount }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->child_qty }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ ($item->product_type=="mfg")?"Manufacture":"Ready Made"  }}</td>
										<td>
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input data-id="{{ $item->id }}" data-module="items" type="checkbox" value="active" class="sr-only status_toggle peer" {{ $item->status == 'active' ? 'checked' : '' }}>
                                              <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                            </label>
                                        </td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ (Auth::guard('employee')->check())? route('employee.items.destroy', $item->id):route('items.destroy', $item->id) }}" method="POST">
                                                    <a href="{{(Auth::guard('employee')->check())? route('employee.items.show', $item->id): route('items.show', $item->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a href="{{ (Auth::guard('employee')->check())? route('employee.items.edit', $item->id):route('items.edit', $item->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ (Auth::guard('employee')->check())? route('employee.items.destroy', $item->id):route('items.destroy', $item->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $items->withQueryString()->links() !!}
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