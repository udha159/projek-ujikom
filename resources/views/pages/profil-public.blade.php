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
            <h3 class="text-5xl text-center font-hurricane">Flustpicture</h3>
        </div>
    </section>
    <section>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="/pic/{{$pictures}}" alt="" class="w-24 h-24 rounded-full">
            </div>
            <h3 class="text-xl font-semibold">
                {{$nama_lengkap}}
            </h3>
            <small class="text-xs ">P</small>
            <div class="flex flex-row mt-3">
                <a href="follower.html">
                    <small class="mr-4 text-abuabu">1000 follower</small>
                </a>
                <a href="following.html">
                    <small class="text-abuabu">6 following</small>
                </a>

            </div>
            <button class="px-4 mt-4 text-white bg-black rounded-full">follow</button>
        </div>
    </section>
    <section class="mt-10">
        <input type="hidden" value="{{$user_id}}" id="input-user_id">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="publicfoto">

            </div>
        </div>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profilpublic.js"></script>
@endpush
