<?php 
    include('bootstrap.php');

    $config = Config::get();

    // session_start();
    // create navigation menu html
    $navHTML = Utility::getNav($config['nav'], array(
        'current' => CURRENT_PAGE.'.php'
    ));

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $config['title']?></title>
        <meta name="description" content="<?php echo $config['meta']['desc']?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- perevent google search robots from indexing -->
        <meta name="robots" content="noindex" /> 

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,100italic,100|Oswald:400,300,700' rel='stylesheet' type='text/css'>

        <!-- build:css assets/dist/css/vendor.min.css -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/libs/normalize.css">
        <link rel="stylesheet" href="../css/libs/video-js.css">
        <link rel="stylesheet" href="../css/libs/magnific-popup.css">
        <!-- endbuild -->
        
        <link rel="stylesheet" href="assets/dist/css/main.css">

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php if (IS_HOME): ?>
        <!-- header for home page -->
        <header class="page-header home">

            <div class="row">

                <div class="columns span-l-3 offset-l-9">
                    
                    <nav class="nav">
                        <ul class="nav-menu"><?php echo $navHTML; ?></ul>
                    </nav>

                </div>

            </div>
            
        </header>
        <!-- /header for home page -->
        <?php else: ?>

        <header class="page-header">

            <div class="row">

                <div class="columns span-l-2">
                    <a href="index.php"><img src="assets/dist/img/logo.png" class="page-header-logo"></a>
                </div>

                <div class="columns span-l-3 offset-l-7">
                    
                    <nav class="nav">
                        <ul class="nav-menu"><?php echo $navHTML; ?></ul>
                    </nav>

                </div>

            </div>
            
        </header>

        <?php endif; ?>
       

        
