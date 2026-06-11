<?php
session_start();

// keep this page private: bounce anyone without a live session
if (empty($_SESSION['authenticated'])) {
    header('Location: index.html');
    exit;
}

$username = htmlspecialchars($_SESSION['username'] ?? 'user', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSC426 Portal | Dashboard</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body { background: var(--bg); }
    .topbar {
      background: linear-gradient(120deg, var(--amber), var(--orange));
      color: #fff7ed;
      padding: 16px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .topbar .logo { color: #fff; margin: 0; font-size: 1.1rem; font-weight: 700; }
    .topbar .logo span { color: #ffe6cf; font-weight: 400; }
    .topbar a { color: #ffe9d6; text-decoration: none; font-weight: 600; font-size: 0.9rem; }
    .topbar a:hover { color: #fff; }
    .content { max-width: 720px; margin: 0 auto; padding: 70px 30px; }
    .content h1 { font-size: 2rem; font-weight: 600; }
    .content p { color: var(--muted); margin-top: 12px; line-height: 1.7; font-size: 1rem; }
  </style>
</head>
<body>
  <header class="topbar">
    <span class="logo">CSC426 <span>Portal</span></span>
    <a href="logout.php">Log out</a>
  </header>

  <main class="content">
    <h1>Hello, <?= $username ?></h1>
    <p>You are signed in. This page is protected by a server side session, so it can only be reached after a successful login.</p>
  </main>
</body>
</html>
