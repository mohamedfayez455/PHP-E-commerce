

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="https://www.facebook.com/mohamed.fayez.73550"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Mohamed_fayez45"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/mohamedfayez455/"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /NEWSLETTER -->



<!-- FOOTER -->
<footer id="footer">
    <div class="section">
        <div class="container">
            <div class="row">


                <div class="col-md-5 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Quesna Menoufia</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>01273938259</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>mohamedfayez455@yahoo.com  </a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-md-4 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        @foreach($departments as $department)
                        <ul class="footer-links" style="margin-bottom: 20px;"  >
                            <li><a  href="{{route('department' , $department->id) }}">{{$department->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>


                <div class="clearfix visible-xs"></div>


                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="{{url('/front/home')}}">Home Page </a></li>
                            <li><a href="{{route('cart.index')}}">My Cart</a></li>
                            <li><a href="{{route('store')}}">All products</a></li>
                            @if (auth('user')->check())
                            <li><a href="{{route('profile' , auth('user')->id())}}">My Profile</a></li>
                                @else
                            <li><a href="{{url('/front/login')}}">login </a></li>
                            @endif
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- jQuery Plugins -->
<script src="{{asset('assets/ecommerce/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/ecommerce/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/ecommerce/js/slick.min.js')}}"></script>
<script src="{{asset('assets/ecommerce/js/nouislider.min.js')}}"></script>
<script src="{{asset('assets/ecommerce/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/ecommerce/js/main.js')}}"></script>
<script src="{{asset('js/test.js')}}"></script>

@stack('css')
@stack('js')

</body>
</html>
