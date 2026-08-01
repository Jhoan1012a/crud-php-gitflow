<?php
require_once 'config.php';
require_once 'users.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$user = getUserById($pdo, $_GET['id']);

if (!$user) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
          <h4>Perfil de Usuario</h4>
        </div>
        <div class="card-body text-center">
          <div class="mb-3">
            <div style="width:80px;height:80px;border-radius:50%;background:#1a3c5e;color:white;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto;">
              <?= strtoupper(substr($user['name'], 0, 1)) ?>
            </div>
          </div>
          <h5 class="card-title"><?= htmlspecialchars($user['name']) ?></h5>
          <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
          <p><strong>ID:</strong> <?= $user['id'] ?></p>
          <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Editar</a>
          <a href="index.php" class="btn btn-secondary">Volver</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>