
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
                                    <a href="<?= base_url(); ?>Pages/order_of_business_new" class="btn btn-success waves-effect width-md waves-light">Add New Order of Business</a>
                                    
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
                                                    <th>Date of Session</th>
                                                    <th>Type of Session</th> 
                                                    <th>Communication</th> 
                                                    <th>Status</th>
                                                    <th>Draft</th> 
                                                    <th>Approved</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($page as $row){ ?>
                                                <tr>
                                                  <td><?= $row['ds']; ?></td> 
                                                  <td><?= $row['ts']; ?></td> 
                                                  <td>
                                                  <?php

                                                    if(!empty($row['com_id'])){
                                                    // Your comma-separated string
                                                    $commaSeparatedString = $row['com_id'];

                                                    // Convert the string into an array
                                                    $array = explode(",", $commaSeparatedString);

                                                    // Loop through the array
                                                    $count=1;
                                                    foreach ($array as $com) {
                                                        // Trim any whitespace and output each fruit
                                                        $c=$this->Common->one_cond_row('communication','id',$com);
                                                        if($c->status == 0){
                                                   ?>
                                                   
                                                   <p><a target="_blank" href="<?= base_url().'uploads/communication/'.$c->file; ?>" class="text-success"><?= $count++; ?>.  <?= $c->caption; ?></a> <a href="<?= base_url(); ?>Pages/cloce_com/<?= $c->id; ?>" class="badge badge-warning">close</a></p>
                                                     <?php }else{ ?>
                                                        <p><a target="_blank" href="<?= base_url().'uploads/communication/'.$c->file; ?>" class="text-success"><?= $count++; ?>.  <?= $c->caption; ?></a> <a href="<?= base_url(); ?>Pages/open_com/<?= $c->id; ?>" class="badge badge-success">Open</a></p>
                                                    <?php }} } ?>
                                                  </td>
                                                  <td><?= $row['stat']; ?></td> 
                                                  <td>
                                                    <a class="btn btn-success btn-sm" href="<?= base_url().'uploads/ob/'.$row['draft']; ?>" target="_blank" rel="noopener noreferrer">View file</a>
                                                    <a href="<?= base_url().'uploads/ob/'.$row['draft']; ?>" class="btn btn-info waves-effect waves-light btn-sm" download>download</a>
                                                  </td> 
                                                  <td>
                                                    <a class="btn btn-info btn-sm" href="<?= base_url().'uploads/ob/'.$row['approved']; ?>" target="_blank" rel="noopener noreferrer">View file</a>
                                                    <a href="<?= base_url().'uploads/ob/'.$row['approved']; ?>" class="btn btn-success waves-effect waves-light btn-sm" download>download</a>
                                                  </td> 
                                                  <td>
                                                  <?php if($pos == 'Super Admin' || $pos == 'Admin' || $pos == 'ob'){ ?>
                                                    <a class="btn btn-sm btn-primary" href="order_of_business_edit/<?= $row['id']; ?>">Update</a>
                                                    <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="order_of_business_del/<?= $row['id']; ?>">Delete</a>
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

                


               