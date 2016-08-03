<?php 
    include 'template/header.php';
    $work = Config::get('work');
?>
        
    <main class="page-main work">

        <section class="sec">
            
            <div class="row">

                <?php foreach($work as $val): ?>

                <div class="columns span-l-4 work-li">

                    <a href="<?php echo $val['href']; ?>">
                        <img src="<?php echo $val['img'];?>" alt="<?php echo $val['alt'];?>">
                    </a>

                </div>

                <?php endforeach; ?>

            </div>

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>