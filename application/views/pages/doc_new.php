
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

                                        <?= form_open_multipart('doc_add'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputCommittee" class="col-form-label">Document Code</label>
                                                    <input type="text" value="<?= set_value('name'); ?>" name="name" class="form-control" placeholder="2022-00001">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCommittee" class="col-form-label">Document Category</label>
                                                    <select id="inputCategory"  name="doc_cat" class="form-control">
                                                        <?php 
                                                        foreach($cat as $row){
                                                            $c = $row['name'];
                                                            echo "<option value='{$c}'>{$c}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select Category</option>
                                                    </select>
                                                </div>
                                        </div> 
                                        <div class="form-row">      
                                            <div class="form-group col-md-8">
                                                <label for="inputCommittee" class="col-form-label">File Attachment</label>
                                                <input type="file" value="<?= set_value('file'); ?>" name="file" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Office Received</label>
                                                <input type="text" value="<?= set_value('office'); ?>" name="office" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="form-row">      
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Date Receive</label>
                                                <input type="date" value="<?= set_value('date'); ?>" name="date" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Receive By</label>
                                                <input type="text" value="<?= set_value('receive_by'); ?>" name="receive_by" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Submitted By</label>
                                                <input type="text" value="<?= set_value('sub_by'); ?>" name="sub_by" class="form-control">
                                            </div>

                                        </div> 
                                        <div class="form-row">      
                                            <div class="form-group col-md-8">
                                                <label for="inputCommittee" class="col-form-label">Address</label>
                                                <input type="text" value="<?= set_value('address'); ?>" name="address" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Contact</label>
                                                <input type="text" value="<?= set_value('contact'); ?>" name="contact" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputCommittee" class="col-form-label">Remarks</label>
                                                <input type="text" value="<?= set_value('remarks'); ?>" name="remarks" class="form-control">
                                            </div>
                                            <button type="submit" value="submit" class="btn btn-primary">Receive</button>
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

                

               