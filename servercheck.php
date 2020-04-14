<?php
  $start_time = microtime(TRUE);

  $free = shell_exec('free');
  $free = (string)trim($free);
  $free_arr = explode("\n", $free);
  echo $free;
  ?>