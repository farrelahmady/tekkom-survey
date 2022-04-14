<?php

class Home_model
{
   public function getArticleContent($data)
   {
      $name = str_replace(["_", "-"], [" ", "/"], $data);
      // var_dump($name);
      foreach (ARTICLE as $content) {
         // echo 'title = ' . $content['title'];
         // echo '<br>';
         if ($content['title'] == $name) {
            return $content;
         }
      }
   }

   public function getSubJudul($data)
   {
      $name = str_replace(["_", "-"], [" ", "/"], $data);
      $title = [];

      for ($i = 0; $i < count(SURVEY); $i++) {
         if (SURVEY[$i]['title'] == $name) {
            array_unshift($title, SURVEY[$i]['title']);
            if (array_key_exists("parent", SURVEY[$i])) {
               $name = SURVEY[$i]['parent'];
               $i = -1;
            }
         }
      }

      return $title;
   }

}
