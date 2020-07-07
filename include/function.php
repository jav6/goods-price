<?php
function check_access($session_true, $session_false, $session_not_set){
    session_start();
    if (isset($_SESSION["admin"])) {
        $sql_query_check_token = "SELECT token from user WHERE token = '{$_SESSION["admin"]}';";
        $sql_qu_tok_result = mysqli_query($db_con, $sql_query_check_token);
        $sql_qu_tok_result_num = mysqli_num_rows($sql_qu_tok_result);
        if ($sql_qu_tok_result_num > 0) {
            while ($row = mysqli_fetch_assoc($sql_qu_tok_result)) {
                if ($row["token"] === $_SESSION["admin"]) {
                    echo $session_true;
                    return $is_admin = true;
                } else {
                    return $is_admin = null;
                }
            }
        }
    } else {
        return $is_admin = null;
    }
}
?>