
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

                                        <?= form_open('res_result'); ?>

                                          <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputAuthor" class="col-form-label">Author</label>
                                                    <select id="inputCategory" required name="Author" class="form-control">
                                                        <?php 
                                                        foreach($member as $row){
                                                            $p = $row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName'];     
                                                            echo "<option value='{$p}' ";
                                                            echo set_select('Author', $p, TRUE); 
                                                            echo ">{$p}</option>\n";
                                                        }?>
                                                        <option selected disabled>Please Select Author</option>
                                                    </select>
                                                </div>
                                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
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

                

               