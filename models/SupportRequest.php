<?php
class SupportRequest extends Model
{
  public function getAll()
  {
    return $this->db->query('SELECT * FROM support_requests')->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById($id)
  {
    $stmt = $this->db->prepare('SELECT * FROM support_requests WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($data)
  {
    $stmt = $this->db->prepare('INSERT INTO support_requests (title, description, status, created_at) VALUES (:title, :description, :status, :created_at)');
    $stmt->execute([
      'title' => $data['title'],
      'description' => $data['description'],
      'status' => $data['status'],
      'created_at' => date('Y-m-d H:i:s'),
    ]);
  }

  public function update($id, $data)
  {
    $stmt = $this->db->prepare('UPDATE support_requests SET title = :title, description = :description, status = :status WHERE id = :id');
    $stmt->execute([
      'id' => $id,
      'title' => $data['title'],
      'description' => $data['description'],
      'status' => $data['status'],
    ]);
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare('DELETE FROM support_requests WHERE id = :id');
    $stmt->execute(['id' => $id]);
  }
}
