
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

                                        <?= form_open('term_edit/'. $id); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputtermPeriodfrom" class="col-form-label">Term Period</label>
                                                    <input type="date" value="<?= $from; ?>" name="from" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputtermPeriodto" class="col-form-label">Term Period</label>
                                                    <input type="date" value="<?= $to; ?>" name="to" class="form-control">
                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                </div>

                                            <button type="submit" value="submit" class="btn btn-primary">Update Term Period</button>
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

                

               