@extends('frontend.layout')
@section('main-content')
    <!-- Start Hero -->
    <section id="billboard" class="hero-section position-relative padding-medium">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="text-center padding-large no-padding-bottom">
                        <h1 class="display-2 text-uppercase text-white">Shop</h1>
                        <div class="breadcrumbs text-white">
                            <span class="item">
                                <a href="index.html">Home &gt;</a>
                            </span>
                            <span class="item">Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <section class="shopify-grid padding-large">
        <div class="container">
            <div class="row">
                <main class="col-md-9">
                    <div class="filter-shop d-flex justify-content-between">
                        <div class="sort-by">
                            <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
                                <option value="">Default sorting</option>
                                <option value="">Name (A - Z)</option>
                                <option value="">Name (Z - A)</option>
                                <option value="">Price (Low-High)</option>
                                <option value="">Price (High-Low)</option>
                                <option value="">Rating (Highest)</option>
                                <option value="">Rating (Lowest)</option>
                                <option value="">Model (A - Z)</option>
                                <option value="">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    <div class="product-content product-store d-flex justify-content-between flex-wrap">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="product-card position-relative pe-3 pb-3">
                                    <div class="image-holder">
                                        <img src="{{ asset('images/' . $product['image']) }}" alt="product-item"
                                            class="img-fluid" style="width: 300px; height: 400px; object-fit:cover;">
                                    </div>
                                    <div class="cart-concern position-absolute">
                                        <div class="cart-button d-flex">
                                            <div class="btn-left">
                                                <a href="{{ route('single', ['id' => $product->id]) }}"
                                                    class="btn btn-medium btn-black">Add to Cart</a>
                                                <svg class="cart-outline position-absolute">
                                                    <use xlink:href="#cart-outline"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-detail pt-3 pb-3">
                                        <h3 class="card-title text-uppercase fs-4">
                                            <a href="#">{{ $product['name'] }}</a>
                                        </h3>
                                        <span class="item-price text-primary fs-5">$ {{ $product['price'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </main>
                <aside class="col-md-3">
                    <div class="sidebar text-white">
                        <div class="widget-menu">
                            <div class="widget-search-bar">
                                <form role="search" method="get" class="d-flex">
                                    <input class="search-field" placeholder="Search" type="search">
                                    <div class="search-icon bg-light">
                                        <a href="#">
                                            <svg class="search text-dark">
                                                <use xlink:href="#search"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget-product-categories pt-5">
                            <h5 class="widget-title text-decoration-underline text-uppercase">Categories</h5>
                            <ul class="product-categories sidebar-list list-unstyled">
                                <li class="cat-item">
                                    <a href="/collections/categories">All</a>
                                </li>
                                <li class="cat-item">
                                    <a href="">Phones</a>
                                </li>
                                <li class="cat-item">
                                    <a href="">Accessories</a>
                                </li>
                                <li class="cat-item">
                                    <a href="">Tablets</a>
                                </li>
                                <li class="cat-item">
                                    <a href="">Watches</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-product-tags pt-3">
                            <h5 class="widget-title text-decoration-underline text-uppercase">Tags</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="">White</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Cheap</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Mobile</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Modern</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-product-brands pt-3">
                            <h5 class="widget-title text-decoration-underline text-uppercase">Brands</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="">Apple</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Samsung</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Huwai</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-price-filter pt-3">
                            <h5 class="widget-titlewidget-title text-decoration-underline text-uppercase">Filter By
                                Price
                            </h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="">Less than $10</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">$10- $20</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">$20- $30</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">$30- $40</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">$40- $50</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
