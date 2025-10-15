@php
    $current_url = URL::current();
    $default = selectedLang();
    $default_lang = system_default_lang();
@endphp

<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="index.html">
                            <img src="{{ asset('public/frontend') }}/images/logo/logo-colorful.png" alt="site-logo">
                        </a>

                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggle-icon"></span>
                            <span class="toggle-icon"></span>
                            <span class="toggle-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <?php
                                    $pages = DB::table('setup_pages')->where('status',1)->get();
                                ?>

                                @foreach ($pages as $item)
                                <li class="nav-item">
                                    <a href="{{ url($item->url) }}" class="nav-link @if ($current_url == url($item->url)) active @endif">{{ __($item->title) }}</a>
                                </li>
                                @endforeach

                                <li class="nav-item">
                                    <a href="cart.html" class="nav-link cart-icon">
                                        <span class="icon-wrapper">
                                            <i class="las la-shopping-cart"></i>
                                            <span class="cart-badge">3</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="header-action">
                                <a href="login.html" class="btn--base">Login</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
