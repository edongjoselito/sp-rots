
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
                                    <a href="doc_add" class="btn btn-success waves-effect width-md waves-light">Receive New Document</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="doc_process" class="btn btn-info waves-effect width-md waves-light">Process Receive Document</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
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
                                        <?= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>'
                                                .$this->session->flashdata('danger'). 
                                            '</div>'; 
                                        ?>
                                    <?php endif; ?>
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4"><?= $title; ?></h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            
                                                <tr>
                                                    <th>Document Filename</th>
                                                    <th>Document Type</th>
                                                    <th>File Attachment</th>
                                                    <th>Date</th>
                                                    <th>Receive By</th> 
                                                    <th>Manage</th> 
                                                    <th>Submitted By</th> 
                                                    <th>Address</th>
                                                    <th>Contact No.</th> 
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($page as $row){ ?>
                                                <tr>
                                                    <td><?= $row['name']; ?></td>
                                                    <td><?= $row['doc_cat']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url().'uploads/doc/'.$row['file']; ?>" class="btn btn-success waves-effect waves-light btn-sm" target="_blank">View</a>
                                                        <a data-toggle="modal" data-id="<?= $row['id']; ?>" class="open-AddBookDialog btn btn-primary waves-effect waves-light btn-sm" href="#addBookDialog">Update</a>
                                                    
                                                    </td>
                                                    <td><?= $row['date']; ?></td>
                                                    <td><?= $row['receive_by']; ?></td>
                                                    <td>
                                                        <a href="res_by_admin/<?= $row['id']; ?>" class="btn btn-success waves-effect waves-light btn-sm" onclick="return confirm('are you sure..?')">Edit</a>
                                                        <a href="or_del_admin/<?= $row['id']; ?>" class="btn btn-danger waves-effect waves-light btn-sm" onclick="return confirm('are you sure..?')">Delete</a>
                                                        <a href="doc/<?= $row['name']; ?>" class="btn btn-primary waves-effect waves-light btn-sm">Track</a>
                                                    </td>
                                                    
                                                    <td><?= $row['sub_by']; ?></td>
                                                    <td><?= $row['address']; ?></td>
                                                    <td><?= $row['contact']; ?></td>
                                                    <td><?= $row['remarks']; ?></td>
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

