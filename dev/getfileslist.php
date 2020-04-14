<?php
echo"Product specifications<br>";
echo"<br>Version 0.1a";
echo"<br>Target Platforms - Android, Web, IOS";
echo"<br>Server technologies - PHP,MySQL,Firebase";
echo"<br>PHP Version:".phpversion();
$upOne = dirname(__DIR__, 1);
$allfiles = scandir($upOne);
//
$files = array_filter($allfiles, function($item) {
    return !is_dir('../' . $item);
});
//

echo "<br><br>======= PHP SCRIPTS ========<br><br>";

$string_version = implode(',<br>', $files);

echo $string_version;

echo '<br><br>Total:'.count($files);
echo'<br>------------------------<br>';
?>