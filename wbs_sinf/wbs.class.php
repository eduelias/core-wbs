<?php

	class wbs {
	
		private $host = '.maxxmicro.com.br';
		private $user = 'wbs_base';
		private $pass = '123456';
		private $base = 'sif_base';
		
		public $res;
		
		public function error($sql){
			echo '<div class="error">"'.mysql_error().'" na pesquisa: <br>'.$sql.'<br></div>';
			//echo mysql_error();
		}
		
		public function query($sql) {
			mysql_connect(WBS_HOST.$this->host,SQL_USER,SQL_PASS);
			mysql_select_db($this->base);
			$this->res = mysql_query($sql) or die ($this->error($sql));
			
			return $this->res;
		}
		
		public function fetch($res = '0') {
			$res = ($res == '0')?$this->res:$res;
			if ($res !== null) {
				return @mysql_fetch_assoc($res);	}
			else 
				return 0;		
		}
		
		public function show($sql){
			$res = $this->query($sql);
			echo '<table>';
			while ($a = $this->fetch($res)){
				echo '<tr>';
				foreach ($a as $k => $v) {
					echo '<td>'.$v.'</td>';
				}
			  	echo '</tr>';
			}
			echo '</table>';
		}
	}

?>