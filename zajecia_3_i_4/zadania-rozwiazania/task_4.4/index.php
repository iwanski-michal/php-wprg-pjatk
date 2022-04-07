<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-color: #4076ff;
            font-family: Verdana;
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px 20px;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .form-control {
            text-align: left;
            margin-bottom: 25px;
        }

        .form-control label {
            display: block;
            margin-bottom: 10px;
        }

        .form-control input,
        .form-control select,
        .form-control textarea {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 95%;
        }

        .form-control input[type="radio"],
        .form-control input[type="checkbox"] {
            display: inline-block;
            width: auto;
        }

        button {
            background-color: #4076ff;
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            font-size: 21px;
            color: white;
            display: block;
            width: 100%;
            margin-top: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Jakaś randomowa sonda</h1>

    <form id="form" action="checkForm.php" method="post">

        <div class="form-control">
            <label for="name" id="label-name">
                Imię
            </label>

            <input type="text" id="name" name="name" placeholder="Podaj swoje imię" />
        </div>

        <div class="form-control">
            <label for="email" id="label-email">
                Email
            </label>

            <input type="email" id="email" name="email" placeholder="podaj email" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">
                Wiek
            </label>

            <input type="text" id="age" name="age" placeholder="daj swój wiek" />
        </div>

        <div class="form-control">
            <label for="role" id="label-role">
                Prosta akcja, dzisiaj piwo to: <small> (twoja odpowiedź)</small>
            </label>

            <select name="piwoszRodzaj" id="role">
                <option value="driver">Nie mogę, prowadzę</option>
                <option value="piwoEnjoyer">Proste, że tak</option>
                <option value="piwoOdmawiacz">
                    dzisiaj nie mogę
                </option>
                <option value="nieStudent">Nie piję piwa</option>
            </select>
        </div>

        <div class="form-control">
            <label>
                Czy zdasz analizę matematyczną?
            </label>
            <label for="recommed-1">
                <input type="radio" id="recommed-1" name="recommed">Tak</input>
            </label>
            <label for="recommed-2">
                <input type="radio" id="recommed-2" name="recommed">Nie</input>
            </label>
            <label for="recommed-3">
                <input type="radio" id="recommed-3" name="recommed">Nie ma spiny, są drugie terminy</input>
            </label>
        </div>

        <div class="form-control">
            <label>Którego przedmiotu najbardziej nie ogarniasz
                <small>(tylko mów prawdę)</small>
            </label>
            <label>
                <input type="checkbox" name="subject[]" value="RBD">RBD(bazy danych)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="POJ">POJ(Java)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="WPRG">WPRG(PHP)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="AM">AM(analiza matematyczna)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="WF">WF(poważnie?)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="FIZ">FIZ(spoko, ja też nie)</input></label>
            <label>
                <input type="checkbox" name="subject[]" value="ANG">ANG(XD?)</input></label>

        </div>
        <button type="submit" value="submit">
            Submit
        </button>
    <?php 
    if ($_GET) {
        # code...
    }
    if(isset($_COOKIE['voted']) && $_COOKIE['voted'] == true){
        echo "Już głosowałeś mordo!";
        echo "Następny głos możesz oddać jutro <br/>";
        echo "Albo jak skasujesz ciastko, co jest dziecinnie proste";
    }
    ?>
    </form>
</body>

</html>