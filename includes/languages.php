<?php
switch (ICL_LANGUAGE_CODE) {
	case 'da':
		$title = 'Book din overnatning';
		$danhostel_id = 'hostel_id';
		$startDate = 'Check ind';
		$endDate = 'Check ud';
		$submitBTN = 'Søg';
		$url = 'http://m.danhostel.dk/hostel/hostel-show-rooms';
		$news = 'Nyheder';
		break;

	case 'de':
		$title =  'Online buchen';
		$danhostel_id = 'hostel_id_de';
		$startDate = 'Einchecken';
		$endDate = 'Auschecken';
		$submitBTN = 'Suchen';
		$url = 'http://m.danhostel.dk/de/hostel/hostel-show-rooms';
		$news = 'Nyheder';
		break;

	case 'en':
		$title = 'Book your stay';
		$danhostel_id = 'hostel_id_en';
		$startDate = 'Check in';
		$endDate = 'Check out';
		$submitBTN = 'Search';
		$url = 'http://m.danhostel.dk/en/hostel/hostel-show-rooms';
		$news = 'News';
		break;
	
	default:
		$title = 'Book din overnatning';
		$danhostel_id = 'hostel_id';
		$startDate = 'Check ind';
		$endDate = 'Check ud';
		$submitBTN = 'Søg';
		$url = 'http://m.danhostel.dk/hostel/hostel-show-rooms';
		$news = 'Nachrichten';
		break;
	}
?>
