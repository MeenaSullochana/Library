<?php
      // echo Error Message Handler;
      if (count($error_message) > 0) {
         foreach ($error_message as $e) {
               echo $e . "<br />";
         }
      }

      // echo Success Message Handler;
      if (count($success_message) > 0) {
         foreach ($success_message as $s) {
               echo $s . "<br />";
         }
      }
    ?>