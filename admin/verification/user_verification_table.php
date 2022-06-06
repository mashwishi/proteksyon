<?php
if($total_data > 0)
{
  foreach($result as $row)
  {
    if($row["user_verification"] === '1'){

        if($row["user_status"]  === '0'){
            $output .= '
            <tr>
              <td>
                <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
                '.$row["user_first_name"].' '.$row["user_last_name"].'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
              </td>
              <td>'.$row["user_email"].'</td>
              <td>'.$row["user_contactno"].'</td>
              <td><i class="fas fa-hourglass-end" style="color: #C4A90F" alt="processing"></i></td>
              <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
            </tr>
            ';
        }elseif($row["user_status"]  === '1'){
          $output .= '
          <tr>
            <td>
              <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
              '.$row["user_first_name"].' '.$row["user_last_name"].'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
            </td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["user_contactno"].'</td>
            <td><i class="fas fa-check" style="color: #0B8507" alt="approved"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>
              <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
              '.$row["user_first_name"].' '.$row["user_last_name"].'<i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
            </td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["user_contactno"].'</td>
            <td><i class="fas fa-times" style="color: #BD001C" alt="banned"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
          </tr>
          ';
        }

    }else{
          if($row["user_status"]  === '0'){
            $output .= '
            <tr>
              <td>
                <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
                '.$row["user_first_name"].' '.$row["user_last_name"].'
              </td>
              <td>'.$row["user_email"].'</td>
              <td>'.$row["user_contactno"].'</td>
              <td><i class="fas fa-hourglass-end" style="color: #C4A90F" alt="processing"></i></td>
              <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
            </tr>
            ';
        }elseif($row["user_status"]  === '1'){
          $output .= '
          <tr>
            <td>
              <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
              '.$row["user_first_name"].' '.$row["user_last_name"].'
            </td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["user_contactno"].'</td>
            <td><i class="fas fa-check" style="color: #0B8507" alt="approved"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>
              <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="'.$row["user_first_name"].'-avatar">	
              '.$row["user_first_name"].' '.$row["user_last_name"].'
            </td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["user_contactno"].'</td>
            <td><i class="fas fa-times" style="color: #BD001C" alt="banned"></i></td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/verification/modify?UUID='. $row['user_uuid'] .'">Review</a></td>
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