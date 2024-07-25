<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">Multi Region</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Home</a>
            @if($currentCity)
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('about') }}">About us</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('news') }}">News</a>
            @endif
        </nav>
    </div>

    <div class="region-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">
            {{  $currentCity->name ?? 'Select a City' }}
        </h1>
    </div>
</header>
