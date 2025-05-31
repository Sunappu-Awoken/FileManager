<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts & Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">

  {{-- Primary Navigation --}}
  @include('layouts.navigation')

  {{-- Optional Page Header --}}
  @hasSection('header')
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('header')
      </div>
    </header>
  @endif

  {{-- Secondary Nav (Dashboard + FileManager) --}}
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center space-x-4">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="url('laravel-filemanager?type=Files')" :active="request()->is('laravel-filemanager*')">
          {{ __('File Manager') }}
        </x-nav-link>
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <main class="flex-1 max-w-7xl mx-auto w-full px-4 py-6 sm:px-6 lg:px-8">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-white border-t border-gray-200 text-center py-4">
    &copy; {{ date('Y') }} {{ config('app.name') }}
  </footer>

</body>
</html>
