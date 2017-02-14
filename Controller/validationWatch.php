<?php

class validationWatch
{

private $error;
    /**
     * validationWatch constructor.
     */

    public function validateWatchForm() // För att validera textfälten.
    {
        $errormsg = array();


        foreach ($_POST as $key => $value) {


            $_POST[$key] = strip_tags(trim($value)); //Tar bort eventuella tags som  <a><p>, sedan trimmar dvs tar bort eventuella blanksteg.

            if ($value == '') { //Är värdet tomt dvs ingenting i textfälten, laddas det i $errormsg arrayen som ett felmeddelande.


                $errormsg[$key] = 'Kan inte vara tomt, fyll i fältet';
            } else { //Annars

                switch ($key) { //Kollar den igenom $key med en switch sats.
                    case 'id':

                        if ($this->validationNumber($value) != NULL) { //Vid case 'id' kollar om validation inte är null.
                            $errormsg[$key] = $this->validationNumber($value); //Isf spar det returnerade värdet från dess function till $errormsg[$key]
                        }
                        break;

                    case 'username':
                        if ($this->validationLogin($value) != NULL) {
                            $errormsg[$key] = $this->validationLogin($value);
                        }

                        break;

                    case 'passwd':

                        if ($this->validationLogin($value) != NULL) {
                            $errormsg[$key] = $this->validationLogin($value);
                        }

                        break;



                    case 'namn':

                    break;

                    case 'Marke':
                        break;
                    case 'kategori':
                        break;
                    case 'beskrivning':
                        break;
                    case 'pris':
                        if ($this->validationNumber($value) != NULL) {
                            $errormsg[$key] = $this->validationNumber($value);
                        }
                        break;

                    case 'lager':
                        if ($this->validationNumber($value) != NULL) {
                            $errormsg[$key] = $this->validationNumber($value);
                        }
                        break;

                    case 'bildurl':
                        if ($this->validationBild($value) != NULL) {
                            $errormsg[$key] = $this->validationBild($value);
                        }
                        break;
                    default:
                }
            }
        }

        return $errormsg; //Skickar tillbaka fyllt $errormsg
    }


    private function validationNumber($id){ //De olika errorfunktionerna.



//Med hjälp av functionen strpbrk (som kollar ett set av definerade värden) om detta villkor är uppfylt. Annars skicka ut ett felmeddelande om vad som är galet.
        if (strpbrk($id, 'abcdefghijklmnopqrstuvw') !== FALSE){
            $error = 'Bara siffror 0-9';

        }
        return $error;
    }

    public function validationLogin() { //Validering för login.

        $user = 'admin';
        $psw = 'admin';

        if($_POST['username'] == $user && $_POST['passwd'] == $psw) { //Kolla om user och passwd stämmer överrens. Annars skicka ut ett felmeddelande.
    } else {

        $error = 'Felaktiga uppgifter!';
        }

        return $error;
    }

    private function validationBild($bild) {


        $filandelse = substr($bild, -4); //Spar det hämtade värden till $filändelse och substringar det till des 4 sista bokstäver.


        //Med hjälå av funktionen strcmp(string compare) jämförs olika alternativ. Ingen träff skicka felmeddelande.
        if (strcmp($filandelse, '.jpg') == 0 || strcmp($filandelse, '.png') == 0 || strcmp($filandelse, '.gif') == 0) {

        } else {
            $error = 'Bildfiländelsen måste sluta på .jpg .png eller .gif';
        }
        return $error;
    }






}


?>