<?php

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "ols";


try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 echo $e->getMessage();
}

include_once 'class.crud.php';

$crud = new crud($DB_con);

?>
<?php

class crud
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 
 public function create($uname,$temail,$emailaddr,$contact)
 {
/*try
  {
   $stmt = $this->db->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,contact_no) VALUES(:fname, :lname, :email, :contact)");
   $stmt->bindparam(":userName",$fname);
   $stmt->bindparam(":userEmail",$lname);
   $stmt->bindparam(":userStatus",$email);
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  } */
  
 }
 
 public function getID($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE userID=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }

 public function update($table, array $array, $id)
 {
   
   $sql = "UPDATE {$table} SET";
   $values= array();
   foreach($array as $field => $value) {
      $sql .= " {$field} = :{$field},";
      $values[':'.$field] = $value;
   }

   $sql = substr($sql, 0, -1). " WHERE userID = {$id};";
   $stmt = $this->db->prepare($sql);
   $stmt->execute($values);
/*try
  {
   $stmt=$this->db->prepare("UPDATE tbl_users SET userName=:fname, last_name=:lname, email_id=:email, contact_no=:contact WHERE id=:id ");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->bindparam(":id",$id);
   $stmt->execute();
   
   return true; 
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }*/
 }
 
 public function delete($table, array $criterion)
 {

  if(count($criterion) > 1) {
    return false;
  } 

  $query = "DELETE FROM {$table}";
  foreach($criterion as $key => $value) {
    $field = $key;
    $bindkey = ':'.$key;
    $id = $value;
    $query .= " WHERE {$field} = {$bindkey};";
  }

  $stmt = $this->db->prepare($query);
  $stmt->bindparam($bindkey,$id);
  $stmt->execute();
  return true;
 }
 
 /* paging */
 
 public function dataview($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
  $no=1;
  $json = array();
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))  
   {
     $json[$row['userID']] = json_encode($row);
    ?>
                <tr>
                <td class="text-center"><?php echo $no;?></td>
                <td><?php print($row['userName']); ?></td>
                <td><?php print($row['userEmail']); ?></td>
                <td><?php print($row['userStatus']); ?></td>
                <td><?php print($row['role_role_id']); ?></td>
                <td align="center">                  
                 <a href="#" onclick="edit(this)" class="edit_user" data-user='<?= $json[$row['userID']]; ?>' data-toggle="modal" data-target="#edit">
                  <i class="fa fa-edit big"></i></a>
                </td>
               <td align="center">
                  <a href="#" onclick="del(this)" data-userid="<?= $row['userID']; ?>" data-toggle="modal" data-target="#delete">
                  <i class="fa fa-trash big red"></i></a>
               </td> 
                </tr>
                <?php
                $no++; //print_r($json[$row['userID']]);
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }

 public function fetchAll($table) {
  $ret = [];
  $stmt = $this->db->prepare("SELECT * FROM {$table};");
  $stmt->execute();
  if($stmt->rowCount() > 0) {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
      $ret[] = $row;
    }

    return $ret;
  }

  return false;
 }
 
 public function dataViewRole($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
  $no=1;
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                <td><?php echo $no;?></td>
                <td><?php print($row['role_rolecode']); ?></td>
                <td><?php print($row['role_rolename']); ?></td>
                <td align="center">
                 <a href="edit-data.php?edit_id=<?php print($row['role_rolecode']); ?>">
                  <i class="fa fa-edit"></i></a>
                </td>
               <td align="center">
                  <a href="delete.php?delete_id=<?php print($row['role_rolecode']); ?>">
                  <i class="fa fa-trash"></i></a>
               </td> 
                </tr>
                <?php
                $no++;
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }
 
 public function paging($query,$records_per_page)
 {
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
  }
  $query2=$query." limit $starting_position,$records_per_page";
  return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1'>First</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
   }
   ?></ul><?php
  }
 }
 
 /* paging */
 
}
