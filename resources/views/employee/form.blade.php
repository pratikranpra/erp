<div class="space-y-6">
    
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $employee?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="user_pin" :value="__('User Pin')"/>
        <x-text-input id="user_pin" name="user_pin" type="number" class="mt-1 block w-full" :value="old('user_pin', $employee?->user_pin)" autocomplete="user_pin" placeholder="User Pin"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_pin')"/>
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
        <x-text-input id="home_contact" name="home_contact" type="text" class="mt-1 block w-full" :value="old('home_contact', $employee?->home_contact)" autocomplete="home_contact" placeholder="Home Contact"/>
        <x-input-error class="mt-2" :messages="$errors->get('home_contact')"/>
    </div>
    <div>
        <x-input-label for="aadhar_no" :value="__('Aadhar No')"/>
        <x-text-input id="aadhar_no" name="aadhar_no" type="number" class="mt-1 block w-full" :value="old('aadhar_no', $employee?->aadhar_no)" autocomplete="aadhar_no" placeholder="Aadhar No"/>
        <x-input-error class="mt-2" :messages="$errors->get('aadhar_no')"/>
    </div>
    <div>
        <x-input-label for="attachment" :value="__('Attachment')"/>
        <x-text-input id="attachment" name="attachment" type="file" class="mt-1 block w-full" :value="old('attachment', $employee?->attachment)" autocomplete="attachment" placeholder="Attachment"/>
        <x-input-error class="mt-2" :messages="$errors->get('attachment')"/>
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