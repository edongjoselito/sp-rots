
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

                                        <?= form_open('member_add'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputFirstName" class="col-form-label">First Name</label>
                                                    <input type="text" value="<?= set_value('FirstName'); ?>" name="FirstName" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputMiddleName" class="col-form-label">Middle Name</label>
                                                    <input type="text" class="form-control" value="<?= set_value('MiddleName'); ?>"  name="MiddleName" class="form-control">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputLastName" class="col-form-label">LastName</label>
                                                    <input type="text" class="form-control" value="<?= set_value('LastName'); ?>" name="LastName">
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputBDate" class="col-form-label">Birth Date</label>
                                                    <input type="date" value="<?= set_value('BDate'); ?>" name="BDate" class="form-control">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputCivilStatus" class="col-form-label">Sex</label>
                                                    <select id="inputState" name="Sex" class="form-control">
                                                        <option value="Male" <?php echo set_select('Sex', 'Male', TRUE); ?> >Male</option>
                                                        <option value="Female" <?php echo set_select('Sex', 'Female', TRUE); ?> >Female</option>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputCivilStatus" class="col-form-label">Civil Status</label>
                                                <select id="inputState" name="CivilStatus" class="form-control">
                                                <?php
                                                  $civil_status = array('single', 'married', 'widowed', 'divorced', 'separated and', 'in certain cases', 'registered partnership');
                                                  foreach($civil_status as $cs){
                                                    echo "<option value='{$cs}'";
                                                    echo set_select('CivilStatus', $cs, TRUE);
                                                    echo ">{$cs}</option>\n";
                                                  }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>

                        
                                            
                                        
                                        
                                        <div class="form-row">
                                           
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input type="text" value="<?= set_value('Address'); ?>" name="Address" class="form-control">
                                            </div> 
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputDistrict" class="col-form-label">District</label>
                                                <select id="inputCategory" required name="District" class="form-control">
                                                        <?php 
                                                        $district = array('I', 'II');
                                                        foreach($district as $row){
                                                            echo "<option value='{$row}' ";
                                                            echo ">District  {$row}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select District</option>
                                                    </select>
                                            </div> 
                                            <div class="form-group col-md-4">
                                                <label for="inputContactNos" class="col-form-label">Contact Number</label>
                                                <input type="text" value="<?= set_value('ContactNos'); ?>" name="ContactNos" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                                <label for="inputPagibig" class="col-form-label">Political Party</label>
                                                <select id="inputState" name="PoliticalParty" class="form-control">
                                                    <?php foreach($page as $row){
                                                        $party = $row['Party'];
                                                        echo "<option value='{$party}'>{$party}</option>";
                                                    }?>
                                                </select>
                                                
                                            </div> 
                                            <button type="submit" value="submit" class="btn btn-primary">Create New Member</button>
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

                

               