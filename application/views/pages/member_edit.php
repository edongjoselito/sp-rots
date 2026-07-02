
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

                                        <?= form_open('edit_prof/'.$id); ?>


                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputFirstName" class="col-form-label">First Name</label>
                                                    <input type="text" value="<?= $FirstName; ?>" name="FirstName" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputMiddleName" class="col-form-label">Middle Name</label>
                                                    <input type="text" class="form-control" value="<?= $MiddleName; ?>"  name="MiddleName" class="form-control">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputLastName" class="col-form-label">LastName</label>
                                                    <input type="text" class="form-control" value="<?= $LastName; ?>" name="LastName">
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputBDate" class="col-form-label">Birth Date</label>
                                                    <input type="date" value="<?= $BDate; ?>" name="BDate" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputAge" class="col-form-label">Age</label>
                                                    <input type="text" value="<?= $Age; ?>" name="Age" class="form-control">
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="inputSex" class="col-form-label">Sex</label>
                                                    <input type="text" value="<?= $Sex; ?>" name="Sex" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputCivilStatus" class="col-form-label">Civil Status</label>
                                                
                                                    <select id="inputState" name="CivilStatus" class="form-control">
                                                        <?php 
                                                        $civil = array('single','married','widowed','divorced','separated and','in certain cases','registered partnership');
                                                            foreach($civil as $c){
                                                                echo "<option "; 
                                                                if($CivilStatus == $c){echo " Selected ";}
                                                                echo "value='{$c}'>{$c}</option>\n";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                        
                                            
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEligibility" class="col-form-label">Eligibility</label>
                                                <input type="text" value="<?= $Eligibility; ?>" name="Eligibility" class="form-control">
                                            </div>   
                                            <div class="form-group col-md-4">
                                                <label for="inputPosition" class="col-form-label">Position</label>
                                                <input type="text" value="<?= $Position; ?>"  name="Position" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAppStatus" class="col-form-label">AppStatus</label>
                                                <input type="text" value="<?= $AppStatus; ?>" name="AppStatus" class="form-control">
                                            </div> 
                                        </div> 
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEducAttainment" class="col-form-label">Education Attainment</label>
                                                <input type="text" value="<?= $EducAttainment; ?>" name="EducAttainment" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-8">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input type="text" value="<?= $Address; ?>" name="Address" class="form-control">
                                            </div> 
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputDistrict" class="col-form-label">District</label>
                                                <select id="inputCategory" required name="District" class="form-control">
                                                        <?php 
                                                        $dis = array('I', 'II');
                                                        foreach($dis as $row){
                                                            echo "<option value='{$row}' ";
                                                            if($row == $District){echo " selected ";}
                                                            echo ">District  {$row}</option>\n";
                                                        }?>
                                                    </select>
                                            </div> 
                                            <div class="form-group col-md-4">
                                                <label for="inputContactNos" class="col-form-label">Contact Number</label>
                                                <input type="text" value="<?= $ContactNos; ?>" name="ContactNos" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-2">
                                                <label for="inputCTC" class="col-form-label">CTC</label>
                                                <input type="text" value="<?= $CTC; ?>" name="CTC" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-2">
                                                <label for="inputIssuanceDate" class="col-form-label">Issuance Date</label>
                                                <input type="date" value="<?= $IssuanceDate; ?>" name="IssuanceDate" class="form-control">
                                            </div> 
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="inputIssuancePlace" class="col-form-label">Issuance Place</label>
                                                <input type="text" value="<?= $IssuancePlace; ?>" name="IssuancePlace" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-4">
                                                <label for="inputTIN" class="col-form-label">TIN</label>
                                                <input type="text" value="<?= $TIN; ?>" name="TIN" class="form-control">
                                            </div>  
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputPhilHealth" class="col-form-label">PhilHealth</label>
                                                <input type="text" value="<?= $PhilHealth; ?>" name="PhilHealth" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-3">
                                                <label for="inputPagibig" class="col-form-label">Pagibig</label>
                                                <input type="text" value="<?= $Pagibig; ?>" name="Pagibig" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputSSS" class="col-form-label">SSS</label>
                                                <input type="text" value="<?= $SSS; ?>" name="SSS" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputGSIS" class="col-form-label">GSIS</label>
                                                <input type="text" value="<?= $GSIS; ?>" name="GSIS" class="form-control">
                                            </div>    
                                        </div>

                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputPagibig" class="col-form-label">Political Party</label>
                                                <select id="inputState" name="PoliticalParty" class="form-control">
                                                    <?php foreach($polparty as $row){
                                                        $party = $row['Party'];
                                                        echo "<option ";
                                                        if($PoliticalParty == $party){echo " Selected ";}
                                                        echo "value='{$party}'>{$party}</option>\n";
                                                    }?>
                                                </select>
                                            </div> 
                                            <div class="form-group col-md-8">
                                                <label for="inputNotes" class="col-form-label">Notes</label>
                                                <input type="text" value="<?= $Notes; ?>" name="Notes" class="form-control">
                                            </div>  
                                        </div>
                                        <input type="hidden" name="id" value="<?= $id; ?>">

                                            <button type="submit" value="submit" class="btn btn-primary">Update Member</button>
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

                

               