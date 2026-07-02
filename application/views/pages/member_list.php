
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
                                <?php endif;  ?>
                                    <a href="member_add" class="btn btn-success waves-effect width-md waves-light">Add New Member</a>
                                    
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
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Age</th>
                                                    <th>Birthday</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php foreach($page as $row){ ?>
                                                    <tr>
                                                        <td><?= $row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName']; ?></td>
                                                        <td><?= $row['Position']; ?></td>
                                                        <td><?= $row['Age']; ?></td>
                                                        <td><?= $row['BDate']; ?></td>
                                                        <td>
                                                            <a href="profile/<?= $row['memberID']; ?>" class="text-success"><i class="ion ion-ios-contact"></i> View profile </a>
                                                            <a href="prof_delete/<?= $row['memberID']; ?>" class="text-danger"> Delete</a>
                                                        </td>
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

                


               