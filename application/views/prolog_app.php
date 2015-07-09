<?php
defined('BASEPATH') OR exit('No direct script access allowed');

switch (ENVIRONMENT) {
    case 'development':
        $scripts[] = '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js" type="text/javascript" charset="utf-8"></script>';
        $scripts[] = '<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js" type="text/javascript" charset="utf-8"></script>';
                    
        $styles[] = '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" type="text/css">';
        $styles[] = '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css" type="text/css">';
        break;
    case 'production':
        $scripts[] = '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>';
        $scripts[] = '<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>';

        $styles[] = '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" type="text/css">';
        $styles[] = '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" type="text/css">';
        break;
    
    default:
        # code...
        break;
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title></title>
	<?php foreach ($scripts as $script): ?>
        <?= $script ?>
    <?php endforeach ?>
    <?php foreach ($styles as $style): ?>
        <?= $style ?>
    <?php endforeach ?>


</head>
<body>
