@php
    $category = App\Models\Admin\Category::where('status',1)->get();
    $dishes = App\Models\Admin\Dishes::where('popular', 1)->where('status', 1)->take(8)->get();
@endphp
<section class="menu-details-section">
    <div class="container">
        <!-- Sticky Navigation -->
        <nav class="menu-details-nav" id="menuNav">
            <ul class="nav-links">
                @foreach ($category ?? [] as $item)

                <li class="nav-item">
                    <a href="#{{ @$item->slug }}" class="nav-link menu-nav-active" data-target="{{ @$item->slug }}">{{ @$item->data->language->$select_lang->name ?? $item->data->language->$default_lang->name }}</a>
                </li>

                @endforeach
                {{-- <li class="nav-item">
                    <a href="#snacks" class="nav-link menu-nav-active" data-target="snacks">Snacks</a>
                </li>
                <li class="nav-item">
                    <a href="#breakfast" class="nav-link" data-target="breakfast">Breakfast</a>
                </li>
                <li class="nav-item">
                    <a href="#offers" class="nav-link" data-target="offers">Offer Items</a>
                </li>
                <li class="nav-item">
                    <a href="#specials" class="nav-link" data-target="specials"> Specials</a>
                </li>--}}
            </ul>
        </nav>

        @forelse ($category ?? [] as $item)
            @php
                $item_dishes = App\Models\Admin\Dishes::where('category_id', $item->id)->where('status', 1)->get();
            @endphp
            <div class="menu-category" id="{{ @$item->slug }}" >
                <div class="row">
                    <div class="col-12">
                        <div class="category-content">
                            <h3 class="category-title">{{ @$item->data->language->$select_lang->name ?? $item->data->language->$default_lang->name }}</h3>
                            <div class="row">
                                @forelse ($item_dishes ?? [] as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="dish-card {{ $item->qty <= 0 ? 'sold-out' : '' }}">
                                        <div class="dish-card-image">
                                            <img src="{{ get_image(@$item->image ?? '',"dishes") }}" alt="Margherita Pizza">
                                            <div class="dish-card-badge {{ $item->qty <= 0 ? 'badge-sold-out' : 'badge-available' }}">
                                                {{ $item->qty <= 0 ? __('Sold Out') : __('Available') }}
                                            </div>
                                        </div>
                                        <div class="dish-card-content">
                                            <h3 class="dish-card-title">{{ $item?->data?->language?->$select_lang?->dish_name ?? $item?->data?->language?->$default_lang?->dish_name }}</h3>
                                            <p class="dish-card-price">{{ get_amount(@$item->price) }} {{ get_default_currency_code() }}</p>
                                            <p class="dish-card-description">{{ $item?->data?->language?->$select_lang?->details ?? $item?->data?->language?->$default_lang?->details }}</p>
                                        </div>
                                        <div class="dish-card-actions">
                                            <button class="add-to-cart-btn">Add to Cart</button>
                                            <div class="quantity-controls">
                                                <button class="qty-btn minus-btn">−</button>
                                                <input type="number" class="qty-input" value="1" min="0">
                                                <button class="qty-btn plus-btn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @empty

                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div><span class="text-center">{{ __("No Data Found") }}</span></div>
        @endforelse



    </div>
</section>
