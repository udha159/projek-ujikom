<nav class="fixed top-0 z-20 w-full bg-red-600 shadow-md">
    <div class="flex flex-wrap items-center justify-center max-w-screen-xl p-4 mx-auto">
    <div class="text-1xl px-2 py-1 rounded-full text-black font-semibold">
        <div class=" inline text-green-600 font-semibold">G</div>ALERRY FOTO</div>
        <a href="/explore" class="mr-4 font-semibold">HOME</a>
        <a href="/pin" class="mr-4 font-semibold">UPLOAD</a>
        <form action="/explore" method="get">
        <input type="text" class="px-4 py-1 mr-4 rounded-full" placeholder="Search ..." name="cari">
        </form>
        <div class="flex items-center space-x-1 md:order-2 md:space-x-0 rtl:space-x-reverse">
        <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown-menu"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
        <img src="/pic/{{ old('pictures', Auth::User()->pictures) }}" alt="User Avatar" class="w-8 h-8 rounded-full">
            <!-- Drop Down -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                id="user-dropdown-menu">
                <ul class="py-2" role="none">
                    <li>
                    <a href="/profilsaya" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <div class="inline-flex items-center">
                                Profil
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/edit" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <div class="inline-flex items-center">
                                Ubahprofil
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/changepassword" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">
                            <div class="inline-flex items-center">
                                Change Password
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/logout" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <div class="inline-flex items-center">
                                Log Out
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Navigation -->
        </div>
    </div>
</nav>
