<?php
  header('Content-type: application/json; charset='. language::$selected['charset']);
  
  $status=true;
   foreach (cart::$items as $key => $item) {
    if($item['quantity']<1){
      $status=false;
      break;
    }
  }

  $json = array(
    'stock' => $status,
  );
  
  mb_convert_variables(language::$selected['charset'], 'UTF-8', $json);
  $json = json_encode($json);
  
  mb_convert_variables('UTF-8', language::$selected['charset'], $json);
  echo $json;
  
  exit;
?>