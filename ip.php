<?php

$domain = $_GET['host'];

if(!preg_match('#([a-z\d-]+\.)+[a-z\d-]+#i', $domain, $match)) exit('未能识别域名，请检查');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $match[0]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);

if(!curl_exec($ch)) exit('IP获取失败，请重试');

echo curl_getinfo($ch, CURLINFO_PRIMARY_IP);