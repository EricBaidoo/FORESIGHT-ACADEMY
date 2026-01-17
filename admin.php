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
  <style>
    /* Mobile-responsive admin styles */
    @media (max-width: 768px) {
      .table {
        font-size: 0.875rem;
      }
      
      .table thead {
        display: none;
      }
      
      .table tr {
        display: block;
        margin-bottom: 1.5rem;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        padding: 1rem;
        background: #fff;
      }
      
      .table td {
        display: block;
        text-align: left;
        padding: 0.5rem 0;
        border: none;
      }
      
      .table td::before {
        content: attr(data-label);
        font-weight: bold;
        display: inline-block;
        margin-right: 0.5rem;
        color: #495057;
      }
      
      h1 {
        font-size: 1.75rem;
      }
      
      h2 {
        font-size: 1.5rem;
        margin-top: 2rem;
      }
      
      .container {
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      .text-warning {
        font-size: 0.875rem;
      }
    }
    
    @media (max-width: 576px) {
      .table {
        font-size: 0.8125rem;
      }
      
      h1 {
        font-size: 1.5rem;
      }
      
      h2 {
        font-size: 1.25rem;
      }
    }
  </style>
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
            <td data-label="ID"><?php echo $c['id'] ?></td>
            <td data-label="Name"><?php echo htmlspecialchars($c['name']) ?></td>
            <td data-label="Email"><?php echo htmlspecialchars($c['email']) ?></td>
            <td data-label="Message"><?php echo nl2br(htmlspecialchars($c['message'])) ?></td>
            <td data-label="When"><?php echo $c['created_at'] ?></td>
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
            <td data-label="ID"><?php echo $s['id'] ?></td>
            <td data-label="Email"><?php echo htmlspecialchars($s['email']) ?></td>
            <td data-label="When"><?php echo $s['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</body>
</html>
