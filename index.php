
<?php

require('fpdf.php');
$pdf=new FPDF();
$pdf->SetAuthor("Dhrubo Raj Roy-http://TheDhrubo.xyz");

    $font="fonts/Mainak-Buniyadi-V1.ttf";
    $php_array = json_decode(file_get_contents('names.json'), true);
    $count=count($php_array);
    for ($i=0; $i < $count; $i++) {
        $image=imagecreatefromjpeg("pics/rasid-2023.jpg");
        $color=imagecolorallocate($image,0,0,0);
        imagettftext($image,55,0,580,645,$color,$font,$php_array[$i]['name_bijoy']);
        if($php_array[$i]['donation_2022']>1 && $php_array[$i]['donation_2022']<499){
            $amount=500;
        }elseif($php_array[$i]['donation_2022']>500 && $php_array[$i]['donation_2022']<1000){
            $amount=1500;
        }elseif($php_array[$i]['donation_2022']>1000 && $php_array[$i]['donation_2022']<999){
            $amount=1000;
        }elseif($php_array[$i]['donation_2022']>1000 && $php_array[$i]['donation_2022']<1499){
            $amount=1500;
        }elseif($php_array[$i]['donation_2022']>1500 && $php_array[$i]['donation_2022']<1999){
            $amount=2000;
        }elseif($php_array[$i]['donation_2022']>2001 && $php_array[$i]['donation_2022']<2499){
            $amount=2500;
        }elseif($php_array[$i]['donation_2022']>2500 && $php_array[$i]['donation_2022']<2999){
            $amount=3000;
        }elseif($php_array[$i]['donation_2022']>=3000){
            $amount=5000;
        }else{
            // $amount= $php_array[$i]['donation_2022'];
            $amount=1000;
        }
        imagettftext($image,55,0,440,745,$color,$font,$amount." UvKv");
        imagettftext($image,55,0,1240,745,$color,$font,'Av`k© cvov');
        
        $file=" ".$i." ".'_'.$i;
        $pdf->SetTitle($php_array[$i]['goli_name']);
                
        $file_path=$i.".jpg";
        $file_path_pdf=$php_array[$i]['goli_name'].".pdf";
        imagejpeg($image,$file_path);
        imagedestroy($image);

        
        //Page start 
        $pdf->AddPage('L','A5');
        $pdf->Image($file_path,0,0,210);
        //Page Ended
        unlink($file_path);
    }
    $pdf->Output($file_path_pdf,"I");
    unlink($file_path);
?>