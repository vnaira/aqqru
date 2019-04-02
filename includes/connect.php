<?php


try {
  $key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0c29nb2xha3lhbjEzOEBnbWFpbC5jb20iLCJqdGkiOiJmMjA0NjA5ZS0zZjA3LTQxMDgtYjY5Yy02ODY4NTE0MjY4NzUiLCJpYXQiOjE1NTM3NjA0MDcsInJvbCI6ImFwaV9hY2Nlc3MiLCJpZCI6IjQwYmZlNGU4LTljYmYtNDllZC1hMWM2LWMxNDBiNWE5Y2Q0NiIsIm5iZiI6MTU1Mzc2MDQwNywiZXhwIjoxNTYxNTM2NDA3LCJpc3MiOiJ3ZWJBcGkiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjUwMDAvIn0.AqjQSPE_gQOM3qStGNvO16ESQHOv3CMTRrcZNn_dG5M';
  $url = 'http://3.89.238.68:5000/ws/v1/Avatars/Latest';

}
catch(Exception $e) {
	error_log($e->getMessage());
	die("Connection error to API");
}


?>