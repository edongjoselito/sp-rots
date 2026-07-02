
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

                                        <?= form_open('office_edit/'.$id); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputCommittee" class="col-form-label">Edit <?= $title; ?></label>
                                                    <input type="text" value="<?= $office; ?>" name="office" class="form-control">
                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                </div>
                                            <button type="submit" value="submit" class="btn btn-primary">Update <?= $title; ?></button>
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

                

               