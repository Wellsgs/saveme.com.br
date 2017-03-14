<?php

//$xml = simplexml_load_file("/sites/xml/arquivo.xml");
$xml = simplexml_load_file("localhost:8080/index.php?id=2");

var_dump($xml);