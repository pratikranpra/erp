    <div class="space-y-6">
    
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $employee?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div class="mb-10">
        <x-input-label for="password" :value="__('New Password*')"/>
        <x-text-input required id="plain_password" name="plain_password" type="password"  :value="old('plain_password', $employee?->plain_password)" class="mt-1 block w-full" placeholder="Your password" />
        <x-input-error class="mt-2" :messages="$errors->get('plain_password')"/>
    </div>
    <div>
        <x-input-label for="user_pin" :value="__('User Pin')"/>
        <x-text-input id="user_pin" name="user_pin" type="number" class="mt-1 block w-full" :value="old('user_pin', $employee?->user_pin)" autocomplete="user_pin" placeholder="User Pin"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_pin')"/>
    </div>

    <div>
        <x-input-label for="role_id" :value="__('User Role')"/>
        <x-text-select id="role_id" name="role_id" class="mt-4" label="" :options="$all_roles" :value="$value"  />
        <x-input-error class="mt-2 w-full" :messages="$errors->get('role_id')"/>
    </div>

    <div>
        <x-input-label for="user_branches" :value="__('User Branch')"/>
        <x-text-select :multiple="true" id="branch_ids" name="branch_ids" class="mt-4" label="" :options="$all_branches" :value="$branch_value"  />
        <x-input-error class="mt-2" :messages="$errors->get('user_branches')"/>
    </div>

    <div>
        <x-input-label for="department" :value="__('Department')"/>
        <x-text-input id="department" name="department" type="text" class="mt-1 block w-full" :value="old('department', $employee?->department)" autocomplete="department" placeholder="Department"/>
        <x-input-error class="mt-2" :messages="$errors->get('department')"/>
    </div>
    <div>
        <x-input-label for="sub_department" :value="__('Sub Department')"/>
        <x-text-input id="sub_department" name="sub_department" type="text" class="mt-1 block w-full" :value="old('sub_department', $employee?->sub_department)" autocomplete="sub_department" placeholder="Sub Department"/>
        <x-input-error class="mt-2" :messages="$errors->get('sub_department')"/>
    </div>
    <div>
        <x-input-label for="contact" :value="__('Contact')"/>
        <x-text-input id="contact" name="contact" type="number" class="mt-1 block w-full" :value="old('contact', $employee?->contact)" autocomplete="contact" placeholder="Contact"/>
        <x-input-error class="mt-2" :messages="$errors->get('contact')"/>
    </div>
    <div>
        <x-input-label for="home_contact" :value="__('Home Contact')"/>
        <x-text-input id="home_contact" name="home_contact" type="number" class="mt-1 block w-full" :value="old('home_contact', $employee?->home_contact)" autocomplete="home_contact" placeholder="Home Contact"/>
        <x-input-error class="mt-2" :messages="$errors->get('home_contact')"/>
    </div>
    <div>
        <x-input-label for="aadhar_no" :value="__('Aadhar No')"/>
        <x-text-input id="aadhar_no" name="aadhar_no" type="number" class="mt-1 block w-full" :value="old('aadhar_no', $employee?->aadhar_no)" autocomplete="aadhar_no" placeholder="Aadhar No"/>
        <x-input-error class="mt-2" :messages="$errors->get('aadhar_no')"/>
    </div>
    <div>
        <x-input-label for="name" :value="__('Item image')"/>
        <input type="file" id="attachment" name="attachment" placeholder="Your main image">
        @error('attachment')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-input-label for="aadhar_name" :value="__('Aadhar Name')"/>
        <x-text-input id="aadhar_name" name="aadhar_name" type="text" class="mt-1 block w-full" :value="old('aadhar_name', $employee?->aadhar_name)" autocomplete="aadhar_name" placeholder="Aadhar Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('aadhar_name')"/>
    </div>
   
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>