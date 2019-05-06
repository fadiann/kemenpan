<?php
$PATH_ROOT = "D:/wamp64/www/menpan/";
$INCLUDE_DIR = $PATH_ROOT . "_includes/";

include $INCLUDE_DIR . "lib_adodb/adodb.inc.php";
class Databases {
	var $dbhost = 'localhost';
	var $dbuser = 'root';
	var $dbpassword = '';
	var $dbname = 'menpan';
	var $dbdriver = 'mysqli';
	var $debug = false;
	var $conn;
	var $basepath = "D:/wamp64/www/menpan/";
	var $baseurl = "http://localhost/menpan/";
	
	//auth api
	var $user_api = 'simontila_server';
	var $pass_api = '3d0bd3a36b5972bc7a90ff63d51a39526f5c8658';
	
	function __construct() {
		$this->conn = $this->_dbconn ();
	}
	public function __destruct() {
		$this->conn->Close ();
	}
	function _dbconn() {
		$db = ADONewConnection ( $this->dbdriver ) or DIE ( "<h1>can't create connection</h1>" );
		$db->debug = $this->debug; // if($db->debug) echo "<pre>";
		$db->Connect ( $this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname ) or DIE ( "<h1>can't connect to server</h1>" );
		return $db;
	}
	function _dbquery($sqlstr) {
		$recordset = $this->conn->Execute ( $sqlstr );
		return $recordset;
	}
	function _dbexecquery($sqlstr, $userId = "", $aksinyo = "") {
		$pathlog = $this->path_log ();
		$this->makeLog ( $sqlstr, $userId, $aksinyo, "Sukses" );
		$recordset = $this->conn->Execute ( $sqlstr );
		if (! $recordset) {
			$this->writeToDB ( $userId, $aksinyo, $_SERVER ['REMOTE_ADDR'], "Gagal" );
			$this->makeLog ( $sqlstr, $userId, $aksinyo, "Gagal" );
			$error_num = $this->conn->ErrorNo ();
			$error_msg = str_replace ( "'", " (single quote) ", $this->conn->ErrorMsg () );
			$this->conn->RollbackTrans ();
			$params = $sqlstr . " ErrorMsg : " . $error_msg;
			$logfilename = $pathlog . date ( "Ymd" ) . ".log";
			$strContent = $userId . "\t" . $aksinyo . "\t" . $params;
			$this->writeToFile ( $logfilename, $strContent );
			$href = $_SERVER ["HTTP_REFERER"];
			?>
<script>
			alert("Failed to insert or update data !"); 
			window.history.back();
			</script>
<?
		}
		return $recordset;
	}
	function _dbquerylimit($sqlstr, $numrows, $offset) {
		$recordset = $this->conn->SelectLimit ( $sqlstr, $numrows, $offset );
		return $recordset;
		if (! $recordset) {
			$this->conn->RollbackTrans ();
			DIE ( "<h2>ERROR # " . $this->conn->ErrorNo () . ": " . $this->conn->ErrorMsg () . "</h2>" );
		}
	}
	function makeLog($sql, $userId, $aksinyo = "", $status) {
		$pathlog = $this->path_log ();
		$status = "Sukses";
		$ip = $_SERVER ['REMOTE_ADDR'];
		$str_now = date ( 'Y-m-d H:i:s' );
		$strContent = $userId . "\t" . $str_now . "\t" . $ip . "\t" . $aksinyo . "\t" . $status . "\r\n";
		
		$logfilename = $pathlog . date ( "Ymd" ) . ".log";
		$this->writeToFile ( $logfilename, $strContent );
		$this->writeToDB ( $userId, $aksinyo, $ip, $status );
	}
	function writeToDB($userId, $aksinyo, $ip, $status) {
		$sql2 = "insert into log_activity values ('" . $this->uniqid () . "', '" . $userId . "', '" . strtotime ( "now" ) . "', '" . $aksinyo . "', '" . $_SERVER ["REMOTE_ADDR"] . "', '" . $status . "')";
		$this->_dbquery ( $sql2 );
	}
	function writeToFile($ourFileName, $somecontent) {
		$ourFileHandle = fopen ( $ourFileName, 'a' ) or die ( "can't open file" );
		if (! fwrite ( $ourFileHandle, $somecontent )) {
			echo "Cannot write to file ($ourFileName)";
			exit ();
		}
		fclose ( $ourFileHandle );
	}
	function explodeKutip($s) {
		$str = str_replace ( "'", "\'", $s );
		return $str;
	}
	function uniqid() {
		$a = sha1 ( microtime () );
		return $a;
	}
	function path_log() {
		return $this->basepath . "ActivityLog/";
	}
}
?>
