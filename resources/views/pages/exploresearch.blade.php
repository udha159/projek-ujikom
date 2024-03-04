@extends('layout.layout')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @section('content')
        <section class="mt-32">
            
        </section>
        <section class="mt-10">
            @csrf
            <div class="max-w-screen-md mx-auto">
                <div class="flex flex-wrap items-center flex-container" id="exploredata1">

                </div>
            </div>
        </section>
    @endsection
    @push('footerjsexternal')
        <script src="/javascript/bener.js"></script>
    @endpush
