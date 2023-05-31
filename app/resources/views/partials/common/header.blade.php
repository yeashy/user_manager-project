@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
<header class="mb-4 shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.svg') }}" alt="Home" class="img-thumbnail"
                     style="width: 50px; height: 50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <div class="links d-flex">
                        <span class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Домой</a>
                        </span>
                        @if($user)
                            <span class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/request/list">Мои обращения</a>
                            </span>
                        @endif
                    </div>
                    <div class="auth mx-4">
                        @if($user)
                            <img src="{{ asset('images/person.svg') }}" alt="{{ $user->getAuthIdentifierName() }}" class="img-thumbnail"
                                 style="width: 50px; height: 50px">
                        @else
                            <span class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Войти</a>
                            </span>
                        @endif
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>