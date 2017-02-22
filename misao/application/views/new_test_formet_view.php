<?php
	if(isset($_POST['test_no']) && isset($_POST['no_of_question']))
	{
		 $test_no 		= $_POST['test_no'];
		 $no_of_question = $_POST['no_of_question'];
		echo '<center style="border-radius:180px;"><h3 style="border-radius:180px;background-color:red;">Test Formet is Ready To Use</h3></center>';
		echo '<div class="col-md-8">';
		echo '<div class="form-group">';
					
		for($i= 1;$i<=$no_of_question;$i++)
		{
?>				<div class="col-sm-12">
				<div class="col-sm-6" style="color:blue;"> <h4>Qustion No <?php echo $i; ?></h4></div>
					<select class="form-control qustion_type col-sm-6"  style="font-size:medium; font-weight:bolder;color:red;">
						<option value="-1" style="font-size:medium; font-weight:bolder;color:blue;">Select Qustion Type</option>
						<option value="qno_<?php echo $i;?>__1_imgt" style="font-size:medium; font-weight:bolder;color:blue;">1 -> Image Type Qustion</option>
						<option value="qno_<?php echo $i;?>__2_optt" style="font-size:medium; font-weight:bolder;color:blue;">2 -> Optional Type Qustion</option>
						<option value="qno_<?php echo $i;?>__3_clozt" style="font-size:medium; font-weight:bolder;color:blue;">3 -> Choose Clue Type Qustion </option>
						<option value="qno_<?php echo $i;?>__4_blankqt" style="font-size:medium; font-weight:bolder;color:blue;">4 -> Fillin the Blanks Type Qustion</option>
					<select>
					<div class=" formetresdiv" style="margin-left:-2%;">
						
					</div>
				</div>
<?php			} ?>
					<div class="col-sm-10">
						<button id="test_creation_btn_sub"  type="button" class="btn btn-primary btn-lg btn-block form-control">Submit</button>
					</div>
					
				</div>
			</div>
<?php
	}
	else
	{
		echo "Error Retry To Create";
	}
?>