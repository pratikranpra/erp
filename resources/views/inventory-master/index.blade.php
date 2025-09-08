<x-app-layout :title="__('Manage Inventory')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Masters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Inventory Masters') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Inventory Masters') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('inventory-masters.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form name="filter" method="get" action="{{ route('inventory-masters.index') }}" class="flex flex-wrap gap-4">
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
                                <a href="{{ route('inventory-masters.index') }}"
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
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Item Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">In Out Type</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Remark</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Qty</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($inventoryMasters as $inventoryMaster)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ isset($inventoryMaster->item->name)?$inventoryMaster->item->name:"--" }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ in_array($inventoryMaster->in_out_type,array_keys($inOutTypes_Array))?$inOutTypes_Array[$inventoryMaster->in_out_type]:"--" }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $inventoryMaster->remark }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $inventoryMaster->qty }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('inventory-masters.destroy', $inventoryMaster->id) }}" method="POST">
                                                    @if(in_array($inventoryMaster->in_out_type,[2,7,8]))
                                                        <a href="{{ route('admin.download-purchase-invoide.pdf', $inventoryMaster->id) }}" class="bg-[#007bff]  text-white p-2  mr-2">{{ __('Download Invoice') }}</a>
                                                    @endif
                                                    <a href="{{ route('inventory-masters.show', $inventoryMaster->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <!-- <a href="{{ route('inventory-masters.edit', $inventoryMaster->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a> -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('inventory-masters.destroy', $inventoryMaster->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $inventoryMasters->withQueryString()->links() !!}
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
                maxDate: "today",
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
                maxDate: "today"
            });

        })
    </script>
    @endpush
</x-app-layout>