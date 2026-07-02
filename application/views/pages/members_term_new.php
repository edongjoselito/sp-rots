
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

                                        <?= form_open('termmembers_add/'.$id); ?>
                       
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputmemberID" class="col-form-label">Member ID</label>
                                                    <input type="text" readonly value="<?= $id; ?>" name="memberID" class="form-control">
                                                </div> 
                                                 
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputFirstName" class="col-form-label">First Name</label>
                                                    <input type="text" readonly value="<?= $fname; ?>" name="FirstName" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputMiddleName" class="col-form-label">Middle Name</label>
                                                    <input type="text"  readonly value="<?= $mname; ?>" name="MiddleName" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputLastName" class="col-form-label">Last Name</label>
                                                    <input type="text"  readonly value="<?= $lname; ?>" name="LastName" class="form-control">
                                                </div> 
                                                 
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputPoliticalParty" class="col-form-label">Political Party</label>
                                                    <input type="text"  readonly value="<?= $pp; ?>" name="pp" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputPosition" class="col-form-label">Position</label>
                                                    <input type="text"  readonly value="<?= $position; ?>" name="Position" class="form-control">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputAuthor" class="col-form-label">Term Period</label>
                                                    <select id="inputCategory" required name="tp" class="form-control">
                                                        <?php 
                                                        foreach($term as $row){
                                                            $p = $row['from'].' - '.$row['to']; 
                                                            echo "<option value='{$p}' ";
                                                            echo ">{$p}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select Term Period</option>
                                                    </select>
                                                </div> 
                                                 
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputTermServed" class="col-form-label">Term Served</label>
                                                    <select id="inputCategory" required name="TermServed" class="form-control">
                                                        <?php 
                                                        $term = array('1st Term', '2nd Term', '3rd Term');
                                                        foreach($term as $row){
                                                            echo "<option value='{$row}' ";
                                                            echo ">{$row}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select Term</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group col-md-8">
                                                    <label for="inputAuthor" class="col-form-label">District</label>
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
                                                 
                                        </div>
                                        
                                            <button type="submit" value="submit" class="btn btn-primary">Create New Term Member</button>
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

                

               