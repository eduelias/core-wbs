<?


	class tree {
	
		public $nodes;
		
		public function tree($child = array('campos'=>'*','obj'=>'','cond'=>'true'), $self = array('ID'=>0,'label'=>'/')){
			$this->nodes['root'] = new node('root',$child, $self = array('ID'=>0,'label'=>'/'));
		}
		
		public function addNode($child = array('campos'=>'*','obj'=>'','cond'=>'true'), $self = array('ID'=>0,'label'=>'/')){
			$this->nodes[] = new node($child, $self = array('ID'=>0,'label'=>'/'));
		}
		
		public function getTreeNodes(){
			pre($this->nodes);
		}
	
	}
	
	class node {
	
		private $self;
		
		private $child;
		
		private $parent;
		
		public function node($child = array('campos'=>'*','obj'=>'','cond'=>'true'), $self = array('ID'=>0,'label'=>'/')){
				
			$this->self = $self;
			
			$this->child = $child;
				
		}
	
	}


?>