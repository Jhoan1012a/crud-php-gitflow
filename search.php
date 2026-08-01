<?php
require_once 'config.php';

$results = [];
$query = '';

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $query = $_GET['q'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?");
    $stmt->execute(["%$query%", "%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Buscar Usuarios</h2>
  <form method="GET" class="mb-4">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Buscar por nombre o email..." value="<?= htmlspecialchars($query) ?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
  <?php if (!empty($results)): ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $user): ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= htmlspecialchars($user['name']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php elseif (!empty($query)): ?>
    <div class="alert alert-warning">No se encontraron usuarios.</div>
  <?php endif; ?>
  <a href="index.php" class="btn btn-secondary">Volver</a>
</div>
</body>
</html>