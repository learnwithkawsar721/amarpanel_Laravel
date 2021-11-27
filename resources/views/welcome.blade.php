@extends('layouts.frontend')
@section('home')
active
@endsection
@section('frontend')


<!-- Main variables *content* -->
<section id="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3 class="sh">{{ env('APP_NAME') }}<span style="color:#ff0000;"> - #1</span></h3>
                <h1 class="mh"><span style="color:#ff0000;">Cheapest</span> SMM Panel<br>
                    For Resellers <span style="color:#c6dc0f;">Over 2 Years!</span></h1>
                <p class="mp">Get hundreds of High Quality Social Media Services in a distance of a click.
                    {{ env('APP_NAME') }} is a SMM Panel with more then 2 year on the market and more then 1 million
                    orders
                    processed successfully!
                </p>
            </div>
            <div class="col-md-7">
                <img class="lap-pic" src="https://i.postimg.cc/13zBgWMt/Screenshot-1.png" alt="lap" width="727"
                    height="448" />
            </div>
        </div>
    </div>
</section>
<section id="form-row">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form method="post" action="{{ route('login_post') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="User Email" />
                                @error('email')
                                <span class="invalid-feedback">
                                    <strong style="color:#c6dc0f;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group form-group__password">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" />
                                @error('password')
                                <span class="invalid-feedback">
                                    <strong style="color:#c6dc0f;">{{ $message }}</strong>
                                </span>
                                @enderror
                                <a href="resetpassword.html" class="forgot-password">Forgot password?</a>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <button type="submit" class="btn btn-default btn-block">Sign in</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <input type="checkbox" name="LoginForm[remember]" value="1" id="remember">
                                <label for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="pull-right pull-right-middle">Do not have an account? <a
                                    href="{{ route('register') }}" style="color:#c6dc0f">Sign up</a></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row bg-white">
            <div class="col-md-12" style="color:white;">
                <img src="https://i.postimg.cc/G2PJhJpD/after-frm.webp" alt="social" width="842" height="34" />
            </div>
        </div>
    </div>
</section>
<section id="ratt">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="ratt-box">
                    <div class="ratt-head">4,5<small> /5</small></div>
                    <div class="ratt-star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <div class="ratt-pr">About {{ env('APP_NAME') }}s</div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="rstat-box">
                            <img src="https://i.postimg.cc/rwvS1Y0W/Orders-Completed.webp" alt="icon" width="121"
                                height="79" />
                            <p>Orders Completed</p>
                            <h4>10000000+</h4>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="rstat-box">
                            <img src="https://i.ibb.co/1RBn84Q/cheapest-price.webp" alt="icon" width="71" height="79" />
                            <p>Prices Starting From</p>
                            <h4>0.001$/1K</h4>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="rstat-box">
                            <img src="https://i.ibb.co/mhBMbWN/free-child-panel.webp" alt="icon" width="121"
                                height="79" />
                            <p>An Order Is Made every</p>
                            <h4>0.14 SEC</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="best">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- <ul class="best-serv">
                      <li><i class="fab fa-instagram"></i></li>
                      <li><i class="fab fa-tiktok"></i></li>
                      <li><i class="fab fa-facebook"></i></li>
                      <li><i class="fab fa-youtube"></i></li>
                    </ul> -->
                <img src="https://i.postimg.cc/0QrP9ZnW/best-left-img.webp" alt="icon"
                    class="img-responsive best-left-img" width="237" height="467" />
            </div>
            <div class="col-md-6">
                <h3 class="sh">Amar<span style="color:#d92d53;">pannel</span></h3>
                <h1 class="mh"><span style="color:#d92d53;">Best</span> Social Media <span
                        style="color:#c6dc0f;">Service</span></h1>
                <p class="mp">Tired of looking at hundreds of panels with services that simple doesnt work? Check
                    our major services for social media with the best quality and quicker delivery on the market!
                </p>
                <p class="mp">Finding the best provider or SMM Panel that fits your agency needs can be a tedious
                    job! Check why you should trust {{ env('APP_NAME') }} to delivery your social media services with
                    a quick
                    comparision.</p>
                <p class="mp">We take our costumers social media accounts as its our own accounts, at
                    {{ env('APP_NAME') }}s
                    all purchase are made safe using Sucure Payment gateway and the delivery is 100% guaranteed.
                </p>
            </div>
        </div>
    </div>
</section>
{{-- <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="sh text-center">A <span style="color:#d92d53;">New</span> Feature</h3>
                    <h1 class="mh text-center">Intimate Your <span style="color:#5048eb;">Business</span> With The <span
                            style="color:#5048eb;">Social</span> Life</h1>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <img src="https://i.ibb.co/mhBMbWN/free-child-panel.webp" alt="icon" width="212" height="121" />
                        <h4>FREE Child Panel</h4>
                        <p>{{ env('APP_NAME') }} offer Free Child Panel like us ( different design ) to Elite, VIP or
Master
Members for life time</p>
</div>
</div>
<div class="col-md-4">
    <div class="feature-box">
        <img src="https://i.ibb.co/1RBn84Q/cheapest-price.webp" alt="icon" width="81" height="94" />
        <h4>Cheapest Price</h4>
        <p>{{ env('APP_NAME') }} offer cheapest price services in whole market. {{ env('APP_NAME') }} can beat any
            seller in
            market.</p>
    </div>
</div>
<div class="col-md-4">
    <div class="feature-box">
        <img src="https://i.ibb.co/bKLP18S/friendly-dashboard.webp" alt="icon" width="89" height="124" />
        <h4>User Friendly Dashboard</h4>
        <p>{{ env('APP_NAME') }} dashboard super friendly and you will get all the info you need from your
            dashboard.</p>
    </div>
</div>
</div>
</div>
</section> --}}
<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="sh text-center">Testimonials</h3>
                <h1 class="mh text-center">Happy <span style="color: #c6dc0f">Clients</span></h1>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="testi-box">
                    <div class="testi-prof">
                        <img src="https://i.ibb.co/Xsrg3db/Untitled-1.webp" alt="icon" width="50" height="50" />
                        <div class="test-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    </div>
                    <h4>Michelle Hawkins</h4>
                    <p>Wow! This is amazing.</p>

                    <p>i have been purchasing Instagram Likes for over a year and never got a delay!
                        {{ env('APP_NAME') }} did
                        a great job always
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="testi-box">
                    <div class="testi-prof">
                        <img src="https://i.ibb.co/Jt5PDRt/Untitled-11.webp" alt="icon" width="50" height="50" />

                        <div class="test-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    </div>
                    <h4>Peter Brown</h4>
                    <p>Purchased 2000 Facebook Likes for our company and worked indeed! Support is also in time
                        always. Thanks</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="testi-box">
                    <div class="testi-prof">
                        <img src="https://i.ibb.co/gDg5Frq/Untitled-111.webp" alt="icon" width="50" height="50" />
                        <div class="test-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    </div>
                    <h4>Carl Joe</h4>
                    <p>Order 10000 Instagram Followers and Got my followers as promised in time! Happy to Purchased
                        from Bulkfollows. We will Continue with them for our future purchase.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="testi-box">
                    <div class="testi-prof">
                        <img src="https://i.ibb.co/h9Pm8wD/Untitled-1111.webp" alt="icon" width="50" height="50" />
                        <div class="test-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    </div>
                    <h4>Julia doe</h4>
                    <p>I Just love the services, instant delivered my instagram likes order and the Facebook Page
                        likes</p>

                    <p>I am buying from them long time and love to buy more in future. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br><br>
                <a href="#" class="btn btn-secondary">Get Started</a>
            </div>
        </div>
    </div>
</section>


@endsection