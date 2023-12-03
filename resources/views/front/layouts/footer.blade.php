<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url({{ asset('front/img/bg-img/3.jpg') }});">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="#"><img src="{{ asset('front/img/core-img/Farmington.png') }}" alt="footer logo"></a>
                        </div>
                        <p>Farmington is a platform for Urban India to stay close to nature. Every city turning into a concrete jungle now, Farmington offers unique solutions for every person with beautiful plants, pots & decorative knick-knacks to create your green patch. </p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

                        <div class="contact-information">
                            <p><span>Phone:</span> +91-9856321456</p>
                            <p><span>Email:</span> info.farmington.com@gmail.com</p>
                            <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                            <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
                <!-- Copywrite Text -->
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Footer Nav -->
                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{  route('about') }}">About</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->
