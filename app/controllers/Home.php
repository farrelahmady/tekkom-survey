<?php

class Home extends Controller
{

	public function index()
	{
      if(session_status() === PHP_SESSION_ACTIVE){ 
         session_unset();
         session_destroy();
      }
		$this->view('home/index');
   }

	public function getArticle($name)
	{
      
		$data['subjudul'] = $this->model('Home_model')->getSubJudul($name);
		$data['article'] = $this->model('Home_model')->getArticleContent($name);
		$this->view('home/ajax/article', $data);
		// echo $name;
	}

   public function getSurvey($pageReq, $val = "")
   {
      $this->model('Survey_model')->pushSession($val);
      $data['page'] = $pageReq;
      switch ($data['page']) {
         case 'survey':
            $data['title'] = 'BIDANG YANG DIMINATI';
            $data['survey'] = $this->model('Survey_model')->getContent($val);
            break;
         
         case 'suggest':
            if (count($_SESSION['RESULT']) < 4) {
               $this->model('Survey_model')->pushSession("-");
            }
            $data['title'] = 'KRITIK DAN SARAN';
            break;

         default:
            if ($this->model('Survey_model')->CreateToDB() > 0) {
               $data['title'] = 'PROFIL';
            }
            $data['title'] = 'PROFIL';
            // print_r($_SESSION['RESULT']);
            break;
      }
      $this->view('home/ajax/survey', $data);
   }

   public function backSurvey()
   {
      $val = $this->model('Survey_model')->popSession();
      $data['title'] = 'BIDANG YANG DIMINATI';
      $data['survey'] = $this->model('Survey_model')->getContent($val);
      $data['page'] = 'survey';
      $this->view('home/ajax/survey', $data);
   }
}
