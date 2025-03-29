<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Vendors') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Vendors') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('vendors.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Registered Address</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Billing Address</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Owner Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Owner Phone</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Accountant Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Delivery Phone</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Owner Email</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Payment Terms</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Gst No</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Gst Date</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Discount</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($vendors as $vendor)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->registered_address }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->billing_address }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->owner_name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->owner_phone }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->accountant_name }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->delivery_phone }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->owner_email }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->payment_terms }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->gst_no }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->gst_date }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vendor->discount }}</td>
										<td>
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input data-id="{{ $vendor->id }}" data-module="vendors" type="checkbox" value="" class="status_toggle sr-only peer" {{ $vendor->status == 'active' ? 'checked' : '' }}>
                                              <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                            </label>
                                        </td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST">
                                                    <a href="{{ route('vendors.show', $vendor->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('vendors.destroy', $vendor->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $vendors->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>