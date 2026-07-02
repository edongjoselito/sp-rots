
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

                                        <?= form_open_multipart('Pages/order_of_business_edit'); ?>

                                            <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputname" class="col-form-label">Session Number</label>
                                                        <input type="text" value="<?= $ob->sn; ?>" name="sn" class="form-control">
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

                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Date of Session</label>
                                                    <input type="date" value="<?= $ob->ds; ?>" name="ds" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Type of Session</label>
                                                    <select required class="form-control" name="ts">
                                                        <option></option>
                                                        <?php 
                                                        $data = array('Regular Session','Special Session','Administrative Hearing');
                                                        foreach($data as $row){
                                                            echo "<option";
                                                            if($ob->ts == $row){echo " selected ";}
                                                            echo " value='{$row}'>{$row}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputname" class="col-form-label">Status</label>
                                                    <select required class="form-control" name="stat">
                                                        <option></option>
                                                        <?php 
                                                        $data = array('Quorum', 'No Quorum','Ongoing');
                                                        foreach($data as $row){
                                                            echo "<option";
                                                            if($ob->stat == $row){echo " selected ";}
                                                            echo " value='{$row}'>{$row}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" name="id" value="<?= $ob->id; ?>">


                                            
                                            
                                            <button type="submit" value="submit" class="btn btn-primary">Update Order of Business</button>
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

                

               