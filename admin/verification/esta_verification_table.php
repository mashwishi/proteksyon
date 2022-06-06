<?php
if($total_data > 0)
{
  foreach($result as $row)
  {
    if($row["verified"] === '1'){

        if($row["approved"]  === '0'){
            $output .= '
            <tr>
              <td>
                <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
                '.$row["establishment_name"] .'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
              </td>
              <td>'. $row['establishment_email'] .'</td>
              <td>'. $row['establishment_contactno'] .'</td>
              <td><i class="fas fa-hourglass-end" style="color: #C4A90F" alt="processing"></i></td>
              <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
            </tr>
            ';
        }elseif($row["approved"]  === '1'){
          $output .= '
          <tr>
            <td>
              <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
              '.$row["establishment_name"] .'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
            </td>
            <td>'. $row['establishment_email'] .'</td>
            <td>'. $row['establishment_contactno'] .'</td>
            <td><i class="fas fa-check" style="color: #0B8507" alt="approved"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>
              <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
              '.$row["establishment_name"] .'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
            </td>
            <td>'. $row['establishment_email'] .'</td>
            <td>'. $row['establishment_contactno'] .'</td>
            <td><i class="fas fa-times" style="color: #BD001C" alt="banned"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
          </tr>
          ';
        }

    }else{
          if($row["approved"]  === '0'){
            $output .= '
            <tr>
              <td>
                <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
                '.$row["establishment_name"] .'
              </td>
              <td>'. $row['establishment_email'] .'</td>
              <td>'. $row['establishment_contactno'] .'</td>
              <td><i class="fas fa-hourglass-end" style="color: #C4A90F" alt="processing"></i></td>
              <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
            </tr>
            ';
        }elseif($row["approved"]  === '1'){
          $output .= '
          <tr>
            <td>
              <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
              '.$row["establishment_name"] .'
            </td>
            <td>'. $row['establishment_email'] .'</td>
            <td>'. $row['establishment_contactno'] .'</td>
            <td><i class="fas fa-check" style="color: #0B8507" alt="approved"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>
              <img src="../../establishment/establishment_data/avatar/'.$row["establishment_image"].'" alt="'.$row["establishment_name"].'-avatar">	
              '.$row["establishment_name"] .'
            </td>
            <td>'. $row['establishment_email'] .'</td>
            <td>'. $row['establishment_contactno'] .'</td>
            <td><i class="fas fa-times" style="color: #BD001C" alt="banned"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['establishment_uuid'] .'">Review</a></td>
          </tr>
          ';
        }
    }

  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}
?>