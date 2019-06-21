<?php


try {
  $key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJUc29nb2xha3lhbjEzOEBnbWFpbC5jb20iLCJqdGkiOiIwZTlkNWI2Mi1kNjE3LTRjY2QtOGMzOS1jZjY3NDQ1ZDVhZTEiLCJpYXQiOjE1NjExMTU0MjMsInJvbCI6ImFwaV9hY2Nlc3MiLCJpZCI6IjQwYmZlNGU4LTljYmYtNDllZC1hMWM2LWMxNDBiNWE5Y2Q0NiIsImNsaWVudGlkIjoiODJlZTgzNDAtZjIxNi00ZmQ3LTE4MmUtMDhkNjljMjEzZTc1IiwibmJmIjoxNTYxMTE1NDIzLCJleHAiOjE1NjExMjI2MjMsImlzcyI6IndlYkFwaSIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6MTIzNDUvIn0.LPNiOjyEIxiwO1GpnKdup0fuc5pF4b-XfCvL3eWfgLs';
  $url = 'http://3.89.238.68:8100/ws/v2/Avatars/GetLatestFullAvatar';

}
catch(Exception $e) {
  error_log($e->getMessage());
  die("Connection error to API");
}


?>