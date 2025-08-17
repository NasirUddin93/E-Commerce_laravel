<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title') - E-Commerce</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">

        <!-- Logo -->
        <a href="#" class="text-2xl font-bold text-blue-600">ShopEase</a>

        <!-- Search -->
        <div class="hidden md:flex flex-1 mx-6">
          <input type="text" placeholder="Search products..."
                 class="w-full px-4 py-2 border rounded-l-lg focus:outline-none">
          <button class="bg-blue-600 text-white px-4 rounded-r-lg">Search</button>
        </div>

        <!-- Cart -->
        <div class="flex space-x-6">
          <a href="#" class="text-gray-700 hover:text-blue-600">Login</a>
          <a href="#" class="relative">
            <span class="material-icons">🛒</span>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded-full">2</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

    <div class="">
        @yield('content')
    </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>&copy; 2025 ShopEase. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
