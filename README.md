# Foresight Academy — One Page Site

Place this folder in your XAMPP `htdocs` directory (already located there). Quick setup:

1. Import `sql/setup.sql` using phpMyAdmin or the MySQL CLI to create the `foresight_academy` database and `contacts` table.
2. Update database credentials in `db.php` if they differ from the defaults (`root` / empty password on XAMPP).
3. Start Apache & MySQL in XAMPP and visit:

```
http://localhost/FORESIGHT%20ACADEMY/
```

Contact form posts to the same page and saves messages to the `contacts` table.

Next steps:
- Replace placeholder images in `assets/images/`.
- Customize copy and faculty descriptions.
- Optionally configure Moodle on a subdomain and add SSO.

Admin page:
- A simple admin listing page is available at `admin.php` (e.g. http://localhost/FORESIGHT%20ACADEMY/admin.php). It lists the most recent contacts and newsletter subscribers.
- IMPORTANT: Secure `admin.php` before exposing the site to the internet (HTTP auth, IP restriction, or move behind a protected admin area).

New sections:
- Curriculum, Events, Resources, Policies, Careers, Donate, and an expanded Programs section with a course-detail modal.

Admin credentials (development):
- Username: `admin`
- Password: `ChangeMe123!`

Change these credentials in `admin.php` before using the site publicly.

Resources placeholders:
- `assets/docs/student-handbook.txt`
- `assets/docs/ssa-primer.txt`
- `assets/docs/scholarship-info.txt`

To replace placeholder resources, upload real PDF files into `assets/docs/` and update links in `index.php` if needed.

