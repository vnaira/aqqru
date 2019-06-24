<?php


try {
  $key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJUc29nb2xha3lhbjEzOEBnbWFpbC5jb20iLCJqdGkiOiI0ZTYxNzIxNS02MmRiLTRlYTMtOTU1MS1kZDliOGU5MjUxOTEiLCJpYXQiOjE1NjEzNzQ2NDAsInJvbCI6ImFwaV9hY2Nlc3MiLCJpZCI6IjQwYmZlNGU4LTljYmYtNDllZC1hMWM2LWMxNDBiNWE5Y2Q0NiIsImNsaWVudGlkIjoiODJlZTgzNDAtZjIxNi00ZmQ3LTE4MmUtMDhkNjljMjEzZTc1IiwibmJmIjoxNTYxMzc0NjQwLCJleHAiOjE1NjEzODE4NDAsImlzcyI6IndlYkFwaSIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6MTIzNDUvIn0.wEv1beMYEQcra3aoEgADJiK9F3qIatG0syt6AWJh30I';
  $url = 'http://3.89.238.68:8100/ws/v2/Avatars/GetLatestFullAvatar';

}
catch(Exception $e) {
  error_log($e->getMessage());
  die("Connection error to API");
}


?>