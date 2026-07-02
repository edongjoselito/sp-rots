
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

                                        <?= form_open('Pages/cat_com_edit/'.$data->id); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputname" class="col-form-label">Category</label>
                                                    <input type="text" value="<?= $data->cat; ?>" name="cat" class="form-control">
                                                </div>
                                                <input type="hidden" name="id" value="<?= $data->id; ?>">
                                            <button type="submit" value="submit" class="btn btn-primary">Update Category</button>
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

                

               