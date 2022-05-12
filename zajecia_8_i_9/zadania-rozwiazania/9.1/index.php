<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .container{
            display: flex;
            flex-wrap: wrap;
            gap: 0.5em;
        }
        .card {
            height: 300px;
            width: 200px;
            border: 3px solid #777;
            border-radius: 20px;
        }
        .cardImage{
            width: 200px;
        }
        .content {
            text-align: center;
        }
        h4{
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
<?php

// $row = 1;
// if (($handle = fopen("chart.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         echo "<p> $num fields in line $row: <br /></p>\n";
//         $row++;
//         for ($c=0; $c <div $num; $c++) {
//             echo $data[$c] . "<br />\n";
//         }
//     }
//     fclose($handle);
// }

abstract class Pokemon {
    public string $nazwa;
    public string $rodzaj;
    public int $hp_max;
    public int $hp_aktualne;
    public int $sila;
    public string $pathToPhoto;
    public bool $is_confused = false;
    public bool $is_paralyzed = false;


    public function __construct($nazwa, $rodzaj, $hp_max, $sila, $photo) {
        $this->nazwa = $nazwa;
        $this->rodzaj = $rodzaj;
        $this->hp_max = $hp_max;
        $this->hp_aktualne = $hp_max; // przy tworzeniu pokemona maksymalne hp to też aktualne hp
        $this->sila = $sila;
        $this->pathToPhoto = $photo;
    }
    //nazwa
    function set_nazwa($name) {
        $this->nazwa = $name;
      }
      function get_nazwa() {
        return $this->nazwa;
      }
      //rodzaj
      function set_rodzaj($rodzaj) {
        $this->color = $rodzaj;
      }
      function get_rodzaj() {
        return $this->rodzaj;
      }
      //max hp
      function set_maxhp($hp) {
        $this->hp_max = $hp;
      }
      function get_maxhp() {
        return $this->max_hp;
      }
      //actualhp
      function set_actualhp($hp) {
        $this->hp_aktualne = $hp;
      }
      function get_actualhp() {
        return $this->hp_aktualne;
      }
      //sila
      function set_sila($sila) {
        $this->sila = $sila;
      }
      function get_sila() {
        return $this->sila;
      }
      //paraliż
      function set_paralyze($is_paralyzed) {
        $this->is_paralyzed = $is_paralyzed;
      }
      function get_paralyze() {
        return $this->is_paralyzed;
      }
      //dezorientacja
      function set_confuse($is_confused) {
        $this->$is_confused = $is_confused;
      }
      function get_confuse() {
        return $this->is_confused;
      }

      function attack(Pokemon $targetPokemon){ 
        $strengthMultiplier = hasStrength($this, $targetPokemon);
        $this->specialEffect($targetPokemon); //sprawdzić to!!!
        echo "<h1>$strengthMultiplier</h1>";
        $targetHp= $targetPokemon->get_actualhp();
        $targetHp-=$this->sila*$strengthMultiplier;
        $targetPokemon->set_actualhp($targetHp);
      }

      function printCard(){
          echo "<div class=\"card\"style='background-color: $this->cardColor;'>";
          echo "<img class='cardImage' src='$this->pathToPhoto'>";
          echo "<div class=\"content\">
          <h4>Nazwa: $this->nazwa</h4>
          typ: $this->rodzaj <br/>
          moc: $this->sila <br/>
          aktualne HP: $this->hp_aktualne <br/>
          </div>";
          echo "</div>";
      }
    }

    function hasStrength($source, $target){
        foreach($source->strengths as $strength){
            // echo "siła: $strength <br/>";
            if (in_array($strength, $target->weaknesses)) {
                return 0.5;
            }
        }
        foreach($source->weaknesses as $weakness){
            // echo "siła: $weakness <br/>";
            if (in_array($weakness, $target->weaknesses)) {
                return 2.0;
            }
        }
        return 1;
      }

    //czemu kazdy rodzaj ma mieć osobną klasę nie mam pojęcia, dziwne jakieś
class Woda extends Pokemon {
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($nazwa, $rodzaj, $hp_max, $sila, $photo){
        parent::__construct($nazwa, $rodzaj, $hp_max, $sila, $photo);
        $this->strengths = array('Ground', 'Rock', 'Fire');
        $this->weaknesses = array('Water', 'Grass', 'Dragon');
        $this->cardColor = '#eed535';
    }
    public function specialEffect(Pokemon $targetPokemon){
            return false;
    }

}
class Ogien extends Pokemon {
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($nazwa, $rodzaj, $hp_max, $sila, $photo){
        parent::__construct($nazwa, $rodzaj, $hp_max, $sila, $photo);
        $this->strengths = array('Bug', 'Steel', 'Grass', 'Ice');
        $this->weaknesses = array('Rock', 'Fire', 'Water', 'Dragon');
        $this->cardColor = '#fd7d24';
        
    }
    public function specialEffect(Pokemon $targetPokemon){
        return false;
    }

}
class Prad extends Pokemon {
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($nazwa, $rodzaj, $hp_max, $sila, $photo){
        parent::__construct($nazwa, $rodzaj, $hp_max, $sila, $photo);
        $this->strengths = array('Flying', 'Water');
        $this->weaknesses = array('Ground', 'Grass', 'Electric', 'Dragon');
        $this->cardColor = '#4592c4';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            echo "$this->name użył paraliżu na $this->get_nazwa()<br/>";
            $targetPokemon->set_paralyze(True);
        }else return false;
    }

}

class Psychiczny extends Pokemon {
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($nazwa, $rodzaj, $hp_max, $sila, $photo){
        parent::__construct($nazwa, $rodzaj, $hp_max, $sila, $photo);
        $this->strengths = array('Fighting', 'Poison');
        $this->weaknesses = array('Steel', 'Psychic', 'Dark');
        $this->cardColor = '#f366b9';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            $targetPokemon->set_confuse(True);
        }else return false;
    }
}

function rollTheDice(){
    $liczba = rand(0,9);
    if($liczba % 2) {return true;}else{return false;}
}

class walka{
   public Pokemon $poke1;
   public Pokemon $poke2;

   public function __construct($poke1, $poke2) {
    $this->poke1= $poke1;
    $this->poke2= $poke2;
   }
   public function go(){
       while ($this->poke1->get_actualhp() >= 0 && $this->poke2->get_actualhp() >= 0) {
           $this->poke1->attack($this->poke2);
           $this->poke2->attack($this->poke1);
       }
       //dokończyć!!!
   }

}


$poke1 = new Ogien('Charmander','Fire',30,5,'charmander.png');
$poke2 = new Prad('Pikachu','Electric',30,7,'pikachu.png');
$poke3 = new Woda('Magikarp','Water',20,2,'magikarp.png');
$poke4 = new Psychiczny('Abra','Psychic',50,5,'Abra.png');
$poke5 = new Psychiczny('Abra','Psychic',50,5,'Abra.png');

// print_r($poke1);
echo "<br>";
// print_r($poke2);
echo "<br>";
// print_r($poke3);
$poke1->printCard();
$poke2->printCard();
$poke3->printCard();
$poke4->printCard();

$poke4->attack($poke4);


$poke
?>


</div>
</body>
</html>
