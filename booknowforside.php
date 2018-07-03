<?php

global $data; 
static $DOMAIN = 'qns';

switch (ICL_LANGUAGE_CODE) {
	case 'da':
		$title = 'Book din overnatning';
		$danhostel_id = 'hostel_id';
		$startDate = 'Check ind';
		$endDate = 'Check ud';
		$submitBTN = 'Søg';
		$url = 'http://m.danhostel.dk/hostel/hostel-show-rooms';
		break;

	case 'de':
		$title =  'Online buchen';
		$danhostel_id = 'hostel_id_de';
		$startDate = 'Einchecken';
		$endDate = 'Auschecken';
		$submitBTN = 'Suchen';
		$url = 'http://m.danhostel.dk/de/hostel/hostel-show-rooms';
		break;

	case 'en':
		$title = 'Book your stay';
		$danhostel_id = 'hostel_id_en';
		$startDate = 'Check in';
		$endDate = 'Check out';
		$submitBTN = 'Search';
		$url = 'http://m.danhostel.dk/en/hostel/hostel-show-rooms';
		break;
	
	default:
		$title = 'Book din overnatning';
		$danhostel_id = 'hostel_id';
		$startDate = 'Check ind';
		$endDate = 'Check ud';
		$submitBTN = 'Søg';
		$url = 'http://m.danhostel.dk/hostel/hostel-show-rooms';
		break;
	}
?>


<form class="booking-form booking-validation" name="bookroom" method="get" action="<?php echo $url; ?>">
    <h2><strong><?php _e($title, $DOMAIN);?></strong></h2>
    <div class="clearfix">
        <input name="hostel_id" value="<?php echo $data[$danhostel_id];?>" type="hidden">
        <input type="date" id="fromdate" name="fromdate" value="<?php _e($startDate, $DOMAIN); ?>" class="input-half datepicker">
        <input type="date" id="todate" name="todate" value="<?php _e($endDate, $DOMAIN); ?>" class="input-half input-half-last datepicker">
        <input name="persons" value="1" type="hidden">
    </div>
    <input class="bookbutton" type="submit" value="<?php _e($submitBTN, $DOMAIN); ?>" />
</form>				
