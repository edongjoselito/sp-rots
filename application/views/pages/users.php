
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

                                <?php if($this->session->flashdata('success')) : ?>

                                    <?= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>'
                                            .$this->session->flashdata('success'). 
                                        '</div>'; 
                                    ?>
                                <?php endif; ?>

                        
                                <?php if($this->session->flashdata('danger')) : ?>

                                    <?= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>'
                                            .$this->session->flashdata('danger'). 
                                        '</div>'; 
                                    ?>
                                <?php endif; ?>         

                                    <a href="user_add" class="btn btn-success waves-effect width-md waves-light">Add New User</a>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4"><?= $title; ?></h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>Users</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>username</th>
                                                    <?php 
                                                        $position = $this->session->position;
                                                        if($position == 'Super Admin' || $position == 'Admin' ){
                                                    ?>
                                                    <th>Manage</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                    foreach($page as $row){ 
                                                    $office = $this->Page_model->one_cond_row('office_list','id',$row['office']); 
                                                ?>
                                                <tr>
                                                    <td><?= $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></td>
                                                    <td><?= $row['position'] ?></td>
                                                    <td><?php if(isset($office->office)){echo $office->office; } ?></td>
                                                    <td><?= $row['username'] ?></td>
                                                    <?php 
                                                        $position = $this->session->position;
                                                        if($position == 'Super Admin' || $position == 'Admin' ){
                                                    ?>
                                                    <td>
                                                        <a href="user_profile/<?= $row['id']; ?>" class="text-success"><i class="ion ion-ios-contact"></i> View profile </a>
                                                        <a href="user_delete/<?= $row['id']; ?>" class="text-danger"> Delete</a>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                


               