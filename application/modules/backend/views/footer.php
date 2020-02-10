

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © <?=date("Y")?> <i class="mdi mdi-heart text-danger"></i> <span class="logo-tilte" style="text-transform:uppercase"><?=strtoupper(config_system("title"))?></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!--Morris Chart-->
        <script src="<?=base_url()?>_template/backend/plugins/morris/morris.min.js"></script>
        <script src="<?=base_url()?>_template/backend/plugins/raphael/raphael-min.js"></script>

        <script src="<?=base_url()?>_template/backend/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="<?=base_url()?>_template/backend/js/app.js"></script>

    </body>
</html>
