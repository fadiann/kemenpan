<?php
$PATH_ROOT = "D:/wamp64/www/kemenpan2/";
$INCLUDE_DIR = $PATH_ROOT . "App/Classes/";

include $PATH_ROOT . "App/Libraries/Adodb5/adodb.inc.php";
class Databases
{
	var $dbhost = 'localhost';
	var $dbuser = 'root';
	var $dbpassword = 'password';
	var $dbname = 'kemenpan';
	var $dbdriver = 'mysqli';
	var $debug = false;
	var $db;
	var $basepath = "D:/wamp64/www/kemenpan2/";
	var $baseurl = "http://localhost/kemenpan2/";

	// var $dbhost     = 'hekya.id';
	// var $dbuser     = 'u6559439_fadian';
	// var $dbpassword = 'fadian123';
	// var $dbname     = 'u6559439_kemenpan';
	// var $dbdriver   = 'mysqli';
	// var $debug      = false;
	// var $db;
	// var $basepath = "D:/wamp64/www/kemenpan2/";
	// var $baseurl  = "http://localhost/kemenpan2/";

	//auth api
	// var $user_api = 'simontila_server';
	// var $pass_api = '3d0bd3a36b5972bc7a90ff63d51a39526f5c8658';

	function __construct(){
		$this->db = $this->_dbconn();
	}
	public function __destruct(){
		$this->db->Close();
	}
	function _dbconn(){
		$db = ADONewConnection($this->dbdriver) or die("<h1>can't create connection</h1>");
		$db->debug = $this->debug; // if($db->debug) echo "<pre>";
		$db->Connect($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname) or die("<h1>can't connect to server</h1>");
		return $db;
	}
	function _dbquery($sqlstr){
		$recordset = $this->db->Execute($sqlstr);
		return $recordset;
	}
	function _dbexecquery($sqlstr, $userId = "", $aksinyo = ""){
		$pathlog = $this->path_log();
		$this->makeLog($sqlstr, $userId, $aksinyo, "Sukses");
		$recordset = $this->db->Execute($sqlstr);
		if (!$recordset) {
			$this->writeToDB($userId, $aksinyo, $_SERVER['REMOTE_ADDR'], "Gagal");
			$this->makeLog($sqlstr, $userId, $aksinyo, "Gagal");
			$error_num = $this->db->ErrorNo();
			$error_msg = str_replace("'", " (single quote) ", $this->db->ErrorMsg());
			$this->db->RollbackTrans();
			$params      = $sqlstr . " ErrorMsg : " . $error_msg;
			$logfilename = $pathlog . date("Ymd") . ".log";
			$strContent  = $userId . "\t" . $aksinyo . "\t" . $params;
			$this->writeToFile($logfilename, $strContent);
			$href  = $_SERVER["HTTP_REFERER"];
			$html  = "<script>";
			$html += "alert('Failed to insert or update data !');";
			$html += "window.history.back();";
			$html += "</script>";
			echo $html;
		}
		return $recordset;
	}
	function _dbquerylimit($sqlstr, $numrows, $offset){
		$recordset = $this->db->SelectLimit($sqlstr, $numrows, $offset);
		return $recordset;
		if (!$recordset) {
			$this->db->RollbackTrans();
			die("<h2>ERROR # " . $this->db->ErrorNo() . ": " . $this->db->ErrorMsg() . "</h2>");
		}
	}
	function makeLog($sql, $userId, $aksinyo = "", $status){
		$pathlog = $this->path_log();
		$status = "Sukses";
		$ip = $_SERVER['REMOTE_ADDR'];
		$str_now = date('Y-m-d H:i:s');
		$strContent = $userId . "\t" . $str_now . "\t" . $ip . "\t" . $aksinyo . "\t" . $status . "\r\n";

		$logfilename = $pathlog . date("Ymd") . ".log";
		$this->writeToFile($logfilename, $strContent);
		$this->writeToDB($userId, $aksinyo, $ip, $status);
	}
	function writeToDB($userId, $aksinyo, $ip, $status){
		$sql2 = "insert into log_activity values ('" . $this->uniqid() . "', '" . $userId . "', '" . strtotime("now") . "', '" . $aksinyo . "', '" . $_SERVER["REMOTE_ADDR"] . "', '" . $status . "')";
		$this->_dbquery($sql2);
	}
	function writeToFile($ourFileName, $somecontent){
		$ourFileHandle = fopen($ourFileName, 'a') or die("can't open file");
		if (!fwrite($ourFileHandle, $somecontent)) {
			echo "Cannot write to file ($ourFileName)";
			exit();
		}
		fclose($ourFileHandle);
	}
	function explodeKutip($s){
		$str = str_replace("'", "\'", $s);
		return $str;
	}
	function uniqid(){
		$a = sha1(microtime());
		return $a;
	}
	function path_log(){
		return "Public/ActivityLog/";
	}
	public function bind($sql, $bind){
		$recordset = $this->db->execute($sql, $bind);
		return $recordset;
	}
	public function assoc($sqlstr){
		$recordset = $this->db->getAssoc($sqlstr);
		return $recordset;
	} 
}
?>