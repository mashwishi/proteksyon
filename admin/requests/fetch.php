<?php
error_reporting(0);
session_start();

include '../../pdo_conn.php';

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '10';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT 
    request_tb.request_id, 
    users_tb.user_first_name,
    users_tb.user_last_name,
    users_tb.user_email,
    request_tb.request_status, 
    request_tb.date
FROM users_tb
INNER JOIN request_tb
ON request_tb.user_id = users_tb.user_id
";

if($_POST['query'] != '')
{
  $query .= '
 WHERE request_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY request_id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '

  <div id="list_users">
  <div class="card-header" style="margin-bottom: 15px">
  <label><strong>Total Requests</strong> - '.$total_data.'</label>
  </div>
  
  <table>
	  <thead>
		  <tr>
        <th>Request ID</th>
        <th>Status</th>
			  <th>Name</th>
        <th>Email</th>
			  <th>Date</th>
			  <th>Option</th>
		  </tr>
	  </thead>
	  <tbody>
';

    //Type Status
    $status = '0'; //pending
    $verified = '1'; //approve
    $ban = '2'; //banned  <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($arow["user_avatar"]) .'" alt="avatar"/>  

if($total_data > 0)
{
  foreach($result as $row)
  {
          if($row["request_status"]  === '1'){
            $output .= '
            <tr>
              <td>'.$row["request_id"].'</td>
              <td><i class="fas fa-check" style="color: #0B8507" alt="approved"></i></td>
              <td>'.$row["user_first_name"].' ' .$row["user_last_name"].'</td>
              <td>'.$row["user_email"].'</td>
              <td>'.$row["date"].'</td>
              <td><a class="status completed" style="background-color: #808080 !important; border: none; outline: none;">Applied</a></td>
            </tr>
            ';
        }elseif($row["request_status"]  === '0'){
          $output .= '
          <tr>
            <td>'.$row["request_id"].'</td>
            <td><i class="fas fa-hourglass-end" style="color: #C4A90F" alt="processing"></i></td>
            <td>'.$row["user_first_name"].' ' .$row["user_last_name"].'</td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["date"].'</td>
            <td><a class="status completed" style="border: none; outline: none;" href="/admin/requests/requestData?RequestID='. $row['request_id'] .'">Review</a></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>'.$row["request_id"].'</td>
            <td><i class="fas fa-times" style="color: #BD001C" alt="unknown"></i></td>
            <td>'.$row["user_first_name"].' ' .$row["user_last_name"].'</td>
            <td>'.$row["user_email"].'</td>
            <td>'.$row["date"].'</td>
            <td></td>
          </tr>
          ';
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

$output .= '
</tbody>
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
