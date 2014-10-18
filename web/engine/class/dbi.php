<?php

class DB
{
	var $link;
	var $connected;
	var $result=false;
	var $host;
	var $user;
	var $pass;
	var $db_name;
	var $log;
	
	function DB($host=MYSQL_HOST,$user=MYSQL_USER,$pass=MYSQL_PASS,$db_name=MYSQL_DB)
	{
		$this->host=$host;
		$this->user=$user;
		$this->pass=$pass;
		$this->db_name=$db_name;
		$this->link=mysqli_connect($this->host,$this->user, $this->pass);
		$this->connected=mysqli_select_db($this->link, $this->db_name);
	}
	
	function startQuery($sql)
	{
		$this->result = mysqli_query($this->link,$sql);
		return $this->result instanceof mysqli_result;		
	}
	
	function query($sql)
	{
		$ret=mysqli_query($this->link,$sql);
		if ($ret ===false)
		{}
		else
		{
			$ret=mysqli_affected_rows($this->link);
		}
		return $ret;
	}
	
	function exists($sql)
	{
		$ret=mysqli_query($this->link,$sql);
		if ($ret ===false) {}
		else
		{
			$ret=mysqli_num_rows($ret)>0;
		}
		return $ret;
	}
		
	function endQuery()
	{
		$ret=true;
		if($this->result instanceof mysqli_result)
			$ret=mysqli_free_result($this->result);
		return $ret;
	}

	function numRows()
	{
		$ret=0;
		if($this->result instanceof mysqli_result)
		{
			$ret=mysqli_num_rows($this->result);	
		}
		return $ret;
	}

	function nextRow()
	{
		$ret=false;
		if($this->result instanceof mysqli_result)
		{
			$ret=mysqli_fetch_array($this->result,MYSQLI_ASSOC);	
			if ($ret===false)
				$this->endQuery();
		}
		return $ret;
	}
	
	/* Functii noi  */
	
	function last_id()
	{
		$ret=mysqli_insert_id($this->link);
		return $ret;
	}
   
	function affectedRows()
	{
		$ret=mysqli_affected_rows($this->link);
		return $ret;
	}
    
	function sanitize($string="")
	{
        $ret = mysqli_real_escape_string($this->link,$string);
		return $ret;
	}
    
    function error(){
        return mysqli_error($this->link);
    }
    
    function errno(){
        return mysqli_errno($this->link);
    }
    
    function close(){
        return mysqli_close($this->link);
    }	
				
}
?>