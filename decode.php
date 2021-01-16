<?php
$content = file_get_contents('./encoded.dat');

$hexed = preg_replace('#^(0201534B6FF4888DC14EA0D5EBB6BDA0A70D)#', '', strtoupper(bin2hex($content)));

$infalted = gzinflate(hex2bin($hexed));

$body = preg_replace('#^' . chr(239) . chr(187) . chr(191) . '#', '', substr($infalted, 8, strlen($infalted)));

$data = substr($body, 6, -2);

file_put_contents('./decoded.txt', $data);