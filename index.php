<?php 
    include 'template/header.php';
    $work = Config::get('work');
?>
    
    <div class="hero">
        
        <div class="pre-loader">
            <div class="pre-loader-left pre-loader-sec"></div>
            <div class="pre-loader-right pre-loader-sec"></div>
        </div>

        <div id="particles-js" class="particles-container"></div>
        
        <div class="row row-center">

            <div class="hero-inner">
                
                <div class="columns span-l-3">
                    
                    <div id="svg-logo" class="svg-logo-wrapper"></div>

                </div>

                <div class="columns span-l-12">
                    
                    <p class="page-header-headline">I am a web developer & designer based in Canada</p>

                </div>

            </div>

        </div>

    </div>
    
    <main class="page-main home">

        <section class="sec home-work">
            
            <div class="row">

                <?php $count = 0; ?>
                <?php foreach ($work as $key => $val): ?>
                <?php if (!empty($val['home'])): ?>
                <div class="columns span-l-12 home-work-li scroll-list" <?php echo $val['home']['data_attr']?>>
                    
                    <div class="row">
                        
                        <div class="columns span-l-4 <?php if ($count % 2 !== 0) echo 'fr'; ?>">
                            
                            <h3 class="home-work-li-heading"><?php echo $val['home']['name']?></h3>

                            <p class="home-work-li-para"><?php echo $val['home']['desc']?></p>

                            <a href="<?php echo $val['href']; ?>" class="btn btn-cta">View</a>

                        </div>

                        <div class="columns span-l-8">
                            <img src="<?php echo $val['home']['img']?>" alt="<?php echo $val['home']['alt']?>">
                        </div>

                    </div>

                </div>
                <?php $count++;?>
                <?php endif; ?>
                <?php endforeach; ?>

            </div>

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>