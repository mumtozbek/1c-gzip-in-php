<?php
$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$struct = '{"S","' . $string . '"}';
$strbom = chr(239) . chr(187) . chr(191) . $struct;

$hexed = preg_replace('#(\w{1,2})(\w{2})?(\w{2})?(\w{2})?(\w{2})?(\w{2})?(\w{2})?(\w{2})?#', '${8}${7}${6}${5}${4}${3}${2}${1}', sprintf('%016X', strlen($strbom))) . strtoupper(bin2hex($strbom));
$binary = hex2bin($hexed);

$data = hex2bin('0201534B6FF4888DC14EA0D5EBB6BDA0A70D') . gzdeflate($binary, 9);
file_put_contents('./encoded.dat', $data);