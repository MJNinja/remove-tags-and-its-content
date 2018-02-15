<?php
$string = 'Some valid and <script>some invalid</script> text <script>which needs to be removed</script>!';

$out = delete_all_between('<script>', '</script>', $string);

print($out);

function delete_all_between($beginning, $end, $string) {

  while ( ( $pos = strpos( $string, $beginning, $pos ) ) !== false ) {

      $beginningPos = strpos($string, $beginning);
      $endPos = strpos($string, $end);

      $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

      $string = str_replace($textToDelete, '', $string);

      $pos++;
  }

  return $string;
}
?>
