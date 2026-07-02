
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

                                        <?= form_open_multipart('Pages/order_of_business_new'); ?>

                                            <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputname" class="col-form-label">Session Number</label>
                                                        <input type="text" value="<?= set_value('sn'); ?>" name="sn" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label for="inputname" class="col-form-label">Communication No.</label>
                                                        <select class="form-control select2-multiple" name="com_id[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                            <?php foreach($data as $row){?>
                                                                <option value="<?= $row->id; ?>"><?= $row->com_no; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Date of Session</label>
                                                    <input type="date" value="<?= set_value('ds'); ?>" name="ds" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Type of Session</label>
                                                    <select required class="form-control" name="ts">
                                                        <option></option>
                                                        <?php 
                                                        $data = array('Regular Session','Special Session','Administrative Hearing');
                                                        foreach($data as $row){
                                                            echo "<option value='{$row}'>{$row}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputname" class="col-form-label">Status</label>
                                                    <select required class="form-control" name="stat">
                                                        <option></option>
                                                        <?php 
                                                        $data = array('Quorum', 'No Quorum','Ongoing');
                                                        foreach($data as $row){
                                                            echo "<option value='{$row}'>{$row}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputname" class="col-form-label">Referred to Committee</label>
                                                    <select required class="form-control" name="com">
                                                        <option></option>
                                                        <?php 
                                                        foreach($com as $row){
                                                            $c = $row->Committee;
                                                            echo "<option value='{$row->comID}'>{$c}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputname" class="col-form-label">Draft</label>
                                                    <input type="file" value="<?= set_value('draft'); ?>" name="draft" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputname" class="col-form-label">Approved</label>
                                                    <input type="file" value="<?= set_value('approved'); ?>" name="approved" class="form-control">
                                                </div>
                                            </div>
                                            

                                            
                                            
                                            <button type="submit" value="submit" class="btn btn-primary">Create New Order of Business</button>
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

                

               