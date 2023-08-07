<!-- font awesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">

    <footer>
        <div class="clearfix" id="social-media">
            <h3 class="left">
                Follow us on social media
            </h3>
            <div class="row social-media right">
                <a href="https://www.facebook.com/officialbarefootadventures" target="_blank">
                    <i class="lni-facebook-filled"></i>
                </a>
                <a href="https://www.instagram.com/officialbarefootadventures/" target="_blank">
                    <i class="lni-instagram-original"></i>
                </a>
                <a href="https://www.twitter.com/officialbarefootadventures/" target="_blank">
                    <i class="lni-twitter-original"></i>
                </a>
            </div>
        </div>
        <div class="bottom-bar" id="bottom-bar">
            <div class="clearfix">
                <div class="left">
                    <img src="/images/Barefoot-Adventure-Logo-White.png" alt="Barefoot Adventures" id="footer-logo">
                </div>
                <div class="left">
                    <h4>Safaris</h4>
                    <ul>
                        <li><a href="/kenya-safaris/">Kenya Safaris</a></li>
                        <li><a href="/uganda-safaris/">Uganda Safaris</a></li>
                        <li><a href="/tanzania-safaris/">Tanzania Safaris</a></li>
                    </ul>
                </div>
                <div class="left">
                    <h4>About</h4>
                    <ul>
                        <li><a href="/about-us/">About Us</a></li>
                        <li><a href="">Terms of Sevice</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="left">
                    <h4>Contact Us</h4>
                    <ul>
                        <li>
                            <a href="tel:+31616-950-384">
                                <i class="fa fa phone"></i>
                                &nbsp;
                                +31616-950-384
                            </a>
                            &nbsp;
                            <a href="tel:+31616-950-384">
                                <i class="fa fa phone"></i>
                                &nbsp;
                                 +31626-757-555
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@barefootadventures.eu">
                                <i class="fa fa envelope"></i>
                                &nbsp;
                                info@barefootadventures.africa
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <p id="copyright" class="clearfix">
                <span class="pull-left">
                    &copy; {{ date('Y') }} Barefoot Adventures. All rights reserved.
                </span>
                <span class="pull-left" id="brand-designers">
                    Made by
                    <a class="designers" href="https://www.facebook.com/gorobrands/" target="_blank">
                        <strong style="margin-left: -15px !important";>Goro Brands</strong>
                    </a>
                </span>
            </p>
        </div>
    </footer>
    <!-- jquery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('js/layout.js')}}"></script>
    <!-- js -->
    <script>
        jQuery(document).ready(function ($) {

            let topOfTabNavbar = $('#campaign-navigation').offset().top;

            let navHeight = $('nav.fix').height();

            let tabNavHeight = $('#campaign-navigation').height();

            $(window).scroll(function () {

                // get current position
                var currentScroll = $(window).scrollTop() + 100;

                if (currentScroll >= topOfTabNavbar) {

                    $('nav').css('display', 'none');

                    // apply position: fixed if you scroll to element   
                    $('#campaign-navigation, #campaign-fund-stats').addClass('fix');

                    $('#campaign-fund-stats').addClass('desktop');

                    $('#campaign-navigation').css('top', 0);

                    $('#campaign-fund-stats').css('top', tabNavHeight + 10);

                } else {

                    $('nav').css('display', 'block');

                    // remove position: fixed
                    $('#campaign-navigation, #campaign-fund-stats').removeClass('fix');

                    $('#campaign-fund-stats').removeClass('desktop');

                    $('#campaign-navigation, #campaign-fund-stats').css('top', 'auto');
                }

                let tabsContent = ['overview', 'itinerary', 'accomodation', 'maps', 'reviews',];

                tabsContent.forEach(tab => {

                    let topOfTab = $('#campaign-' + tab).offset().top;

                    if (currentScroll >= topOfTab) {

                        // set active link for tab
                        $(`.campaign-nav-link[href="#campaign-${tab}"]`).addClass('active');

                        $(`.campaign-nav-link:not([href="#campaign-${tab}"])`).removeClass('active');

                    } else {

                        // disable link
                        $(`.campaign-nav-link[href="#campaign-${tab}"]`).removeClass('active');
                    }
                });

                let $window = $(window)
                let viewport_top = $window.scrollTop()
                let viewport_height = $window.height()
                let viewport_bottom = viewport_top + viewport_height
                let $elem = $('footer')
                let top = $elem.offset().top
                let height = $elem.height()
                let bottom = top + height

                if ( (top >= viewport_top && top < viewport_bottom) ||
                (bottom > viewport_top && bottom <= viewport_bottom) ||
                (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom) ) {

                    // hide sidebar
                    $('#campaign-fund-stats').css('display', 'none');
                }
                else {

                    // show sidebar
                    $('#campaign-fund-stats').css('display', 'block');
                }
            });
        });
    </script>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ed21a6dc75cbf1769f0c16a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>