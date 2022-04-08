<?php
error_reporting(0);
session_start();

	$database_username = 'root';
	$database_password = '';
	$connect = new PDO( 'mysql:host=localhost;dbname=proteksyon', $database_username, $database_password );

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
SELECT provider_tb.provider_id, provider_tb.provider_name, provider_tb.provider_image, provider_tb.provider_email, provider_tb.provider_contactno, status_tb.status_info
FROM provider_tb
INNER JOIN status_tb
ON provider_tb.provider_id = status_tb.provider_id
";

if($_POST['query'] != '')
{
  $query .= '
 WHERE provider_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY provider_id ASC ';

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
  <label><strong>Total Providers</strong> - '.$total_data.'</label>
  </div>
  
  <table>
	  <thead>
		  <tr>
			  <th>Provider Name</th>
			  <th>Email</th>
			  <th>Contact No.</th>
			  <th>Status</th>
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
          if($row["status_info"]  === 'Open'){
            $output .= '
            <tr>
              <td>
                <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($row["provider_image"]) .'" alt="provider_image"/>  
                '.$row["provider_name"].'
              </td>
              <td>'.$row["provider_email"].'</td>
              <td>'.$row["provider_contactno"].'</td>
              <td><i class="fas fa-store-alt" style="color: #0B8507" alt="open"></i></td>
              <td></td>
            </tr>
            ';
        }elseif($row["status_info"]  === 'Closed'){
          $output .= '
          <tr>
            <td>
            <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($row["provider_image"]) .'" alt="provider_image"/>  
            '.$row["provider_name"].'
            </td>
            <td>'.$row["provider_email"].'</td>
            <td>'.$row["provider_contactno"].'</td>
            <td><i class="fas fa-store-alt-slash"" style="color: #BD001C " alt="closed"></i></td>
            <td></td>
          </tr>
          ';
        }else{
          $output .= '
          <tr>
            <td>
            <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($row["provider_image"]) .'" alt="provider_image"/>  
            '.$row["provider_name"].'
            </td>
            <td>'.$row["provider_email"].'</td>
            <td>'.$row["provider_contactno"].'</td>
            <td><i class="fas fa-construction" style="color: #C4A90F" alt="unknown"></i></td>
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
