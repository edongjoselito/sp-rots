
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"><?= $title; ?></h4>
                                 
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        


                        <!-- Form row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <?= validation_errors(); ?>

                                        <?= form_open('term_add'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputtermPeriodfrom" class="col-form-label">Term Period</label>
                                                    <input type="date" value="<?= set_value('termPeriodfrom'); ?>" name="termPeriodfrom" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputtermPeriodto" class="col-form-label">Term Period</label>
                                                    <input type="date" value="<?= set_value('termPeriodto'); ?>" name="termPeriodto" class="form-control">
                                                </div>

                                            <button type="submit" value="submit" class="btn btn-primary">Create New Term Period</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

               