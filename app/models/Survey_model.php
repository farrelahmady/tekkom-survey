<?php 

class Survey_model
{
   public function pushSession($data)
   {
      if(session_status() !== PHP_SESSION_ACTIVE) session_start();
      
      $_SESSION['RESULT'][] = htmlspecialchars($data);

   }

   public function popSession()
   {
      array_pop($_SESSION['RESULT']);

      $sessionLen = count($_SESSION['RESULT']) - 1; 
      return $_SESSION['RESULT'][$sessionLen];
   }

   public function getContent($data = "")
   {
      $content = [];
      switch (true) {
         case count($_SESSION['RESULT']) > 1:
            foreach (SURVEY as $value) {
               if (array_key_exists('parent', $value) && $value['parent'] == $data) {
                  array_push($content, $value);
               }
            }
            
            break;
         
         default:
            foreach (SURVEY as $value) {
               if (!array_key_exists('parent', $value)) {
                  array_push($content, $value);
               }
            }
            break;
      }
      return $content;
   }

   public function CreateToDB()
   {
      $db = new Database;

      $query = "INSERT INTO result
                  VALUES
               ('', :nama , :bidang, :sub_bidang, :sub_sub_bidang, :saran)";

      $db->query($query);
      $db->bind('nama', $_SESSION['RESULT'][0]);
      $db->bind('bidang', $_SESSION['RESULT'][1]);
      $db->bind('sub_bidang', $_SESSION['RESULT'][2]);
      $db->bind('sub_sub_bidang', $_SESSION['RESULT'][3]);
      $db->bind('saran', $_SESSION['RESULT'][4]);

      $db->execute();

      return $db->rowCount();
   }
}
