<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
<div class="w-full max-w-md p-4 bg-white rounded-lg shadow-md">
  <div class="text-center">
    <a href="{{route('/')}}" class="text-2xl font-bold text-yellow-600">KEMBALI DASHBOARD</a>
  </div>
  <p class="mt-2 text-center text-gray-600">Silahkan Login</p>

  <form action="{{route('login')}}" method="post" class="mt-4">
    @csrf
    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <input type="email" name="email" id="email" class="form-input py-2 px-3 block w-full rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Email">
      </div>
    </div>
    <div class="mb-4">
      <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
      <div class="mt-1 relative rounded-md shadow-sm">
        <input type="password" name="password" id="password" class="form-input py-2 px-3 block w-full rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Password">
      </div>
    </div>
    <div class="flex items-center justify-between">
      <div class="text-sm">
        <!-- Add your Forgot Password link here -->
      </div>
      <div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">
          Sign In
        </button>
      </div>
    </div>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
