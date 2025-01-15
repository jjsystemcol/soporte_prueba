<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar solicitud de soporte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Editar solicitud de soporte</h1>
    <form action="/support_requests/edit/<?= htmlspecialchars($request['id']) ?>" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Asunto</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($request['title']) ?>" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" id="description" class="form-control" rows="5" required><?= htmlspecialchars($request['description']) ?></textarea>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Estado</label>
        <select name="status" id="status" class="form-select" required>
          <option value="Pendiente" <?= $request['status'] === 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
          <option value="En Progreso" <?= $request['status'] === 'En Progreso' ? 'selected' : '' ?>>En Progreso</option>
          <option value="Completado" <?= $request['status'] === 'Completado' ? 'selected' : '' ?>>Completado</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="/support_requests" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>