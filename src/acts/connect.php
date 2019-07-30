<?php
ob_start();
if (!isset($_SESSION)) session_start(); 

// ########################################
// ######## VARIAVEIS DE AMBIENTE #########
// ########################################

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

//require_once("acts/errorhandling.php");

// ########################################
// ############ CONN DATABASE #############
// ########################################

// DEV
$conn = new mysqli("localhost", "root", "root", "ionita");

// PRD
//$conn = new mysqli("workncs.mysql.dbaas.com.br", "workncs", "Hoxhbn4657", "workncs");

if ($conn->connect_errno) {
    die("00000 - Failed to connect to MySQL: [$conn->connect_errno] $conn->connect_error");
}


	

	// ########################################
	// ############## COOKIES #################
	// ########################################

	if(!isset($_SESSION["usu_id"]) || empty($_SESSION["usu_id"])) {
		if(isset($_COOKIE['usu_id']) && !empty($_COOKIE['usu_id'])) {
			$_SESSION["usu_id"] = $_COOKIE['usu_id'];
		}
	}	

	if(!isset($_SESSION["usu_login"]) || empty($_SESSION["usu_login"])) {
		if(isset($_COOKIE['usu_login']) && !empty($_COOKIE['usu_login'])) {
			$_SESSION["usu_login"] = $_COOKIE['usu_login'];
		}
	}

	if(!isset($_SESSION["usu_nome"]) || empty($_SESSION["usu_nome"])) {
		if(isset($_COOKIE['usu_nome']) && !empty($_COOKIE['usu_nome'])) {
			$_SESSION["usu_nome"] = $_COOKIE['usu_nome'];
		}
	}

	if(!isset($_SESSION["usu_nivel"]) || empty($_SESSION["usu_nivel"])) {
		if(isset($_COOKIE['usu_nivel']) && !empty($_COOKIE['usu_nivel'])) {
			$_SESSION["usu_nivel"] = $_COOKIE['usu_nivel'];
		}
	}
	

	// ########################################
	// ############# FUNCTIONS ################
	// ########################################

	

	

	function url_origin($s, $use_forwarded_host = false)
	{
	    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
	    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
	    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
	    $port     = $s['SERVER_PORT'];
	    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
	    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
	    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
	    return $protocol . '://' . $host;
	}

	function full_url($s, $use_forwarded_host = false)
	{
	    return htmlspecialchars(url_origin( $s, $use_forwarded_host) . $s['REQUEST_URI'], ENT_QUOTES, 'UTF-8' );
	}

	function full_path()
	{
		$x = pathinfo(full_url($_SERVER));
	    return $x['dirname'] . "/";	}

	

	function idx_pos($pos) {
		$idx = array(
			'G' => 0,
			'L' => 1,
			'Z' => 2,
			'M' => 3,
			'A' => 4,
			'T' => 5
		);
		return $idx[$pos];
	}

	function nl2p($string)
	{
	    $paragraphs = '';

	    foreach (explode("\n", $string) as $line) {
	        if (trim($line)) {
	            $paragraphs .= '<p>' . $line . '</p>';
	        }
	    }

	    return $paragraphs;
	}
?>