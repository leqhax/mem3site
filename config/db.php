<?php

	const HOST_IP 	= 'localhost';
	const HOST_USER = '';
	const HOST_PASS = '';
	const HOST_NAME = '';

	@$db = mysqli_connect(HOST_IP, HOST_USER, HOST_PASS, HOST_NAME);

	if(!$db){echo 'Временные технические работы. Мы скоро будем online. Следите за новостями в группе - https://vk.com/memphis_project'; exit();}

	mysqli_set_charset($db,'utf8');

	const FK_ID 	= '';
	const FK_SEC1 	= '';
	const FK_SEC2 	= '';

	const RECAPTCHA_1 = '';
	const RECAPTCHA_2 = '';
