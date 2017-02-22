<div class="col-md-12">
	<div class="col-md-4"></div>
	<div class="col-md-4"><h3>Create Test Paper</h3></div>
	<div class="col-md-4"></div>
</div>
<div class="row">
	
	<div class="col-md-3">
		
		<button id="last_test" test_no="<?php echo $last_test_info[0]['test_no'];?>" class="btn btn-primary form-control" type="button">
		  Last Created Test No  <span class="badge"><?php echo $last_test_info[0]['test_no'];?></span>
		</button>
	</div>
	<div class="col-md-3">
		<select class="form-control" id="test_no" style="font-size:medium; font-weight:bolder;color:red;">
		  <option value="-1" selected>Select Test No</option>
		  <?php
			for($i=1;$i<= 25;$i++)
			{
				echo ' <option value="'.$i.'"> Test '.$i.'</option>';
			}
		  ?>
		
		</select>
	</div>
	<div class="col-md-3">	
		<input id="no_of_question" type="text" class="form-control" id="inputPassword" placeholder="Enter Number Of Qustion">
	</div>
	<div class="col-md-3 qustion_btn">
		<button id="creating_test" style="padding:5px 16px;" type="button" class="btn btn-primary btn-lg btn-block form-control">Submit</button>
	</div>
</div>
<div class="row" id="show_test_formet">
</div>
<div class="row" id="show_test_formet_result">
</div>