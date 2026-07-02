
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

                                        <?= form_open_multipart('Pages/new_committee_report'); ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Committee Report No.</label>
                                                    <input type="text" value="<?= set_value('com_no'); ?>" name="com_no" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Agenda Inclusion</label>
                                                    <input type="date" value="<?= set_value('date_ai'); ?>" name="date_ai" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Date Received</label>
                                                    <input type="date" value="<?= set_value('date_received'); ?>" name="date_received" class="form-control">
                                                </div>
                                            </div>
                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Time Received</label>
                                                    <input type="time" value="<?= set_value('time_received'); ?>" name="time_received" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Committee</label>
                                                    <select required class="form-control" name="com">
                                                        <option></option>
                                                        <?php 
                                                        foreach($com as $row){
                                                            $c = $row->Committee;
                                                            echo "<option value='{$row->comID}'>{$c}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Upload File</label>
                                                    <input type="file" value="" name="file" class="form-control">
                                                </div>
                                            </div>

                                            <!-- <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">First Reading</label>
                                                    <input type="date" value="<?= set_value('fr'); ?>" name="fr" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Second Reading</label>
                                                    <input type="date" value="<?= set_value('sr'); ?>" name="sr" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Third & Final Reading</label>
                                                    <input type="date" value="<?= set_value('tr'); ?>" name="tr" class="form-control">
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Caption</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="caption"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Keyword</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="keyword"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Remarks</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="remarks"></textarea>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" value="submit" class="btn btn-primary">Create New Communication</button>
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

                

               