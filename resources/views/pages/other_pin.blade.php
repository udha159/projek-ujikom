@extends('layout.layout')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @section('content')
        <section class="mt-32">
            <div class="items-center max-w-screen-md mx-auto ">
                <h3 class="text-5xl text-center font-hurricane">PinMe</h3>
            </div>
        </section>
        <section>
            @csrf
            <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
                <div>
                    <img src="/assets/users.png" alt="" class="w-24" id="imageUser">
                </div>
                <h3 class="text-xl font-semibold" id="namaUser">
                    OmenSoft
                </h3>
                <small class="text-xs " id="bio">In this link, I present my services as well as all the tools that help me
                    in
                    drawing</small>
                <div class="flex flex-row mt-3">
                    <a href="follower.html">
                        <small class="mr-4 text-abuabu" id="follower"></small>
                    </a>
                    <a href="following.html">
                        <small class="text-abuabu" id="follow">6 Mengikuti</small>
                    </a>

                </div>
                <div id="tombolikuti">
                    <button class="px-4 mt-4 text-white bg-black rounded-full">Ikuti</button>
                </div>
            </div>
        </section>
        <section class="mt-10">
            <div class="max-w-screen-md mx-auto">
                <div class="flex flex-wrap items-center flex-container">
                    <div class="flex mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_01.png" alt=""
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
                    <div class="flex mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_02.png" alt=""
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
                    <div class="flex mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_04.png" alt=""
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
                    <div class="flex mt-2 bg-white">
                        <div class="flex flex-col px-2">
                            <a href="explore-detail.html">
                                <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                    <img src="/assets/bg_01.png" alt=""
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
                </div>
            </div>
        </section>
    @endsection
    @push('footerjsexternal')
        <script src="/javascript/otherpin.js"></script>
    @endpush
