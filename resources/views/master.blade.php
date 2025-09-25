<x-main-layout class="min-vh-100 d-flex flex-column">
    <header class="sticky-top bg-white shadow">
        @include('backend.includes.header')
    </header>

    <main class="flex-grow-1 d-flex flex-column">
        <section class="py-4 px-3 flex-grow-1 d-flex flex-column">
            @yield('content')
        </section>
    </main>

    <footer>
        @include('backend.includes.footer')
    </footer>

    @prepend('scripts')
        @vite('resources/js/app.js')
    @endprepend
</x-main-layout>
