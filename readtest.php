<?php
function benchmark($file) {
  $start = round(microtime(true) * 1000);

  for ($i = 0; $i < 10000; $i++) {
    file_get_contents($file);
  }

  $end = round(microtime(true) * 1000);

  return ($end - $start);
}

echo "Running benchmark on mounted file:" . PHP_EOL;
$ms1 = benchmark('/var/www/testfile.txt');
echo "Took " . $ms1 . "ms" . PHP_EOL;

echo "Running benchmark on NON mounted file:" . PHP_EOL;
$ms2 = benchmark('/var/nonmount/testfile.txt');
echo "Took " . $ms2 . "ms" . PHP_EOL;

echo "Non mounted file was " . round($ms1 / $ms2, 2) . " times faster" . PHP_EOL;
