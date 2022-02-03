<?php
    


    function connect (){

        return new mysqli('localhost', 'root', '', 'form');

    }

function validate(string $msg, string $type='danger'){

return "<P class=\"alert alert-{$type} alert-dismissible\">{$msg}<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></p>";

}
 function emailcheck($email){

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         return false;
      }else {
          return true;
      }
 }
 function old($key){
      
    return $_POST[$key] ?? '';

 }
 function formclear(){

    return $_POST = '';
 }
 function currency($amound, $currency){

$rate = 0;
switch ($currency) {
   case 'usd':
      $rate = 85.15;
      break;
      case 'cad':
         $rate = 96;
         break;
         case 'poud':
            $rate = 67.17;
            break;
            case 'eoru':
               $rate = 105;
               break;
               case 'won':
                  $rate = 0.071;
                  break;
  
           
               }
               $btd = $rate * $amound;
               return "{$amound} { $currency} = {$btd} BDT";

 }

 function marrigeCkek($name, $year, $gender){
    
      $age = date('Y') - $year;
      $malefemale = $gender == 'Male' ? 21 : 18;
      switch ( $gender) {
         case 'Male':
               if ( $gender == 'Male' &&   $age > 21) {
                  return "hi {$name} you are redy ";
               }else {
                  return "hi {$name} vaiya you are not redy ";
               }

            break;
            case 'Female':
               if ( $gender == 'Female' &&   $age > 18) {
                  return "hi {$name} you are redy ";
               }else {
                  return "hi {$name} apu you are not redy ";
               }

            break;
         
         default:
            # code...
            break;
      }


 }




 // photo upload

 function photoUplod ($file_data, $path = '/'){

      $file_name = $file_data['name'];
      $file_tmp_name = $file_data['tmp_name'];


      move_uploaded_file( $file_tmp_name, $path.$file_name);


      return $file_name;


 }



?>