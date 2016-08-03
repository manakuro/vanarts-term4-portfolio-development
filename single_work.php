<?php 
    include 'template/header.php';
    $works = Config::get('work');

    $id = (!empty($_GET['id'])) ? $_GET['id'] : '';

    if (empty($works[$id])) {
        header('Location: ../work');
        exit;
    }

    // grab work from config file through id
    $work = $works[$id];
?>
        
    <main class="page-main single_work">

        <section class="sec-work-modal-info">
            
            <div class="row">

                <div class="columns span-l-12">
                    
                    <div class="modal-item-title-wrapper sec-work-modal-list">
                        
                        <h4 class="modal-item-heading">Project</h4>
                        <p class="modal-item-title"><?php echo $work['title']; ?></p>

                    </div>

                    <div class="sec-work-modal-list">
                        
                        <h4 class="modal-item-heading">about</h4>

                        <div class="modal-item-desc">
                            <?php echo html_entity_decode($work['single_work']['desc'], ENT_QUOTES, 'UTF-8'); ?>                        
                        </div>
                        
                    </div>
                    
                    <div class="modal-item-env sec-work-modal-list">

                        <h4 class="modal-item-heading">tools</h4>

                    <?php foreach($work['single_work']['tools'] as  $val): ?>
                        <div class="work-development-env-wrapper">
                            <i class="fa fa-check-circle work-development-env-icon"></i>
                            <span class="work-development-env-list"><?php echo $val; ?></span>
                        </div>

                    <?php endforeach; ?>

                    </div>

                    <?php if (!empty($work['single_work']['live_url'])): ?>
                    <div class="modal-btn-wrapper sec-work-modal-list">

                        <a href="<?php echo $work['single_work']['live_url']; ?>" class="btn btn-modal" target="_blank">LIVE</a>
                        
                    </div>
                    <?php endif;?>
                
                </div>

            </div>


        </section>

        <section class="work-modal-gallery">

            <div class="row row-center">
                
            <?php foreach($work['single_work']['imgs'] as $val): ?>
                <div class="columns <?php echo $val['width']; ?> modal-item-img-list">
                    <img src="<?php echo $val['img'];?>" alt="<?php echo $val['alt'];?>">
                </div>
            <?php endforeach; ?>

            </div>        

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>