<?php
require_once __DIR__ . '/db.php';

// BASIC HTTP AUTH — change credentials before deploying publicly
$ADMIN_USER = 'admin';
$ADMIN_PASS = 'ChangeMe123!';
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] !== $ADMIN_USER || $_SERVER['PHP_AUTH_PW'] !== $ADMIN_PASS) {
  header('WWW-Authenticate: Basic realm="Foresight Admin"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'Unauthorized';
  exit;
}

// SIMPLE ADMIN LISTING - this page is now protected by basic auth; consider stronger protection for production.
$contacts = $pdo->query('SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC LIMIT 200')->fetchAll();
$subs = $pdo->query('SELECT id, email, created_at FROM subscribers ORDER BY created_at DESC LIMIT 200')->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Foresight Academy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h1>Admin</h1>
    <p class="text-warning">This admin page is not protected. Secure it before use.</p>

    <h2>Contacts</h2>
    <table class="table table-sm table-striped">
      <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>When</th></tr></thead>
      <tbody>
        <?php foreach($contacts as $c): ?>
          <tr>
            <td><?php echo $c['id'] ?></td>
            <td><?php echo htmlspecialchars($c['name']) ?></td>
            <td><?php echo htmlspecialchars($c['email']) ?></td>
            <td><?php echo nl2br(htmlspecialchars($c['message'])) ?></td>
            <td><?php echo $c['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h2>Subscribers</h2>
    <table class="table table-sm table-striped">
      <thead><tr><th>ID</th><th>Email</th><th>When</th></tr></thead>
      <tbody>
        <?php foreach($subs as $s): ?>
          <tr>
            <td><?php echo $s['id'] ?></td>
            <td><?php echo htmlspecialchars($s['email']) ?></td>
            <td><?php echo $s['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</body>
</html>
