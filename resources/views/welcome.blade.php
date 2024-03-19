<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Welcome</title>
</head>
<body>
<section class="bg-gray-50">
  <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
    <div class="mx-auto max-w-xl text-center">
      <h1 class="text-3xl font-extrabold sm:text-5xl">
        Students Attachment Monitoring System
      </h1>

      <p class="mt-4 sm:text-xl/relaxed">
      Get started by signing up or log in if you already have an account.
      </p>

      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <a
          class="block w-full rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-white-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
          href="{{url('/register')}}"
        >
          Get Started
        </a>

        <a
          class="block w-full rounded px-12 py-3 text-sm font-medium text-blue-600 shadow hover:text-blue-700 focus:outline-none focus:ring active:text-red-500 sm:w-auto"
          href="{{url('/login')}}"
        >
          Login
        </a>
      </div>
    </div>
  </div>
</section>
</body>
</html>