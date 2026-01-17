<?php
$msg = '';
$sub_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Contact form
  if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
      $msg = 'Please fill all fields.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $msg = 'Please provide a valid email.';
    } else {
      // Form validation passed - show success message
      $msg = 'Thank you — your message has been received. We will get back to you soon.';
      $name = $email = $message = '';
    }
  }

  // Newsletter subscribe
  if (isset($_POST['subscribe_email'])) {
    $sub_email = trim($_POST['subscribe_email']);
    if ($sub_email === '') {
      $sub_msg = 'Please provide an email.';
    } else if (!filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
      $sub_msg = 'Please provide a valid email address.';
    } else {
      // Form validation passed - show success message
      $sub_msg = 'Thanks — you are subscribed to updates.';
      $sub_email = '';
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Foresight Academy — Seculo-Spiritual Aptitude</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/images/logo.jpeg">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo.jpeg">
  <link rel="icon" type="image/svg+xml" href="assets/images/icon-CAM.svg">
  <meta name="theme-color" content="#000000">
  <!-- JSON-LD: Organization + Courses -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "Foresight Academy",
    "url": "https://foresightacademy.com",
    "logo": "https://example.com/FORESIGHT%20ACADEMY/assets/images/logo.jpeg",
    "sameAs": [],
    "department": [
      {
        "@type": "CollegeOrUniversity",
        "name": "Foresight Academy Faculties"
      }
    ]
  }
  </script>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center" href="#hero">
        <img src="assets/images/logo.jpeg" alt="Logo" class="me-2" style="height:40px;width:40px;object-fit:cover;border-radius:8px;">
        <span class="brand-text">Foresight Academy</span>
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#faculties">Faculties</a></li>
          <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
          <li class="nav-item"><a class="nav-link" href="#admissions">Admissions</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item ms-lg-3"><a class="btn btn-primary-custom px-4" href="https://lms.ccenetwork.org" target="_blank"><i class="fas fa-sign-in-alt me-2"></i>Student Portal</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="hero" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="hero d-flex align-items-center text-white" style="background-image:url('assets/images/slide1.svg')">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                  <div class="hero-badge mb-4">
                    <span class="badge-text">Seculo-Spiritual Aptitude</span>
                  </div>
                  <h1 class="hero-title mb-4">Foresight Academy</h1>
                  <p class="hero-subtitle mb-5">Engineering the manifestation of godliness in the secular space through transformative education and practical spiritual formation.</p>
                  <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#faculties" class="btn btn-hero-primary btn-lg"><i class="fas fa-graduation-cap me-2"></i>Explore Faculties</a>
                    <a href="#programs" class="btn btn-hero-secondary btn-lg"><i class="fas fa-book-open me-2"></i>View Programs</a>
                  </div>
                  <div class="hero-stats mt-5 d-flex justify-content-center gap-5 flex-wrap">
                    <div class="stat-item">
                      <div class="stat-number">8</div>
                      <div class="stat-label">Faculty Endeavours</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">10+</div>
                      <div class="stat-label">Programs</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">5+</div>
                      <div class="stat-label">Students</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="hero d-flex align-items-center text-white" style="background-image:url('assets/images/slide2.svg')">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                  <h2 class="hero-title mb-4">Equip. Engage. Transform.</h2>
                  <p class="hero-subtitle mb-5">Practical programmes across eight Faculty Endeavours designed for real-world impact and spiritual transformation.</p>
                  <a href="#contact" class="btn btn-hero-primary btn-lg"><i class="fas fa-envelope me-2"></i>Get In Touch</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="hero d-flex align-items-center text-white" style="background-image:url('assets/images/slide3.svg')">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 text-center">
                  <h2 class="hero-title mb-4">Eight Faculty Endeavours</h2>
                  <p class="hero-subtitle mb-5">GAD · EAT · SAT · PAA · FAB · RAF · MAA · CAM</p>
                  <a href="#faculties" class="btn btn-hero-primary btn-lg"><i class="fas fa-arrow-right me-2"></i>Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#hero" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#hero" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>

  <main>
    <!-- About -->
    <section id="about" class="section-padding">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <span class="section-badge">Who We Are</span>
            <h2 class="section-title mt-3 mb-4">About Foresight Academy</h2>
            <p class="lead-text">Foresight Academy equips Christians to experience Gospel truths and transform their spheres of influence through our Seculo-Spiritual Aptitude (SSA) philosophy.</p>
          </div>
        </div>
        
        <div class="row g-4 mb-5">
          <div class="col-lg-6">
            <div class="about-content-card">
              <div class="card-icon-wrapper">
                <i class="fas fa-bullseye"></i>
              </div>
              <h4>Our Mission</h4>
              <p>We offer comprehensive programmes across eight Faculty Endeavours designed for practical spiritual formation and measurable societal impact.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-content-card">
              <div class="card-icon-wrapper">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <h4>Our Approach</h4>
              <p>Our unique approach integrates theological depth with professional excellence, preparing leaders for transformative impact.</p>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-book-open"></i>
              </div>
              <h5>Evidence-Based Curriculum</h5>
              <p>Academically rigorous programs grounded in biblical truth</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-hands-helping"></i>
              </div>
              <h5>Practical Application</h5>
              <p>Real-world projects and marketplace integration</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-globe"></i>
              </div>
              <h5>Global Community</h5>
              <p>Network of professionals and scholars worldwide</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-certificate"></i>
              </div>
              <h5>Accredited Programs</h5>
              <p>Recognized credentials and professional certification</p>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Programs -->
    <section id="programs" class="section-padding bg-light-gradient">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <span class="section-badge">Academic Excellence</span>
            <h2 class="section-title mt-3 mb-3">Programs & Courses</h2>
            <p class="section-description">Discover our comprehensive range of programs designed to equip you for transformative leadership in your sphere of influence.</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="program-card">
              <div class="program-icon">
                <i class="fas fa-users-cog"></i>
              </div>
              <span class="program-badge">12 Weeks • Hybrid</span>
              <h5 class="program-title">Discipleship Pathway</h5>
              <p class="program-text">Structured discipleship modules focused on spiritual formation and leadership development through mentoring and practical projects.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Foundational Doctrine</li>
                <li><i class="fas fa-check"></i> Spiritual Disciplines</li>
                <li><i class="fas fa-check"></i> Leadership Projects</li>
              </ul>
              <button class="btn btn-program view-course" data-title="Discipleship Pathway" data-desc="A 12-week pathway covering foundational doctrine, spiritual disciplines, mentoring and practical leadership projects.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="program-card">
              <div class="program-icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <span class="program-badge">8 Weeks • Online</span>
              <h5 class="program-title">Faith & Work</h5>
              <p class="program-text">Practical training on integrating faith into business and marketplace roles with real-world case studies.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Marketplace Ethics</li>
                <li><i class="fas fa-check"></i> Entrepreneurship</li>
                <li><i class="fas fa-check"></i> Vocational Discipleship</li>
              </ul>
              <button class="btn btn-program view-course" data-title="Faith & Work" data-desc="Modules on marketplace ethics, entrepreneurship, and vocational discipleship with case studies and mentorship.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="program-card featured">
              <div class="featured-badge">Most Popular</div>
              <div class="program-icon">
                <i class="fas fa-paint-brush"></i>
              </div>
              <span class="program-badge">6 Weeks • Workshop</span>
              <h5 class="program-title">Media & Arts Application</h5>
              <p class="program-text">Courses teaching media, communication, and arts as tools for outreach and cultural engagement.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Media Production</li>
                <li><i class="fas fa-check"></i> Digital Storytelling</li>
                <li><i class="fas fa-check"></i> Arts Discipleship</li>
              </ul>
              <button class="btn btn-program view-course" data-title="Media & Arts Application" data-desc="Practical modules on media production, storytelling, digital outreach and arts as discipleship tools.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="program-card">
              <div class="program-icon">
                <i class="fas fa-hands-helping"></i>
              </div>
              <span class="program-badge">10 Weeks • Field Cohort</span>
              <h5 class="program-title">Practical Apostolic Application</h5>
              <p class="program-text">Field-based learning focused on community transformation projects with partnering organizations.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Community Projects</li>
                <li><i class="fas fa-check"></i> Field Training</li>
                <li><i class="fas fa-check"></i> Social Impact</li>
              </ul>
              <button class="btn btn-program view-course" data-title="PAA" data-desc="Apprenticeship-style projects partnering with local organizations to apply learning in community contexts.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="program-card">
              <div class="program-icon">
                <i class="fas fa-book-reader"></i>
              </div>
              <span class="program-badge">8 Weeks • Seminar</span>
              <h5 class="program-title">Seculo-Apologetic Training</h5>
              <p class="program-text">Training for cultural engagement and thoughtful apologetics in contemporary contexts.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Cultural Engagement</li>
                <li><i class="fas fa-check"></i> Apologetics Methods</li>
                <li><i class="fas fa-check"></i> Practice Sessions</li>
              </ul>
              <button class="btn btn-program view-course" data-title="SAT" data-desc="Workshops and practice sessions equipping participants to engage contemporary issues respectfully and persuasively.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="program-card">
              <div class="program-icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <span class="program-badge">10 Weeks • Hybrid</span>
              <h5 class="program-title">Faith & Business (FAB)</h5>
              <p class="program-text">Practical support for Christians in entrepreneurship and business leadership with mentorship.</p>
              <ul class="program-features">
                <li><i class="fas fa-check"></i> Business Planning</li>
                <li><i class="fas fa-check"></i> Ethical Leadership</li>
                <li><i class="fas fa-check"></i> Marketplace Mission</li>
              </ul>
              <button class="btn btn-program view-course" data-title="FAB" data-desc="Modules include business planning, ethical leadership, and marketplace mission with mentorship opportunities.">
                Learn More <i class="fas fa-arrow-right ms-2"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- Faculties (overview) -->
    <section id="faculties" class="section-padding">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <span class="section-badge">Our Expertise</span>
            <h2 class="section-title mt-3 mb-3">Faculty Endeavours</h2>
            <p class="section-description">Eight specialized faculties integrating faith, scholarship, and professional excellence for transformative impact.</p>
          </div>
        </div>
        <div class="row g-4">
          <?php
          $faculties = [
            'GAD'=>["title"=>"Governance & Development (GAD)", "desc"=>"Strengthening governance, public policy and institutional capacity for sustainable development and ethical leadership."],
            'EAT'=>["title"=>"Education & Training (EAT)", "desc"=>"Empowering educators and trainers to formulate educational systems that drive industry and promote the glory of God."],
            'SAT'=>["title"=>"Science & Technology (SAT)", "desc"=>"Promoting ethical innovation, research excellence and technology adoption that serve humanity and honour God."],
            'PAA'=>["title"=>"Philosophy & the Arts (PAA)", "desc"=>"Integrating faith, culture and the arts to shape worldviews and communicate timeless truths with creativity."],
            'FAB'=>["title"=>"Finance & Business (FAB)", "desc"=>"Championing integrity, stewardship and excellence in business practice and financial management."],
            'RAF'=>["title"=>"Relationship & Family (RAF)", "desc"=>"Supporting healthy relationships, family resilience and community formation rooted in godly principles."],
            'MAA'=>["title"=>"Missions & Apologetics (MAA)", "desc"=>"Preparing professionals to engage culture with the gospel, defend the faith thoughtfully and serve missionally."],
            'CAM'=>["title"=>"Communication & Media (CAM)", "desc"=>"Equipping communicators to shape narratives, produce high-quality content and influence public discourse with truth."]
          ];
          foreach ($faculties as $k=>$f) {
            $short = htmlspecialchars($k);
            $title = htmlspecialchars($f['title']);
            $desc = htmlspecialchars($f['desc'], ENT_QUOTES);
            $outcomes = htmlspecialchars($f['outcomes'] ?? '', ENT_QUOTES);
            $icon = htmlspecialchars($f['icon'] ?? "assets/images/icon-$k.svg");
            echo "<div class=\"col-lg-3 col-md-4 col-sm-6\">".
                 "<div class=\"faculty-card-compact\">".
                 "<div class=\"faculty-icon-small\">".
                 "<img src=\"$icon\" alt=\"$short icon\">".
                 "</div>".
                 "<div class=\"faculty-acronym\">$short</div>".
                 "<h6 class=\"faculty-title-compact\">$title</h6>".
                 "<button class=\"btn btn-faculty-compact view-faculty\" data-title=\"$title\" data-desc=\"$desc\" data-outcomes=\"$outcomes\">".
                 "Explore $short".
                 "</button>".
                 "</div></div>";
          }
          ?>
        </div>
      </div>
    </section>

    <!-- Faculty & Staff -->
    <section id="faculty" class="bg-light py-5">
      <div class="container">
        <h3 class="mb-4">Faculty & Staff</h3>
        <div class="row row-cols-1 row-cols-md-3 g-3">
          <div class="col">
            <div class="card h-100 text-center p-3">
              <img src="assets/images/staff-JD.svg" alt="Dr. Jane Doe" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Dr. Jane Doe</h5><p class="card-text">Lead, Discipleship</p></div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center p-3">
              <img src="assets/images/staff-JS.svg" alt="Mr. John Smith" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Mr. John Smith</h5><p class="card-text">Head, Faith & Work</p></div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center p-3">
              <img src="assets/images/staff-AB.svg" alt="Ms. Ada Bright" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Ms. Ada Bright</h5><p class="card-text">Media & Curriculum</p></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Admissions -->
    <section id="admissions" class="section-padding">
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <span class="section-badge">Join Us</span>
            <h2 class="section-title mt-3 mb-4">Ready to Transform Your Sphere?</h2>
            <p class="lead-text mb-5">Applications are open for short courses and long programmes. Join a cohort and be equipped to integrate faith, scholarship, and professional excellence.</p>
            <a href="#contact" class="btn btn-primary-custom btn-lg px-5"><i class="fas fa-paper-plane me-2"></i>Apply / Enquire</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Events -->
    <section id="events" class="section-padding bg-light-gradient">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <span class="section-badge">Upcoming Events</span>
            <h2 class="section-title mt-3 mb-3">Events & Programs</h2>
            <p class="section-description">Join us for workshops, cohorts, and public lectures designed to equip and inspire.</p>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="card event-card h-100">
              <div class="card-body">
                <div class="event-date">
                  <i class="fas fa-calendar-alt text-primary-custom me-2"></i>
                  <span class="fw-bold">12 March 2026</span>
                </div>
                <h5 class="card-title mt-3">Leadership Workshop</h5>
                <p class="card-text">Practical leadership training for marketplace professionals seeking to lead with integrity and impact.</p>
                <a href="#contact" class="btn btn-sm btn-outline-primary">Register Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card event-card h-100">
              <div class="card-body">
                <div class="event-date">
                  <i class="fas fa-calendar-alt text-primary-custom me-2"></i>
                  <span class="fw-bold">26 March 2026</span>
                </div>
                <h5 class="card-title mt-3">Media Training</h5>
                <p class="card-text">Master storytelling techniques and create compelling content that drives meaningful engagement and impact.</p>
                <a href="#contact" class="btn btn-sm btn-outline-primary">Register Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card event-card h-100">
              <div class="card-body">
                <div class="event-date">
                  <i class="fas fa-calendar-alt text-primary-custom me-2"></i>
                  <span class="fw-bold">9 April 2026</span>
                </div>
                <h5 class="card-title mt-3">Apologetics Seminar</h5>
                <p class="card-text">Learn to engage contemporary culture with thoughtful, respectful, and persuasive apologetics.</p>
                <a href="#contact" class="btn btn-sm btn-outline-primary">Register Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="section-padding">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <span class="section-badge">Student Voices</span>
            <h2 class="section-title mt-3 mb-3">What Our Students Say</h2>
            <p class="section-description">Hear from graduates and current students about their transformative learning experience.</p>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"The SSA approach helped me engage my workplace with clarity and compassion. I'm now leading Bible study for my colleagues and seeing real transformation."</p>
              <div class="testimonial-author">
                <div class="author-avatar">AS</div>
                <div>
                  <strong>Adebayo Samuel</strong>
                  <span>Faith & Work Graduate, 2025</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"Practical, biblical, and deeply relevant. The Media & Arts program equipped me with skills to create content that glorifies God and reaches my generation."</p>
              <div class="testimonial-author">
                <div class="author-avatar">OE</div>
                <div>
                  <strong>Oluwaseun Esther</strong>
                  <span>Media & Arts Graduate, 2025</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"As a pastor, the Discipleship Pathway gave me frameworks and tools I use daily. My ministry has grown in depth and biblical foundation."</p>
              <div class="testimonial-author">
                <div class="author-avatar">CN</div>
                <div>
                  <strong>Chukwuma Nnamdi</strong>
                  <span>Discipleship Pathway, 2024</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"The Apologetics training prepared me to defend the faith thoughtfully. I'm now confidently engaging skeptics on campus with grace and truth."</p>
              <div class="testimonial-author">
                <div class="author-avatar">FA</div>
                <div>
                  <strong>Funmilayo Adeyemi</strong>
                  <span>SAT Program, Current Student</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"FAB gave me biblical principles for running my business with integrity. My company culture has completely transformed, and we're seeing both profitability and kingdom impact."</p>
              <div class="testimonial-author">
                <div class="author-avatar">TI</div>
                <div>
                  <strong>Tunde Ibrahim</strong>
                  <span>Finance & Business, 2024</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card">
              <div class="testimonial-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="testimonial-text">"The faculty are knowledgeable, caring, and genuinely invested in our growth. This isn't just education—it's discipleship and life transformation."</p>
              <div class="testimonial-author">
                <div class="author-avatar">GM</div>
                <div>
                  <strong>Grace Musa</strong>
                  <span>Education & Training, 2025</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-5">
      <div class="container">
        <h3 class="mb-4">Frequently Asked Questions</h3>
        <div class="accordion" id="faqAcc">
          <div class="accordion-item">
            <h2 class="accordion-header" id="q1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c1">How do I enroll?</button></h2>
            <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#faqAcc"><div class="accordion-body">Use the Apply / Enquire button or contact us via the form.</div></div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="q2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2">Are there certificates?</button></h2>
            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Yes — certificates are issued for completed programmes depending on course type.</div></div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section id="contact" class="container py-5">
      <h3>Contact & Enquiries</h3>
      <?php if ($msg): ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($msg); ?></div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-8">
          <form method="post" id="contactForm">
            <div class="mb-3"><label class="form-label">Name</label><input name="name" class="form-control" value="<?php echo htmlspecialchars($name ?? '') ?>" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email ?? '') ?>" required></div>
            <div class="mb-3"><label class="form-label">Message</label><textarea name="message" class="form-control" rows="5" required><?php echo htmlspecialchars($message ?? '') ?></textarea></div>
            <button class="btn btn-crimson" type="submit">Send Message</button>
          </form>
        </div>
        <div class="col-md-4">
          <div class="card p-3 shadow-sm">
            <h5>Contact</h5>
            <p>Email: info@foresightacademy.com</p>
            <p>Address: Your City</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="py-4 text-center site-footer">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-lg-4">
          <h5><i class="fas fa-graduation-cap me-2"></i>Foresight Academy</h5>
          <p>Engineering the manifestation of godliness in the secular space through transformative education and practical spiritual formation.</p>
          <div class="footer-social mt-3">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-4">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#about">About Us</a></li>
            <li><a href="#faculties">Faculties</a></li>
            <li><a href="#programs">Programs</a></li>
            <li><a href="#admissions">Admissions</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        
        <div class="col-lg-2 col-md-4">
          <h6>Resources</h6>
          <ul class="footer-links">
            <li><a href="#academics">Academic Calendar</a></li>
            <li><a href="#student-life">Student Services</a></li>
            <li><a href="https://lms.foresightacademy.com" target="_blank">Student Portal</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </div>
        
        <div class="col-lg-4 col-md-4">
          <h6>Stay Connected</h6>
          <p class="small">Subscribe to receive updates on programs, events, and opportunities.</p>
          <?php if ($sub_msg): ?>
            <div class="alert alert-light mb-2" role="alert"><?php echo htmlspecialchars($sub_msg); ?></div>
          <?php endif; ?>
          <form method="post" class="newsletter-form">
            <div class="input-group">
              <input type="email" name="subscribe_email" class="form-control" placeholder="Email address" required>
              <button class="btn btn-outline-light" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
      
      <hr class="footer-divider">
      
      <div class="row g-3 align-items-center">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; <?php echo date('Y'); ?> Foresight Academy. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="footer-legal">
            <a href="#privacy-policy" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
            <span class="mx-2">|</span>
            <a href="#terms-of-service" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Service</a>
            <span class="mx-2">|</span>
            <a href="#cookie-policy" data-bs-toggle="modal" data-bs-target="#cookieModal">Cookie Policy</a>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-12 text-center">
          <p class="footer-disclaimer small">
            <strong>Non-Discrimination Statement:</strong> Foresight Academy does not discriminate on the basis of race, color, national or ethnic origin, sex, age, or disability in its educational programs, admissions policies, or employment practices.
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Privacy Policy Modal -->
  <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header-custom">
          <h3 class="modal-title-custom" id="privacyModalLabel">Privacy Policy</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body-custom">
          <div class="legal-content">
            <p><strong>Effective Date:</strong> January 1, 2026</p>
            
            <h5>1. Information We Collect</h5>
            <p>Foresight Academy collects personal information including name, email address, phone number, educational background, and payment information when you apply for programs, register for events, or contact us.</p>
            
            <h5>2. How We Use Your Information</h5>
            <ul>
              <li>Process applications and enrollment</li>
              <li>Communicate about programs, events, and updates</li>
              <li>Provide student services and support</li>
              <li>Improve our educational offerings</li>
              <li>Comply with legal obligations</li>
            </ul>
            
            <h5>3. Information Sharing</h5>
            <p>We do not sell or rent your personal information. We may share information with service providers who assist in operating our programs, partners for educational purposes, or when required by law.</p>
            
            <h5>4. Data Security</h5>
            <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h5>5. Your Rights</h5>
            <p>You have the right to access, correct, or delete your personal information. You may also opt-out of marketing communications at any time.</p>
            
            <h5>6. Cookies</h5>
            <p>We use cookies to improve user experience. You can control cookie settings through your browser preferences.</p>
            
            <h5>7. Contact Us</h5>
            <p>For questions about this privacy policy, contact us at privacy@foresightacademy.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Terms of Service Modal -->
  <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header-custom">
          <h3 class="modal-title-custom" id="termsModalLabel">Terms of Service</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body-custom">
          <div class="legal-content">
            <p><strong>Effective Date:</strong> January 1, 2026</p>
            
            <h5>1. Acceptance of Terms</h5>
            <p>By enrolling in Foresight Academy programs, you agree to these Terms of Service and our academic policies.</p>
            
            <h5>2. Enrollment and Fees</h5>
            <p>Enrollment is confirmed upon payment of required fees. Fees are non-refundable except as stated in our Refund Policy. Payment plans must be adhered to; failure may result in suspension of access to learning materials.</p>
            
            <h5>3. Academic Integrity</h5>
            <p>Students must maintain academic honesty. Plagiarism, cheating, or any form of academic dishonesty will result in disciplinary action including potential dismissal.</p>
            
            <h5>4. Attendance and Participation</h5>
            <p>Students must maintain minimum 75% attendance. Active participation in discussions, assignments, and assessments is required.</p>
            
            <h5>5. Code of Conduct</h5>
            <p>Students are expected to conduct themselves in a manner consistent with Christian values, showing respect to faculty, staff, and fellow students. Disruptive or inappropriate behavior may result in disciplinary action.</p>
            
            <h5>6. Intellectual Property</h5>
            <p>All course materials, lectures, and content are the intellectual property of Foresight Academy. Unauthorized distribution or reproduction is prohibited.</p>
            
            <h5>7. Refund Policy</h5>
            <p>Full refund if withdrawal occurs within 7 days of program start. 50% refund within 14 days. No refund after 14 days. Application fees are non-refundable.</p>
            
            <h5>8. Modification of Terms</h5>
            <p>Foresight Academy reserves the right to modify these terms. Students will be notified of significant changes.</p>
            
            <h5>9. Limitation of Liability</h5>
            <p>Foresight Academy is not liable for any indirect, incidental, or consequential damages arising from program participation.</p>
            
            <h5>10. Contact</h5>
            <p>For questions about these terms, contact admissions@foresightacademy.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cookie Policy Modal -->
  <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header-custom">
          <h3 class="modal-title-custom" id="cookieModalLabel">Cookie Policy</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body-custom">
          <div class="legal-content">
            <p><strong>Effective Date:</strong> January 1, 2026</p>
            
            <h5>What Are Cookies?</h5>
            <p>Cookies are small text files stored on your device when you visit our website. They help us provide a better user experience.</p>
            
            <h5>Types of Cookies We Use</h5>
            
            <h6>Essential Cookies</h6>
            <p>Required for website functionality, including login sessions and form submissions.</p>
            
            <h6>Analytics Cookies</h6>
            <p>Help us understand how visitors use our website so we can improve it.</p>
            
            <h6>Preference Cookies</h6>
            <p>Remember your preferences and settings for a personalized experience.</p>
            
            <h5>Managing Cookies</h5>
            <p>You can control and delete cookies through your browser settings. Note that disabling cookies may affect website functionality.</p>
            
            <h5>Third-Party Cookies</h5>
            <p>We may use third-party services (e.g., Google Analytics) that set their own cookies. These are governed by their respective privacy policies.</p>
            
            <h5>Contact Us</h5>
            <p>For questions about our use of cookies, email privacy@foresightacademy.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <!-- Course detail modal -->
  <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header-custom">
          <h3 class="modal-title-custom" id="courseModalLabel">Course Details</h3>
        </div>
        <div class="modal-body-custom">
          <div class="modal-content-wrapper" id="courseModalBody">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
