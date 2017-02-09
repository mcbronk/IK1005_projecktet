<?php

class validationWatch
{

private $error;
    /**
     * validationWatch constructor.
     */

    public function validateWatchForm()
    {
        $errormsg = array();


        foreach ($_POST as $key => $value) {


            $_POST[$key] = strip_tags(trim($value));

            if ($value == '') {


                $errormsg[$key] = 'Kan inte vara tomt, fyll i fältet';
            } else {

                switch ($key) {
                    case 'id':

                        if ($this->validationNumber($value) != NULL) {
                            $errormsg[$key] = $this->validationNumber($value);
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
                }//end switch
            }//end else
        }//end foreach
//retuner arryem med felmeddelanden
        return $errormsg;
    }


    private function validationNumber($id){




        if (strpbrk($id, 'abcdefghijklmnopqrstuvw') !== FALSE){
            $error = 'Bara siffror 0-9';

        }
        return $error;
    }

    private function validationBild($bild) {


        $filandelse = substr($bild, -4);

        if (strcmp($filandelse, '.jpg') == 0 || strcmp($filandelse, '.png') == 0 || strcmp($filandelse, '.gif') == 0) {

        } else {
            $error = 'Bildfiländelsen måste sluta på .jpg .png eller .gif';
        }
        return $error;
    }






}


?>