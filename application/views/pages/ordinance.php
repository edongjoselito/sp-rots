
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
                                    <?php if($this->session->position == 'Admin'){ ?>
                                    <a href="<?= base_url(); ?>ordinance_add" class="btn btn-success waves-effect width-md waves-light">Add New Ordinance</a>
                                    <?php } ?>
                                    
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
                                        <h4 class="m-t-0 header-title mb-4">Member List</h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            
                                                <tr>
                                                    <th>Ordinance No.</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Author</th>
                                                    <th>Co Author</th>
                                                    <th>Sponsor</th> 
                                                    <th>Co Sponsor</th> 
                                                    <th>FirstReading</th> 
                                                    <th>FirstReadingRemarks</th> 
                                                    <th>Document</th>
                                                    <th>SecondReading</th>
                                                    <th>SecondReadingRemarks</th> 
                                                    <th>Third Reading</th>
                                                    <th>Third ReadingRemarks</th>
                                                    <th>SignedDate</th> 
                                                    <th>SignedRemarks</th> 
                                                    <th>Effectivity</th> 
                                                    <th>Remarks</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach($page as $row){ ?>
                                                <tr>
                                               
                                                    <td><?= $row['OrdinanceNo']; ?></td>
                                                    <td><?= wordwrap($row['Title'],50,"<br>\n"); ?></td>
                                                    <td><a href="<?= base_url().'or_reports/'.$row['Category'];?>"><?= $row['Category']; ?></a></td>
                                                    <td><?= $row['Author']; ?></td>
                                                    <td><?= $row['coAuthor']; ?></td>
                                                    <td><?= $row['Sponsor']; ?></td>
                                                    <td><?= $row['coSponsor']; ?></td>
                                                    <td><?= $row['FirstReading']; ?></td>
                                                    <td><?= $row['FirstReadingRemarks']; ?></td>
                                                    <td>
                                                        <?php if($row['DocLink'] != ""){ ?>
                                                        <a href="<?= base_url().'uploads/or/'.$row['DocLink']; ?>" class="btn btn-success waves-effect waves-light btn-sm" target="_blank">View</a>
                                                        <?php } ?>
                                                        <?php if($this->session->position == 'Admin'){ ?>
                                                        <a data-toggle="modal" data-id="<?= $row['id']; ?>" class="open-AddBookDialog btn btn-primary waves-effect waves-light btn-sm" href="#addBookDialog">Updated attach file</a>
                                                        <?php } ?>
                                                        <a href="<?= base_url().'uploads/or/'.$row['DocLink']; ?>" class="btn btn-info waves-effect waves-light btn-sm" download>download</a>
                                                    </td>
                                                    <td><?= $row['SecondReading']; ?></td>
                                                    <td><?= $row['SecondReadingRemarks']; ?></td>
                                                    <td><?= $row['ThirdReading']; ?></td>
                                                    <td><?= $row['ThirdReadingRemarks']; ?></td>
                                                    <td><?= $row['SignedDate']; ?></td>
                                                    <td><?= $row['SignedRemarks']; ?></td>
                                                    <td><?= $row['Effectivity']; ?></td>
                                                    <td><?= $row['Remarks']; ?></td>
                                                    
                                                    <td>
                                                        <?php if($pos == 'Super Admin' || $pos == 'Admin'){ ?>
                                                        <a href="ordinance_edit/<?= $row['id']; ?>" class="btn btn-success waves-effect waves-light btn-sm" id="sa-warning">Edit</a>
                                                        <?php  if($row['status'] == 0){ ?>
                                                            <a href="ordinance_delete/<?= $row['id']; ?>" class="btn btn-danger waves-effect waves-light btn-sm" onclick="return confirm('are you sure..?')">Delete</a>
                                                        <?php } } ?>
                                                       <?php 
                                                            
                                                            if($pos == 'Super Admin' || $pos == 'Admin'){
                                                             if($row['status'] == 1){ 
                                                        ?>
                                                            <a href="res_by_admin/<?= $row['id']; ?>" class="btn btn-success waves-effect waves-light btn-sm" onclick="return confirm('are you sure..?')">Restore Data</a>
                                                            <a href="or_del_admin/<?= $row['id']; ?>" class="btn btn-danger waves-effect waves-light btn-sm" onclick="return confirm('are you sure..?')">Delete Data Forever</a>
                                                        <?php } }?>
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

                


               