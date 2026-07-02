
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

                                        <?= form_open('doc_process'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <select id="inputCategory"  name="name" class="form-control">
                                                        <?php 
                                                        foreach($doc as $row){
                                                            $c = $row['name'];
                                                            echo "<option value='{$c}'>{$c}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select Document Code</option>
                                                    </select>
                                                </div>
                                        </div>  
                                        <div class="form-row">      
                                            <div class="form-group col-md-3">
                                                <label for="inputCommittee" class="col-form-label">Date Process</label>
                                                <input type="date" value="<?= set_value('date'); ?>" name="date" class="form-control">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="inputCommittee" class="col-form-label">Process By</label>
                                                <input type="text" value="<?= set_value('receive_by'); ?>" name="receive_by" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Document Status</label>
                                                <select id="inputCategory"  required name="status" class="form-control">
                                                        <?php 
                                                            $stat = array('On Process','Done');
                                                            $count = 0;
                                                        foreach($stat as $row){
                                                            echo "<option value='";
                                                            echo $count++;
                                                            echo "'>{$row}</option>\n";
                                                        }?>
                                                        <option selected disabled>Document Status</option>
                                                </select>
                                            </div>

                                        </div> 
                                        <div class="form-row">  
                                            <div class="form-group col-md-4">
                                                <label for="inputCommittee" class="col-form-label">Office Received</label>
                                                <select id="inputCategory"  required name="office" class="form-control">
                                                        <?php 
                                                            $stat = array('Office one','Office two');
                                                        foreach($stat as $row){
                                                            echo "<option value='";
                                                            echo $row;
                                                            echo "'>{$row}</option>\n";
                                                        }?>
                                                        <option selected disabled>Select Office</option>
                                                </select>
                                            </div>   
                                            <div class="form-group col-md-8">
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

                

               