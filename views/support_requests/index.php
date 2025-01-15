<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitudes de soporte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Solicitudes de soporte</h1>
    <a href="/support_requests/create" class="btn btn-primary mb-3">Crear solicitud</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Asunto</th>
          <th>Descripción</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($requests as $request): ?>
          <tr>
            <td><?= htmlspecialchars($request['id']) ?></td>
            <td><?= htmlspecialchars($request['title']) ?></td>
            <td><?= htmlspecialchars($request['description']) ?></td>
            <td><?= htmlspecialchars($request['status']) ?></td>
            <td>
              <a href="/support_requests/edit/<?= $request['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
              <a href="/support_requests/delete/<?= $request['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>