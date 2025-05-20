<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BukuBae</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <img src="img/logo2.png" alt="Logo" style="height: 80px;">
                    <h1 class="m-0 d-inline-block ms-2">BukuBae</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="/project" class="nav-item nav-link">Project</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <button type="button" class="btn text-white me-2" data-bs-toggle="modal" data-bs-target="#searchModal" style="font-size: 20px;">
    <i class="fa fa-search"></i>
</button>

<button type="button" class="btn text-white" style="font-size: 20px;">
    <i class="fa fa-shopping-cart"></i>
</button>
                
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="container-xxl position-relative p-0">
                            <div class="row align-items-center">
                                <!-- Bagian Teks -->
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h1 class="text-white mb-4 animated zoomIn">The best place to easily search and buy your favorite books!</h1>
                                    <p class="text-white pb-3 animated zoomIn">Discover thousands of interesting book collections ranging from fiction, non-fiction, to rare books. Shopping for books becomes more practical, fast, and fun at BukuBae. Read anytime, anywhere, in your style.</p>
                                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Shopping</a>
                                    <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                                </div>

                                <!-- Bagian Banner -->
                                <div class="col-lg-6 position-relative">
                                    <!-- Carousel Banner -->
                                    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="img/banner1.png" class="d-block w-100 banner-img" alt="Banner 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="img/banner2.png" class="d-block w-100 banner-img" alt="Banner 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="img/banner3.png" class="d-block w-100 banner-img" alt="Banner 3">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Banner Background (jika diperlukan) -->
                                    <div class="banner-background"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">About Us</h6>
                            <h2 class="mt-2">The best online bookstore for your favorite reads</h2>
                        </div>
                        <p class="mb-4">Discover thousands of books from fiction, non-fiction, to rare collections. Shop easily and enjoy your reading time anytime, anywhere, in your style.</p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Wide Book Collection</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Friendly and Knowledgeable Staff</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Fast & Reliable Service</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Affordable Prices</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="img/about.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Ready to discover your next favorite book?</h3>
                        <small class="text-white">Subscribe now and get exclusive updates, special offers, and book recommendations straight to your inbox! </small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="img/newsletter.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                    <h2 class="mt-2">What We Offer for Book Lovers</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-book fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Extensive Book Catalog</h5>
                            <p>Explore thousands of books from various genres — from fiction, non-fiction, to rare collections.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">View Books</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-calendar fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Pre-Order New Releases</h5>
                            <p>Be the first to grab the latest titles before they officially hit the shelves.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Pre-Order Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-star fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Personalized Recommendations</h5>
                            <p>Get book suggestions tailored to your reading preferences and favorite genres.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Get Recommendations</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-gift fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Gift Cards & Vouchers</h5>
                            <p>Share the joy of reading with your loved ones through our special gift cards.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Send a Gift</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Book Club Membership</h5>
                            <p>Join our community of book lovers, attend discussions, and get member-only perks.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Join Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-comments fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Book Reviews & Ratings</h5>
                            <p>Read honest reviews from fellow readers before choosing your next great read.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">See Reviews</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


            <!-- Portfolio Start -->
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="section-title position-relative text-center mb-5 pb-2">
                        <h6 class="position-relative d-inline text-primary ps-4">List of Books</h6>
                        <h2 class="mt-2">Books Available at the Store</h2>
                    </div>

                    <div class="row g-4 portfolio-container">
                        @foreach($books as $book)
                            <div class="col-lg-4 col-md-6 portfolio-item first">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="Cover Buku">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->judul }}</h5>
                                        <p class="card-text"><strong>Writer:</strong> {{ $book->author }}</p>
                                        <p class="card-text"><strong>Price:</strong> Rp{{ number_format($book->price, 0, ',', '.') }}</p>
                                        <p class="card-text"><strong>Stock:</strong> {{ (int)$book->stock }}</p>
                                        <p class="card-text text-muted">{{ $book->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Portfolio End -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

            </body>
            </html>


        <!-- Testimonial Start -->
        <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>"Excellent service and a great selection of books! I found rare titles I couldn't get elsewhere."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Emma Watson</h6>
                                <small>Book Enthusiast</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>"Fast delivery and affordable prices. Highly recommend this bookstore for all book lovers!"</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Liam Johnson</h6>
                                <small>Student</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>"I love how easy it is to find both new releases and classic novels. Great customer support too!"</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">Sophia Lee</h6>
                                <small>Freelance Writer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p>"This bookstore has become my go-to place for buying gifts. The collection is impressive!"</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">David Clark</h6>
                                <small>Teacher</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->



        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
                    <h2 class="mt-2">Meet Our Team Members</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="img/anggota1.jpeg" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">Salsabila Januaryaneda</h5>
                                <small>G1F023007</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="img/anggota2.jpg" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">Irfan Kurniawan</h5>
                                <small>G1F023037</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="img/anggota3.jpg" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">Izzah Fathiyyah</h5>
                                <small>G1F023015</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        

       <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Contact Us</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Kota Bengkulu</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+6282175023471</p>
                        <p><i class="fa fa-envelope me-3"></i>bukubae@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link" href="#">About Us</a>
                        <a class="btn btn-link" href="#">Contact</a>
                        <a class="btn btn-link" href="#">Privacy Policy</a>
                        <a class="btn btn-link" href="#">Terms & Conditions</a>
                        <a class="btn btn-link" href="#">FAQs</a>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Subscribe to get the latest updates on new book arrivals, promotions, and exclusive offers.</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
                                <i class="fa fa-paper-plane text-primary fs-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">BukuBae</a>, All Rights Reserved.
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">Kelompok 1</a>
                            <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">Kelompok 1 - Tubes PWE</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#">Home</a>
                                <a href="#">Categories</a>
                                <a href="#">Help</a>
                                <a href="#">FAQs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>