
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

                                        <?= form_open_multipart('ordinance_add'); ?>


                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputOrdinanceNo" class="col-form-label">Ordinance No.</label>
                                                    <input required type="text" value="<?= set_value('OrdinanceNo'); ?>" name="OrdinanceNo" class="form-control">
                                                </div>  

                                                <div class="form-group col-md-3">
                                                    <label for="inputOrdinanceNo" class="col-form-label">Ordinance Type</label>
                                                        <select id="inputCategory" required name="type" class="form-control">
                                                            <option></option>
                                                            <?php 
                                                            $type = array('Provincial','appropriation');
                                                            foreach($type as $row){
                                                                echo "<option value='{$row}'>{$row}</option>\n";
                                                            }?>
                                                        </select>
                                                </div>  
                                                <div class="form-group col-md-3">
                                                    <label for="inputCategory" class="col-form-label">Category</label>
                                                    <select id="inputCategory" required name="Category" class="form-control">
                                                        <option></option>
                                                        <?php 
                                                        foreach($cat as $row){
                                                            $c = $row['name'];
                                                            echo "<option value='{$c}'>{$c}</option>\n";
                                                        }?>
                                                    </select>
                                                </div>
                                                
                                        </div>
                                        <div class="form-row">  
                                                <div class="form-group col-md-12">
                                                    <label for="inputTitle" class="col-form-label">Title</label>
                                                    <textarea class="form-control" rows="5" id="example-textarea" name="Title"></textarea>
                                                </div>
                                                
                                        </div> 
                                        
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Author</label>
                                                        <select name="Author[]" class="form-control select2-multiple" required data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                        <?php foreach($page as $row){ ?>     
                                                            <option><?= ucfirst($row['FirstName']).' '.ucfirst($row['MiddleName']).' '.ucfirst($row['LastName']); ?></option>
                                                          <?php } ?>       
                                                        </select>
                                                </div> 
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Co Author</label>
                                                        <select name="coAuthor[]" class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                        <option></option>
                                                        <?php foreach($page as $row){ ?>      
                                                            <option><?= ucfirst($row['FirstName']).' '.ucfirst($row['MiddleName']).' '.ucfirst($row['LastName']); ?></option>
                                                          <?php } ?>       
                                                        </select>
                                                </div> 
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Sponsor</label>
                                                        <select name="Sponsor[]" required class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                            <option></option>
                                                        <?php foreach($page as $row){ ?>      
                                                            <option><?= ucfirst($row['FirstName']).' '.ucfirst($row['MiddleName']).' '.ucfirst($row['LastName']); ?></option>
                                                          <?php } ?>       
                                                        </select>
                                                </div> 
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Co Sponsor</label>
                                                        <select name="coSponsor[]" class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                            <option></option>
                                                        <?php foreach($page as $row){ ?>      
                                                            <option><?= ucfirst($row['FirstName']).' '.ucfirst($row['MiddleName']).' '.ucfirst($row['LastName']); ?></option>
                                                          <?php } ?>       
                                                        </select>
                                                </div> 
                                        </div>
                                       
                                        
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputimage" class="col-form-label">Upload File</label>
                                                    <input required type="file" value="<?= set_value('image'); ?>" name="image" class="form-control">
                                                </div> 
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputFirstReading" class="col-form-label">First Reading</label>
                                                    <input type="date" value="<?= set_value('FirstReading'); ?>" name="FirstReading" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputFirstReadingRemarks" class="col-form-label">First Reading Remarks</label>
                                                    <input type="text" value="<?= set_value('FirstReadingRemarks'); ?>" name="FirstReadingRemarks" class="form-control">
                                                </div>        
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputSecondReading" class="col-form-label">Second Reading</label>
                                                    <input type="date" value="<?= set_value('SecondReading'); ?>" name="SecondReading" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputSecondReadingRemarks" class="col-form-label">Second Reading Remarks</label>
                                                    <input type="text" value="<?= set_value('SecondReadingRemarks'); ?>" name="SecondReadingRemarks" class="form-control">
                                                </div>        
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputThirdReading" class="col-form-label">Third Reading</label>
                                                    <input type="date" value="<?= set_value('ThirdReading'); ?>" name="ThirdReading" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputThirdReadingRemarks" class="col-form-label">Third Reading Remarks</label>
                                                    <input type="text" value="<?= set_value('ThirdReadingRemarks'); ?>" name="ThirdReadingRemarks" class="form-control">
                                                </div>        
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputSignedDate" class="col-form-label">Enactment Date</label>
                                                    <input type="date" value="<?= set_value('enactment_date'); ?>" name="enactment_date" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputSignedRemarks" class="col-form-label">Enactment Remarks</label>
                                                    <input type="text" value="<?= set_value('enactment_remarks'); ?>" name="enactment_remarks" class="form-control">
                                                </div>        
                                        </div>


                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputSignedDate" class="col-form-label">Signed Date</label>
                                                    <input type="date" value="<?= set_value('SignedDate'); ?>" name="SignedDate" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputSignedRemarks" class="col-form-label">Signed Remarks</label>
                                                    <input type="text" value="<?= set_value('SignedRemarks'); ?>" name="SignedRemarks" class="form-control">
                                                </div>        
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputEffectivity" class="col-form-label">Effectivity</label>
                                                    <input type="date" required value="<?= set_value('Effectivity'); ?>" name="Effectivity" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputFileLocation" class="col-form-label">FileLocation</label>
                                                    <input type="text" value="<?= set_value('FileLocation'); ?>" name="FileLocation" class="form-control">
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <label for="inputRemarks" class="col-form-label">Remarks</label>
                                                    <input type="text" value="<?= set_value('Remarks'); ?>" name="Remarks" class="form-control">
                                                </div>      
                                        </div>
                                            

                                            <button type="submit" value="submit" class="btn btn-primary">Create New Ordinance</button>
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

                

               