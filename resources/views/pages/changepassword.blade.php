@extends('layout.layout')
@section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
        </div>
    </section>
    <form action="/change" method="POST">
        @csrf
    <section class="max-w-[500px] mx-auto ">
        <div class="max-[480px]:w-full">
            <div class="bg-white rounded-md shadow-md ">
                <div class="flex flex-col px-4 py-4 ">
                    <h5>Old Password</h5>
                    <input type="password" name="old_password" class="py-1 rounded-md">
                    <h5>New Password</h5>
                    <input type="password" name="new_password" class="py-1 rounded-md">
                    <h5>Confirm Password</h5>
                    <input type="password" name="confirm_password" class="py-1 rounded-md">
                    <button type="submit" class="py-2 mt-4 text-white rounded-md bg-biru">Perbaharui</button>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
