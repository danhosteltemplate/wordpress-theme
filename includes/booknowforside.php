<?php  global $data; ?>
			<!-- BEGIN .booknow -->
			<div class="booknow jshide">
				
				<!-- BEGIN .booknow-wrapper -->
				<div class="booknow-wrapper">
				

				
				<form class="booking-form booking-validation" name="bookroom" method="get" action="http://m.danhostel.dk/hostel/hostel-show-rooms"> 
<?php if(ICL_LANGUAGE_CODE=='da') {?>
					<h2><?php _e('Book din overnatning','qns'); ?></h2></br>
<?php } ?>                    
                  
<?php if(ICL_LANGUAGE_CODE=='en') {?>
					<h2><?php _e('Book your stay','qns'); ?></h2></br>
<?php } ?>                    

<?php if(ICL_LANGUAGE_CODE=='de') {?>
					<h2><?php _e('Book online','qns'); ?></h2></br> 
 <?php } ?>                    

					<div class="clearfix">
                    	<input name="hostel_id" value="<?php if(ICL_LANGUAGE_CODE=='da') {echo $data['hostel_id'];}
					if(ICL_LANGUAGE_CODE=='en') { echo $data['hostel_id_en'];}
					if(ICL_LANGUAGE_CODE=='de') { echo $data['hostel_id_de'];} ?>" type="hidden">

						<input type="date" id="fromdate" name="fromdate" value="<?php if(ICL_LANGUAGE_CODE=='da') {_e('Check ind','qns');}
					if(ICL_LANGUAGE_CODE=='en') {_e('Check in','qns'); }
					if(ICL_LANGUAGE_CODE=='de') {_e('Check in','qns'); } ?>" class="input-half datepicker">
						<input type="date" id="todate" name="todate" value="<?php if(ICL_LANGUAGE_CODE=='da') {_e('Check ud','qns');}
					if(ICL_LANGUAGE_CODE=='en') {_e('Check out','qns'); }
					if(ICL_LANGUAGE_CODE=='de') {_e('Check out','qns'); } ?>" class="input-half input-half-last datepicker">
                                                <input name="persons" value="1" type="hidden">

					</div>
					
					<input class="bookbutton" type="submit" value="<?php if(ICL_LANGUAGE_CODE=='da') {_e('Søg','qns');}
					if(ICL_LANGUAGE_CODE=='en') {_e('Search','qns'); }
					if(ICL_LANGUAGE_CODE=='de') {_e('Suchen','qns'); } ?>" />
				
				</form>
								
				<!-- END .booknow-wrapper -->
				</div>
				
			<!-- END .booknow -->
			</div>