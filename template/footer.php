<?php 
    $config = Config::get();
?>
<footer class="page-footer">
    
    <div class="row row-center">

            <div class="columns span-6">

            <?php if (CURRENT_PAGE !== 'contact'): ?>
                <a href="contact.php" class="btn btn-contact">Contact me</a>
            <?php endif; ?>

                <ul class="social">
                    <?php echo Utility::getSocialLink($config['social_media']); ?>
                </ul>

            </div>

    </div>

</footer>

        <!-- Vendors -->    
        <script src="/assets/dist/js/vendor.min.js"></script>

        <!-- JavaScript -->
        <script src="/assets/dist/js/bundle.js"></script>

    </body>
</html>