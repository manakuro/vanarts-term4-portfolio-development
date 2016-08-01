<?php 
    include 'template/header.php';
    $homeWork = Config::get('home_work');
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
    
    <main class="page-main">

        <section class="sec home-work">
            
            <div class="row">

                <?php foreach ($homeWork as $index => $val): ?>

                <div class="columns span-l-12 home-work-li scroll-list" <?php echo $val['data_attr']?>>
                    
                    <div class="row">
                        
                        <div class="columns span-l-4 <?php if ($index%2 !== 0) echo 'fr'; ?>">
                            
                            <h3 class="home-work-li-heading"><?php echo $val['name']?></h3>

                            <p class="home-work-li-para"><?php echo $val['desc']?></p>

                            <a href="#" class="btn btn-cta">View</a>

                        </div>

                        <div class="columns span-l-8">
                            <img src="<?php echo $val['img']?>" alt="<?php echo $val['alt']?>">
                        </div>

                    </div>


                </div>
                <?php endforeach; ?>

            </div>

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>