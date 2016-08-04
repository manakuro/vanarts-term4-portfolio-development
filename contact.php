<?php 
    include 'template/header.php';
    $work = Config::get('work');
?>
    
    <main class="page-main contact">

        <section class="sec sec-contact">
            
            <div class="row row-center">

                <div class="columns span-l-12">
                    <div id="map"></div>
                </div>

                <div class="columns span-l-8">
                    <p class="contact-msg">If you would like to get in touch, you can eamil <a href="info@manakuro.com" class="contact-mail">info@manakuro.com</a> and I will respond as soon as possible.</p>
                </div>

            </div>

        </section>

    </main><!-- /page-main -->

<?php include 'template/footer.php'; ?>