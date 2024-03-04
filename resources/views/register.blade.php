<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="src/css/build.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
</head>

<body class="bg-black">
  <nav class=" border-3 bg-red-600 ">
    <div class="flex justify-between max-w-screen-md mx-auto py-3">

      <div class="text-2xl px-4 py-1 rounded-full text-black font-semibold">
        <div class=" inline text-green-600 font-semibold">G</div>ALERRY FOTO
      </div>
      <div>
        <button class=" inline bg-white px-4 py-1 rounded-full text-black font-extrabold"><a href="/login">LOGIN</a></button>
      </div>
    </div>
  </nav>
<div class="bg-pink-200 shadow-lg w-1/4 p-2 mx-auto mt-20 rounded-xl px-11 py-11">
  <div>
    <div>
    <form action="/proses_register" method="POST" >
      
                @csrf
                 
    <h2 class=" bg-white font-fontutama text-3xl text-center rounded-xl">REGISTRASI</h2>
    @if ($message = Session::get('success'))
                <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    <div class="text-px5 text-center text-black font-medium ms-3">
                      {{ $message }}
                    </div>
                      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                      
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                @endif
    
<div>
    <div class="mb-4 mt-9">
        <label for="" class="font-semibold">EMAIL</label>
        <input name="email" type="text" class="w-full p-1 border border-slate-400 rounded-md bg-slate-50">
    </div> 
    <div>
    <label for="" class="font-semibold">PASSWORD</label>
    <input name="password" type="password" class="w-full p-1 border border-slate-400 rounded-md bg-slate-50">
</div>
<div class="mt-4">
    <label for="" class="font-semibold">KONFIRMASI PASSWORD</label>
    <input name="tgl_lahir" type="date" class="w-full p-1 border border-slate-400 rounded-md bg-slate-50">
</div>
<button class="bg-black px-4 py-1 rounded-full w-full mt-8 text-white">BUAT AKUN</button>
</form>
</body>
</html>