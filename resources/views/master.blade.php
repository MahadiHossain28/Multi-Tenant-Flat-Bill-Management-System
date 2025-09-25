<x-main-layout class="min-vh-100 d-flex flex-column justify-content-between">
    <header>
        @include('backend.includes.header')
    </header>

    <main>
        <section class="py-4 px-3">
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
