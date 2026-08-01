<?php
require_once 'config.php';
require_once 'users.php';

$users = getAllUsers($pdo);
$total = count($users);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Dashboard de Usuarios</h2>
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card text-white bg-primary shadow">
        <div class="card-body text-center">
          <h5 class="card-title">Total Usuarios</h5>
          <h1><?= $total ?></h1>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-success shadow">
        <div class="card-body text-center">
          <h5 class="card-title">Usuarios Activos</h5>
          <h1><?= $total ?></h1>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-warning shadow">
        <div class="card-body text-center">
          <h5 class="card-title">Nuevos este mes</h5>
          <h1><?= $total ?></h1>
        </div>
      </div>
    </div>
  </div>
  <h4>Lista de Usuarios</h4>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="index.php" class="btn btn-secondary">Volver</a>
</div>
</body>
</html>