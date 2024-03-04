<!--navbar-->
@extends('layout.layout1')
@push('cssjsexternal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
<!--/navbar-->
@section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane">Profile</h3>
        </div>
    </section>
    <section>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="/pic/{{ old('pictures', Auth::User()->pictures) }}" alt="" class="w-20 h-20 rounded-full">
            </div>
            <h3 class="text-xl font-semibold">
                {{ old('nama_lengkap', Auth::User()->nama_lengkap) }}
            </h3>
            <div class="mb-4"></div>
            <div class="flex justify-between gap-2">
                <a href="/profile" type="button" class="items-center bg-blue-600 text-white px-4 py-1 rounded-full">
                    <h3 class="text-1xl font-semibold">
                        Edit Profil
                    </h3>
                </a>
            </div>
            <div class="mb-4"></div>
            <small class="text-center text-xs ">{{ old('bio', Auth::User()->bio) }}</small>
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <!--Album-->
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="album-tab" data-tabs-target="#album"
                            type="button" role="tab" aria-controls="album" aria-selected="false">Album</button>
                    </li>
                    <!--Postingan-->
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="postingan-tab" data-tabs-target="#postingan" type="button" role="tab"
                            aria-controls="postingan" aria-selected="false">Postingan Semua</button>
                    </li>
                    <!--Pinned-->
                    
                </ul>
            </div>
        </div>
        <!--album-->
        <section class="mt-2">
            <div class="hidden" id="album" role="tabpanel" aria-roledescription="album-tab">
                <div class="max-w-screen-md mx-auto">  
                    @foreach ($album as $post)
                    <div class="flex flex-wrap items-center flex-container" id="">
                    <div class="flex mt-2">
                        <div class="mt-2 flex flex-col px-2 py-4 bg-white shadow-md rounded-md">
                            <div class="mb-2">
                                <div class="ml-2 flex justify-between space-x-2">
                                    <a href="/profilsaya">
                                        <div class="flex flex-wrap items-center space-x-2">
                                            <img src="/pic/{{ old('pictures', Auth::User()->pictures) }}" alt="User Avatar"
                                                class="w-8 h-8 rounded-full">
                                            <div>
                                            </div>
                                        </div>
                                    </a>
                                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                        class="hover:bg-gray-50 rounded-full p-1 font-medium" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg"width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="7" r="1" />
                                            <circle cx="12" cy="17" r="1" />
                                            <circle cx="12" cy="12" r="1" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownDots"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconButton">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="/fotoalbum/{{ $post->id }}">
                                <div class="w-[363px] h-[192px] overflow-hidden rounded-md">
                                    <img src="/pic/{{ old('pictures', Auth::User()->pictures) }}" alt=""
                                        class="w-full transition duration-500 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                        {{ $post->deskripsi }}
                                        </div>
                                        <div class="text-blue-500 text-sm">
                                        {{ $post->Nama_Album }}
                                       
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>  
                        </div>
                    </div>
            @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!--Postingan-->
        <section class="mt-0">
    <div class="hidden" id="postingan" role="tabpanel" aria-roledescription="postingan-tab">
        <div class="max-w-screen-md mx-auto">
            <div class="grid grid-cols-2 gap-4">
                @foreach ($posts as $post)
                    <div class="flex mt-2">
                        <div class="mt-2 flex flex-col px-2 py-4 bg-white shadow-md rounded-md">
                            <!-- ... Konten Postingan ... -->
                            <a href="/explore-detail/{{ $post->id }}">
                                <div class="w-[363px] h-[192px] overflow-hidden rounded-md">
                                    <img src="{{ asset('assets/' . $post->url) }}" alt=""
                                        class="w-full transition duration-500 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div class="font-bold">
                                            {{ $post->judul_foto }}
                                        </div>
                                        <div>
                                            {{ $post->deskripsi_foto }}
                                        </div>
                                    </div>
                                </div>
                                <div class="text-blue-500 text-sm">
                                    {{ $post->Nama_Album }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mb-28"></div>
</section>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

