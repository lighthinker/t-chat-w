<?php
	// Quand in essaye d'acceder à localhost/t-chat/public/
        // l'url qui est réellement reçu est : localhost/t-chat/index.php/
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
                ['GET', '/test', 'Test#monAction', 'test_index'],
	);