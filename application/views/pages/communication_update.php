
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

                                        <?= form_open('Pages/communication_edit/'.$page->id); ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Communication No.</label>
                                                    <input type="text" value="<?= $page->com_no; ?>" name="com_no" class="form-control">
                                                    <input type="hidden" value="<?= $page->id; ?>" name="id" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Purpose</label>
                                                    <select id="inputCategory" required name="purpose" class="form-control">
                                                        <option></option>
                                                        <?php 
                                                        $purpose = array('Agenda Inclusion', 'For Information', 'For Action');
                                                        foreach($purpose as $row){
                                                            echo "<option";
                                                            if($row == $page->purpose){echo " selected ";}
                                                            echo " value='{$row}'>{$row}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Agenda Inclusion</label>
                                                    <input type="date" value="<?= $page->date_ai; ?>" name="date_ai" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Date Received</label>
                                                    <input type="date" value="<?= $page->date_received; ?>" name="date_received" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Communication Date</label>
                                                    <input type="date" value="<?= set_value('com_date'); ?>" name="com_date" class="form-control">
                                                </div>
                                               

                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Category</label>
                                                    <select id="inputCategory" required name="com_cat" class="form-control">
                                                        <option></option>
                                                        <?php 
                                                        foreach($com_cat as $row){
                                                            echo "<option value='{$row->id}'>{$row->cat}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Upload File</label>
                                                    <input type="file" required value="" name="file" class="form-control">
                                                </div>
                                                
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Time Received</label>
                                                    <input type="time" value="<?= $page->time_received; ?>" name="time_received" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Urgent</label>
                                                    <select required class="form-control" name="urgent">
                                                        <option value="0">Yes</option>
                                                        <option value="1">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputname" class="col-form-label">Committee</label>
                                                    <select required class="form-control" name="com">
                                                        <option></option>
                                                        <?php 
                                                        foreach($com as $row){
                                                            $c = $row->Committee;
                                                            echo "<option";
                                                            if($page->com === $row->comID){echo " selected ";}
                                                            echo " value='{$row->comID}'>{$c}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Caption</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="caption"><?= $page->caption; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Keyword</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="keyword"><?= $page->keyword; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 col-form-label" for="example-textarea">Remarks</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="remarks"><?= $page->remarks; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" value="submit" class="btn btn-primary">Update Communication</button>
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

                

               