
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

                                        <?= form_open('users_edit/'.$user_id); ?>

                                       
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputPosition" class="col-form-label">Position</label>
                                                    <select id="inputState" name="position" class="form-control">
                                                    <?php 
                                                    $position = array('Admin','Secretary','User','supervisor','Encoder','BM','VGO');
                                                    foreach($position as $p){
                                                        echo "<option ";
                                                        if($pos == $p){echo "selected";}
                                                        echo " value='{$p}'>{$p}</option>\n";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputPosition" class="col-form-label">Office</label>
                                                <select id="inputState" name="office" class="form-control">
                                                    <?php foreach($office_list as $row){
                                                        $off = $row['office'];
                                                        $id = $row['id'];
                                                     ?>    
                                                        <option <?php if($office == $id){echo " selected ";} ?> value='<?= $id; ?>'><?= $off; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputOfgender" class="col-form-label">Sex</label>
                                                    <select id="inputState" name="sex" class="form-control">
                                                    <?php 
                                                    $user_sex = array('Male','Female');
                                                    foreach($user_sex as $s){
                                                        echo "<option ";
                                                        if($sex == $s){echo "selected";}
                                                        echo " value='{$s}'>{$s}</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfname" class="col-form-label">First Name</label>
                                                    <input type="text" value="<?= $fname; ?>" name="fname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfmname" class="col-form-label">Middle Name</label>
                                                    <input type="text" value="<?= $mname; ?>" name="mname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOflname" class="col-form-label">Last Name</label>
                                                    <input type="text" value="<?= $lname; ?>" name="lname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfbday" class="col-form-label">BirthDay</label>
                                                    <input type="date" value="<?= $bday; ?>" name="bday" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputOfaddress" class="col-form-label">Address</label>
                                                    <input type="text" value="<?= $address; ?>" name="address" class="form-control">
                                                </div>
                                                <input type="hidden" name="id" value="<?= $user_id; ?>">
                                        </div>


                                        <button type="submit" value="submit" class="btn btn-primary">Update User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

               