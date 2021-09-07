<footer>
  <section class="footer-Content">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeIn" data-wow-delay="0.2s">
          <div class="widget">
            <h3 class="block-title">About us</h3>
            <div class="textwidget">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Quisque lobortis tincidunt est, et euismod purus suscipit
                quis. Etiam euismod ornare elementum. Sed ex est,
                consectetur eget facilisis sed, auctor ut purus.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeIn" data-wow-delay="0.4s">
          <div class="widget">
            <h3 class="block-title">Useful Links</h3>
            <ul class="menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Left Sidebar</a></li>
              <li><a href="#">Pricing Plans</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Full Width Page</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeIn" data-wow-delay="0.6s">
          <div class="widget">
            <h3 class="block-title">Latest Tweets</h3>
            <div class="twitter-content clearfix">
              <ul class="twitter-list">
                <li class="clearfix">
                  <span>
                    Platform to Download and Submit #Bootstrap Templates via
                    @ProductHunt @GrayGrids
                    <a href="#">http://t.co/cLo2w7rWOx</a>
                  </span>
                </li>
                <li class="clearfix">
                  <span>
                    Introducing Bootstrap 4 Features: What’s new, What’s
                    gone!
                    <a href="#">http://t.co/cLo2w7rWOx</a>
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeIn" data-wow-delay="0.8s">
          <div class="widget">
            <h3 class="block-title">Random Ads</h3>
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
              <li>
                <img alt="" src="assets/img/featured/img4.jpg" />
                <div class="hover">
                  <a href="#"><span>$49</span></a>
                </div>
              </li>
              <li>
                <img alt="" src="assets/img/featured/img5.jpg" />
                <div class="hover">
                  <a href="#"><span>$49</span></a>
                </div>
              </li>
              <li>
                <img alt="" src="assets/img/featured/img6.jpg" />
                <div class="hover">
                  <a href="#"><span>$49</span></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="copyright">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="site-info float-left">
            <p>
              Designed and Developed by
              <a href="#" rel="nofollow">Suraj</a>
            </p>
          </div>
          <div class="bottom-social-icons social-icon float-right">

            <a class="facebook" target="_blank" href="{{$sitesetting->fb ?? '#'}}"><i class="fab fa-facebook-f"></i></a>
            <a class="twitter" target="_blank" href="{{$sitesetting->twitter ?? '#'}}"><i
                class="fab fa-twitter"></i></a>
            <a class="dribble" target="_blank" href="{{$sitesetting->instagram ?? '#'}}"><i
                class="fab fa-instagram"></i></a>
            <a class="youtube" target="_blank" href="{{$sitesetting->youtube ?? '#'}}"><i
                class="fab fa-youtube"></i></a>
            <a class="linkedin" target="_blank" href="{{$sitesetting->linkedin ?? '#'}}"><i
                class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="back-to-top">
  <i class="fas fa-angle-up"></i>
</a>

<script type="text/javascript" src="{{asset('assets/js/jquery-min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wow.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/contact-form-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
<style>
  .dropdown:hover>.dropdown-menu {
    display: block !important;
  }

  @media only screen and (max-width: 9991px) {
    .navbar-hover .show>.dropdown-toggle::after {
      transform: rotate(-90deg)
    }
  }

  @media only screen and (min-width: 492px) {
    .navbar-hover .collapse ul li {
      position: relative !important;
    }

    .navbar-hover .collapse ul li:hover>ul {
      display: block !important;
    }

    .navbar-hover .collapse ul ul {
      position: absolute !important;
      top: 100%;
      left: 0;
      min-width: 250px;
      display: none !important;
    }

    .navbar-hover .collapse ul ul ul {
      position: absolute !important;
      top: 0;
      left: 100%;
      min-width: 250px;
      display: none !important;
    }
  }

  .vertical-menu a {
    background-color: #fff;
    color: #000;
    display: block !important;
    padding: 12px;
    text-decoration: none;
  }

  .vertical-menu a.active {
    background-color: #17a2b8 !important;
    color: #fff !important;
  }

  .vertical-menu a:hover {
    background-color: #17a2b8;
    color: #fff;
  }

  .seller-intro {
    display: flex;
    align-items: center;
  }

  .seller-intro img {
    width: 68px;
    height: 68px;
    border-radius: 50%
  }

  .seller-intro a.publisher-name {
    margin-left: 10px;
  }

  .pagination .active {
    background-color: #03A9F4;
    border-radius: 30px;
    color: #fff;

  }

  .pagination .active .page-link {
    color: #fff;
    border: 1px solid #03A9F4;

  }
</style>