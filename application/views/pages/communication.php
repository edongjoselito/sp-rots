
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
                                    <a href="<?= base_url(); ?>Pages/communication_new" class="btn btn-success waves-effect width-md waves-light">Add New Communication</a>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                    <?php $pos = $this->session->position; ?>
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
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4"><?= $title; ?></h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            
                                                <tr>
                                                    <th>Communication No.</th>
                                                    <th>Caption</th> 
                                                    <th>DocLink</th>
                                                    <th>Keyword</th>
                                                    <th>Remarks</th> 
                                                    
                                                    <th>Agenda Inclusion</th>
                                                    <th>Date Received</th>
                                                    <th>Time Received</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($page as $row){ ?>
                                                <tr>
                                                  <td><?= $row['com_no']; ?></td> 
                                                  <td><?= wordwrap($row['caption'],50,"<br>\n"); ?></td>
                                                  <td>
                                                        <a href="<?= base_url().'uploads/communication/'.$row['file']; ?>" class="btn btn-success waves-effect waves-light btn-sm" target="_blank">View</a>
                                                        <?php if($this->session->position == 'Admin'){ ?>
                                                        <a data-toggle="modal" data-id="<?= $row['id']; ?>" class="open-AddBookDialog btn btn-primary waves-effect waves-light btn-sm" href="#res">Updated attach file</a>
                                                        <?php } ?>
                                                        <a href="<?= base_url().'uploads/res/'.$row['file']; ?>" class="btn btn-info waves-effect waves-light btn-sm" download>download</a>
                                                    </td>
                                                  <td><?= $row['keyword']; ?></td> 
                                                  <td><?= $row['remarks']; ?></td> 
                                                  <td><?= $row['date_ai']; ?></td> 
                                                  <td><?= $row['date_received']; ?></td> 
                                                  <td><?php $d=strtotime($row['time_received']); echo date("h:i:sa", $d); ?></td>  
                                                  <td>
                                                    <?php if($pos == 'Super Admin' || $pos == 'Admin' || $pos == 'com'){ ?>
                                                    <a class="btn btn-sm btn-danger" href="communication_del/<?= $row['id']; ?>">Delete</a>
                                                    <a class="btn btn-sm btn-success" href="communication_edit/<?= $row['id']; ?>">Update</a>
                                                    <?php } ?>
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

                


               