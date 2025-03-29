<x-app-layout>
    <x-slot name="header" class="pl-0 ml-0">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-left">
            Change Password
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create') }} Admin</h1>
                            <p class="mt-2 text-sm text-gray-700">Change Your Password.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form id="change_password_form" method="POST" action="{{ url('/change_password') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-10">
                                        <x-input-label for="current_password" :value="__('Current Password*')"/>
                                        <x-text-input required id="current_password" name="current_password" type="password" class="mt-1 block w-full" placeholder="Your current password" />
                                        <x-input-error class="mt-2" :messages="$errors->get('current_password')"/>
                                    </div>
                                    <div class="mb-10">
                                        <x-input-label for="password" :value="__('New Password*')"/>
                                        <x-text-input required id="password" name="password" type="password" class="mt-1 block w-full" placeholder="Your new password" />
                                        <x-input-error class="mt-2" :messages="$errors->get('password')"/>
                                    </div>
                                    <div class="mb-10">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password*')"/>
                                        <x-text-input required id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" placeholder="Confirm new password" />
                                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')"/>
                                    </div>

                                    <div>
                                        <x-text-input id="cancel" name="cancel" type="button" class="d-none hidden py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" placeholder="Cancel" />
                                        <x-text-input id="submit" name="submit" type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" placeholder="Change Password" />

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
