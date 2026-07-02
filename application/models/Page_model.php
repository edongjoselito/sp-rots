<?php

class Page_model extends CI_Model{

    public function __construct(){
        $this->load->database();

    }


public function get_posts($table){

    $query = $this->db->get($table);
    return $query->result_array();
}

public function get_where_posts($table){
    $query = $this->db->get_where($table, array('status' => '0', 'company_id' => $this->session->com_id));
    return $query->result_array();
}


public function get_all_row($table){
    $query = $this->db->get_where($table, array('status' => '0', 'company_id' => $this->session->com_id));
    return $query->result();
}

public function get_user($table){
    $query = $this->db->get_where($table, array('position!=' => 'Super Admin', 'status' => '0', 'company_id' => $this->session->com_id));
    return $query->result_array();
}

public function two_cond_loop_array($table,$col,$val,$col2,$val2){
    $this->db->where($col, $val);
    $this->db->where($col2, $val2);
    $this->db->where('status', 0);
    $this->db->where('company_id', $this->session->com_id);
    $query = $this->db->get($table);
    return $query->result_array();
}
public function one_cond_loop_array_user($table,$col,$val,$orderby){
    $this->db->where($col, $val);
    $this->db->where($col2, $val2);
    $this->db->where('status', 0);
    $this->db->where('company_id', $this->session->com_id);
    $this->db->where('user_id', $this->session->id);
    $query = $this->db->get($table);
    return $query->result_array();
}


public function group_by_category($param,$table){  
    $query = $this->db
              ->select('Category, count(Category) AS cat')
              ->where('Author',$param)
              ->where('status',0)
              ->group_by('Category')
              ->order_by('cat', 'desc')
              ->get($table, 10);
    return $query->result_array();
}


public function group_by_year($param,$table){  

    $query = $this->db
              ->select ('YEAR(Effectivity) as ef, count(Effectivity) AS year')
              ->where('Author',$param)
              ->where('status',0)
              ->group_by('ef')
              ->order_by('year', 'desc')
              ->get($table, 10);
    return $query->result_array();
}
public function year_report($table){  

    $query = $this->db
              ->select ('YEAR(Effectivity) as ef, count(Effectivity) AS year')
              ->where('status',0)
              ->group_by('ef')
              ->order_by('year', 'desc')
              ->get($table, 10);
    return $query->result_array();
}

public function table_num($table){
    $query = $this->db->get_where($table, array('status' => '0'));
    return $query;
}

public function check_table_two_row($table,$c_id,$tp,$col1,$col2){
    $query = $this->db->get_where($table, array('status' => '0', $col1 => $c_id, $col2 => $tp));
    return $query;
}

public function get_mult_group($table,$col,$col_value){
    $query = $this->db->get_where($table, array('status' => '0', $col => $col_value));
    return $query->result_array();
}

public function get_mult_where_posts($table,$col,$col_value){
    $query = $this->db->get_where($table, array('status' => '0', $col => $col_value));
    return $query->result_array();
}

public function get_table_count($table,$col,$col_value){
    $query = $this->db->get_where($table, array('status' => '0', $col => $col_value));
    return $query;
}


public function get_posts_single($param){

    $this->db->where('memberID', $param);
    $result = $this->db->get('members');

    return $result->row_array();

}

public function insert_member(){

    $id = $this->input->post('id'); 
    //date in mm/dd/yyyy format; or it can be in other formats as well
    $birthDate = $this->input->post('BDate');
    //explode the date to get month, day and year
    $birthDate = explode("/", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));

    $data = array(
    'FirstName' => $this->input->post('FirstName'), 
    'MiddleName' => $this->input->post('MiddleName'), 
    'LastName' => $this->input->post('LastName'), 
    'BDate' => $this->input->post('BDate'), 
    'Age' => $age, 
    'Sex' => $this->input->post('Sex'), 
    'CivilStatus' => $this->input->post('CivilStatus'), 
    'Eligibility' => "", 
    'Position' => "", 
    'AppStatus' => "", 
    'EducAttainment' => "", 
    'Address' => $this->input->post('Address'), 
    'District' => $this->input->post('District'), 
    'ContactNos' => $this->input->post('ContactNos'), 
    'CTC' => "", 
    'IssuanceDate' => "", 
    'IssuancePlace' => "", 
    'TIN' => "", 
    'PhilHealth' => "", 
    'Pagibig' => "", 
    'SSS' => "", 
    'GSIS' => "", 
    'PoliticalParty' => $this->input->post('PoliticalParty'), 
    'Notes' => ""
    );

    return $this->db->insert('members', $data); 
}

public function insert_at($activity){

    date_default_timezone_set('Asia/Manila');
    $date = date('m/d/Y h:i:s a', time());

    $data = array(
    'activity' => $activity,
    'date' => $date,
    'res_user' => $this->session->username
    );
    return $this->db->insert('at', $data);
    
}

public function update_member(){

    $id = $this->input->post('id'); 

    $data = array(
    'FirstName' => $this->input->post('FirstName'), 
    'MiddleName' => $this->input->post('MiddleName'), 
    'LastName' => $this->input->post('LastName'), 
    'BDate' => $this->input->post('BDate'), 
    'Age' => $this->input->post('Age'), 
    'Sex' => $this->input->post('Sex'), 
    'CivilStatus' => $this->input->post('CivilStatus'), 
    'Eligibility' => $this->input->post('Eligibility'), 
    'Position' => $this->input->post('Position'), 
    'AppStatus' => $this->input->post('AppStatus'), 
    'EducAttainment' => $this->input->post('EducAttainment'), 
    'Address' => $this->input->post('Address'), 
    'District' => $this->input->post('District'), 
    'ContactNos' => $this->input->post('ContactNos'), 
    'CTC' => $this->input->post('CTC'), 
    'IssuanceDate' => $this->input->post('IssuanceDate'), 
    'IssuancePlace' => $this->input->post('IssuancePlace'), 
    'TIN' => $this->input->post('TIN'), 
    'PhilHealth' => $this->input->post('PhilHealth'), 
    'Pagibig' => $this->input->post('Pagibig'), 
    'SSS' => $this->input->post('SSS'), 
    'GSIS' => $this->input->post('GSIS'), 
    'PoliticalParty' => $this->input->post('PoliticalParty'), 
    'Notes' => $this->input->post('Notes')
    );

    $this->db->where('memberID', $id);
    return $this->db->update('members', $data);  
}

public function update_committee(){

        $id = $this->input->post('id'); 

        $data = array(
        'Committee' => $this->input->post('Committee')
        );

        $this->db->where('comID', $id);
        return $this->db->update('committee', $data);
}

public function delete_member(){
    $id = $this->uri->segment(2);
    $this->db->where('memberID',$id);
    $this->db->delete('members');

    return true;
}

public function delete($egment, $col_id, $table){

    $id = $this->uri->segment($egment);
    $this->db->where($col_id,$id);
    $this->db->delete($table);

    return true;
}

function delete_with_attach($param, $attach, $path, $table){
    $this->db->where('id', $param);
    unlink("uploads/".$path."/".$attach);
    $this->db->delete($table);
}

public function deleted($segment, $col_id,$id, $table){

    $id = $this->uri->segment($segment);
    $this->db->where($col_id,$id);
    $this->db->delete($table);
    return true;
}

public function del($egment, $col_id, $table){

    $id = $this->uri->segment($egment);
    
    $data = array(
        'status' => 1
        );
        
    $this->db->where($col_id,$id);
    $result = $this->db->update($table, $data);
    return $result;
}
public function restore($egment, $col_id, $table){

    $id = $this->uri->segment($egment);
    
    $data = array(
        'status' => 0
        );
        
    $this->db->where($col_id,$id);
    $result = $this->db->update($table, $data);
    return $result;
}

public function username(){

    $id = $this->input->post('id');
    
    $data = array(
        'username' => $this->input->post('username')
        );
        
    $this->db->where('id',$id);
    $result = $this->db->update('users', $data);
    return $result;
}
public function password(){

    $id = $this->input->post('id');
    $password = $this->input->post('password');
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $data = array(
        'password' => $hash
        );
        
    $this->db->where('id',$id);
    $result = $this->db->update('users', $data);
    return $result;
}

public function insert_setting(){

    $data = array(
    'name' => $this->input->post('name')
    ); 

    return $this->db->insert('settings', $data);
    
}
public function update_setting(){

    $id = $this->input->post('id'); 

    $data = array(
    'name' => $this->input->post('name')
    );

    $this->db->where('id', $id);
    return $this->db->update('settings', $data);
}


public function get_all_posts($param){

    $query = $this->db->get($param);
    return $query->result_array();
}

public function get_single_table_by_id($col, $table, $param){

    $this->db->where($col, $param);
    $result = $this->db->get($table);

    return $result->row_array();

}

public function insert_committee(){

    $data = array(
    'Committee' => $this->input->post('Committee')
    ); 

    return $this->db->insert('committee', $data);
    
}
public function update_term_period(){

    $id = $this->input->post('id'); 
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $newfrom = date("F d, Y", strtotime($from));
    $newto = date("F d, Y", strtotime($to));

    $data = array(
    'from' => $newfrom,
    'to' => $newto
    ); 

    $this->db->where('termID', $id);
    return $this->db->update('term', $data);
    
}

public function insert_polparty(){

    $data = array(
    'Party' => $this->input->post('Party')
    ); 

    return $this->db->insert('polparty', $data);
    
}
public function update_polparty(){

    $id = $this->input->post('id'); 

    $data = array(
    'Party' => $this->input->post('Party')
    );

    $this->db->where('Code', $id);
    return $this->db->update('polparty', $data);
}

public function insert_cat(){

    $data = array(
    'name' => $this->input->post('name')
    ); 

    return $this->db->insert('category', $data);
    
}

public function insert_cat_com(){

    $data = array(
    'cat' => $this->input->post('cat')
    ); 

    return $this->db->insert('com_cat', $data);
    
}
public function update_cat(){

    $id = $this->input->post('id'); 

    $data = array(
    'name' => $this->input->post('name')
    );

    $this->db->where('id', $id);
    return $this->db->update('category', $data);
}

public function update_com_cat(){

    $id = $this->input->post('id'); 

    $data = array(
    'cat' => $this->input->post('cat')
    );

    $this->db->where('id', $id);
    return $this->db->update('com_cat', $data);
}

public function insert_office(){

    $data = array(
    'office' => $this->input->post('name'),
    'company_id' => $this->session->com_id
    ); 

    return $this->db->insert('office_list', $data);
    
}
public function update_office(){

    $id = $this->input->post('id'); 

    $data = array(
    'office' => $this->input->post('office')
    );

    $this->db->where('id', $id);
    return $this->db->update('office_list', $data);
}

public function insert_termperiod(){

    $from = $this->input->post('termPeriodfrom');
    $to = $this->input->post('termPeriodto');
    $newfrom = date("F d, Y", strtotime($from));
    $newto = date("F d, Y", strtotime($to));

    $data = array(
    'from' => $newfrom,
    'to' => $newto
    ); 

    return $this->db->insert('term', $data);
    
}

public function insert_termmembers(){
    $data = array(
    'memberID' => $this->input->post('memberID'),
    'FirstName' => $this->input->post('FirstName'),
    'MiddleName' => $this->input->post('MiddleName'),
    'LastName' => $this->input->post('LastName'),
    'PoliticalParty' => $this->input->post('pp'),
    'Position' => $this->input->post('Position'),
    'TermPeriod' => $this->input->post('tp'),
    'TermServed' => $this->input->post('TermServed'),
    'District' => $this->input->post('District')
    ); 

    return $this->db->insert('termmembers', $data);
    
}

public function insert_upload(){

    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
    'filename' => $filename
    ); 

    return $this->db->insert('upload', $data);
    
}

public function insert_com_report(){

    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
    'com_no' => $this->input->post('com_no'),
    'caption' => $this->input->post('caption'),
    'keyword' => $this->input->post('keyword'),
    'remarks' => $this->input->post('remarks'),
    'date_ai' => $this->input->post('date_ai'),
    'date_received' => $this->input->post('date_received'),
    'time_received' => $this->input->post('time_received'),
    'com' => $this->input->post('com'),
    'file' => $filename,
    // 'fr' => $this->input->post('fr'),
    // 'sr' => $this->input->post('sr'),
    // 'tr' => $this->input->post('tr')
    ); 

    return $this->db->insert('com_report', $data);
    
}
public function update_com_report(){

    $id = $this->input->post('id'); 

    $data = array(
        'com_no' => $this->input->post('com_no'),
        'caption' => $this->input->post('caption'),
        'keyword' => $this->input->post('keyword'),
        'remarks' => $this->input->post('remarks'),
        'date_ai' => $this->input->post('date_ai'),
        'date_received' => $this->input->post('date_received'),
        'time_received' => $this->input->post('time_received'),
        'com' => $this->input->post('com'),
        'fr' => $this->input->post('fr'),
        'sr' => $this->input->post('sr'),
        'tr' => $this->input->post('tr')
        ); 
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('com_report', $data);
    return $result;
}

public function insert_ob($file,$file2){

    $com_ids = implode(',',$this->input->post('com_id[]'));
    $com_id = explode(',',$com_ids);

    $data = array(
    'ds' => $this->input->post('ds'), 
    'ts' => $this->input->post('ts'), 
    'stat' => $this->input->post('stat'),
    'draft' => $file,
    'approved' => $file2,
    'sn' => $this->input->post('sn'),
    'com_id' => implode(',', $com_id),
    'r_com_id' => $this->input->post('com')
    ); 

    return $this->db->insert('ob', $data);
    
}

public function update_ob(){

    $com_ids = implode(',',$this->input->post('com_id[]'));
    $com_id = explode(',',$com_ids);

    $data = array(
    'ds' => $this->input->post('ds'), 
    'ts' => $this->input->post('ts'), 
    'stat' => $this->input->post('stat'),
    'sn' => $this->input->post('sn'),
    'com_id' => implode(',', $com_id)  // Convert array to string
    ); 

    $this->db->where('id', $this->input->post('id'));
    return $this->db->update('ob', $data);
    
}

public function insert_communication($cr,$pr,$po,$pa){

    // $file = $this->upload->data();
    // $filename = $file['file_name'];

    $data = array(
    'com_no' => $this->input->post('com_no'),
    'caption' => $this->input->post('caption'),
    'keyword' => $this->input->post('keyword'),
    'remarks' => $this->input->post('remarks'),
    'date_ai' => $this->input->post('date_ai'),
    'date_received' => $this->input->post('date_received'),
    'time_received' => $this->input->post('time_received'),
    //'com' => $this->input->post('com'),
    'file' => $cr,
    'prfile' => $pr,
    'pofile' => $po,
    'pafile' => $pa,
    'purpose' => $this->input->post('purpose'),
    'com_cat' => $this->input->post('com_cat'),
    'com_date' => $this->input->post('com_date'),
    'urgent' => $this->input->post('urgent')
    ); 

    return $this->db->insert('communication', $data);
    
}
public function update_communication(){

    $id = $this->input->post('id'); 

    $data = array(
        'com_no' => $this->input->post('com_no'),
        'caption' => $this->input->post('caption'),
        'keyword' => $this->input->post('keyword'),
        'remarks' => $this->input->post('remarks'),
        'date_ai' => $this->input->post('date_ai'),
        'date_received' => $this->input->post('date_received'),  
        'time_received' => $this->input->post('time_received'),
        'com' => $this->input->post('com'),
        'purpose' => $this->input->post('purpose'),
        'com_cat' => $this->input->post('com_cat'),
        'com_date' => $this->input->post('com_date'),
        'urgent' => $this->input->post('urgent')
        ); 
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('communication', $data);
    return $result;
}

public function insert_ordinance(){

    $file = $this->upload->data();
    $filename = $file['file_name'];

    if($this->input->post('coAuthor') != ""){
        $coa = implode(",",$this->input->post('coAuthor'));
    }else{
        $coa = $this->input->post('coAuthor');
    }

    if($this->input->post('coSponsor') != ""){
        $cos = implode(",",$this->input->post('coSponsor'));
    }else{
        $cos = $this->input->post('coSponsor');
    }

    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');

    $data = array(
    'OrdinanceNo' => $this->input->post('OrdinanceNo'),
    'Category' => $this->input->post('Category'),
    'Title' => $this->input->post('Title'),
    'Author' => implode(",",$this->input->post('Author')),
    'coAuthor' => $coa,
    'Sponsor' => implode(",",$this->input->post('Sponsor')),
    'coSponsor' => $cos,
    'DocLink' => $filename,
    'FirstReading' => $this->input->post('FirstReading'),
    'FirstReadingRemarks' => $this->input->post('FirstReadingRemarks'),
    'SecondReading' => $this->input->post('SecondReading'),
    'SecondReadingRemarks' => $this->input->post('SecondReadingRemarks'),
    'ThirdReading' => $this->input->post('ThirdReading'),
    'ThirdReadingRemarks' => $this->input->post('ThirdReadingRemarks'),
    'enactment_date' => $this->input->post('enactment_date'),
    'enactment_remarks' => $this->input->post('enactment_remarks'),
    'SignedDate' => $this->input->post('SignedDate'),
    'SignedRemarks' => $this->input->post('SignedRemarks'),
    'Effectivity' => $this->input->post('Effectivity'),
    'FileLocation' => $this->input->post('FileLocation'),
    'Remarks' => $this->input->post('Remarks'),
    'type' => $this->input->post('type'),
    'saved_date' => $date,
    'user_id' => $this->session->id
    ); 

    return $this->db->insert('ordinances', $data);
    
}
public function ordinance_update(){

    $id = $this->input->post('id'); 

    $data = array(
        'OrdinanceNo' => $this->input->post('OrdinanceNo'),
        'Category' => $this->input->post('Category'),
        'Title' => $this->input->post('Title'),
        'Author' => implode(",",$this->input->post('Author')),
        'coAuthor' => implode(",",$this->input->post('coAuthor')),
        'Sponsor' => implode(",",$this->input->post('Sponsor')),
        'coSponsor' => implode(",",$this->input->post('coSponsor')),
        'DocLink' => $filename,
        'FirstReading' => $this->input->post('FirstReading'),
        'FirstReadingRemarks' => $this->input->post('FirstReadingRemarks'),
        'SecondReading' => $this->input->post('SecondReading'),
        'SecondReadingRemarks' => $this->input->post('SecondReadingRemarks'),
        'ThirdReading' => $this->input->post('ThirdReading'),
        'ThirdReadingRemarks' => $this->input->post('ThirdReadingRemarks'),
        'enactment_date' => $this->input->post('enactment_date'),
        'enactment_remarks' => $this->input->post('enactment_remarks'),
        'SignedDate' => $this->input->post('SignedDate'),
        'SignedRemarks' => $this->input->post('SignedRemarks'),
        'Effectivity' => $this->input->post('Effectivity'),
        'FileLocation' => $this->input->post('FileLocation'),
        'Remarks' => $this->input->post('Remarks'),
        'type' => $this->input->post('type')
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('ordinances', $data);
    return $result;
}
public function insert_res(){

    $file = $this->upload->data();
    $filename = $file['file_name'];

    

    if($this->input->post('coAuthor') != ""){
        $coa = implode(",",$this->input->post('coAuthor'));
    }else{
        $coa = $this->input->post('coAuthor');
    }

    if($this->input->post('coSponsor') != ""){
        $cos = implode(",",$this->input->post('coSponsor'));
    }else{
        $cos = $this->input->post('coSponsor');
    }

    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');

    $data = array(
    'ResolutionNo' => $this->input->post('ResolutionNo'),
    'Category' => $this->input->post('Category'),
    'Title' => $this->input->post('Title'),
    'Author' => implode(",",$this->input->post('Author')),
    'coAuthor' => $coa,
    'Sponsor' => implode(",",$this->input->post('Sponsor')),
    'coSponsor' => $cos,
    'DocLink' => $filename,
    'FirstReading' => $this->input->post('FirstReading'),
    'FirstReadingRemarks' => $this->input->post('FirstReadingRemarks'),
    'SecondReading' => $this->input->post('SecondReading'),
    'SecondReadingRemarks' => $this->input->post('SecondReadingRemarks'),
    'ThirdReading' => $this->input->post('ThirdReading'),
    'ThirdReadingRemarks' => $this->input->post('ThirdReadingRemarks'),
    'enactment_date' => $this->input->post('enactment_date'),
    'enactment_remarks' => $this->input->post('enactment_remarks'),
    'SignedDate' => $this->input->post('SignedDate'),
    'SignedRemarks' => $this->input->post('SignedRemarks'),
    'Effectivity' => $this->input->post('Effectivity'),
    'FileLocation' => $this->input->post('FileLocation'),
    'Remarks' => $this->input->post('Remarks'),
    'saved_date' => $date,
    'user_id' => $this->session->id
    ); 

    return $this->db->insert('resolutions', $data);
    
}
public function res_update(){

    $id = $this->input->post('id'); 

    $data = array(
        'ResolutionNo' => $this->input->post('ResolutionNo'),
        'Category' => $this->input->post('Category'),
        'Title' => $this->input->post('Title'),
        'Author' => implode(",",$this->input->post('Author')),
        'coAuthor' => implode(",",$this->input->post('coAuthor')),
        'Sponsor' => implode(",",$this->input->post('Sponsor')),
        'coSponsor' => implode(",",$this->input->post('coSponsor')),
        'FirstReading' => $this->input->post('FirstReading'),
        'FirstReadingRemarks' => $this->input->post('FirstReadingRemarks'),
        'SecondReading' => $this->input->post('SecondReading'),
        'SecondReadingRemarks' => $this->input->post('SecondReadingRemarks'),
        'ThirdReading' => $this->input->post('ThirdReading'),
        'ThirdReadingRemarks' => $this->input->post('ThirdReadingRemarks'),
        'enactment_date' => $this->input->post('enactment_date'),
        'enactment_remarks' => $this->input->post('enactment_remarks'),
        'SignedDate' => $this->input->post('SignedDate'),
        'SignedRemarks' => $this->input->post('SignedRemarks'),
        'Effectivity' => $this->input->post('Effectivity'),
        'FileLocation' => $this->input->post('FileLocation'),
        'Remarks' => $this->input->post('Remarks')
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('resolutions', $data);
    return $result;
}


public function insert_user(){

    $password = $this->input->post('Password');
    $hash = password_hash($password, PASSWORD_DEFAULT);

//     //date in mm/dd/yyyy format; or it can be in other formats as well
//   $birthDate = $this->input->post('bday');
//   //explode the date to get month, day and year
//   $birthDate = explode("/", $birthDate);
//   //get age from date or birthdate
//   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
//     ? ((date("Y") - $birthDate[0]) - 1)
//     : (date("Y") - $birthDate[0]));

   
    
    $data = array(
    'username' => $this->input->post('Username'),
    'password' => $hash,
    'position' => $this->input->post('Position'),
    'office' => $this->input->post('office'),
    'fname' => $this->input->post('fname'),
    'mname' => $this->input->post('mname'),
    'lname' => $this->input->post('lname'),
    'age' => "",
    'address' => $this->input->post('address'),
    'sex' => $this->input->post('sex'),
    'image' => "",
    'bday' => $this->input->post('bday')
    ); 

    return $this->db->insert('users', $data);
    
}
public function update_user(){

    $id = $this->input->post('id'); 
    //date in mm/dd/yyyy format; or it can be in other formats as well
    $birthDate = $this->input->post('bday');
    //explode the date to get month, day and year
    $birthDate = explode("/", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));

    $data = array(
    'position' => $this->input->post('position'),
    'office' => $this->input->post('office'),
    'fname' => $this->input->post('fname'),
    'mname' => $this->input->post('mname'),
    'lname' => $this->input->post('lname'),
    'age' => $age,
    'address' => $this->input->post('address'),
    'sex' => $this->input->post('sex'),
    'bday' => $this->input->post('bday')
    );

    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}


public function login(){

    $password = $this->input->post('password');
    
    $this->db->where('username', $this->input->post('username', true));
    $this->db->where('status', 0);
    //$this->db->where('Password', $this->input->post('Password', true));
    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      
        $data = $result->row(); 

       if (password_verify($password, $data->password)) {
            return $result->row_array();
       }

       // return $result->row_array();
        
    }else{
        return false;
    }

}
public function lock_screen(){

    $password = $this->input->post('password');
    
    $this->db->where('username', $this->session->username);
    $this->db->where('status', 0);
    //$this->db->where('Password', $this->input->post('Password', true));
    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      
        $data = $result->row(); 

       if (password_verify($password, $data->password)) {
            return $result->row_array();
       }

       // return $result->row_array();
        
    }else{
        return false;
    }

}

public function update_ordinance_file(){

    $id = $this->input->post('id'); 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'DocLink' => $filename
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('ordinances', $data);
    return $result;
}

public function update_doc_file(){

    $id = $this->input->post('id'); 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'file' => $filename
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('documents', $data);
    return $result;
}

public function insert_doc(){
 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'name' => $this->input->post('name'), 
        'doc_cat' => $this->input->post('doc_cat'),
        'file' => $filename,
        'date' => $this->input->post('date'),
        'receive_by' => $this->input->post('receive_by'),
        'sub_by' => $this->input->post('sub_by'),
        'address' => $this->input->post('address'),
        'contact' => $this->input->post('contact'),
        'remarks' => $this->input->post('remarks'),
        'office' => $this->input->post('office')
        );
        
  
    return $this->db->insert('documents', $data);
}
public function process_doc(){

    $data = array(
        'doc_code' => $this->input->post('name'), 
        'date' => $this->input->post('date'), 
        'process_by' => $this->input->post('receive_by'), 
        'doc_status' => $this->input->post('status'), 
        'office' => $this->input->post('office'), 
        'remarks' => $this->input->post('remarks')
        );
        
  
    return $this->db->insert('doc_process', $data);
}


public function update_user_image(){

    $id = $this->input->post('id'); 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'image' => $filename
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('users', $data);
    return $result;
}

public function upload_member_settings(){

    $id = $this->input->post('id'); 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'FirstName' => $this->input->post('FirstName'), 
        'MiddleName' => $this->input->post('MiddleName'), 
        'LastName' => $this->input->post('LastName'),
        'Address' => $this->input->post('Address'),
        'image' => $filename
        );
        
    $this->db->where('memberID', $id);
    $result = $this->db->update('members', $data);
    return $result;
}

public function update_res_file_attach(){

    $id = $this->input->post('id'); 
    $file = $this->upload->data();
    $filename = $file['file_name'];

    $data = array(
        'DocLink' => $filename
        );
        
  
    $this->db->where('id', $id);
    $result = $this->db->update('resolutions', $data);
    return $result;
}

public function check_exist($table,$col,$val,$col2,$val2){
    $result = $this->db->where($col2,$val2);
    $result = $this->db->or_where($col,$val);
    $result = $this->db->get($table);
    return $result;
}

public function two_where_check_exist($table,$col,$val,$col2,$val2,$col3,$val3){
    $result = $this->db->where($col3,$val3);
    $result = $this->db->where($col2,$val2);
    $result = $this->db->or_where($col,$val);
    $result = $this->db->get($table);
    return $result;
}

public function one_where_check_exist($table,$col,$val){
    $result = $this->db->where($col,$val);
    $result = $this->db->get($table);
    return $result;
}







// common functions loop

public function no_cond_loop($table){
    $query = $this->db->get($table);
    return $query->result();
}

public function one_cond_loop($table,$col,$val){
    $this->db->where($col, $val);
    $query = $this->db->get($table);
    return $query->result();
}

public function two_cond_loop($table,$col,$val,$col2,$val2){
    $this->db->where($col, $val);
    $this->db->where($col2, $val2);
    $query = $this->db->get($table);
    return $query->result();
}

public function one_cond_loop_order_by($table,$col,$val,$orderby,$orderbyvalue){
    $this->db->where($col, $val);
    $this->db->order_by($orderby, $orderbyvalue);
    $query = $this->db->get($table);
    return $query->result();
}

public function total_document_per_day($table,$select,$col,$val,$groupby){ 
    $this->db->select($select); 
    $this->db->where($col, $val);
    $this->db->where('status', 0);
    $this->db->group_by($groupby);
    $query = $this->db->get($table);
    return $query->result();
}

// common function single row
public function one_cond($table, $col, $val){
    $this->db->where($col, $val);
    $result = $this->db->get($table)->row();
    return $result;
}


// common function single row
public function one_cond_row($table, $col, $val){
    $this->db->where($col, $val);
    $result = $this->db->get($table)->row();
    return $result;
}

public function close_communication(){

    $data = array(
    'status' => 1
    ); 

    $this->db->where('id', $this->uri->segment(3));
    return $this->db->update('communication', $data);
    
}

public function open_communication(){

    $data = array(
    'status' => 0
    ); 

    $this->db->where('id', $this->uri->segment(3));
    return $this->db->update('communication', $data);
    
}








}

