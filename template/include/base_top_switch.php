<div class="btn-group">
				<?php 
					 $prev_id = $station['prev_id'];
					 $next_id = $station['next_id'];
					 if($prev_id > -1){
						echo '<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><a href="'.$prev_id.'" class="vl-m">前一个基站</a></button>';
					 }
					 
					 if($next_id > -1){
						echo '<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><a href="'.$next_id.'" class="vl-m">后一个基站</a></button>';
					 }
				?>
            </div>