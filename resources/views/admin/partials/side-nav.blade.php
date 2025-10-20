<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="{{ setRoute('admin.dashboard') }}" class="sidebar-main-logo">
                <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ get_logo($basic_settings,'white') }}"
                data-dark_img="{{ get_logo($basic_settings,'dark') }}" alt="logo">
            </a>
            <button class="sidebar-menu-bar">
                <i class="fas fa-exchange-alt"></i>
            </button>
        </div>
        <div class="sidebar-user-area">
            <div class="sidebar-user-thumb">
                <a href="{{ setRoute('admin.profile.index') }}"><img src="{{ get_image(Auth::user()->image,'admin-profile','profile') }}" alt="user"></a>
            </div>
            <div class="sidebar-user-content">
                <h6 class="title">{{ Auth::user()->fullname }}</h6>
                <span class="sub-title">{{ Auth::user()->getRolesString() }}</span>
            </div>
        </div>
        @php
            $current_route = Route::currentRouteName();
        @endphp
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.dashboard',
                    'title'     => "Dashboard",
                    'icon'      => "menu-icon las la-rocket",
                ])

                {{-- Section Default --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Default",
                    'group_links'       => [
                        [
                            'title'     => "Setup Currency",
                            'route'     => "admin.currency.index",
                            'icon'      => "menu-icon las la-coins",
                        ],
                        [
                            'title'     => "Fees & Charges",
                            'route'     => "admin.trx.settings.index",
                            'icon'      => "menu-icon las la-wallet",
                        ],
                        [
                            'title'     => "Subscribers",
                            'route'     => "admin.subscriber.index",
                            'icon'      => "menu-icon las la-bell",
                        ],
                        [
                            'title'     => "Contact Messages",
                            'route'     => "admin.contact.messages.index",
                            'icon'      => "menu-icon las la-sms",
                        ],
                        [
                            'title'     => "Category",
                            'route'     => "admin.category.index",
                            'icon'      => "menu-icon las la-bars",
            ],
                        [
                            'title'     => "Dishes Item",
                            'route'     => "admin.dishes.index",
                            'icon'      => "menu-icon las la-utensils",
                        ]
                    ]
                ])

                {{-- Section Transaction & Logs --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Transactions & Logs",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Add Money Logs",
                                'icon'      => "menu-icon las la-calculator",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.add.money.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.add.money.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.add.money.canceled",
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.add.money.index",
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Money Out Logs",
                                'icon'              => "menu-icon las la-sign-out-alt",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.money.out.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.money.out.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.money.out.canceled",
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.money.out.index",
                                    ]
                                ],
                            ],
                        ],

                    ]
                ])
                {{-- Interface Panel --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Interface Panel",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "User Care",
                                'icon'      => "menu-icon las la-user-edit",
                                'links'     => [
                                    [
                                        'title'     => "Active Users",
                                        'route'     => "admin.users.active",
                                    ],
                                    [
                                        'title'     => "Email Unverified",
                                        'route'     => "admin.users.email.unverified",
                                    ],
                                    [
                                        'title'     => "KYC Unverified",
                                        'route'     => "admin.users.kyc.unverified",
                                    ],
                                    [
                                        'title'     => "All Users",
                                        'route'     => "admin.users.index",
                                    ],
                                    [
                                        'title'     => "Email To Users",
                                        'route'     => "admin.users.email.users",
                                    ],
                                    [
                                        'title'     => "Banned Users",
                                        'route'     => "admin.users.banned",
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Admin Care",
                                'icon'              => "menu-icon las la-user-shield",
                                'links'     => [
                                    [
                                        'title'     => "All Admin",
                                        'route'     => "admin.admins.index",
                                    ],
                                    [
                                        'title'     => "Admin Role",
                                        'route'     => "admin.admins.role.index",
                                    ],
                                    [
                                        'title'     => "Role Permission",
                                        'route'     => "admin.admins.role.permission.index",
                                    ],
                                    [
                                        'title'     => "Email To Admin",
                                        'route'     => "admin.admins.email.admins",
                                    ]
                                ],
                            ],
                        ],

                    ]
                ])

                {{-- Section Settings --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Settings",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Web Settings",
                                'icon'      => "menu-icon lab la-safari",
                                'links'     => [
                                    [
                                        'title'     => "Basic Settings",
                                        'route'     => "admin.web.settings.basic.settings",
                                    ],
                                    [
                                        'title'     => "Image Assets",
                                        'route'     => "admin.web.settings.image.assets",
                                    ],
                                    [
                                        'title'     => "Setup SEO",
                                        'route'     => "admin.web.settings.setup.seo",
                                    ]
                                ],
                            ],
                            [
                                'title'             => "App Settings",
                                'icon'              => "menu-icon las la-mobile",
                                'links'     => [
                                    [
                                        'title'     => "Splash Screen",
                                        'route'     => "admin.app.settings.splash.screen",
                                    ],
                                    [
                                        'title'     => "Onboard Screen",
                                        'route'     => "admin.app.settings.onboard.screens",
                                    ],
                                    [
                                        'title'     => "App URLs",
                                        'route'     => "admin.app.settings.urls",
                                    ],
                                ],
                            ],
                        ],
                    ]
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.social.auth.user.panel.index',
                    'title'     => "Setup Social Auth",
                    'icon'      => "menu-icon las la-lock",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.languages.index',
                    'title'     => "Languages",
                    'icon'      => "menu-icon las la-language",
                ])

                {{-- Verification Center --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => "Verification Center",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Setup Email",
                                'icon'      => "menu-icon las la-envelope-open-text",
                                'links'     => [
                                    [
                                        'title'     => "Email Method",
                                        'route'     => "admin.setup.email.config",
                                    ],
                                    [
                                        'title'     => "Email Templates",
                                        'route'     => "admin.email.template.index",
                                    ]
                                ],
                            ],
                            [
                                'title'     => "SMS Providers",
                                'icon'      => "menu-icon las la-sms",
                                'links'     => [
                                    [
                                        'title'     => "Providers",
                                        'route'     => "admin.setup.sms.provider.index",
                                    ]
                                ],
                            ]
                        ],
                    ]
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.kyc.index',
                    'title'     => "Setup KYC",
                    'icon'      => "menu-icon las la-clipboard-list",
                ])

                @if (admin_permission_by_name("admin.setup.sections.section"))
                    <li class="sidebar-menu-header">{{ __("Setup Web Content") }}</li>
                    @php
                        $current_url = URL::current();

                        $setup_section_childs  = [
                            setRoute('admin.setup.sections.section','banner'),
                            setRoute('admin.setup.sections.section','menu-banner'),
                            setRoute('admin.setup.sections.section','brand'),
                            setRoute('admin.setup.sections.section','discover'),
                            setRoute('admin.setup.sections.section','popular'),
                            setRoute('admin.setup.sections.section','what-we-serve'),
                            setRoute('admin.setup.sections.section','gallery'),
                            setRoute('admin.setup.sections.section','trusted-brand'),
                            setRoute('admin.setup.sections.section','download'),
                            setRoute('admin.setup.sections.section','reservation'),
                            setRoute('admin.setup.sections.section','about-us'),
                            setRoute('admin.setup.sections.section','services'),
                            setRoute('admin.setup.sections.section','feature'),
                            setRoute('admin.setup.sections.section','clients-feedback'),
                            setRoute('admin.setup.sections.section','announcement'),
                            setRoute('admin.setup.sections.section','how-it-work'),
                            setRoute('admin.setup.sections.section','contact-us'),
                            setRoute('admin.setup.sections.section','footer'),
                            setRoute('admin.setup.sections.section','about-page'),
                            setRoute('admin.setup.sections.section','login-section'),
                            setRoute('admin.setup.sections.section','register-section'),
                            setRoute('admin.setup.sections.section','forget-password-section'),
                            setRoute('admin.setup.sections.section','reset-password-section'),
                        ];
                    @endphp

                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url,$setup_section_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-terminal"></i>
                            <span class="menu-title">{{ __("Setup Section") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.setup.sections.section','banner') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','banner')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Banner Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','menu-banner') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','menu-banner')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Menu Banner Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','brand') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','brand')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Brand Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','discover') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','discover')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Discover Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','popular') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','popular')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Popular Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','what-we-serve') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','what-we-serve')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("What We Serve Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','clients-feedback') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','clients-feedback')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Clients Feedback") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','reservation') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','reservation')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Reservation") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','gallery') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','gallery')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Gallery Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','trusted-brand') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','trusted-brand')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Trusted Brands") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','download') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','download')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Download Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','about-us') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','about-us')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("About Us Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','services') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','services')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Services Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','feature') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','feature')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Feature Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','about-page') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','about-page')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("About Page Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','contact-us') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','contact-us')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Contact US Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','footer') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','footer')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">{{ __("Footer Section") }}</span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','login-section') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','login-section')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"> {{ __("Login Section") }} </span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','register-section') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','register-section')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"> {{ __("Register Section") }} </span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','forget-password-section') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','forget-password-section')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"> {{ __("Forget Password Section") }} </span>
                                </a>
                                <a href="{{ setRoute('admin.setup.sections.section','reset-password-section') }}" class="nav-link @if ($current_url == setRoute('admin.setup.sections.section','reset-password-section')) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"> {{ __("Reset Password Section") }} </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.pages.index',
                    'title'     => "Setup Pages",
                    'icon'      => "menu-icon las la-file-alt",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.extension.index',
                    'title'     => "Extensions",
                    'icon'      => "menu-icon las la-puzzle-piece",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.useful.links.index',
                    'title'     => "Useful Links",
                    'icon'      => "menu-icon las la-link",
                ])

                @if (admin_permission_by_name("admin.payment.gateway.view"))
                    <li class="sidebar-menu-header">Payment Methods</li>
                    @php
                        $payment_add_money_childs  = [
                            setRoute('admin.payment.gateway.view',['add-money','automatic']),
                            setRoute('admin.payment.gateway.view',['add-money','manual']),
                        ];
                        $current_url = URL::current();
                    @endphp
                    <li class="sidebar-menu-item sidebar-dropdown @if (in_array($current_url,$payment_add_money_childs)) active @endif">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-funnel-dollar"></i>
                            <span class="menu-title">Add Money</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('admin.payment.gateway.view',['add-money','automatic']) }}" class="nav-link @if ($current_url == setRoute('admin.payment.gateway.view',['add-money','automatic'])) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">Automatic</span>
                                </a>
                                <a href="{{ setRoute('admin.payment.gateway.view',['add-money','manual']) }}" class="nav-link @if ($current_url == setRoute('admin.payment.gateway.view',['add-money','manual'])) active @endif">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title">Manual</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item @if ($current_url == setRoute('admin.payment.gateway.view',['money-out','manual'])) active @endif">
                        <a href="{{ setRoute('admin.payment.gateway.view',['money-out','manual']) }}">
                            <i class="menu-icon las la-print"></i>
                            <span class="menu-title">Money Out</span>
                        </a>
                    </li>
                @endif

                {{-- Notifications --}}
                @include('admin.components.side-nav.link-group',[
                    'group_title'       => __("Notification"),
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => __("Push Notification"),
                                'icon'      => "menu-icon las la-bell",
                                'links'     => [
                                    [
                                        'title'     => __("Setup Notification"),
                                        'route'     => "admin.push.notification.config",
                                    ],
                                    [
                                        'title'     => __("Send Notification"),
                                        'route'     => "admin.push.notification.index",
                                    ]
                                ],
                            ]
                        ],

                    ]
                ])

                @php
                    $bonus_routes = [
                        'admin.cookie.index',
                        'admin.server.info.index',
                        'admin.cache.clear',
                    ];
                @endphp

                @if (admin_permission_by_name_array($bonus_routes))
                    <li class="sidebar-menu-header">{{ __("Bonus") }}</li>
                @endif

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.cookie.index',
                    'title'     => __("GDPR Cookie"),
                    'icon'      => "menu-icon las la-cookie-bite",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.server.info.index',
                    'title'     => __("Server Info"),
                    'icon'      => "menu-icon las la-sitemap",
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.error.logs.index',
                    'title'     => __("Error Logs"),
                    'icon'      => "menu-icon las la-bug",
                ])

                @include('admin.components.side-nav.link',[
                    'route'     => 'admin.cache.clear',
                    'title'     => __("Clear Cache"),
                    'icon'      => "menu-icon las la-broom",
                ])
            </ul>
        </div>
    </div>
</div>
