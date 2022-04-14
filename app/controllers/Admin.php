<?php

class Admin extends Controller
{

  public function index()
  {
    $this->view('admin/index');
  }

  public function result()
  {
    $data['result'] = $this->model('Admin_model')->getAllResult();
    $this->view('admin/result', $data);
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    } else {
      header('location:' . BASEURL . 'admin');
    }
  }

  public function exportToxlsx()
  {
    $data['result'] = $this->model('Admin_model')->getAllResult();
    $this->view('admin/exportToxlsx', $data);
  }
}
