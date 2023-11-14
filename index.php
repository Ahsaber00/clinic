<?php
include "lib/majors.php";
include "lib/doctor.php";
include_once "core/functions.php";
session_start();
$major = new Major();
$majors = $major->getMajorList();
$doctor = new Doctor();
$doctorsList = $doctor->getDoctorList();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/themes/splide-default.min.css" integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.rtl.min.css"
        integrity="sha512-wO8UDakauoJxzvyadv1Fm/9x/9nsaNyoTmtsv7vt3/xGsug25X7fCUWEyBh1kop5fLjlcrK3GMVg8V+unYmrVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="assets/styles/pages/main.css">

    <title>Document</title>
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="./index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="./index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./doctors/index.php">Doctors</a>
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="./logout.php">Logout</a>
                        <?php elseif (!isset($_SESSION['auth'])) : ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="./login.php">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-blue text-white pt-3">
            <div class="container pb-5">
                <div class="row gap-2">
                    <div class="col-sm order-sm-2">
                        <img src="assets/images/banner.jpg" class="img-fluid banner-img banner-img" alt="banner-image" height="200">
                    </div>
                    <div class="col-sm order-sm-1">
                        <h1 class="h1">Have a Medical Question?</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                            laborum
                            saepe
                            enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis
                            consequatur
                            cum
                            iure
                            quod facere.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="h1 fw-bold text-center my-4">majors</h2>
            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <?php foreach ($majors as $major) :  ?>
                    <div class="majors-grid">
                        <div class="card p-2" style="width: 18rem;">
                            <img src="design/uploaded_image/<?= $major['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center"><?= $major['name'] ?></h4>
                                <a href="./doctors/index.php" class="btn btn-outline-primary card-button">Browse Doctors</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="h1 fw-bold text-center my-4">doctors</h2>
            <section class="splide home__slider__doctors mb-5 is-overflow is-initialized splide--loop splide--ltr splide--draggable is-active" id="splide01" aria-roledescription="carousel">
                <div class="splide__arrows splide__arrows--ltr"><button class="splide__arrow splide__arrow--prev" type="button" aria-label="Go to last slide" aria-controls="splide01-track"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false">
                            <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                        </svg></button><button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false">
                            <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                        </svg></button></div>
                <div class="splide__track splide__track--loop splide__track--ltr splide__track--draggable" id="splide01-track" aria-live="polite" aria-atomic="true" style="padding-left: 0px; padding-right: 0px;">
                    <ul class="splide__list" id="splide01-list" role="presentation" style="transform: translateX(-2082px);">
                         <li class="splide__slide splide__slide--clone" id="splide01-clone03" role="group" aria-roledescription="slide" aria-label="3 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/index.html" class="btn btn-outline-primary card-button" tabindex="-1">Browse
                                        Doctors</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone04" role="group" aria-roledescription="slide" aria-label="4 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone05" role="group" aria-roledescription="slide" aria-label="5 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone06" role="group" aria-roledescription="slide" aria-label="6 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone07" role="group" aria-roledescription="slide" aria-label="7 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone is-visible is-prev" id="splide01-clone08" role="group" aria-roledescription="slide" aria-label="8 of 8" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide is-active is-visible" id="splide01-slide01" role="group" aria-roledescription="slide" aria-label="1 of 8" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide is-next is-visible" id="splide01-slide02" role="group" aria-roledescription="slide" aria-label="2 of 8" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide03" role="group" aria-roledescription="slide" aria-label="3 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/index.html" class="btn btn-outline-primary card-button" tabindex="-1">Browse
                                        Doctors</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide04" role="group" aria-roledescription="slide" aria-label="4 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide05" role="group" aria-roledescription="slide" aria-label="5 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide06" role="group" aria-roledescription="slide" aria-label="6 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide07" role="group" aria-roledescription="slide" aria-label="7 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide" id="splide01-slide08" role="group" aria-roledescription="slide" aria-label="8 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide is-active splide__slide--clone" id="splide01-clone09" role="group" aria-roledescription="slide" aria-label="1 of 8" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);" aria-hidden="true">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone10" role="group" aria-roledescription="slide" aria-label="2 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone11" role="group" aria-roledescription="slide" aria-label="3 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/index.html" class="btn btn-outline-primary card-button" tabindex="-1">Browse
                                        Doctors</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone12" role="group" aria-roledescription="slide" aria-label="4 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone13" role="group" aria-roledescription="slide" aria-label="5 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone14" role="group" aria-roledescription="slide" aria-label="6 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone15" role="group" aria-roledescription="slide" aria-label="7 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide splide__slide--clone" id="splide01-clone16" role="group" aria-roledescription="slide" aria-label="8 of 8" aria-hidden="true" style="margin-right: 1.5rem; width: calc(((100% + 1.5rem) / 4) - 1.5rem);">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="./doctors/doctor.html" class="btn btn-outline-primary card-button" tabindex="-1">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </section>
        </div>
        <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg" alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="bottom--left bottom--content bg-blue text-white">
                <h4 class="title">download the application now</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus facere eveniet in id, quod
                    explicabo minus ut, sint possimus, fuga voluptas. Eius molestias eveniet labore ullam magnam sequi
                    possimus quaerat!</p>
                <div class="app-group">
                    <div class="app"><img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg" alt="">Google Play</div>
                    <div class="app"><img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg" alt="">App Store</div>
                </div>
            </div>
            <div class="bottom--right bg-blue text-white">
                <img src="assets/images/banner.jpg" class="img-fluid banner-img">
            </div>
        </div>
    </div>


    <footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="./index.php" class="link text-white">Home</a>
                    <a href="./majors.php" class="link text-white">Majors</a>
                    <a href="./doctors/index.php" class="link text-white">Doctors</a>
                    <a href="./login.php" class="link text-white">Login</a>
                    <a href="./register.php" class="link text-white">Register</a>
                    <a href="./contact.php" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/scripts/home.js"></script>
</body>

</html>