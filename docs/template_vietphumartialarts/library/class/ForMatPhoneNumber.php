<?php
  // Format US phone number
  function formatPhoneNumber($strPhone)
  {
          $strPhone = ereg_replace("[^0-9]",'', $strPhone);
          if (strlen($strPhone) != 10)
          {
                  return $strPhone;
          }

          $strArea = substr($strPhone, 0, 3);
          $strPrefix = substr($strPhone, 3, 3);
          $strNumber = substr($strPhone, 6, 4);

          $strPhone = "(".$strArea.") ".$strPrefix."-".$strNumber;

          return ($strPhone);
  }
  $a = '123456asd';
  echo formatPhoneNumber($a);
?>