<aside>
    <div class="sidebar-box">
        <div class="user">
            <div class="usercontent">
                <h3>{{auth()->user()->name}}</h3>
            </div>
            <figure>
                <a href="{{route('profile')}}">
                    @if (auth()->user()->avatar)
                    <img class="-img-fluid" src="{{Storage::url(auth()->user()->avatar)}}" alt="" />
                    @else
                    <img class="-img-fluid" src="{{asset('assets/img/author/img1.jpg')}}" alt="" />
                    @endif
                    
                </a>
            </figure>
        </div>
        <nav class="navdashboard">
            <ul>
                <li>
                    <a class="{{request()->is('ads/create') ? 'active': ''}}" href="{{route('profile')}}">
                        <i class="fas fa-home"></i>
                        <span>Personal Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('ads.create')}}" class="{{request()->is('ads/create') ? 'active': ''}}">
                        <i class="fas fa-pen"></i>
                        <span>Create Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('ads.index')}}" class="{{request()->is('ads') ? 'active': ''}}">
                        <i class="fas fa-credit-card"></i>
                        <span>My Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('messages')}}" class="{{request()->is('messages') ? 'active': ''}}">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('saved.ad')}}" class="{{request()->is('saved-ads') ? 'active': ''}}">
                        <i class="fas fa-star"></i>
                        <span>Saved Ads </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('ads.pending')}}" class="{{request()->is('ads/pending') ? 'active': ''}}">
                        <i class="fas fa-hourglass"></i>
                        <span>Pending Approval</span>
                    </a>
                </li>
               
            </ul>
        </nav>
    </div>
    <div class="widget">
        <h4 class="widget-title">Advertisement</h4>
        <div class="inner-box">
            <div class="add-box">
                <img class="img-fluid" src="{{asset('assets/img/img1.jpg')}}" alt="" />
            </div>
        </div>
    </div>
</aside>