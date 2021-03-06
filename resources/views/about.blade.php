@extends('layouts.app')
@section('content')
<div class="page-header" style="background: url(assets/img/banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <img src="assets/img/about.jpg" alt="" />
                <div class="ad-detail-content">
                    <p>
                        This is an example page. It’s different from a blog post because
                        it will stay in one place and will show up in your site
                        navigation (in most themes). Most people start with an About
                        page that introduces them to potential site visitors. It might
                        say something like this:
                    </p>
                    <blockquote>
                        <p>
                            Hi there! I’m a bike messenger by day, aspiring actor by
                            night, and this is my blog. I live in Los Angeles, have a
                            great dog named Jack, and I like piña coladas. (And gettin’
                            caught in the rain.)
                        </p>
                    </blockquote>
                    <p>…or something like this:</p>
                    <p>
                        Proin gravida nibh vel velit auctor aliquet. Aenean
                        sollicitudin, lorem quis bibendum auctor, nisi elit consequat
                        ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                        nibh vulputate cursus a sit amet mauris.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                        diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                        aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                        aliquip ex ea commodo consequat.
                    </p>
                    <blockquote>
                        <p>
                            The XYZ Doohickey Company was founded in 1971, and has been
                            providing quality doohickeys to the public ever since. Located
                            in Gotham City, XYZ employs over 2,000 people and does all
                            kinds of awesome things for the Gotham community.
                        </p>
                    </blockquote>
                    <p>
                        Nam liber tempor cum soluta nobis eleifend option congue nihil
                        imperdiet doming id quod mazim placerat facer possim assum. Typi
                        non habent claritatem insitam; est usus legentis in iis qui
                        facit eorum claritatem. Investigationes demonstraverunt lectores
                        legere me lius quod ii legunt saepius.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="categories">
                            <div class="widget-title">
                                <i class="fas fa-align-justify"></i>
                                <h4>All Categories</h4>
                            </div>
                            <div class="categories-list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-desktop"></i>
                                            Electronics <span class="category-counter">(9)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-wrench"></i>
                                            Services <span class="category-counter">(8)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-github"></i>
                                            Pets <span class="category-counter">(2)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-leaf"></i>
                                            Fashion <span class="category-counter">(3)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-home"></i>
                                            Real Estate <span class="category-counter">(4)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-black-tie"></i>
                                            Jobs <span class="category-counter">(5)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-utensils"></i>
                                            Hotel & Travels
                                            <span class="category-counter">(5)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="inner-box">
                        <div class="widget-title">
                            <h4>Premium Ads</h4>
                        </div>
                        <div class="advimg">
                            <ul class="featured-list">
                                <li>
                                    <img alt="" src="assets/img/featured/img1.jpg" />
                                    <div class="hover">
                                        <a href="#"><span>$49</span></a>
                                    </div>
                                </li>
                                <li>
                                    <img alt="" src="assets/img/featured/img2.jpg" />
                                    <div class="hover">
                                        <a href="#"><span>$49</span></a>
                                    </div>
                                </li>
                                <li>
                                    <img alt="" src="assets/img/featured/img3.jpg" />
                                    <div class="hover">
                                        <a href="#"><span>$49</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="inner-box">
                        <div class="widget-title">
                            <h4>Advertisement</h4>
                        </div>
                        <img src="assets/img/img1.jpg" alt="" />
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection