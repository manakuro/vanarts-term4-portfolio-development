<?php 
    include 'template/header.php';
    $config = Config::get('about');
?>
        
    <main class="page-main about">

        <section class="sec about-intro js-video-container">

            <div class="row row-center">
                
                <div class="columns span-l-8">
                    
                    <a href="<?php echo $config['video']['src']; ?>" class="js-popup-video">
                    
                        <div class="about-video-img-wrapper-top">

                            <img src="<?php echo $config['video']['img']; ?>" alt="<?php echo $config['video']['alt']; ?>">

                            <i class="fa fa-play about-video-play js-audio-icon" aria-hidden="true"></i>
                            
                        </div>

                    </a>

                </div>

                <div class="columns span-l-8">
                    
                    <p class="about-intro-para"><?php echo $config['intro']; ?></p>

                </div>

            </div>

        </section>


        <section class="sec about-skills">
            
            <div class="row">

                <?php foreach($config['skills'] as $val): ?>

                <div class="columns span-l-4 about-skills-li">

                    <div class="about-skills-li-inner" <?php echo $val['data_attr']; ?>>
                        
                        <h4 class="about-skills-li-heading"><?php echo $val['name']; ?></h4>

                        <div class="about-skills-li-img">
                            <img src="<?php echo $val['img']; ?>" alt="<?php echo $val['alt']; ?>" class="span-l-3">
                        </div>

                        <div class="about-skills-li-progress">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <span class="progress-item"></span>
                        <?php endfor; ?>
                        </div>

                        <p class="about-skills-li-para"><?php echo $val['desc']; ?></p>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>