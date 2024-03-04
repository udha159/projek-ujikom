@extends('layout.layout1')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @section('content')
        <section class="mt-32">
            <div class="items-center max-w-screen-md mx-auto ">
                <h3 class="text-5xl text-center font-hurricane">PinMe</h3>
            </div>
        </section>
        <section class="mt-10"> 
            @csrf
            <div class="max-w-screen-md mx-auto">
                <div class="flex flex-wrap px-2 flex-container">
                    <div class="w-3/5 max-[480px]:w-full">
                        <div class="flex justify-center overflow-hidden">
                            <img src="" alt=""
                                class="rounded-md"
                                id="fotodetail">
                        </div>
                        <div class="flex flex-col px-2">
                            <div class="font-semibold" id="judulfoto">
                            </div>
                            <div>
                                <small class="text-abuabu" id="deskripsifoto"> </small>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/5  max-[480px]:w-full">
                        <div class="flex flex-wrap items-center justify-between ">
                            <div class="flex flex-row items-center gap-2">
                                <div>
                                    <img src="" class="w-10" alt="User avatar" id="bebas">
                                </div>
                                <div class="flex flex-col">
                                    <a href="/profil_public/" class="text-md" id="username"></a>
                                    <small class="text-xs" id="jumlahpengikut"></small>
                                </div>
                            </div>
                            <div id="tombolfollow">
                                <button class="px-4 rounded-full bg-bgcolor2">Ikuti</button>
                            </div>
                        </div>
                        <div class="mt-[33px]">
                            Comments
                        </div>
                        <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="listkomentar">
                        </div>
                        <div class="flex gap-2 mt-2">
                            <div class="w-3/4">
                                <input type="text" name="tekskomentar" id=""
                                    class="w-full px-2 py-1 rounded-full border-slate-500">
                            </div>
                            <button class="px-4 rounded-full bg-biru"><span class="text-white bi bi-send"
                                    onclick="kirimkomentar()"></span></button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mt-10 flex-container" id="postinganbawah">
                    {{-- <div class="flex mx-auto mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_01.jpg" alt=""
                                        class="w-full transition duration-300 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                            Kebahagiaan
                                        </div>
                                        <div class="text-xs text-abuabu">
                                            15w
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="bi bi-tag-fill"></span>
                                    <small>40</small>
                                    <span class="bi bi-chat-left-text"></span>
                                    <small>14</small>
                                    <span class="bi bi-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mx-auto mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_02.jpg" alt=""
                                        class="w-full transition duration-300 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                            Kebahagiaan
                                        </div>
                                        <div class="text-xs text-abuabu">
                                            15w
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="bi bi-tag-fill"></span>
                                    <small>40</small>
                                    <span class="bi bi-chat-left-text"></span>
                                    <small>14</small>
                                    <span class="bi bi-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mx-auto mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_04.jpg" alt=""
                                        class="w-full transition duration-300 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                            Kebahagiaan
                                        </div>
                                        <div class="text-xs text-abuabu">
                                            15w
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="bi bi-tag-fill"></span>
                                    <small>40</small>
                                    <span class="bi bi-chat-left-text"></span>
                                    <small>14</small>
                                    <span class="bi bi-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex mx-auto mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_01.jpg" alt=""
                                        class="w-full transition duration-300 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col">
                                        <div>
                                            Kebahagiaan
                                        </div>
                                        <div class="text-xs text-abuabu">
                                            15w
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="bi bi-tag-fill"></span>
                                    <small>40</small>
                                    <span class="bi bi-chat-left-text"></span>
                                    <small>14</small>
                                    <span class="bi bi-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    @endsection
    @push('footerjsexternal')
        <script src="/javascript/exploredetail.js"></script>
    @endpush
