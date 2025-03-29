<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'" class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'" class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="{{ url('/admin/dashboard') }}">
            <span :class="sidebarToggle ? 'hidden' : ''" class="logo">
                <h3 class="text-black text-2xl m-auto text-center">E R P System</h3>
            </span>
            <h3 :class="sidebarToggle ? 'lg:block' : 'hidden'" class="text-black text-2xl">ERP</h3>
        </a>
    </div>

    <!-- SIDEBAR HEADER -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-group-title">
                        MENU
                    </span>
                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto fill-current menu-group-icon" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z" fill="" fill-rule="evenodd">
                        </path>
                    </svg>
                </h3>
                <ul class="flex flex-col gap-4 mb-6">
                    <!-- Menu Item Pages -->
                    <li>
                        <a @click.prevent="selected = (selected === 'Pages' ? '':'Pages')" class="menu-item group" href="#">
                            <i class="fa fa-gear"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Settings
                            </span>
                            <svg :class="[(selected === 'Pages') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages') ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a  class="menu-dropdown-item group hidden" href="{{ url('/admin/site_settings') }}">
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/password' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/password') }}">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a @click.prevent="selected = (selected === 'Pages2' ? '':'Pages2')" class="menu-item group" href="{{ url('/admin/users') }}">
                            <i class="fa fa-users"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Manage Users
                            </span>
                            <svg :class="[(selected === 'Pages2') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages2') ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a class="menu-dropdown-item group hidden {{ Request::path() == 'admin/users' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/users') }}">
                                        Super Admin
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/customers' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/customers') }}">
                                        Manage Customers
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/vendors' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/vendors') }}">
                                        Manage Vendors
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/employees' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/employees') }}">
                                        Manage Employee
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/other_users' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/other_users') }}">
                                        Other Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a @click.prevent="selected = (selected === 'Pages3' ? '':'Pages3')" class="menu-item group" href="#">
                            <i class="fa fa-list"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Manage Categories
                            </span>
                            <svg :class="[(selected === 'Pages3') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages3') ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/categories' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/categories') }}">
                                        Manage Categories
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a @click.prevent="selected = (selected === 'Pages4' ? '':'Pages4')" class="menu-item group" href="{{ url('/admin/companies') }}">
                            <i class="fa fa-globe"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Manage Companies
                            </span>
                            <svg :class="[(selected === 'Pages4') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages4') ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/companies' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/companies') }}">
                                        Manage Companies
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a @click.prevent="selected = (selected === 'Pages5' ? '':'Pages5')" class="menu-item group" href="#">
                            <i class="fa fa-barcode"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Manage Branches
                            </span>
                            <svg :class="[(selected === 'Pages5') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages5') ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/branches' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/branches') }}">
                                        Manage Branches
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a @click.prevent="selected = (selected === 'Pages6 ? '':'Pages6)" class="menu-item group" href="#">
                            <i class="fa fa-sitemap"></i>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-item-text">
                                Manage Items
                            </span>
                            <svg :class="[(selected === 'Pages6) ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : '' ]" class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                </path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu Start -->
                        <div :class="(selected === 'Pages6) ? 'block' :'hidden'" class="overflow-hidden transform translate">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'" class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a class="menu-dropdown-item group {{ Request::path() == 'admin/items' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive' }}" href="{{ url('/admin/items') }}">
                                        Manage Items
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <!-- Menu Item Pages -->
                </ul>
            </div>
            <!-- Others Group -->
            <div class="">
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span :class="sidebarToggle ? 'lg:hidden' : ''" class="menu-group-title">
                        In progress
                    </span>
                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto fill-current menu-group-icon" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z" fill="" fill-rule="evenodd">
                        </path>
                    </svg>
                </h3>
                <ul class="flex flex-col gap-4 mb-6">
                    
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
        <!-- Promo Box -->
        <div :class="sidebarToggle ? 'lg:hidden' : ''" class="mx-auto mb-10 w-full max-w-60 px-4 py-5 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-9 px-4 py-2 bg-black text-white block fixed bottom-10 m-auto" style="width: 90%;left: 10px;"
                >
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
        <!-- Promo Box -->
    </div>
</aside>