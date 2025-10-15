@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
    <div class="dashboard-area mt-10">
        <div class="dashboard-header-wrapper">
            <h3 class="title">My Wallets</h3>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <a href="all-currency.html" class="btn--base">View More</a>
                </div>
            </div>
        </div>
        <div class="dashboard-item-area">
            <div class="dashboard-header-wrapper">
                <h5 class="title">Fiat Currency</h5>
            </div>
            <div class="row mb-20-none">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">British Pound</span>
                            <h3 class="title">1000.00 <span class="text--danger">GBP</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/br.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">US Dollar</span>
                            <h3 class="title">500.00 <span class="text--danger">USD</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/us.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Australian Dollar</span>
                            <h3 class="title">270.00 <span class="text--danger">AUD</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/au.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Bangladesh Taka</span>
                            <h3 class="title">100.00 <span class="text--danger">BDT</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/bd.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Canadian Dollar</span>
                            <h3 class="title">1000.00 <span class="text--danger">CAD</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/cn.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Germany Euro</span>
                            <h3 class="title">500.00 <span class="text--danger">EUR</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/gm.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Indian Rupee</span>
                            <h3 class="title">270.00 <span class="text--danger">RUP</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/in.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Tunisian Dinar</span>
                            <h3 class="title">100.00 <span class="text--danger">TND</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/tn.svg") }}" alt="flag">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-area mt-20">
        <div class="dashboard-item-area">
            <div class="dashboard-header-wrapper">
                <h5 class="title">Crypto Currency</h5>
            </div>
            <div class="row mb-20-none">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Bitcoin</span>
                            <h3 class="title">1000.00 <span class="text--danger">BTC</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/btc.jpg") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Ethereum</span>
                            <h3 class="title">500.00 <span class="text--danger">ETH</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/eth.webp") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Tether</span>
                            <h3 class="title">270.00 <span class="text--danger">USDT</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/usdt.webp") }}" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Dogecoin</span>
                            <h3 class="title">100.00 <span class="text--danger">DOGE</span></h3>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset("public/frontend/images/flag/doge.webp") }}" alt="flag">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-20">
        <div class="row mb-20-none">
            <div class="col-xxl-7 col-xl-7 col-lg-7 mb-20">
                <div class="chart-wrapper">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">Add Money Chart</h4>
                    </div>
                    <div class="chart-container">
                        <div id="chart1" class="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 mb-20">
                <div class="chart-wrapper">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">Money Out Chart</h4>
                    </div>
                    <div class="chart-container">
                        <div id="chart2" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-list-area mt-20">
        <div class="dashboard-header-wrapper">
            <h4 class="title">Transfer Money Log</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <a href="transfer-money-log.html" class="btn--base">View More</a>
                </div>
            </div>
        </div>
        <div class="dashboard-list-wrapper">
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-up"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Mostafijur Rahman</h4>
                                <span class="sub-title text--danger">Sent <span class="badge badge--warning ms-2">Pending</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">78,911.61 BDT</h4>
                        <h6 class="exchange-money">1,200 AUD</h6>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-user"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>Mostafijur Rahman</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>mosta@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-wallet"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">40 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-exchange-alt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Exchange Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>1 USD = 1.00000000 EGP</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charge</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0.57 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent active">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-up"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Ruddra Khan</h4>
                                <span class="sub-title text--danger">Sent <span class="badge badge--warning ms-2">Pending</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">10,120.11 BDT</h4>
                        <h6 class="exchange-money">8,000 AUD</h6>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-user"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>Mostafijur Rahman</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>mosta@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-wallet"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">40 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-exchange-alt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Exchange Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>1 USD = 1.00000000 EGP</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charge</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0.57 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item receive">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="las la-arrow-down"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Azad Hossain</h4>
                                <span class="sub-title text--success">Received <span class="badge badge--success ms-2">Success</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <h4 class="main-money text--base">10,789.25 BDT</h4>
                        <h6 class="exchange-money">5,325 AUD</h6>
                    </div>
                </div>
                <div class="preview-list-wrapper">
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-user"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>Mostafijur Rahman</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Email</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>mosta@gmail.com</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-phone"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0123456789</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-wallet"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">40 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-exchange-alt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Exchange Rate</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>1 USD = 1.00000000 EGP</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Fees & Charge</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span>0.57 USD</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-smoking"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>Status</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="badge badge--warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection