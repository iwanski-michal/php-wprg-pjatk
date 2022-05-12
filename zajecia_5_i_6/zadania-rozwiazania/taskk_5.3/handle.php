<?php
        //add new subpage
    if(isset($_POST['add'])){

         //Wczytaj jako tablice
         $file = fopen("data.csv","r")or die("nie udało się otworzyć pliku z danymi");
         while (!feof($file) ) {
             $tablica[] = fgetcsv($file);
         }
    fclose($file);
    $index = count($tablica);
    $dataForAdd=$_POST['nameAdd'].",".$index.",".$_POST['insidesAdd'];

    $file = fopen("data.csv", 'a+')or die ("nie udało się otworzyć pliku z danymi");
    fwrite($file,"\n".$dataForAdd);
    fclose($file);
    }


            //Usuwanie linii
    if(isset($_POST['del'])){
    $index=$_POST['lineRemove']-1;
    $i=0;

            //Wczytaj jako tablice
    $file = fopen("data.csv","r")or die("nie udało się otworzyć pliku z danymi");
    while (!feof($file) ) {
        $tablica[] = fgetcsv($file);
    }
    fclose($file);

    unset($tablica[$index]);
    $write = fopen("data.csv", "w") or die("nie udało się otworzyć pliku z danymi");
    foreach($tablica as $a) {
        if($i==0) {
            fwrite($write, $a[0].",".$i.",".$a[2]);
        }
        else {
            fwrite($write, "\n".$a[0].",".$i.",".$a[2]);
        }
        $i++;

    }
    fclose($write);
    }

        if(isset($_POST['edit'])){
            $index = $_POST['lineToEdit']-1;

         $file = fopen("data.csv","r")or die("nie udało się otworzyć pliku z danymi");
         while (!feof($file) ) {
             $tablica[] = fgetcsv($file);
                 }
    fclose($file);


    if($_POST['namEdit']==""){
        $textToChange=$tablica[$index][0].",".$index.",";
        if($_POST['insidesEdit']==""){
            $textToChange=$textToChange.$tablica[$index][2];
        }
        else{
            $textToChange=$textToChange.$_POST['insidesEdit'];
        }
    }
    elseif($_POST['insidesEdit']==""){
        $textToChange=$_POST['namEdit'].",".$index.",".$tablica[$index][2];
    }
    else{
        $textToChange=$_POST['namEdit'].",".$index.",".$_POST['insidesEdit'];
    }



    $i=0;
    $array=array();
    $read = fopen("data.csv", "r") or die("nie udało się otworzyć pliku z danymi");
    while(!feof($read)) {
        $array[$i] = fgets($read);
        ++$i;
    }
    fclose($read);

    $array[$index]=$textToChange;

    $write = fopen("data.csv", "w") or die("nie udało się otworzyć pliku z danymi");
    foreach($array as $a) {
        fwrite($write,$a);
    }
    fclose($write);
}


echo "Wykonano";
header("Refresh:1,url=edit.php");