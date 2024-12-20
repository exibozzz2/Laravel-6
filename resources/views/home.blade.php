@extends("layout")

@section("pageTitle")
    Home
@endsection

@section("content")

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to MyWebsite</h1>
            <p class="lead">Discover amazing features and seamless experiences</p>
            <a href="#about" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id neque nec lacus interdum aliquet. Praesent sed augue vel risus feugiat luctus.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500" alt="About Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Services</h2>
                <p class="lead">What we offer to our clients</p>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-laptop display-4 text-primary"></i>
                            <h5 class="card-title mt-3">Web Development</h5>
                            <p class="card-text">Building modern and responsive websites tailored to your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-phone display-4 text-primary"></i>
                            <h5 class="card-title mt-3">Mobile Apps</h5>
                            <p class="card-text">Creating intuitive and user-friendly mobile applications.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-4 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-graph-up display-4 text-primary"></i>
                            <h5 class="card-title mt-3">SEO Optimization</h5>
                            <p class="card-text">Boosting your website's visibility on search engines.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Contact Us</h2>
                <p class="lead">We'd love to hear from you</p>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </section>

@endsection


