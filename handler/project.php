<?php	
	class ProjectHandler {
		public static function get_list(){
			$dao =  new ProwerProjectMySqlDAO();
			$exsit = $dao->queryAll();
			return $exsit;
		}
		
		public static function add($projectName){
			$dao_project =  new ProwerProjectMySqlDAO();
			$project = new ProwerProject();
			$current_time = time();
			$project->projectName = $projectName;
			$project->projectDesc = '';
			$project->createTime = $current_time;
			$project->status = 0;
			$project->creatorId = $_COOKIE['user_id'];
			$dao_project->insert($project);
		}
		
		public static function remove(){
			
		}
	}
?>