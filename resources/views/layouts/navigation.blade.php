<header class="sticky top-0 flex w-full bg-white border-gray-200 z-99999 dark:border-gray-800 dark:bg-gray-900 lg:border-b" x-data="{menuToggle: false}">
    <div class="flex flex-col items-center justify-between flex-grow lg:flex-row lg:px-6">
        <div class="flex items-center justify-between w-full gap-2 px-3 py-3 border-b border-gray-200 dark:border-gray-800 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4">
            <!-- Hamburger Toggle BTN -->
            <button :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''" @click.stop="sidebarToggle = !sidebarToggle" class="flex items-center justify-center w-10 h-10 text-gray-500 border-gray-200 rounded-lg z-99999 dark:border-gray-800 dark:text-gray-400 lg:h-11 lg:w-11 lg:border">
                <svg class="hidden fill-current lg:block" fill="none" height="12" viewbox="0 0 16 12" width="16" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z" fill="" fill-rule="evenodd">
                    </path>
                </svg>
                <svg :class="sidebarToggle ? 'hidden' : 'block lg:hidden'" class="fill-current lg:hidden" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25L20 5.25C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L12 12.75C12.4142 12.75 12.75 12.4142 12.75 12C12.75 11.5858 12.4142 11.25 12 11.25L4 11.25Z" fill="" fill-rule="evenodd">
                    </path>
                </svg>
                <!-- cross icon -->
                <svg :class="sidebarToggle ? 'block lg:hidden' : 'hidden'" class="fill-current" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z" fill="" fill-rule="evenodd">
                    </path>
                </svg>
            </button>
            <!-- Hamburger Toggle BTN -->
            <a class="lg:hidden" href="index.html">
                <img alt="Logo" class="dark:hidden" src="{{url('images/logo/logo.svg')}}"/>
                <img alt="Logo" class="hidden dark:block" src="{{url('images/logo/logo-dark.svg')}}"/>
            </a>
            <!-- Application nav menu button -->
            <button :class="menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''" @click.stop="menuToggle = !menuToggle" class="flex items-center justify-center w-10 h-10 text-gray-700 rounded-lg z-99999 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 lg:hidden">
                <svg class="fill-current" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z" fill="" fill-rule="evenodd">
                    </path>
                </svg>
            </button>
            <!-- Application nav menu button -->
            <div class="hidden lg:block d-none hidden">
                <form action="https://formbold.com/s/unique_form_id" method="POST" class="d-none hidden">
                    <div class="relative">
                        <button class="absolute -translate-y-1/2 left-4 top-1/2">
                            <svg class="fill-gray-500 dark:fill-gray-400" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill="" fill-rule="evenodd">
                                </path>
                            </svg>
                        </button>
                        <input class=" dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-200 bg-transparent py-2.5 pl-12 pr-14 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-none focus:ring focus:ring-brand-500/10 dark:border-gray-800 dark:bg-gray-900 dark:bg-white/[0.03] dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 xl:w-[430px]" placeholder="Search or type command..." type="text"/>
                        <button class="absolute right-2.5 top-1/2 inline-flex -translate-y-1/2 items-center gap-0.5 rounded-lg border border-gray-200 bg-gray-50 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-400">
                            <span>
                                ⌘
                            </span>
                            <span>
                                K
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div :class="menuToggle ? 'flex' : 'hidden'" class="items-center justify-between w-full gap-4 px-5 py-4 shadow-theme-md lg:flex lg:justify-end lg:px-0 lg:shadow-none">
            <div class="flex items-center gap-2 2xsm:gap-3">
                <!-- Dark Mode Toggler -->
                <button @click.prevent="darkMode = !darkMode" class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="hidden dark:block" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" fill="currentColor" fill-rule="evenodd">
                        </path>
                    </svg>
                    <svg class="dark:hidden" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" fill="currentColor">
                        </path>
                    </svg>
                </button>
                <!-- Dark Mode Toggler -->
                <!-- Notification Menu Area -->
                <div @click.outside="dropdownOpen = false" class="d-none hidden relative" x-data="{ dropdownOpen: false, notifying: true }">
                    <button @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false" class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                        <span :class="!notifying ? 'hidden' : 'flex'" class="absolute right-0 top-0.5 z-1 h-2 w-2 rounded-full bg-orange-400">
                            <span class="absolute inline-flex w-full h-full bg-orange-400 rounded-full opacity-75 -z-1 animate-ping">
                            </span>
                        </span>
                        <svg class="fill-current" fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M10.75 2.29248C10.75 1.87827 10.4143 1.54248 10 1.54248C9.58583 1.54248 9.25004 1.87827 9.25004 2.29248V2.83613C6.08266 3.20733 3.62504 5.9004 3.62504 9.16748V14.4591H3.33337C2.91916 14.4591 2.58337 14.7949 2.58337 15.2091C2.58337 15.6234 2.91916 15.9591 3.33337 15.9591H4.37504H15.625H16.6667C17.0809 15.9591 17.4167 15.6234 17.4167 15.2091C17.4167 14.7949 17.0809 14.4591 16.6667 14.4591H16.375V9.16748C16.375 5.9004 13.9174 3.20733 10.75 2.83613V2.29248ZM14.875 14.4591V9.16748C14.875 6.47509 12.6924 4.29248 10 4.29248C7.30765 4.29248 5.12504 6.47509 5.12504 9.16748V14.4591H14.875ZM8.00004 17.7085C8.00004 18.1228 8.33583 18.4585 8.75004 18.4585H11.25C11.6643 18.4585 12 18.1228 12 17.7085C12 17.2943 11.6643 16.9585 11.25 16.9585H8.75004C8.33583 16.9585 8.00004 17.2943 8.00004 17.7085Z" fill="" fill-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown Start -->
                    <div class=" absolute -right-[240px] mt-[17px] flex h-[480px] w-[350px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark sm:w-[361px] lg:right-0" x-show="dropdownOpen">
                        <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-100 dark:border-gray-800">
                            <h5 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Notification
                            </h5>
                            <button @click="dropdownOpen = false" class="text-gray-500 dark:text-gray-400">
                                <svg class="fill-current" fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z" fill="" fill-rule="evenodd">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <ul class="flex flex-col h-auto overflow-y-auto custom-scrollbar">
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-02.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Terry Franci
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                5 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-03.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Alena Franci
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                8 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-04.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Jocelyn Kenter
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                15 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-05.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-error-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Brandon Philips
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                1 hr ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-02.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Terry Franci
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                5 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-03.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Alena Franci
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                8 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-04.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-success-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Jocelyn Kenter
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                15 min ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5" href="#">
                                    <span class="relative block w-full h-10 rounded-full z-1 max-w-10">
                                        <img alt="User" class="overflow-hidden rounded-full" src="{{url('images/user/user-05.jpg')}}"/>
                                        <span class="absolute bottom-0 right-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white bg-error-500 dark:border-gray-900">
                                        </span>
                                    </span>
                                    <span class="block">
                                        <span class="mb-1.5 block text-theme-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Brandon Philips
                                            </span>
                                            requests permission to change
                                            <span class="font-medium text-gray-800 dark:text-white/90">
                                                Project - Nganter App
                                            </span>
                                        </span>
                                        <span class="flex items-center gap-2 text-gray-500 text-theme-xs dark:text-gray-400">
                                            <span>
                                                Project
                                            </span>
                                            <span class="w-1 h-1 bg-gray-400 rounded-full">
                                            </span>
                                            <span>
                                                1 hr ago
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <a class="mt-3 flex justify-center rounded-lg border border-gray-300 bg-white p-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200" href="#">
                            View All Notification
                        </a>
                    </div>
                    <!-- Dropdown End -->
                </div>
                <!-- Notification Menu Area -->
            </div>
            <!-- User Area -->
            <div @click.outside="dropdownOpen = false" class="relative" x-data="{ dropdownOpen: false }">
                <a @click.prevent="dropdownOpen = ! dropdownOpen" class="flex items-center text-gray-700 dark:text-gray-400" href="#">
                    <span class="mr-3 overflow-hidden rounded-full h-11 w-11">
                        <img alt="User" src="{{url('images/user/owner.jpg')}}"/>
                    </span>
                    <span class="block mr-1 font-medium text-theme-sm">
                        Administrator
                    </span>
                    <svg :class="dropdownOpen && 'rotate-180'" class="stroke-gray-500 dark:stroke-gray-400" fill="none" height="20" viewbox="0 0 18 20" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.3125 8.65625L9 13.3437L13.6875 8.65625" stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                        </path>
                    </svg>
                </a>
                <!-- Dropdown Start -->
                <div class="absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark" x-show="dropdownOpen">
                    <div>
                        <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                            Super Admin
                        </span>
                        <span class="mt-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
                            randomuser@pimjo.com
                        </span>
                    </div>
                    <ul class="flex flex-col gap-1 pt-4 pb-3 border-b border-gray-200 dark:border-gray-800">
                       
                    </ul>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="flex vertical-center items-center align-center">
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-3 px-3 py-2 mt-3 font-medium text-gray-700 rounded-lg group text-theme-sm hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                            >
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </div>
                    </form>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>