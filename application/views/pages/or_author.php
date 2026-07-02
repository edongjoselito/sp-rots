<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <title>Resolutions and Ordinance Tracking System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">
        
        <link href="<?= base_url(); ?>assets/css/my-style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="formWrap">
    <div class="inner">
        <a href="<?= base_url(); ?>">Dashboard</a>   
        <?= form_open('orauthor'); ?>
            <select id="inputCategory" required name="Author" class="form-control">
                <?php 
                    $author = $this->session->flashdata('author');
                    foreach($member as $row){
                    $p = $row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName'];     
                    echo "<option value='{$p}' ";
                    if($author == $p){echo " selected ";}
                    echo ">{$p}</option>\n";
                }?>
            </select>
            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>

    <?php  if(!empty($_REQUEST)){ 
        
        if (count($page) != 0) {
 
        ?>
        <div class="wrap">
            <p>Author : <?= $author; ?></p>
            <p>Total Authored Ordinances: <?= $a_count->num_rows(); ?></p>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>Ordinances No.</th>
                    <th>Title</th>
                    <th>Category</th>
                </tr>
                <?php 
                foreach($page as $row){
                ?>
                <tr>
                    <td><?= $row['OrdinanceNo']; ?></td>
                    <td><?= wordwrap($row['Title'],80,"<br>\n"); ?></td>
                    <td><?= $row['Category']; ?></td>
                </tr>
                <?php } ?>    
                </table>

                <div class="rLeft">
                    <p>Summary Per Category</p>
                    <ul>
                    <?php foreach($cat as $row){ ?>
                        <li><?= $row['Category']; ?> : <?= $row['cat']; ?> </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="rRight">
                    <p>Summary Per Year</p>
                    <ul>
                    <?php foreach($year as $row){ ?>
                        <li><?= $row['ef']; ?> : <?= $row['year']; ?> </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
    <?php }else{echo "<p>no record found.</p>";} } ?>


    
</body>
</html>