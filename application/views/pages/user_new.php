
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

                                        <?= form_open('user_add'); ?>

                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Username</label>
                                                    <input type="text" required value="<?= set_value('Username'); ?>" name="Username" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsername" class="col-form-label">Password</label>
                                                    <input type="password" required value="<?= set_value('Password'); ?>" name="Password" class="form-control">
                                                </div>
                                            
                                        </div>
                                      
                                        <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputPosition" class="col-form-label">System Access</label>
                                                    <select id="inputState" name="Position" class="form-control">
                                                    <?php 
                                                    $position = array('Admin'=>'Admin',
                                                                    //'Secretary'=>'Secretary',
                                                                    'User'=>'User',
                                                                    'supervisor'=>'supervisor',
                                                                    'Encoder'=>'Encoder',
                                                                    'ob'=>'Order of Business user',
                                                                    'com'=>'Communacation user'
                                                                );
                                                    foreach($position as $p => $key){
                                                        echo "<option value='{$p}'>{$key}</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputPosition" class="col-form-label">Office</label>
                                                <select id="inputState" name="office" class="form-control">
                                                    <?php 
                                                    foreach($office as $row){
                                                        $off = $row['office'];
                                                        $id = $row['id'];
                                                        echo "<option value='{$id}'>{$off}</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputOfgender" class="col-form-label">Sex</label>
                                                    <select id="inputState" name="sex" class="form-control">
                                                    <?php 
                                                    $sex = array('Male','Female');
                                                    foreach($sex as $s){
                                                        echo "<option value='{$s}'>{$s}</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfname" class="col-form-label">First Name</label>
                                                    <input type="text" value="<?= set_value('fname'); ?>" name="fname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfmname" class="col-form-label">Middle Name</label>
                                                    <input type="text" value="<?= set_value('mname'); ?>" name="mname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOflname" class="col-form-label">Last Name</label>
                                                    <input type="text" value="<?= set_value('lname'); ?>" name="lname" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputOfbday" class="col-form-label">BirthDay</label>
                                                    <input type="date" value="<?= set_value('bday'); ?>" name="bday" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputOfaddress" class="col-form-label">Address</label>
                                                    <input type="text" value="<?= set_value('address'); ?>" name="address" class="form-control">
                                                </div>
                                        </div>


                                        <button type="submit" value="submit" class="btn btn-primary">Create New User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

               