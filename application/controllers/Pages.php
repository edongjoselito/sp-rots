<?php

class Pages extends CI_Controller{

    public function view(){

        $page = "dashboard";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Dashboard"; 
            $data['ord'] = $this->Page_model->table_num('ordinances'); 
            $data['res'] = $this->Page_model->table_num('resolutions');
            $data['m'] = $this->Page_model->table_num('members');
            $data['nu'] = $this->Page_model->table_num('users');

            $cdate = date('Y-m-d');
            //$data['day'] = $this->Page_model->total_document_per_day('ordinances');
            $data['ord_day'] = $this->Page_model->total_document_per_day('ordinances','user_id, count(user_id) as count','saved_date',$cdate,'user_id');
            $data['res_day'] = $this->Page_model->total_document_per_day('resolutions','user_id, count(user_id) as count','saved_date',$cdate,'user_id');


            $y = date('Y');
            $data['ord_year'] = $this->Page_model->total_document_per_day('ordinances','user_id, YEAR(saved_date) as sd, count(saved_date) AS count','year(saved_date)',$y,'user_id');
            $data['res_year'] = $this->Page_model->total_document_per_day('resolutions','user_id, YEAR(saved_date) as sd, count(saved_date) AS count','year(saved_date)',$y,'user_id');
            //$data['ord'] = $this->db->query('select * from ordinances where status=0');
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }  

    public function member(){

        $page = "member_list";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Member List"; 
            $data['page'] = $this->Page_model->get_posts('members'); 

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }  

    public function member_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('FirstName', 'first name', 'required');
        $this->form_validation->set_rules('MiddleName', 'Middle Name', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "member_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Member"; 
        $data['page'] = $this->Page_model->get_where_posts('polparty');


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $fname = $this->input->post('FirstName'); 
            $lname = $this->input->post('LastName'); 
            $row = $this->Page_model->check_table_two_row('members',$fname,$lname,'FirstName','LastName');
            if($row->num_rows() >= 1){
                $this->session->set_flashdata('danger', 'Member Already exits');
                redirect(base_url().'member');

            }else{
                $this->Page_model->insert_member();
                $this->Page_model->insert_at('Create new member with id number '.$this->db->insert_id());
                $this->session->set_flashdata('success', ' New Member save');
                redirect(base_url().'/member');
            }
        } 
    }

    public function profile($param){

        $page = "user_profile";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $data['title'] = "term members"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('memberID', 'members', $param); 
            $data['fname'] = $data['page']['FirstName'];
            $data['mname'] = $data['page']['MiddleName'];
            $data['lname'] = $data['page']['LastName'];
            $full = $data['page']['FirstName'].' '.$data['page']['MiddleName'].' '.$data['page']['LastName'];
            $data['res'] = $this->Page_model->get_mult_where_posts('resolutions','Author',$full);
            $data['or'] = $this->Page_model->get_mult_where_posts('ordinances','Author',$full);


            $data['Position'] = $data['page']['Position'];
            $data['add'] = $data['page']['Address'];
            $data['id'] = $data['page']['memberID'];
            $data['BDate'] = $data['page']['BDate'];
            $data['Age'] = $data['page']['Age'];
            $data['Sex'] = $data['page']['Sex'];
            $data['CivilStatus'] = $data['page']['CivilStatus'];
            $data['Eligibility'] = $data['page']['Eligibility'];
            $data['AppStatus'] = $data['page']['AppStatus'];
            $data['EducAttainment'] = $data['page']['EducAttainment'];
            $data['District'] = $data['page']['District'];
            $data['ContactNos'] = $data['page']['ContactNos'];
            $data['CTC'] = $data['page']['CTC'];
            $data['IssuanceDate'] = $data['page']['IssuanceDate'];
            $data['IssuancePlace'] = $data['page']['IssuancePlace'];
            $data['TIN'] = $data['page']['TIN'];
            $data['PhilHealth'] = $data['page']['PhilHealth'];
            $data['Pagibig'] = $data['page']['Pagibig'];
            $data['SSS'] = $data['page']['SSS'];
            $data['GSIS'] = $data['page']['GSIS'];
            $data['PoliticalParty'] = $data['page']['PoliticalParty'];
            $data['Notes'] = $data['page']['Notes'];
            $data['image'] = $data['page']['image'];
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    } 

    public function edit_prof($param){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('FirstName', 'first name', 'required');
        $this->form_validation->set_rules('MiddleName', 'Middle Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "member_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Edit Member"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('memberID', 'members', $param);  
            $data['polparty'] = $this->Page_model->get_where_posts('polparty');
            $data['FirstName'] = $data['page']['FirstName'];
            $data['id'] = $data['page']['memberID'];
            $data['MiddleName'] = $data['page']['MiddleName'];
            $data['LastName'] = $data['page']['LastName'];
            $data['BDate'] = $data['page']['BDate'];
            $data['Age'] = $data['page']['Age'];
            $data['Sex'] = $data['page']['Sex'];
            $data['CivilStatus'] = $data['page']['CivilStatus'];
            $data['Eligibility'] = $data['page']['Eligibility'];
            $data['Position'] = $data['page']['Position'];
            $data['AppStatus'] = $data['page']['AppStatus'];
            $data['EducAttainment'] = $data['page']['EducAttainment'];
            $data['Address'] = $data['page']['Address'];
            $data['District'] = $data['page']['District'];
            $data['ContactNos'] = $data['page']['ContactNos'];
            $data['CTC'] = $data['page']['CTC'];
            $data['IssuanceDate'] = $data['page']['IssuanceDate'];
            $data['IssuancePlace'] = $data['page']['IssuancePlace'];
            $data['TIN'] = $data['page']['TIN'];
            $data['PhilHealth'] = $data['page']['PhilHealth'];
            $data['Pagibig'] = $data['page']['Pagibig'];
            $data['SSS'] = $data['page']['SSS'];
            $data['GSIS'] = $data['page']['GSIS'];
            $data['PoliticalParty'] = $data['page']['PoliticalParty'];
            $data['Notes'] = $data['page']['Notes'];

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_member();
                $this->Page_model->insert_at('Update Member id number'.$param);
                $this->session->set_flashdata('success', ' Member was Updated');
                redirect(base_url().'profile/'.$param);

            }
    }
    public function prof_delete($param){
        $this->Page_model->del('2', 'memberID', 'members');
        $this->Page_model->insert_at('Delete Member id number '.$param);
        $this->session->set_flashdata('danger', ' Member was deleted');
        redirect(base_url().'member');
    
    }



    public function committee_report_list(){

        $page = "committee_r_list";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Ordinance"; 
            $position = $this->session->position;
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->get_posts('com_report');
            }else{
                $data['page'] = $this->Page_model->get_where_posts('com_report');
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 
    public function new_committee_report(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('com_no', 'Committee No', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "new_com_report";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "New Committee Report"; 
            $data['com'] = $this->Page_model->get_all_row('committee');
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');
        }else{
            $config['allowed_types'] = 'jpg|pdf';
            $config['upload_path'] = './uploads/com_report/';
            $this->load->library('upload', $config);

            $com_no = $this->input->post('com_no');
            $check = $this->Page_model->one_where_check_exist('com_report','com_no',$com_no);
            if($check->num_rows() >= 1){

                $this->session->set_flashdata('danger', 'The Committee Report No. you entered is in used.');
                redirect(base_url().'Pages/committee_report_list');
                
            }else{

                if($this->upload->do_upload('file')){
                    //$file = $this->upload->data();

                    $this->Page_model->insert_com_report();
                    $this->Page_model->insert_at('Create New Committee Report '.$this->db->insert_id());
                    $this->session->set_flashdata('success', ' New Committee Report Save');
                    redirect(base_url().'Pages/committee_report_list');

                }else{
                    print_r($this->upload->display_errors()); 
                }
                
            }

        }    

    } 
    public function committee_report_del($param){
        //$this->Page_model->deleted('3','id',$param, 'com_report');

        $page = $this->Page_model->one_cond('com_report', 'id', $param);  
        $this->Page_model->delete_with_attach($param, $page->file, 'com_report', 'com_report');

        $this->Page_model->insert_at('Delete Committee Report id number '.$param);
        $this->session->set_flashdata('danger', 'Committee Report was deleted');
        redirect(base_url().'Pages/committee_report_list');
    }
    public function committee_report_edit($param){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('com_no', 'Committee No', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "com_report_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Edit Member"; 
            $data['page'] = $this->Page_model->one_cond('com_report', 'id', $param);  
            $data['com'] = $this->Page_model->get_all_row('committee');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $com_no = $this->input->post('com_no');
                $check = $this->Page_model->one_where_check_exist('com_report','com_no',$com_no);
                if($check->num_rows() >= 2){

                $this->session->set_flashdata('danger', 'The Committee Report No. you entered is in used.');
                redirect(base_url().'Pages/committee_report_list');
                
            }else{

                $this->Page_model->update_com_report();
                $this->Page_model->insert_at('Committee Report id number'.$param);
                $this->session->set_flashdata('success', ' Committee Report was Updated');
                redirect(base_url().'Pages/committee_report_list');
                
            }

            }
    }

    public function communication_list(){

        $page = "communication";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Communication List"; 
            $position = $this->session->position;
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->get_posts('communication');
            }else{
                $data['page'] = $this->Page_model->get_where_posts('communication');
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 
    public function communication_new(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('com_no', 'Committee No', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "communication_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "New Communication"; 
            $data['com'] = $this->Page_model->get_all_row('committee');
            $data['com_cat'] = $this->Common->no_cond('com_cat');
            $data['comm'] = $this->Common->no_cond('communication');
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');
        }else{
            $config['allowed_types'] = 'jpg|pdf';
            $config['upload_path'] = './uploads/communication/';
            $this->load->library('upload', $config);

            $com_no = $this->input->post('com_no');
            $check = $this->Page_model->one_where_check_exist('communication','com_no',$com_no);
            if($check->num_rows() >= 1){

                $this->session->set_flashdata('danger', 'The Communication No. you entered is in used.');
                redirect(base_url().'Pages/communication_list');
                
            }else{

                // if($this->upload->do_upload('file')){
                    //$file = $this->upload->data();

                    $this->upload->do_upload('file');
                    $cr = $this->upload->data('file_name');

                    $this->upload->do_upload('prfile');
                    $pr = $this->upload->data('file_name');

                    $this->upload->do_upload('pofile');
                    $po = $this->upload->data('file_name');

                    $this->upload->do_upload('pafile');
                    $pa = $this->upload->data('file_name');


                    $this->Page_model->insert_communication($cr,$pr,$po,$pa);
                    $this->Page_model->insert_at('Create New Communication '.$this->db->insert_id());
                    $this->session->set_flashdata('success', ' New Communication Save');
                    redirect(base_url().'Pages/communication_list');

                // }else{
                //     print_r($this->upload->display_errors()); 
                // }
                
            }

        }    

    } 
    public function communication_del($param){
        $page = $this->Page_model->one_cond('communication', 'id', $param);  
        $this->Page_model->delete_with_attach($param, $page->file, 'communication', 'communication');
        $this->Page_model->insert_at('Delete communication id number '.$param);
        $this->session->set_flashdata('danger', 'communication was deleted');
        redirect(base_url().'Pages/communication_list');
    
    }
    public function communication_edit($param){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('com_no', 'Communication No', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "communication_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Edit Communication"; 
            $data['page'] = $this->Page_model->one_cond('communication', 'id', $param);  
            $data['com'] = $this->Page_model->get_all_row('committee');
            $data['com_cat'] = $this->Common->no_cond('com_cat');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $com_no = $this->input->post('com_no');
                $check = $this->Page_model->one_where_check_exist('com_report','com_no',$com_no);
                if($check->num_rows() >= 2){

                $this->session->set_flashdata('danger', 'The Communication No. you entered is in used.');
                redirect(base_url().'Pages/communication_list');
                
            }else{

                $this->Page_model->update_communication();
                $this->Page_model->insert_at('Communication id number'.$param);
                $this->session->set_flashdata('success', ' Communication was Updated');
                redirect(base_url().'Pages/communication_list');
                
            }

            }
    }

    public function order_of_business(){

        $page = "ob";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Order of Business List"; 
            $position = $this->session->position;
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->get_posts('ob');
            }else{
                $data['page'] = $this->Page_model->get_where_posts('ob');
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 
    public function order_of_business_new(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('stat', 'Status', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "ob_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "New Order of Business"; 
            $data['com'] = $this->Page_model->get_all_row('committee');
            $data['data'] = $this->Common->one_cond('communication','status',0);
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');
        }else{
            $config['allowed_types'] = 'jpg|pdf';
            $config['upload_path'] = './uploads/ob/';
            $this->load->library('upload', $config);


                if($this->upload->do_upload('draft')){
                    $file = $this->upload->data('file_name');

                    $this->upload->do_upload('approved');
                    $file2 = $this->upload->data('file_name');

                    $this->Page_model->insert_ob($file,$file2);
                    $this->Page_model->insert_at('Create New Order of Business '.$this->db->insert_id());
                    $this->session->set_flashdata('success', ' New Order of Business Save');
                    redirect(base_url().'Pages/order_of_business');

                }else{
                    print_r($this->upload->display_errors()); 
                }

        }    

    } 
    public function order_of_business_del($param){
        $page = $this->Page_model->one_cond('ob', 'id', $param);  
        $this->Page_model->delete_with_attach($param, $page->draft, 'ob', 'ob');
        $this->Page_model->delete_with_attach($param, $page->approved, 'ob', 'ob');
        $this->Page_model->insert_at('Delete Order of Business id number '.$param);
        $this->session->set_flashdata('danger', 'Order of Business was deleted');
        redirect(base_url().'Pages/order_of_business');
    
    }
    public function order_of_business_edit(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('stat', 'Status', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "ob_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "New Order of Business"; 
            $data['data'] = $this->Common->one_cond('communication','status',0);
            $data['ob'] = $this->Common->one_cond_row('ob','id',$this->uri->segment(3));

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');
        }else{

            $this->Page_model->update_ob();
            $this->session->set_flashdata('success', ' New Order of Business Save');
            redirect(base_url().'Pages/order_of_business');

        }    

    } 


    public function ordinances(){

        $page = "ordinance";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Ordinance"; 
            $position = $this->session->position;
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->get_posts('ordinances');
            }else{
                $data['page'] = $this->Page_model->get_where_posts('ordinances');
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    }  
    public function ordinance_add(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('Category', 'Category', 'required');
        $this->form_validation->set_rules('OrdinanceNo', 'Ordinance Number', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required');
        $this->form_validation->set_rules('Author[]', 'Author', 'required');
        $this->form_validation->set_rules('Sponsor[]', 'Sponsor', 'required');
        $this->form_validation->set_rules('Effectivity', 'Effectivity', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "ordinance_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "New Ordinance"; 
            $data['page'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
            $data['cat'] = $this->Page_model->get_where_posts('category');


            $this->load->view('templates/header_option');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');
        }else{
            $config['allowed_types'] = 'jpg|pdf';
            $config['upload_path'] = './uploads/or/';
            $this->load->library('upload', $config);

            $or = $this->input->post('OrdinanceNo');
            $tor = $this->input->post('Title');
            $type = $this->input->post('type');
            $check = $this->Page_model->two_where_check_exist('ordinances','Title',$tor,'type',$type,'OrdinanceNo',$or);
            if($check->num_rows() >= 1){

                $this->session->set_flashdata('danger', 'The Ordinance No./Ordinance Title. you entered is in used.');
                redirect(base_url().'ordinances');
                
            }else{

                if($this->upload->do_upload('image')){
                    //$file = $this->upload->data();

                    $this->Page_model->insert_ordinance();
                    $this->Page_model->insert_at('Create New Ordinance '.$this->db->insert_id());
                    $this->session->set_flashdata('success', ' New Ordinance Save');
                    redirect(base_url().'ordinances');

                }else{
                    print_r($this->upload->display_errors()); 
                }
                
            }

        }    

    } 
    public function ordinance_upload(){
        
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/or/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();

            $this->Page_model->insert_ordinance();
            $this->Page_model->insert_at('Create New Ordinance '.$this->db->insert_id());
            $this->session->set_flashdata('success', ' New Ordinance Save');
            redirect(base_url().'ordinances');

        }else{
            print_r($this->upload->display_errors()); 
        }
    }
    public function ordinance_delete($param){
        $this->Page_model->del('2', 'id', 'ordinances');
        $this->Page_model->insert_at('Delete Ordinance id number '.$param);
        $this->session->set_flashdata('danger', ' Ordinance was deleted');
        redirect(base_url().'ordinances');
    }
    public function or_del_admin($param){
        $this->Page_model->delete('2', 'id', 'ordinances');
        $this->Page_model->insert_at('Delete Permanently Ordinance id number '.$param);
        $this->session->set_flashdata('danger', ' Ordinance was deleted Permanently');
        redirect(base_url().'ordinances');
    }
    public function res_by_admin($param){
        $this->Page_model->restore('2', 'id', 'ordinances');
        $this->Page_model->insert_at('Restore Ordinance id number '.$param);
        $this->session->set_flashdata('success', ' Ordinance was Restore');
        redirect(base_url().'ordinances');
    }

    public function ordinance_edit($param){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('OrdinanceNo', 'OrdinanceNo', 'required');
        //$this->form_validation->set_rules('MiddleName', 'Middle Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "ordinance_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Edit Ordinances"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'ordinances', $param); 
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0'); 
            $data['cat'] = $this->Page_model->get_where_posts('category');
            $data['id'] = $data['page']['id'];
            $data['OrdinanceNo'] = $data['page']['OrdinanceNo'];
            $data['Category'] = $data['page']['Category'];
            $data['Title'] = $data['page']['Title'];
            $data['Author'] = $data['page']['Author'];
            $data['coAuthor'] = $data['page']['coAuthor'];
            $data['Sponsor'] = $data['page']['Sponsor'];
            $data['coSponsor'] = $data['page']['coSponsor'];
            $data['FirstReading'] = $data['page']['FirstReading'];
            $data['FirstReadingRemarks'] = $data['page']['FirstReadingRemarks'];
            $data['SecondReading'] = $data['page']['SecondReading'];
            $data['SecondReadingRemarks'] = $data['page']['SecondReadingRemarks'];
            $data['ThirdReading'] = $data['page']['ThirdReading'];
            $data['ThirdReadingRemarks'] = $data['page']['ThirdReadingRemarks'];
            $data['SignedDate'] = $data['page']['SignedDate'];
            $data['SignedRemarks'] = $data['page']['SignedRemarks'];
            $data['Effectivity'] = $data['page']['Effectivity'];
            $data['FileLocation'] = $data['page']['FileLocation'];
            $data['Remarks'] = $data['page']['Remarks'];
            $data['enactment_date'] = $data['page']['enactment_date'];
            $data['enactment_remarks'] = $data['page']['enactment_remarks'];
            $data['t'] = $data['page']['type'];

            $this->load->view('templates/header_option');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');

            }else{

                $this->Page_model->ordinance_update();
                //echo $this->db->last_query();
                $this->Page_model->insert_at('Update Ordinance id number'. $param);
                $this->session->set_flashdata('success', ' Ordinance was Updated');
                redirect(base_url().'ordinances');

            }
    }


    public function res(){

        $page = "resolutions";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Resolutions List"; 
            $position = $this->session->position;
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->get_posts('resolutions');
            }else{
                $data['page'] = $this->Page_model->get_where_posts('resolutions');
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal_res');
            $this->load->view('templates/footer');
    } 
    public function update_res_file(){
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/res/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->update_res_file_attach();
            $this->Page_model->insert_at('Update Resolutions Attachment id number '.$id);
            $this->session->set_flashdata('success', 'Image Profile Successfully update');
            redirect(base_url().'res');

        }else{
            print_r($this->upload->display_errors()); 
        }
    } 
    public function res_add(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>','</div>');
        $this->form_validation->set_rules('Category', 'Category', 'required');
        $this->form_validation->set_rules('ResolutionNo', 'ResolutionNo Number', 'required');
        $this->form_validation->set_rules('Title', 'Title', 'required');
        $this->form_validation->set_rules('Author[]', 'Author', 'required');
        $this->form_validation->set_rules('Sponsor[]', 'Sponsor', 'required');
        $this->form_validation->set_rules('Effectivity', 'Effectivity', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "res_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "New Resolution"; 
            $data['page'] = $this->Page_model->get_where_posts('members'); 
            $data['cat'] = $this->Page_model->get_where_posts('category');


            $this->load->view('templates/header_option');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');

            }else{
                $res = $this->input->post('ResolutionNo');
                $ror = $this->input->post('Title');
                $check = $this->Page_model->check_exist('resolutions','ResolutionNo',$res,'Title',$ror);
                if($check->num_rows() >= 1){

                    $this->session->set_flashdata('danger', 'The Resolution No./Resolution Title you entered is in used.');
                    redirect(base_url().'ordinances');
                    
                }else{
                    $config['allowed_types'] = 'jpg|pdf';
                    $config['upload_path'] = './uploads/res/';
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('image')){
                        //$file = $this->upload->data();
                        $id = $this->input->post('id');

                        $this->Page_model->insert_res();
                        $this->Page_model->insert_at('Create New Resolution id number '.$id);
                        $this->session->set_flashdata('success', 'Resolution Successfully Save');
                        redirect(base_url().'res');

                    }else{
                        print_r($this->upload->display_errors()); 
                    }
                }    

                

            }

        
    } 
    public function res_edit($param){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('ResolutionNo', 'ResolutionNo', 'required');
        //$this->form_validation->set_rules('MiddleName', 'Middle Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "res_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Edit Resolution"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'resolutions', $param);  
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0'); 
            $data['cat'] = $this->Page_model->get_where_posts('category');
            $data['id'] = $data['page']['id'];
            $data['ResolutionNo'] = $data['page']['ResolutionNo'];
            $data['Category'] = $data['page']['Category'];
            $data['Title'] = $data['page']['Title'];
            $data['Author'] = $data['page']['Author'];
            $data['coAuthor'] = $data['page']['coAuthor'];
            $data['Sponsor'] = $data['page']['Sponsor'];
            $data['FirstReading'] = $data['page']['FirstReading'];
            $data['FirstReadingRemarks'] = $data['page']['FirstReadingRemarks'];
            $data['SecondReading'] = $data['page']['SecondReading'];
            $data['SecondReadingRemarks'] = $data['page']['SecondReadingRemarks'];
            $data['ThirdReading'] = $data['page']['ThirdReading'];
            $data['ThirdReadingRemarks'] = $data['page']['ThirdReadingRemarks'];
            $data['SignedDate'] = $data['page']['SignedDate'];
            $data['SignedRemarks'] = $data['page']['SignedRemarks'];
            $data['Effectivity'] = $data['page']['Effectivity'];
            $data['FileLocation'] = $data['page']['FileLocation'];
            $data['Remarks'] = $data['page']['Remarks'];
            $data['enactment_date'] = $data['page']['enactment_date'];
            $data['enactment_remarks'] = $data['page']['enactment_remarks'];

            $this->load->view('templates/header_option');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer_option');

            }else{

                $this->Page_model->res_update();
                //echo $this->db->last_query();
                $this->Page_model->insert_at('Update Resolution id number'. $param);
                $this->session->set_flashdata('success', ' Resolution was Updated');
                redirect(base_url().'res');

            }
    }
    public function res_delete($param){
        $this->Page_model->del('2', 'id', 'resolutions');
        $this->Page_model->insert_at('Delete Resolution id number '.$param);
        $this->session->set_flashdata('danger', ' Resolution was deleted');
        redirect(base_url().'res');
    
    }
    public function res_del_admin($param){
        $this->Page_model->delete('2', 'id', 'resolutions');
        $this->Page_model->insert_at('Delete Permanently resolutions id number '.$param);
        $this->session->set_flashdata('danger', ' resolutions was deleted Permanently');
        redirect(base_url().'ordinances');
    }
    public function res_restore_admin($param){
        $this->Page_model->restore('2', 'id', 'resolutions');
        $this->Page_model->insert_at('Restore resolutions id number '.$param);
        $this->session->set_flashdata('success', ' resolutions was Restore');
        redirect(base_url().'res');
    }




    public function com(){

        $page = "committee";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Committee"; 
            $data['page'] = $this->Page_model->get_where_posts('committee'); 

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }  
    public function com_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('Committee', 'Committee', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "committee_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Committee"; 

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_committee();
            $this->Page_model->insert_at('Create New Committee id number '.$this->db->insert_id());
            $this->session->set_flashdata('committee_save', ' New Committee save');
            redirect(base_url().'/com');

        } 
    }
    public function com_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('Committee', 'Committee', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "committee_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Committee"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('comID', 'Committee', $param);  
            $data['id'] = $data['page']['comID'];
            $data['committee'] = $data['page']['Committee'];



            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_committee();
                $this->Page_model->insert_at('Update Committee id number '.$param);
                $this->session->set_flashdata('committee_updated', ' Committee was Updated');
                redirect(base_url().'/com');

            }
    }
    public function com_delete($param){
        $this->Page_model->del('2', 'comID', 'committee');
        $this->Page_model->insert_at('Delete Committee id number '.$param);
        $this->session->set_flashdata('com_del', ' Committee was deleted');
        redirect(base_url().'user');
    
    }

    public function polparty(){

        $page = "political_party";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Political Party";
            $data['page'] = $this->Page_model->get_where_posts('polparty');


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    } 
    public function polparty_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('Party', 'Political Party', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "political_party_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Political Party"; 

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_polparty();
            $this->Page_model->insert_at('Create new Political Party with id number '.$this->db->insert_id());
            $this->session->set_flashdata('save', ' New Data save');
            redirect(base_url().'/polparty');

        } 
    }
    public function polparty_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('Party', 'Party', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "political_party_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Political Party"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('Code', 'polparty', $param);  
            $data['id'] = $data['page']['Code'];
            $data['Party'] = $data['page']['Party'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_polparty();
                $this->Page_model->insert_at('Edit Political Party id number '.$param);
                $this->session->set_flashdata('save', 'Data was Updated');
                redirect(base_url().'/polparty');

            }
    }
    public function polparty_delete($param){
        $this->Page_model->del('2', 'Code', 'polparty');
        $this->Page_model->insert_at('Delete Political Party id number '.$param);
        $this->session->set_flashdata('del', ' Data was deleted');
        redirect(base_url().'polparty');
    
    }

    

    public function cat(){

        $page = "categories_com";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Category"; 
            $data['page'] = $this->Page_model->get_where_posts('category');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    public function cat_add(){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "categories_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Add New Resolution/Ordinance Category"; 


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{
                    $this->Page_model->insert_cat();
                    $this->Page_model->insert_at('Create New Category id number '.$this->db->insert_id());
                    $this->session->set_flashdata('success', 'Category Successfully Save');
                    redirect(base_url().'cat');
                
            }

        
    }
    public function cat_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('name', 'Category Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "categories_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Update Resolution/Ordinance Category"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'category', $param);  
            $data['id'] = $data['page']['id'];
            $data['name'] = $data['page']['name'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_cat();
                $this->Page_model->insert_at('Edit Category id number '.$param);
                $this->session->set_flashdata('success', 'Category Successfully was Updated');
                redirect(base_url().'cat');

            }
    } 
    public function cat_delete($param){
        $this->Page_model->del('2', 'id', 'category');
        $this->Page_model->insert_at('Delete Category id number '.$param);
        $this->session->set_flashdata('danger', ' Category was deleted');
        redirect(base_url().'cat');
    
    }

    public function cat_com(){

        $page = "categories_com";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Communication Category"; 
            $data['page'] = $this->Common->no_cond('com_cat');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    public function cat_com_add(){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('cat', 'Categories', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "categories_com_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "New Communication Category"; 


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{
                    $this->Page_model->insert_cat_com();
                    $this->Page_model->insert_at('Create New Category id number '.$this->db->insert_id());
                    $this->session->set_flashdata('success', 'Category Successfully Save');
                    redirect(base_url().'Pages/cat_com');
                
            }

        
    }
    public function cat_com_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('cat', 'Category Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "categories_com_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Update Resolution/Ordinance Category"; 
            $data['data'] = $this->Common->one_cond_row('com_cat', 'id', $param);  


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_com_cat();
                $this->Page_model->insert_at('Edit Category id number '.$param);
                $this->session->set_flashdata('success', 'Category Successfully was Updated');
                redirect(base_url().'Pages/cat_com');

            }
    } 
    public function cat_com_delete($param){
        $this->Common->del('com_cat','id',$this->uri->segment(3));
        $this->Page_model->insert_at('Delete Category id number '.$param);
        $this->session->set_flashdata('danger', ' Category was deleted');
        redirect(base_url().'Pages/cat_com');
    
    }


    public function office(){

        $page = "office_list";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Office"; 
            $data['page'] = $this->Page_model->get_where_posts('office_list');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    public function office_add(){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('name', 'Office', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "office_new";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Office"; 


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{
                    $this->Page_model->insert_office();
                    $this->Page_model->insert_at('Create New Office id number '.$this->db->insert_id());
                    $this->session->set_flashdata('success', 'Office Successfully Save');
                    redirect(base_url().'office');
                
            }

        
    }
    public function office_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('office', 'Office', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "office_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Office"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'office_list', $param);  
            $data['id'] = $data['page']['id'];
            $data['office'] = $data['page']['office'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_office();
                $this->Page_model->insert_at('Edit Office id number '.$param);
                $this->session->set_flashdata('success', 'Office Successfully was Updated');
                redirect(base_url().'office');

            }
    }
    public function office_delete($param){
        $this->Page_model->del('2', 'id', 'office_list');
        $this->Page_model->insert_at('Delete Office id number '.$param);
        $this->session->set_flashdata('danger', ' Office was deleted');
        redirect(base_url().'office');
    
    }


    public function term(){

        $page = "term_period";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Term Period"; 
            $data['page'] = $this->Page_model->get_where_posts('term');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    } 
    public function term_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('from', 'Term Period From', 'required');
        $this->form_validation->set_rules('to', 'Term Period to', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "term_period_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Term Period"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('termID', 'term', $param);  
            $data['id'] = $data['page']['termID'];
            $data['from'] = $data['page']['from'];
            $data['to'] = $data['page']['to'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_term_period();
                $this->Page_model->insert_at('Update Term Period id number '.$param);
                $this->session->set_flashdata('save', 'Term Period was Updated');
                redirect(base_url().'term');

            }
    }
    public function term_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('termPeriodfrom', 'Term Period From', 'required');
        $this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "term_period_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Term Period"; 

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_termperiod();
            $this->Page_model->insert_at('Add New Term Period id number '.$this->db->insert_id());
            $this->session->set_flashdata('save', ' New Term Member Save');
            redirect(base_url().'term');

        } 
    }
    public function term_delete($param){
        $this->Page_model->del('2', 'termID', 'term');
        $this->Page_model->insert_at('Delete Term Period id number '.$param);
        $this->session->set_flashdata('del', ' Data was deleted');
        redirect(base_url().'term');
    
    }

    public function termmembers(){

        $page = "members_term";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "term members";
            $data['page'] = $this->Page_model->get_posts('termmembers'); 


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    } 
    public function termmembers_add($param){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('memberID', 'Member ID', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "members_term_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New Term Period";
        $data['page'] = $this->Page_model->get_single_table_by_id('memberID', 'members', $param); 
        $data['term'] = $this->Page_model->get_where_posts('term'); 

        $data['fname'] = $data['page']['FirstName'];
        $data['mname'] = $data['page']['MiddleName'];
        $data['lname'] = $data['page']['LastName'];
        $data['Position'] = $data['page']['Position'];
        $data['id'] = $data['page']['memberID'];
        $data['pp'] = $data['page']['PoliticalParty'];
        $data['position'] = $data['page']['Position'];

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{
            $c_id = $this->input->post('memberID'); 
            $c_tp = $this->input->post('tp'); 
            $row = $this->Page_model->check_table_two_row('termmembers',$c_id,$c_tp,'memberID','TermPeriod');
            if($row->num_rows() == 1){
                $this->session->set_flashdata('danger', 'Member Already a Term Member');
                redirect(base_url().'termmembers');

            }else{

            $this->Page_model->insert_termmembers();
            $this->session->set_flashdata('success', ' New Term Member Save');
            redirect(base_url().'termmembers');
            }

        } 
    }
    public function termmembers_delete(){
        $this->Page_model->delete('2', 'termmembersID', 'termmembers');
        $this->session->set_flashdata('del', ' Data was deleted');
        redirect(base_url().'termmembers');
    
    }
    public function termmembers_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('Party', 'Party', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "members_term_edit";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Edit Term Members"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('termmembersID', 'termmembers', $param);  
            $data['id'] = $data['page']['termmembersID'];
            $data['memberID'] = $data['page']['memberID'];
            $data['FirstName'] = $data['page']['FirstName'];
            $data['MiddleName'] = $data['page']['Party'];
            $data['LastName'] = $data['page']['LastName'];
            $data['PoliticalParty'] = $data['page']['PoliticalParty'];
            $data['Position'] = $data['page']['Position'];
            $data['TermPeriod'] = $data['page']['TermPeriod'];
            $data['TermServed'] = $data['page']['TermServed'];
            $data['District'] = $data['page']['District'];
            
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_polparty();
                $this->session->set_flashdata('save', 'Data was Updated');
                redirect(base_url().'/polparty');

            }
    }


    public function upload(){

        $page = "uploads";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Upload"; 

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    
    public function upload_file(){
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/or/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->update_ordinance_file();
            $this->Page_model->insert_at('Update Ordinance file attachment id number '.$id);
            $this->session->set_flashdata('success', 'File Successfully update');
            redirect(base_url().'ordinances');

        }else{
            print_r($this->upload->display_errors()); 
        }
    }

    public function upload_member_profile($param){
        $config['allowed_types'] = 'jpg|gif|png';
        $config['upload_path'] = './uploads/members';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();

            $this->Page_model->upload_member_settings();
            $this->Page_model->insert_at('Update Member Settings');
            $this->session->set_flashdata('save', 'Member Settings Successfully update');
            redirect(base_url().'profile/'.$param);

        }else{
            print_r($this->upload->display_errors()); 
        }
    }

    public function user(){

        $page = "users";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Manange Users"; 
            $data['page'] = $this->Page_model->get_user('users');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    } 
    public function user_profile($param){

        $page = "user";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $data['title'] = "Users"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'users', $param);
            $data['id'] = $data['page']['id'];
            $data['username'] = $data['page']['username'];
            $data['position'] = $data['page']['position'];
            $data['office'] = $data['page']['office'];
            $data['fname'] = $data['page']['fname'];
            $data['mname'] = $data['page']['mname'];
            $data['lname'] = $data['page']['lname'];
            $data['age'] = $data['page']['age'];
            $data['address'] = $data['page']['address'];
            $data['sex'] = $data['page']['sex'];
            $data['image'] = $data['page']['image'];
            $data['bday'] = $data['page']['bday'];
            

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal_username');
            $this->load->view('templates/modal_password');
            $this->load->view('templates/modal_profile_image');
            $this->load->view('templates/footer');
    } 
    public function user_add(){

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('Username', 'Username', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "user_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Add New User"; 
        $data['office'] = $this->Page_model->get_where_posts('office_list');

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

        }else{

            $this->Page_model->insert_user();
            $this->Page_model->insert_at('Add New user id number '.$this->db->insert_id());
            $this->session->set_flashdata('save', ' New User Save');
            redirect(base_url().'user');

        } 
    }
    public function users_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('position', 'position', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "user_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['office_list'] = $this->Page_model->get_posts('office_list');
            $data['title'] = "Edit User"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'users', $param);  
            $data['user_id'] = $data['page']['id'];
            $data['pos'] = $data['page']['position'];
            $data['office'] = $data['page']['office'];
            $data['fname'] = $data['page']['fname'];
            $data['status'] = $data['page']['status'];
            $data['mname'] = $data['page']['mname'];
            $data['lname'] = $data['page']['lname'];
            $data['age'] = $data['page']['age'];
            $data['address'] = $data['page']['address'];
            $data['sex'] = $data['page']['sex'];
            $data['bday'] = $data['page']['bday'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_user();
                $this->Page_model->insert_at('Update User id number '.$param);
                $this->session->set_flashdata('save', 'Data was Updated');
                redirect(base_url().'user_profile/'.$param);

            }
    }

    public function user_delete($param){
        $this->Page_model->del('2', 'id', 'users');
        $this->Page_model->insert_at('Delete User id number '.$param);
        $this->session->set_flashdata('danger', ' User was deleted');
        redirect(base_url().'user');
    
    }

  
    public function change_username(){
        $id = $this->input->post('id');
        $this->Page_model->username();
        $this->Page_model->insert_at('Change Username id number '.$id);
        $this->session->set_flashdata('success', ' Username Successfuly Changed.');
        redirect(base_url().'user_profile/'.$id);
    
    }

    public function change_password(){
        $id = $this->input->post('id');
        $pass = $this->input->post('password');
        $cp = $this->input->post('cp');
        if($pass == $cp){
            $this->Page_model->password();
            $this->Page_model->insert_at('Change Password id number '.$id);
            $this->session->set_flashdata('success', ' Password Successfuly Changed.');
            redirect(base_url().'user_profile/'.$id);
        }else{
            $this->session->set_flashdata('danger', ' Confirm Password not Match.');
            redirect(base_url().'user_profile/'.$id);

        }

        
    
    }
    public function user_image(){
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->update_user_image();
            $this->Page_model->insert_at('Update Ordinance file attachment id number '.$id);
            $this->session->set_flashdata('success', 'File Successfully update');
            redirect(base_url().'ordinances');

        }else{
            print_r($this->upload->display_errors()); 
        }
    }
    public function upload_user_image(){
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/users/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->update_user_image();
            $this->Page_model->insert_at('Update Profile image id number '.$id);
            $this->session->set_flashdata('success', 'Image Profile Successfully update');
            redirect(base_url().'user_profile/'.$id);

        }else{
            print_r($this->upload->display_errors()); 
        }
    }

    public function log_in(){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'uassword', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "login";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $this->load->view('pages/'.$page);

            }else{

                $user_id = $this->Page_model->login();

                if($user_id){

                    $user_data = array(
                        'username' => $user_id['username'],
                        'user' => $user_id['fname'].' '.$user_id['mname'].' '.$user_id['lname'],
                        'position' => $user_id['position'],
                        'office' => $user_id['office'],
                        'sex' => $user_id['sex'],
                        'image' => $user_id['image'],
                        'id' => $user_id['id'],
                        'com_id' => $user_id['company_id'],
                        'logged_in' => true

                    );
                
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_log', 'You are now loged in as '
                    .$this->session->position);
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('failed', 'Username/Password not match');
                    redirect(base_url().'log_in');

                }
  

            }
    } 

    public function lock_user_screen(){

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "lock_screen";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $this->load->view('pages/'.$page);

            }else{

                $user_id = $this->Page_model->lock_screen();

                if($user_id){

                    $user_data = array(
                        'username' => $user_id['username'],
                        'user' => $user_id['fname'].' '.$user_id['mname'].' '.$user_id['lname'],
                        'position' => $user_id['position'],
                        'office' => $user_id['office'],
                        'image' => $user_id['image'],
                        'id' => $user_id['id'],
                        'logged_in' => true

                    );
                
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_log', 'You are now loged in as '
                    .$this->session->position);
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('failed', 'Password not match');
                    redirect(base_url().'lock_user_screen');

                }
  

            }
    } 


    
    public function set_add(){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "setting";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Create New Settings"; 


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->insert_setting();
                $this->Page_model->insert_at('Create New Settings id number '.$this->db->insert_id());
                $this->session->set_flashdata('succsess', 'New Settings Save');
                redirect(base_url().'set');

            }
    }
    public function set_edit($param){
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() == FALSE){

            $page = "setting_update";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Update Settings"; 
            $data['page'] = $this->Page_model->get_single_table_by_id('id', 'settings', $param); 
            $data['id'] = $data['page']['id'];
            $data['name'] = $data['page']['name'];


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

            }else{

                $this->Page_model->update_setting();
                $this->Page_model->insert_at('Create New Settings id number '.$param);
                $this->session->set_flashdata('succsess', 'Settings Update Successfuly');
                redirect(base_url().'set');

            }
    }
    public function set(){

        $page = "settings";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "List of Settings"; 
            $data['page'] = $this->Page_model->get_posts('settings');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
    }
    public function set_delete($param){
        $this->Page_model->delete('2', 'id', 'Settings');
        $this->Page_model->insert_at('Delete Settings id number '.$param);
        $this->session->set_flashdata('danger', ' Settings was deleted');
        redirect(base_url().'set');
    
    }


    //Reports
    public function res_author(){

        $page = "res_by_author";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }


            $data['title'] = "Resolutions Report By Author";
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
       

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }

    public function resauthor(){

        $page = "res_author";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }


            $data['title'] = "Resolutions Report Per Author";
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
            
            $author = $this->input->post('Author');
            $this->session->set_flashdata('author', $author);

            $data['page'] = $this->Page_model->get_mult_where_posts('resolutions','Author',$author);
            $data['a_count'] = $this->Page_model->get_table_count('resolutions','Author',$author);
            $data['cat'] = $this->Page_model->group_by_category($author,'resolutions');
            $data['year'] = $this->Page_model->group_by_year($author,'resolutions');
          

            $this->load->view('pages/'.$page, $data);

        

    }
    public function orauthor(){

        $page = "or_author";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }


            $data['title'] = "Resolutions Report Per Author";
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
            
            $author = $this->input->post('Author');
            $this->session->set_flashdata('author', $author);

            $data['page'] = $this->Page_model->get_mult_where_posts('ordinances','Author',$author);
            $data['a_count'] = $this->Page_model->get_table_count('ordinances','Author',$author);
            $data['cat'] = $this->Page_model->group_by_category($author,'ordinances');
            $data['year'] = $this->Page_model->group_by_year($author,'ordinances');
          

            $this->load->view('pages/'.$page, $data);

        

    }

    public function res_result(){

        $page = "author_report";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $author = $this->input->post('Author');
            $this->session->set_flashdata('author', $author);

            $data['title'] = "Resolutions Report By Author";
            $data['pn'] = "res";
            $data['page'] = $this->Page_model->get_mult_where_posts('resolutions','Author',$author);
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
           

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }
    public function or_result(){

        $page = "author_report";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $author = $this->input->post('Author');

            $data['title'] = "Ordinance Report By Author";
            $data['pn'] = "or";
            $data['page'] = $this->Page_model->get_mult_where_posts('ordinances','Author',$author);
            $data['member'] = $this->Page_model->get_mult_where_posts('members','mem_status','0');
           

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }

    public function res_reports($param){

        $page = "report_summary";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $pa = urldecode($param);
            $data['title'] = "Resolutions Report By $pa";
            $data['page'] = $this->Page_model->get_mult_where_posts('resolutions','Category',$pa);
            $data['pn'] = "res";


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }

    public function or_reports($param){

        $page = "report_summary";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $pa = urldecode($param);
            $data['title'] = "Ordinance Report By $pa";
            $data['page'] = $this->Page_model->get_mult_where_posts('ordinances','Category',$pa);
            $data['pn'] = "or";
            


            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }
    public function res_year_report(){

        $page = "res_y_report";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $year = $this->input->post('year');
            $this->session->set_flashdata('year', $year);

            $data['title'] = "Ordinance Report By Year";
            $data['year'] = $this->Page_model->year_report('resolutions');
            $data['page'] = $this->Page_model->get_mult_group('resolutions','YEAR(Effectivity)',$year);
            $data['count'] = $this->Page_model->get_table_count('resolutions','YEAR(Effectivity)',$year);


            $this->load->view('pages/'.$page, $data);

    }
    public function or_year_report(){

        $page = "or_y_report";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $year = $this->input->post('year');
            $this->session->set_flashdata('year', $year);

            $data['title'] = "Ordinance Report By Year";
            $data['year'] = $this->Page_model->year_report('ordinances');
            $data['page'] = $this->Page_model->get_mult_group('ordinances','YEAR(Effectivity)',$year);
            $data['count'] = $this->Page_model->get_table_count('ordinances','YEAR(Effectivity)',$year);


            $this->load->view('pages/'.$page, $data);

    }


    public function document(){

        $page = "doc_list";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "List of Document"; 
        $data['page'] = $this->Page_model->get_mult_where_posts('documents','doc_status',0);


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/modal_doc');
        $this->load->view('templates/footer');
       
    }
    public function doc_add(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "doc_new";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Receive New Document"; 
        $data['page'] = $this->Page_model->get_where_posts('documents');
        $data['cat'] = $this->Page_model->get_where_posts('category');


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        
        }else{

            $config['allowed_types'] = 'jpg|pdf';
            $config['upload_path'] = './uploads/doc/';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                //$file = $this->upload->data();
                $id = $this->input->post('id');

                $this->Page_model->insert_doc();
                $this->Page_model->insert_at('Accept New Document id number '.$id);
                $this->session->set_flashdata('success', 'Resolution Successfully Save');
                redirect(base_url().'document');

            }else{
                print_r($this->upload->display_errors()); 
            }

        } 
       
    }
    public function doc_file(){
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/doc/';
        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->update_doc_file();
            $this->Page_model->insert_at('Update Document file attachment id number '.$id);
            $this->session->set_flashdata('success', 'File Successfully update');
            redirect(base_url().'document');

        }else{
            print_r($this->upload->display_errors()); 
        }
    }

    public function doc_process(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ','</div>');
        $this->form_validation->set_rules('name', 'Document Code', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if($this->form_validation->run() == FALSE){

        $page = "doc_pro";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Process Receive Document"; 
        $data['cat'] = $this->Page_model->get_where_posts('category');
        $data['doc'] = $this->Page_model->get_mult_where_posts('documents','doc_status',0);
        


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        
        }else{
                $this->Page_model->process_doc();
                $this->Page_model->insert_at('Process doc_process id number '.$this->db->insert_id());
                $this->session->set_flashdata('success', 'Process Save');
                redirect(base_url().'document');
        } 
       
    }
    public function doc($param){

        $page = "doc_track";

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = "Document Track and Trace"; 
        $data['page'] = $this->Page_model->get_mult_where_posts('doc_process', 'doc_code', $param);


        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/modal_doc');
        $this->load->view('templates/footer');
       
    }
    
    public function logout(){

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('office');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('failed', 'You are logged out.');
        redirect(base_url().'log_in');

    }
    public function lock(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('office');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('failed', 'You are now Lock Screen Mode');
        redirect(base_url().'lock_user_screen');

    }

    public function ord_by_user(){

        $page = "ordinance";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Ordinance List"; 
            $position = $this->session->position;
            $cdate = date('Y-m-d');
            $user_id =  $this->uri->segment(3);
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->two_cond_loop_array('ordinances','saved_date',$cdate,'user_id',$user_id);
            }else{
                $data['page'] = $this->Page_model->two_cond_loop_array('ordinances','saved_date',$cdate,'user_id',$user_id);
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 

    public function res_by_user(){

        $page = "resolutions";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Resolutions List"; 
            $position = $this->session->position;
            $cdate = date('Y-m-d');
            $user_id =  $this->uri->segment(3);
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->two_cond_loop_array('resolutions','saved_date',$cdate,'user_id',$user_id);
            }else{
                $data['page'] = $this->Page_model->two_cond_loop_array('resolutions','saved_date',$cdate,'user_id',$user_id);
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 

    public function res_by_user_year(){

        $page = "resolutions";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Resolutions List"; 
            $position = $this->session->position;
            $cdate = date('Y-m-d');
            $user_id =  $this->uri->segment(3);
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->two_cond_loop_array('resolutions','year(saved_date)',$cdate,'user_id',$user_id);
            }else{
                $data['page'] = $this->Page_model->two_cond_loop_array('resolutions','year(saved_date)',$cdate,'user_id',$user_id);
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 
    public function ord_by_user_year(){

        $page = "ordinance";

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = "Ordinance List"; 
            $position = $this->session->position;
            $cdate = date('Y-m-d');
            $user_id =  $this->uri->segment(3);
            if($position == 'Super Admin' || $position == 'Admin'){
                $data['page'] = $this->Page_model->two_cond_loop_array('ordinances','year(saved_date)',$cdate,'user_id',$user_id);
            }else{
                $data['page'] = $this->Page_model->two_cond_loop_array('ordinances','year(saved_date)',$cdate,'user_id',$user_id);
            }

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
    } 

    public function cloce_com(){
        $this->Page_model->close_communication();
        $this->session->set_flashdata('save', 'Data was Updated');
        redirect(base_url().'Pages/order_of_business');
    } 

    public function open_com(){
        $this->Page_model->open_communication();
        $this->session->set_flashdata('save', 'Data was Updated');
        redirect(base_url().'Pages/order_of_business');
    } 

   
    

}

?>