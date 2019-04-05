<?php


try {
  $key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0ZXN0dGVzdEBnbWFpbC5jb20iLCJqdGkiOiI1OWU5OTM5OC0xNjUxLTRhYzgtOWZlOC04ZjI3NDVlMmJlMjkiLCJpYXQiOjE1NTQzNzQxMjYsInJvbCI6ImFwaV9hY2Nlc3MiLCJpZCI6ImE1MWQ0N2IxLThkNzMtNDJhMC04MDkyLTZjZjUzZTg5ZTU4OSIsIm5iZiI6MTU1NDM3NDEyNiwiZXhwIjoxNTYyMTUwMTI2LCJpc3MiOiJ3ZWJBcGkiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjUwMDAvIn0.TRq_HMPW50bhzGR-tApJpGCPjRfp7k_y9GHZ2wu0Hsg';
  $url = 'http://3.89.238.68:5000/ws/v1/Avatars/Latest';

}
catch(Exception $e) {
	error_log($e->getMessage());
	die("Connection error to API");
}


?>