@extends('layout.layout')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @section('content')
        <section class="mt-36 ml-28" >
    <h4 class="text-xl font-semibold">Judul Album</h4>
</section>
  <section class="mt-14">
  <div class="max-w-screen-xl ml-28 mx-auto">
                <div class="flex flex-wrap items-center flex-container">
                @foreach($album as $post)
                    <div class="flex mt-2 ">
                        <div class="flex flex-col px-2">
                            <a href="/explore-detail/{{ $post->id }}">
                                <div class="w-[363px] h-[192px] mt-5 bg-bgcolor2 overflow-hidden">
                                    <img src="{{ asset('assets/' . $post->url) }}" alt=""
                                        class="w-full transition duration-500 ease-in-out hover:scale-105">
                                </div>
                            </a>
                            <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                                <div>
                                    <div class="flex flex-col text-white">
                                        <div>
                                        {{ $post->judul_foto }}
                                        </div>
                                        <div class="text-white">
                                        {{ $post->deskripsi_foto }}
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
</section>
    @endsection

