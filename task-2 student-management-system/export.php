<?php  
//export.php  
include 'config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>S.NO</th>  
                         <th>Student AU ID</th>  
                         <th>Name</th>  
                         <th>Department</th>  
                         <th>Semester</th>  
                         <th>Aadhar No.</th>
                         <th>Gender</th>  
                         <th>DOB</th>
                         <th>Email Id</th>  
                         <th>Mobile No.</th> 
                         <th>Address</th>     
                         <th>Issue Date:</th>

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>  
                         <td>'.$row["u_f_name"]  .$row["u_l_name"].'</td>  
                         <td>'.$row["u_dept"].'</td>  
                         <td>'.$row["u_sem"].'</td>  
                         <td>'.$row["u_aadhar"].'</td>  
                         <td>'.$row["u_gender"].'</td> 
                         <td>'.$row["u_birthday"].'</td>  
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td> 
                         <td>'.$row["u_village"] .$row["u_dist"] .$row["u_state"] .$row["u_pincode"].'</td>  
                        <td>'.$row["uploaded"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=codingranjith-admin.xls');
  echo $output;
 }
}
?>