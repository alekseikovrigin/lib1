#!/usr/bin/env
<?php
require __DIR__ . '/vendor/autoload.php';
use classmap\Lib as Lib;

foreach ($argv as $item){
	parse_str($item, $output);
	if (isset($output['--file'])){
		$fp = @fopen($output['--file'], "r");
		if ($fp) {
			while (($buffer = fgets($fp, 4096)) !== false) {
				$e = new Lib;
				$e1 = $e->example($buffer);
				echo $e1;
			}
			if (!feof($fp)) {
				echo "Ошибка: fgets() неожиданно потерпел неудачу\n";
			}
			fclose($fp);
		}
    }
}

