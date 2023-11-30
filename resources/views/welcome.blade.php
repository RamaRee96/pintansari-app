<!doctype html>
<html class="h-full bg-white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Klinik Pintan Sari | Login</title>
</head>
<body class="h-full">
  <div class="bg-gray-100 flex h-screen justify-center items-center">
    <form method="post" action="{{ route('submit_login') }}" class="bg-white shadow-md p-8 rounded">
        @csrf
        @method('POST')
        <div>
            <label for="">Email</label>
            <input type="text" class="shadow-sm appearance-none border rounded w-full p-3"
            placeholder="Email" name="email">
        </div>
        <div>
          <label for="">Password</label>
          <input type="password" class="shadow-sm appearance-none border rounded w-full p-3"
          placeholder="Password" name="password">
      </div>

      <div class="mt-4 mb-2">
        @error('email')
        <div class="w-full p-2 text-md text-blue-400 ">{{ $message }}</div>
        @enderror

        @error('password')
        <div class="w-full p-2 text-md text-blue-400 ">{{ $message }}</div>
        @enderror
      </div>

        <div>
            <button type="submit" class="w-full p-3 shadow-sm rounded-sm text-white bg-blue-300 mt-2 hover:border-2 hover:border-blue-300 hover:bg-white hover:text-gray-400 hover:rounded-lg">Login</button>
        </div>
    </form>
  </div>
</body>
</html>