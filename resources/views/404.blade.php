@extends('layouts.app')
@section('content')
<div class="page-header" style="background: url(assets/img/banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">404</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="fallback-inner">
                <div class="query-input">
                    <input class="form-control" name="q" type="text" />
                </div>
                <div class="buttons">
                    <div class="btn btn-common"><span>Search site</span></div>
                </div>
                <div class="fallback-content">
                    <h2>To find the missing content, try these steps:</h2>
                    <ul>
                        <li>Visit the domain home page</li>
                        <li>
                            <a rel="nofollow" href="." target="_self">Reload this page</a>
                        </li>
                        <li>
                            Search for the missing content with the search box above
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection