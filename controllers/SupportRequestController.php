<?php
require_once realpath(__DIR__ . '/../models/SupportRequest.php');

class SupportRequestController extends Controller {
    public function index() {
        $model = new SupportRequest(); // Asegúrate de que esta clase exista
        $data = $model->getAll();
        $this->view('support_requests/index', ['requests' => $data]);
    }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'status' => $_POST['status'],
      ];
      $model = new SupportRequest();
      $model->create($data);
      header('Location: /SupportRequest');
    } else {
      $this->view('support_requests/create');
    }
  }

  public function edit($id)
  {
    $model = new SupportRequest();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'status' => $_POST['status'],
      ];
      $model->update($id, $data);
      header('Location: /SupportRequest');
    } else {
      $data = $model->getById($id);
      $this->view('support_requests/edit', ['request' => $data]);
    }
  }

  public function delete($id)
  {
    $model = new SupportRequest();
    $model->delete($id);
    header('Location: /SupportRequest');
  }
}