<?php
function check_session($sess_rec){
	//select token id form database
	$sql_query_check_token = "SELECT token from user WHERE token = '{$sess_rec}';";
	//get result - $sql_query_check_token
	global $db_con;
	$sql_qu_tok_result = mysqli_query($db_con, $sql_query_check_token);
	$sql_qu_tok_result_num = mysqli_num_rows($sql_qu_tok_result);
	//if is set token for session :
	if ($sql_qu_tok_result_num > 0){
		while ($row = mysqli_fetch_assoc($sql_qu_tok_result)){
			if ($row["token"] === $sess_rec){
				global $is_admin;
				return $is_admin = true;
				break;
			}
		}
	}
}

function create_token(){
	//encrypt session - for aut token
	$str_source = "qa69zw13sxedcrfv2t4gbyhn5ujm78ikolp0";
    $str_result = "@UT-";
    $str_lenght = strlen($str_result);

    while ($str_lenght <= 10){
    	$number = rand(1, 36);
		$str_result .= substr($str_source, $number, 1);
		$str_lenght = strlen($str_result);

		if ($str_lenght == 10){
			global $str_last_result;
			return $str_last_result = $str_result;
			break;
		}
	}
}
?>