<?php


try {
  $key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huLmRvZUB0ZXN0LmFxcXJ1LmNvbSIsImp0aSI6IjkxN2FhMGVmLWI1ZjktNGY4NS1hOWMxLWExZTdkY2E3ZmNiZCIsImlhdCI6MTU1MzY4ODMxMCwicm9sIjoiYXBpX2FjY2VzcyIsImlkIjoiNjIwNzdlNmMtM2Y1Yi00MGE0LTk3YjAtNjVhM2NmZTgxZjY4IiwibmJmIjoxNTUzNjg4MzEwLCJleHAiOjE1NjE0NjQzMTAsImlzcyI6IndlYkFwaSIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6NTAwMC8ifQ.dU2cdBD9LOU_7sWbgWvUaqXnZ5SvGEyzwrUIx5gozJ0';
  $url = 'http://3.89.238.68:5000/ws/v1/Avatars/Latest';

}
catch(Exception $e) {
	error_log($e->getMessage());
	die("Connection error to API");
}


?>