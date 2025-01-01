
<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>
<?php
$seat_status = array(
  array('id' => '1','district_name' => 'পঞ্চগড়','total_voter' => '৭,১৪,০৬৭','male_voter' => '৩,৫৭,৬২২','female_voter' => '৩,৫৬,৪৪৫','total_seat' => '২'),
  array('id' => '2','district_name' => 'ঠাকুরগাঁও','total_voter' => '৯,৯৫,৭১২','male_voter' => '৫,০২,৯৯৪','female_voter' => '৪,৯২,৭১৮','total_seat' => '৩'),
  array('id' => '3','district_name' => 'লালমনিরহাট','total_voter' => '৯,১৬,০৫০','male_voter' => '৪,৫৭,৭২৭','female_voter' => '৪,৫৮,৩২৩','total_seat' => '৩'),
  array('id' => '4','district_name' => 'নীলফামারী','total_voter' => '১২,৯২,৩৮০','male_voter' => '৬,৪৯,৪৩৫','female_voter' => '৬,৪২,৯৪৫','total_seat' => '৪'),
  array('id' => '5','district_name' => 'দিনাজপুর','total_voter' => '২২,০৮,২৮১','male_voter' => '১১,০৭,১৮০','female_voter' => '১১,০১,১০১','total_seat' => '৬'),
  array('id' => '6','district_name' => 'রংপুর','total_voter' => '২১,৩৪,৮৪২','male_voter' => '১০,৬০,২০১','female_voter' => '১০,৭৪,৬৪১','total_seat' => '৬'),
  array('id' => '7','district_name' => 'কুড়িগ্রাম','total_voter' => '১৫,৪৬,৮৮২','male_voter' => '৭,৬১,০৮৮','female_voter' => '৭,৮৫,৭৯৪','total_seat' => '৪'),
  array('id' => '8','district_name' => 'গাইবান্ধা','total_voter' => '১৭,৮৫,৬৬৪','male_voter' => '১৭,৮৫,৬৬৪','female_voter' => '৯,১৩,৯০০','total_seat' => '৫'),
  array('id' => '9','district_name' => 'জয়পুরহাট','total_voter' => '৭,০৬,৫৪৯','male_voter' => '৩,৫০,৬৭৩','female_voter' => '৩,৫৫,৮৭৬','total_seat' => '২'),
  array('id' => '10','district_name' => 'নওগাঁ','total_voter' => '২০,০২,৪৬০','male_voter' => '৯,৯৫,০৯৯','female_voter' => '১০,০৭,৩৬১','total_seat' => '৬'),
  array('id' => '11','district_name' => 'শেরপুর','total_voter' => '১০,৩৫,৫৮৩','male_voter' => '৫,১২,১৩৭','female_voter' => '৫,২৩,৪৪৬','total_seat' => '৩'),
  array('id' => '12','district_name' => 'বগুড়া','total_voter' => '২৫,৪৬,৭৬৪','male_voter' => '১২,৬০,৫৬২','female_voter' => '১২,৮৬,২০২','total_seat' => '৭'),
  array('id' => '13','district_name' => 'জামালপুর','total_voter' => '১৭,১৪,৭৬৮','male_voter' => '৮,৪৯,৯২২','female_voter' => '৮,৬৪,৮৪৬','total_seat' => '৫'),
  array('id' => '14','district_name' => 'চাঁপাইনবাবগঞ্জ','total_voter' => '১১,৭৫,৫৮০','male_voter' => '৫,৮৯,৫০২','female_voter' => '৫,৮৬,০৭৮','total_seat' => '৩'),
  array('id' => '15','district_name' => 'রাজশাহী','total_voter' => '১৯,৪২,৩৫০','male_voter' => '৯,৬৭,৫৯৩','female_voter' => '৯,৭৪,৭৫৭','total_seat' => '৬'),
  array('id' => '16','district_name' => 'নেত্রকোনা','total_voter' => '১৬,০৬,৪৮২','male_voter' => '৮,০৯,৬০১','female_voter' => '৭,৯৬,৮৮১','total_seat' => '৫'),
  array('id' => '17','district_name' => 'নাটোর','total_voter' => '১৩,০৩,৭৩১','male_voter' => '৬,৫০,৩৮৮','female_voter' => '৬,৫৩,৩৪৩','total_seat' => '৪'),
  array('id' => '18','district_name' => 'সিরাজগঞ্জ','total_voter' => '২১,৯৬,২৬৩','male_voter' => '১১,০৮,৫৩৯','female_voter' => '১০,৮৭,৭২৪','total_seat' => '৬'),
  array('id' => '19','district_name' => 'পাবনা','total_voter' => '১৮,৭৯,৩২৭','male_voter' => '৯,৪৮,৬৭৩','female_voter' => '৯,৩০,৬৫৪','total_seat' => '৫'),
  array('id' => '20','district_name' => 'কুষ্টিয়া','total_voter' => '১৪,৫৯,৫৬৯','male_voter' => '৭,২৭,৮০৫','female_voter' => '৭,৩১,৭৬৪','total_seat' => '৪'),
  array('id' => '21','district_name' => 'মেহেরপুর','total_voter' => '৪,৯৫,৮৯২','male_voter' => '২,৪৫,১৯৬','female_voter' => '২,৫০,৬৯৬','total_seat' => '২'),
  array('id' => '22','district_name' => 'রাজবাড়ী','total_voter' => '৮,০৮,৬৮৯','male_voter' => '৪,০৮,৫১১','female_voter' => '৪,০০,১৭৮','total_seat' => '২'),
  array('id' => '23','district_name' => 'চুয়াডাঙ্গা','total_voter' => '৮,৫২,৭৫৭','male_voter' => '৪,২৫,৬০৭','female_voter' => '৪,২৭,১৫০','total_seat' => '২'),
  array('id' => '24','district_name' => 'ঝিনাইদহ','total_voter' => '১৩,৪২,২৭৮','male_voter' => '৬,৭২,৬০৫','female_voter' => '৬,৬৯,৬৭৩','total_seat' => '৪'),
  array('id' => '25','district_name' => 'মাগুরা','total_voter' => '৬,৮৪,৯৭২','male_voter' => '৩,৪২,৮৯৫','female_voter' => '৩,৪২,০৭৭','total_seat' => '২'),
  array('id' => '26','district_name' => 'ফরিদপুর','total_voter' => '১৪,২১,৬৪১','male_voter' => '৭,১৪,৩৬২','female_voter' => '৭,০৭,২৭৯','total_seat' => '৪'),
  array('id' => '27','district_name' => 'যশোর','total_voter' => '২০,৯১,২৮৪','male_voter' => '১০,৪৮,৫৩৭','female_voter' => '১০,৪২,৭৪৭','total_seat' => '৬'),
  array('id' => '28','district_name' => 'নড়াইল','total_voter' => '৫,৫৫,৯১৮','male_voter' => '২,৭৬,০৪৬','female_voter' => '২,৭৯,৮৭২','total_seat' => '২'),
  array('id' => '29','district_name' => 'গোপালগঞ্জ','total_voter' => '৮,৭৯,৪৬৪','male_voter' => '৪,৪২,৫৪১','female_voter' => '৪,৩৬,৯২৩','total_seat' => '৩'),
  array('id' => '30','district_name' => 'মাদারীপুর','total_voter' => '৮,৯০,৩৫৯','male_voter' => '৪,৫৬,৯২৮','female_voter' => '৪,৩৩,৪৩১','total_seat' => '৩'),
  array('id' => '31','district_name' => 'সাতক্ষীরা','total_voter' => '১৫,৬০,৩১৯','male_voter' => '৭,৮১,৫৩০','female_voter' => '৭,৭৮,৭৮৯','total_seat' => '৪'),
  array('id' => '32','district_name' => 'খুলনা','total_voter' => '১৮,০০,৮৪১','male_voter' => '৯,০২,৮৩৫','female_voter' => '৮,৯৮,০০৬','total_seat' => '৬'),
  array('id' => '33','district_name' => 'পিরোজপুর','total_voter' => '৮,২৯,২৪৫','male_voter' => '৪,১৬,৬০৪','female_voter' => '৪,১২,৬৪১','total_seat' => '৩'),
  array('id' => '34','district_name' => 'বরিশাল','total_voter' => '১৭,৮০,৫৫৫','male_voter' => '৮,৯৮,৯৭০','female_voter' => '৮,৮১,৫৮৫','total_seat' => '৬'),
  array('id' => '35','district_name' => 'ঝালকাঠি','total_voter' => '৪,৬৯,১১৫','male_voter' => '২,৩৬,৩৩৮','female_voter' => '২,৩২,৭৭৭','total_seat' => '২'),
  array('id' => '36','district_name' => 'বাগেরহাট','total_voter' => '১১,১৩,০৪৬','male_voter' => '৫,৫৯,২৬৮','female_voter' => '৫,৫৩,৭৭৮','total_seat' => '৪'),
  array('id' => '37','district_name' => 'বরগুনা','total_voter' => '৬,৮২,৬৯৮','male_voter' => '৩,৩৭,৩৭৪','female_voter' => '৩,৪৫,৩২৪','total_seat' => '২'),
  array('id' => '38','district_name' => 'পটুয়াখালী','total_voter' => '১১,৯২,৪৬৭','male_voter' => '৫,৯৬,২৮৪','female_voter' => '৫,৯৬,১৮৩','total_seat' => '৪'),
  array('id' => '39','district_name' => 'ভোলা','total_voter' => '১২,৬৯,০৫৬','male_voter' => '৬,৪৮,২৯৯','female_voter' => '৬,২০,৭৫৭','total_seat' => '৪'),
  array('id' => '40','district_name' => 'কক্সবাজার','total_voter' => '১৩,৬৬,৭৮০','male_voter' => '৭,০৮,৭৪১','female_voter' => '৬,৫৮,০৩৯','total_seat' => '৪'),
  array('id' => '41','district_name' => 'বান্দরবান','total_voter' => '২,৪৬,৬৫৩','male_voter' => '১,২৮,১২৯','female_voter' => '১,১৮,৫২৪','total_seat' => '১'),
  array('id' => '42','district_name' => 'চট্টগ্রাম','total_voter' => '৫৬,৩৬,৪৩৩','male_voter' => '২৯,১১,২৩৪','female_voter' => '২৭,২৫,১৯৯','total_seat' => '১৬'),
  array('id' => '43','district_name' => 'রাঙামাটি','total_voter' => '৪,১৮,২১৫','male_voter' => '২,২০,৩৫০','female_voter' => '১,৯৭,৮৬৫','total_seat' => '১'),
  array('id' => '44','district_name' => 'খাগড়াছড়ি','total_voter' => '৪,৪১,৭৪৩','male_voter' => '২,২৬,৫২৪','female_voter' => '২,১৫,২১৯','total_seat' => '১'),
  array('id' => '45','district_name' => 'ফেনী','total_voter' => '১০,৪৫,৮২৪','male_voter' => '৫,৩৩,১৮৮','female_voter' => '৫,১২,৬৩৬','total_seat' => '৩'),
  array('id' => '46','district_name' => 'নোয়াখালী','total_voter' => '২১,৪৮,৬২১','male_voter' => '১০,৯৬,৯২১','female_voter' => '১০,৫১,৭০০','total_seat' => '৬'),
  array('id' => '47','district_name' => 'লক্ষ্মীপুর','total_voter' => '১২,১০,৩২৭','male_voter' => '৬,১২,৮৮৫','female_voter' => '৫,৯৭,৪৪২','total_seat' => '৪'),
  array('id' => '48','district_name' => 'কুমিল্লা','total_voter' => '৩৮,৭৮,৪৭৪','male_voter' => '১৯,৫৩,৭৫৫','female_voter' => '১৯,২৪,৭১৯','total_seat' => '১১'),
  array('id' => '49','district_name' => 'চাঁদপুর','total_voter' => '১৮,০৬,৯৭৭','male_voter' => '৯,১৭,২৩৪','female_voter' => '৮,৮৯,৭৪৩','total_seat' => '৫'),
  array('id' => '50','district_name' => 'শরীয়তপুর','total_voter' => '৮,৬১,১০৮','male_voter' => '৪,৪২,২৫৮','female_voter' => '৪,১৮,৮৫০','total_seat' => '৩'),
  array('id' => '51','district_name' => 'মুন্সিগঞ্জ','total_voter' => '১১,৬২,৯৮৮','male_voter' => '৫,৯৭,৬৭৫','female_voter' => '৫,৬৫,৩১৩','total_seat' => '৩'),
  array('id' => '52','district_name' => 'মানিকগঞ্জ','total_voter' => '১১,১০,১৯৭','male_voter' => '৫,৫২,৪৯৩','female_voter' => '৫,৫৭,৭০৪','total_seat' => '৩'),
  array('id' => '53','district_name' => 'ঢাকা','total_voter' => '৭৭,৩১,৫৮৮','male_voter' => '৪০,০২,৪৬৩','female_voter' => '৩৭,২৯,১২৫','total_seat' => '২০'),
  array('id' => '54','district_name' => 'নারায়ণগঞ্জ','total_voter' => '২০,৩৪,২৩৩','male_voter' => '১০,৩৪,০৩৯','female_voter' => '১০,০০,১৯৪','total_seat' => '৫'),
  array('id' => '55','district_name' => 'ব্রাহ্মণবাড়িয়া','total_voter' => '১৯,৫২,৭৮২','male_voter' => '৯,৮৭,৩২০','female_voter' => '৯,৬৫,৪৬২','total_seat' => '৬'),
  array('id' => '56','district_name' => 'নরসিংদী','total_voter' => '১৫,৫১,৯৭০','male_voter' => '৭,৭৫,৪২০','female_voter' => '৭,৭৬,৫৫০','total_seat' => '৫'),
  array('id' => '57','district_name' => 'গাজীপুর','total_voter' => '২৪,১৬,৭০৩','male_voter' => '১২,১৪,৮৬১','female_voter' => '১২,০১,৮৪২','total_seat' => '৫'),
  array('id' => '58','district_name' => 'টাঙ্গাইল','total_voter' => '২৭,৮৪,৮৭১','male_voter' => '১৩,৮১,০১৫','female_voter' => '১৪,০৩,৮৫৬','total_seat' => '৮'),
  array('id' => '59','district_name' => 'কিশোরগঞ্জ','total_voter' => '২১,২৫,৯৭০','male_voter' => '১০,৭২,৭৭৮','female_voter' => '১০,৫৩,১৯২','total_seat' => '৬'),
  array('id' => '60','district_name' => 'ময়মনসিংহ','total_voter' => '৩৭,৫১,১২১','male_voter' => '১৮,৯৩,২১১','female_voter' => '১৮,৫৭,৯১০','total_seat' => '১১'),
  array('id' => '61','district_name' => 'জামালপুর','total_voter' => '১৭,১৪,৭৬৮','male_voter' => '৮,৪৯,৯২২','female_voter' => '৮,৬৪,৮৪৬','total_seat' => '৫'),
  array('id' => '62','district_name' => 'শেরপুর','total_voter' => '১০,৩৫,৫৮৩','male_voter' => '৫,১২,১৩৭','female_voter' => '৫,২৩,৪৪৬','total_seat' => '৩'),
  array('id' => '63','district_name' => 'নেত্রকোনা','total_voter' => '১৬,০৬,৪৮২','male_voter' => '৮,০৯,৬০১','female_voter' => '৭,৯৬,৮৮১','total_seat' => '৫'),
  array('id' => '64','district_name' => 'সুনামগঞ্জ','total_voter' => '১৬,৪৭,০৬৬','male_voter' => '৮,২৩,৫০৭','female_voter' => '৮,২৩,৫৫৯','total_seat' => '৫'),
  array('id' => '65','district_name' => 'সিলেট','total_voter' => '২২,৫২,৮০১','male_voter' => '১১,৪৯,৪৭৭','female_voter' => '১১,০৩,৩২৪','total_seat' => '৬'),
  array('id' => '66','district_name' => 'মৌলভীবাজার','total_voter' => '১২,৯৭,০৬৮','male_voter' => '৬,৫২,০২২','female_voter' => '৬,৪৫,০৪৬','total_seat' => '৪'),
  array('id' => '67','district_name' => 'সিলেট','total_voter' => '২২,৫২,৮০১','male_voter' => '১১,৪৯,৪৭৭','female_voter' => '১১,০৩,৩২৪','total_seat' => '৬'),
  array('id' => '68','district_name' => 'হবিগঞ্জ','total_voter' => '১৪,২৬,০৬৭','male_voter' => '৭,১০,৫৯৪','female_voter' => '৭,১৫,৪৭৩','total_seat' => '৪')
);

$db = new Database();

$sql = "SELECT * FROM seat_status";
$query = $db->select($sql);
if(isset($_GET['district_name'])){
    $district_name = $_GET['district_name'];
    $sql = "SELECT * FROM seat_status WHERE district_name = '$district_name'";
    $districtQuery = $db->select($sql);
}

echo "<pre>";
foreach($seat_status as $key => $singleValues){
    
        echo "<br><br><br>";
    foreach($singleValues as $key => $value){
        echo $key." => ".$value;
        echo "<br>";
    }
    
}

?>