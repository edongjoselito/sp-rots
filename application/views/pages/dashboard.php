
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


                                

                                    <h4 class="page-title">Dashboard</h4>

                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><a href="ordinances" class="text-white"><span data-plugin="counterup"><?= $ord->num_rows(); ?></span></a></h2>
                                                <p class="mb-0">Ordinances</p>
                                            </div>
                                            <i class="ion-ios-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-purple">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><a href="res" class="text-white"><span data-plugin="counterup"><?= $res->num_rows(); ?></span></a></h2>
                                                <p class="mb-0">Resolutions</p>
                                            </div>
                                            <i class="ion-ios-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-info">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><a href="member" class="text-white"><span data-plugin="counterup"><?= $m->num_rows(); ?></span></a></h2>
                                                <p class="mb-0">Members</p>
                                            </div>
                                            <i class="ion-md-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-success">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup"><?= $nu->num_rows(); ?></span></h2>
                                                <p class="mb-0">New Users</p>
                                            </div>
                                            <i class="mdi mdi-comment-multiple"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       

                        <div class="row">

         
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">ORDINANCES UPLOADED BY USER | DAILY</h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>COUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($ord_day as $row){ 
                                                    $user = $this->Page_model->one_cond('users','id',$row->user_id);
                                                        ?>
                                                    <tr>
                                                        <td><?= ucfirst($user->fname).' '.ucfirst($user->mname).''.ucfirst($user->lname); ?></td>
                                                        <td><a href="<?= base_url().'Pages/ord_by_user/'.$row->user_id; ?>"><?= $row->count; ?></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">RESOLUTIONS UPLOADED BY USER | DAILY</h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>COUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($res_day as $row){
                                                    $user = $this->Page_model->one_cond('users','id',$row->user_id);
                                                        ?>
                                                    <tr> 
                                                        
                                                        <td><?= ucfirst($user->fname).' '.ucfirst($user->mname).''.ucfirst($user->lname); ?></td>
                                                        <td><a href="<?= base_url().'Pages/res_by_user/'.$row->user_id; ?>"><?= $row->count; ?></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
  
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">TOTAL ORDINANCES UPLOADED BY USER | YEAR <?= date('Y'); ?></h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>COUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($ord_year as $row){
                                                    $user = $this->Page_model->one_cond('users','id',$row->user_id);
                                                        ?>
                                                    <tr> 
                                                        
                                                        <td><?= ucfirst($user->fname).' '.ucfirst($user->mname).''.ucfirst($user->lname); ?></td>
                                                        <td><a href="<?= base_url().'Pages/ord_by_user_year/'.$row->user_id; ?>"><?= $row->count; ?></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">TOTAL RESOLUTIONS UPLOADED BY USER | YEAR <?= date('Y'); ?></h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>USER</th>
                                                        <th>COUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($res_year as $row){
                                                    $user = $this->Page_model->one_cond('users','id',$row->user_id);
                                                        ?>
                                                    <tr> 
                                                        
                                                        <td><?= ucfirst($user->fname).' '.ucfirst($user->mname).''.ucfirst($user->lname); ?></td>
                                                        <td><a href="<?= base_url().'Pages/res_by_user_year/'.$row->user_id; ?>"><?= $row->count; ?></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>



                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

                