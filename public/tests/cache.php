<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/init.php';

use Cajogos\TempCache as Cacher;

$to_cache = 'cachingcaching';

Cacher::put($to_cache, '123456', 20);


echo $value = Cacher::get($to_cache);