<?php
require_once __DIR__ . '/db.php';

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
      try {
        $stmt = $pdo->prepare('INSERT INTO contacts (name, email, message, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$name, $email, $message]);
        $msg = 'Thank you — your message has been received.';
        $name = $email = $message = '';
      } catch (Exception $e) {
        $msg = 'Error saving message. Please try again later.';
      }
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
      try {
        $stmt = $pdo->prepare('INSERT INTO subscribers (email, created_at) VALUES (?, NOW())');
        $stmt->execute([$sub_email]);
        $sub_msg = 'Thanks — you are subscribed to updates.';
      } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // duplicate
          $sub_msg = 'This email is already subscribed.';
        } else {
          $sub_msg = 'Subscription failed. Please try again later.';
        }
      }
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/images/logo.jpeg">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#000;">
    <div class="container">
      <a class="navbar-brand" href="#hero">Foresight Academy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#faculties">Faculties</a></li>
          <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
          <li class="nav-item"><a class="nav-link" href="#curriculum">Curriculum</a></li>
          <li class="nav-item"><a class="nav-link" href="#admissions">Admissions</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
          <li class="nav-item ms-2"><a class="btn btn-outline-light btn-sm" href="https://lms.foresightacademy.com" target="_blank">Student Portal</a></li>
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
          <div class="hero d-flex align-items-center text-center text-white" style="background-image:url('assets/images/slide1.svg')">
            <div class="container">
              <h1 class="display-5 fw-bold">Foresight Academy</h1>
              <p class="lead">Engineering the manifestation of godliness in the secular space via Seculo-Spiritual Aptitude (SSA).</p>
              <a href="#faculties" class="btn btn-lg btn-scarlet">Explore Faculties</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="hero d-flex align-items-center text-center text-white" style="background-image:url('assets/images/slide2.svg')">
            <div class="container">
              <h2 class="fw-bold">Equip. Engage. Transform.</h2>
              <p class="lead">Practical programmes across eight Faculty Endeavours for real-world impact.</p>
              <a href="#contact" class="btn btn-lg btn-crimson">Get In Touch</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="hero d-flex align-items-center text-center text-white" style="background-image:url('assets/images/slide3.svg')">
            <div class="container">
              <h2 class="fw-bold">Eight Faculty Endeavours</h2>
              <p class="lead">GAD · EAT · SAT · PAA · FAB · RAF · MAA · CAM</p>
              <a href="#faculties" class="btn btn-lg btn-scarlet">Learn More</a>
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

  <main class="py-5">
    <!-- About -->
    <section id="about" class="container py-5">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2>About Foresight Academy</h2>
          <p>Foresight Academy equips Christians to experience Gospel truths and transform their spheres of influence through our SSA philosophy. We offer programmes across eight Faculty Endeavours designed for practical spiritual formation and societal impact.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="assets/images/logo.jpeg" alt="Foresight Academy logo" class="img-fluid" style="max-height:180px; object-fit:contain;">
        </div>
      </div>
    </section>

    <!-- Programs -->
    <section id="programs" class="py-5">
      <div class="container">
        <h3 class="mb-4">Programs & Courses</h3>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Discipleship Pathway</h5>
                <p class="card-text">Structured discipleship modules focused on spiritual formation and leadership.</p>
                <p class="small text-muted">Duration: 12 weeks • Mode: Hybrid</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="Discipleship Pathway" data-desc="A 12-week pathway covering foundational doctrine, spiritual disciplines, mentoring and practical leadership projects.">Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Faith & Work</h5>
                <p class="card-text">Practical training on integrating faith into business and marketplace roles.</p>
                <p class="small text-muted">Duration: 8 weeks • Mode: Online</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="Faith & Work" data-desc="Modules on marketplace ethics, entrepreneurship, and vocational discipleship with case studies and mentorship.">Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Media & Arts Application</h5>
                <p class="card-text">Courses teaching media, communication, and arts as tools for outreach.</p>
                <p class="small text-muted">Duration: 6 weeks • Mode: Workshop</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="Media & Arts Application" data-desc="Practical modules on media production, storytelling, digital outreach and arts as discipleship tools.">Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Practical Apostolic Application (PAA)</h5>
                <p class="card-text">Field-based learning focused on community transformation projects.</p>
                <p class="small text-muted">Duration: 10 weeks • Mode: Field Cohort</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="PAA" data-desc="Apprenticeship-style projects partnering with local organizations to apply learning in community contexts.">Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Seculo-Apologetic Training (SAT)</h5>
                <p class="card-text">Training for cultural engagement and thoughtful apologetics.</p>
                <p class="small text-muted">Duration: 8 weeks • Mode: Seminar</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="SAT" data-desc="Workshops and practice sessions equipping participants to engage contemporary issues respectfully and persuasively.">Details</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Faith & Business (FAB)</h5>
                <p class="card-text">Practical support for Christians in entrepreneurship and business leadership.</p>
                <p class="small text-muted">Duration: 10 weeks • Mode: Hybrid</p>
                <button class="btn btn-sm btn-outline-secondary mt-2 view-course" data-title="FAB" data-desc="Modules include business planning, ethical leadership, and marketplace mission with mentorship opportunities.">Details</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Curriculum -->
    <section id="curriculum" class="py-5">
      <div class="container">
        <h3>Curriculum Overview</h3>
        <p>Our curriculum balances theology, practical skills and marketplace engagement across modular units. Example modules:</p>
        <ul>
          <li>Foundations of Seculo-Spiritual Aptitude (SSA)</li>
          <li>Leadership & Ethics in the Workplace</li>
          <li>Media, Communication & Arts for Outreach</li>
          <li>Practical Apostolic Application (PAA) workshops</li>
        </ul>
        <p>Each programme includes readings, practical assignments, peer-learning and an applied capstone.</p>
      </div>
    </section>

    <!-- Faculties (overview) -->
    <section id="faculties" class="bg-light py-5">
      <div class="container">
        <h3 class="mb-4">Faculty Endeavours</h3>
        <div class="row row-cols-1 row-cols-md-4 g-3">
          <?php
          $faculties = [
            'GAD'=>'Guided Advanced Discipleship',
            'EAT'=>'Engagement And Training',
            'SAT'=>'Seculo-Apologetic Training',
            'PAA'=>'Practical Apostolic Application',
            'FAB'=>'Faith & Business',
            'RAF'=>'Raising Academic Foundations',
            'MAA'=>'Media & Arts Application',
            'CAM'=>'Community Advancement Methods'
          ];
          foreach ($faculties as $k=>$v) {
            echo "<div class=\"col\"><div class=\"card h-100 shadow-sm\"><div class=\"card-body\"><h5 class=\"card-title\">$k</h5><p class=\"card-text\">$v</p></div></div></div>";
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
              <img src="assets/images/logo.jpeg" alt="staff" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Dr. Jane Doe</h5><p class="card-text">Lead, Discipleship</p></div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center p-3">
              <img src="assets/images/logo.jpeg" alt="staff" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Mr. John Smith</h5><p class="card-text">Head, Faith & Work</p></div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 text-center p-3">
              <img src="assets/images/logo.jpeg" alt="staff" class="rounded-circle mx-auto" style="width:80px;height:80px;object-fit:cover">
              <div class="card-body"><h5 class="card-title">Ms. Ada Bright</h5><p class="card-text">Media & Curriculum</p></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Admissions -->
    <section id="admissions" class="bg-light py-5">
      <div class="container text-center">
        <h3>Admissions</h3>
        <p class="lead">Applications are open for short courses and long programmes. Join a cohort and be equipped to transform your sphere.</p>
        <a href="#contact" class="btn btn-lg btn-scarlet">Apply / Enquire</a>
      </div>
    </section>

    <!-- Events -->
    <section id="events" class="bg-light py-5">
      <div class="container">
        <h3>Events & Calendar</h3>
        <p>Workshops, cohorts and public lectures are listed here. View upcoming events in the calendar below.</p>
        <div class="ratio ratio-16x9 mb-3">
          <!-- Example public calendar (change to your calendar ID) -->
          <iframe src="https://calendar.google.com/calendar/embed?src=en.usa%23holiday%40group.v.calendar.google.com&ctz=UTC" style="border:0" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class="row g-3">
          <div class="col-md-4"><div class="card p-3"><h5>Leadership Workshop</h5><p>Next: 12 March — practical leadership in marketplaces.</p></div></div>
          <div class="col-md-4"><div class="card p-3"><h5>Media Training</h5><p>Next: 26 March — storytelling & impact.</p></div></div>
          <div class="col-md-4"><div class="card p-3"><h5>Apologetics Seminar</h5><p>Next: 9 April — engaging culture thoughtfully.</p></div></div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-5">
      <div class="container">
        <h3 class="mb-4">Testimonials</h3>
        <div id="testiCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card p-4">
                <p>"The SSA approach helped me engage my workplace with clarity and compassion."</p>
                <small class="text-muted">— A. Student</small>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card p-4">
                <p>"Practical, biblical, and deeply relevant."</p>
                <small class="text-muted">— B. Leader</small>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#testiCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#testiCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </section>

    <!-- Resources -->
    <section id="resources" class="py-5">
      <div class="container">
        <h3>Resources</h3>
        <p>Download sample materials and guides.</p>
        <div class="row g-3">
          <div class="col-md-4"><a class="card p-3 h-100 text-decoration-none" href="assets/docs/student-handbook.txt"><h5>Student Handbook (PDF)</h5><p class="mb-0">Overview of courses, codes and expectations.</p></a></div>
          <div class="col-md-4"><a class="card p-3 h-100 text-decoration-none" href="assets/docs/ssa-primer.txt"><h5>SSA Primer</h5><p class="mb-0">Short guide to the Seculo-Spiritual Aptitude philosophy.</p></a></div>
          <div class="col-md-4"><a class="card p-3 h-100 text-decoration-none" href="assets/docs/scholarship-info.txt"><h5>Scholarship Info</h5><p class="mb-0">Apply for bursaries and support.</p></a></div>
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

    <!-- Policies -->
    <section id="policies" class="bg-light py-5">
      <div class="container">
        <h3>Policies</h3>
        <p><strong>Privacy:</strong> We store contact and subscription emails for administrative use. We won't share data without consent.</p>
        <p><strong>Terms:</strong> Use of the site and programme participation is subject to separate terms and agreements.</p>
      </div>
    </section>

    <!-- Careers -->
    <section id="careers" class="py-5">
      <div class="container">
        <h3>Careers & Volunteering</h3>
        <p>We're building teams. Email careers@foresightacademy.com with CV and role of interest.</p>
      </div>
    </section>

    <!-- Donate -->
    <section id="donate" class="bg-light py-5">
      <div class="container text-center">
        <h3>Support the Academy</h3>
        <p>Your gifts enable scholarships and community outreach.</p>
        <a href="mailto:donate@foresightacademy.com" class="btn btn-lg btn-crimson">Donate / Sponsor</a>
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

  <footer class="py-4 text-center site-footer" >
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-start">
          <strong>Foresight Academy</strong><br>
          <small>Engineering godliness in the secular space</small>
        </div>
        <div class="col-md-6 text-end">
          <!-- Newsletter form -->
          <?php if ($sub_msg): ?>
            <div class="alert alert-light d-inline-block mb-0" role="alert"><?php echo htmlspecialchars($sub_msg); ?></div>
          <?php endif; ?>
          <form method="post" class="d-inline-block ms-3">
            <div class="input-group input-group-sm">
              <input type="email" name="subscribe_email" class="form-control form-control-sm" placeholder="Email for updates" required>
              <button class="btn btn-outline-light btn-sm" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-3">© <?php echo date('Y'); ?> Foresight Academy</div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <!-- Course detail modal -->
  <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="courseModalLabel">Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="courseModalBody">
        </div>
        <div class="modal-footer">
          <a href="#contact" class="btn btn-scarlet">Enquire</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
