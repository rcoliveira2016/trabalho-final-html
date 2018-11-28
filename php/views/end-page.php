            </div>
        </div>
    </div>
    </main>

    <footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ramon. LTDA 2018</p>
    </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
    <?php foreach($bundles_javaScripts as $key => $value): ?>
        <script src="<?php echo $value; ?>"></script>
    <?php endforeach; ?>
</body>

</html>