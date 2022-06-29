<?php

namespace App\Libraries;

use DateTime;

class Ctools
{
    // This function converts a string into slug format
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


    public function dateVersChainetext($chaine, $langue)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "0000-00-00";
        $valeur = explode("-", $chaine);
        return
            $valeur[2] . " " . $this->mois($valeur[1], $langue) . " " . $valeur[0];
    }
    public function jour($num, $langue)
    {
        $Jour['ht'] = array("Dimanch", "Lendi", "Madi", "Mèkredi", "Jedi", "Vendredi", "Samdi");
        $Jour['fr'] = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        $Jour['us'] = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thusday", "Friday", "Saturday");

        return $Jour[$langue][$num];
    }
    public function mois($valeur, $langue)
    {
        $mois['fr'] = array('', 'janv.', 'févr.', 'mars', 'avril', 'mai', 'juin', 'juil.', 'août', 'sept.', 'oct.', 'nov.', 'dec');
        $mois['us'] = array('', 'jan.', 'feb.', 'march', 'april', 'may', 'june', 'july.', 'aug.', 'sept.', 'oct.', 'nov.', 'dec');
        $mois['ht'] = array('', 'janv.', 'fev.', 'mas', 'avril', 'me', 'jen', 'jiyè.', 'out', 'sept.', 'oct.', 'nov.', 'dec');

        return $mois[$langue][intval($valeur)];
    }
    public function valeur_n_chiffres($valeur, $n)
    {
        $taille = strlen($valeur);
        $element = "";
        for ($i = 1; $i <= ($n - $taille); $i++) {
            $element .= "0";
        }
        $element .= $valeur;
        return
            $element;
    }

    public function crypt($txt)
    {
        $encrypter = \Config\Services::encrypter();
        return bin2hex($encrypter->encrypt($txt));
    }
    public function decrypt($txt)
    {
        $encrypter = \Config\Services::encrypter();
        return $encrypter->decrypt(hex2bin($txt));
    }

    public function str_without_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;   // or add this : mb_strtoupper($str); for uppercase :)
    }

    public function urlMessaEncode($valeur)
    {

        $valeur = str_replace(" ", "ESPACE",   $valeur);
        $valeur = str_replace("/", "SLASH",    $valeur);
        $valeur = str_replace("+", "PLUS",     $valeur);
        $valeur = str_replace("*", "STAR",     $valeur);
        $valeur = str_replace("?", "MARK",     $valeur);

        return $valeur;
    }

    public function urlMessaDecode($valeur)
    {

        $valeur = str_replace("ESPACE",    " ",   $valeur);
        $valeur = str_replace("SLASH",     "/",   $valeur);
        $valeur = str_replace("PLUS",      "+",   $valeur);
        $valeur = str_replace("STAR",      "*",   $valeur);
        $valeur = str_replace("MARK",      "?",   $valeur);

        return $valeur;
    }

    public function v_date($l_date)
    {
        if (validateDate($l_date, 'Y-m-d') or $l_date == "") {
            return $l_date;
        } else {
            return null;
        }
    }

    public function date_du_jour()
    {
        $Jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        $Mois = array("", "Janvier", "F&eacute;vrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "D&eacute;cembre");
        return $Jour[date("w")] . " " . date("d") . " " . $Mois[date("n")] . " " . date("Y");
    }

    //==========================================
    public function addhttp($url)
    {
        if (!preg_match("@^[hf]tt?ps?://@", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
    //=======================================
    // TRONQUER UNE CHAINE DE CARACTERE 
    //======================================

    public function tronquer($texte, $nbrChar, $append = '...')
    {
        if (strlen($texte) > $nbrChar) {
            $texte = substr($texte, 0, $nbrChar);
            $texte .= $append;
        }

        return $texte;
    }

    public function verticletext($string)
    {
        $txt = "";
        $tlen = strlen($string);
        for ($i = 0; $i < $tlen; $i++) {
            $txt .= substr($string, $i, 1) . "<br />";
        }

        return $txt;
    }
    // ===========================================
    //     EXTRAIRE LES CARACTERES DANS UNE CHAINE 
    //============================================


    public function clean($texte)
    {

        $aremplacer = array("{", "}", "<", ">", "$", "/", "\\", "'", " ", "-");

        $enremplacement = "";

        $mots = trim(str_replace($aremplacer, $enremplacement, $texte));

        return $mots;
    }
    // ===========================================
    //     CONTROL DES CARACTERES DANS UNE CHAINE 
    //============================================
    public function date_fr($date = 0)
    {
        if (!$date)
            $date = date("Y-m-d H:i:s A"); //Timestamp courant par défaut

        $a = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $j = substr($date, 8, 2);
        $h = substr($date, 11, 2);
        $min = substr($date, 14, 2);
        $s = substr($date, 17, 2);
        $a1 = substr($date, 20, 2);
        $datefr = $j . '/' . $m . '/' . $a;
        $heurefr = $h . ':' . $min . " " . $a1;
        return array("date" => $datefr, "heure" => $heurefr);
    }

    public function chaineVersDate($chaine)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "00/00/0000";
        $valeur = explode("/", $chaine);
        return
            $valeur[2] . "-" . valeur_n_chiffres($valeur[1], 2) . "-" . valeur_n_chiffres($valeur[0], 2);
    }

    public function enDate($chaine)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "00/00/0000";
        $valeur = explode("/", $chaine);

        if (count($valeur) <= 0) {
            $valeur = explode("-", $chaine);
        }
        if (count($valeur) <= 0) {
            $valeur = explode("/", "00/00/0000");
        }
        $v1 = $valeur[0] ?? '00';
        $v2 = $valeur[1] ?? '00';
        $v3 = $valeur[2] ?? '0000';
        return
            valeur_n_chiffres($v1, 2) . '/' . valeur_n_chiffres($v2, 2) . '/' . valeur_n_chiffres($v3, 4);
    }

    public function dateVersChaine($chaine)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "0000-00-00";
        $valeur = explode("-", $chaine);
        return
            $valeur[2] . "/" . $valeur[1] . "/" . $valeur[0];
    }

    public function dateVersChainetextHeure($chaine)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "0000-00-00";
        $valeur = explode("-", $chaine);
        return
            $valeur[2] . "-" . mois($valeur[1]) . "-" . $valeur[0] . " " . $el[1];
    }

    public function dateVersChainetextCourt($chaine)
    {
        $el = explode(" ", $chaine);
        $chaine = $el[0];
        if ($chaine == "") $chaine = "0000-00-00";
        $valeur = explode("-", $chaine);
        return
            $valeur[2] . "-" . mois($valeur[1]);
    }

    public function Age($d1, $d2)
    {

        $dStart = new DateTime($d1);
        $dEnd   = new DateTime($d2);
        $dDiff  = $dStart->diff($dEnd);
        $dDiff->format('%r'); // use for point out relation: smaller/greater
        return
            $dDiff->days . " jour(s)";
    }

    public function Age2($naiss)
    {
        list($annee, $mois, $jour) = explode('-', $naiss);
        $today['mois'] = date('n');
        $today['jour'] = date('j');
        $today['annee'] = date('Y');
        $annees = $today['annee'] - $annee;
        if ($today['mois'] <= $mois) {
            if ($mois == $today['mois']) {
                if ($jour > $today['jour'])
                    $annees--;
            } else
                $annees--;
        }
        return $annees;
    }

    public function dec($chaine)
    {
        return utf8_decode($chaine);
    }
    public function enc($chaine)
    {
        return utf8_encode($chaine);
        //return htmlentities($chaine, 0, 'UTF-8');

    }

    public function Enfr($chaine)
    {
        return html_entity_decode($chaine, ENT_COMPAT, "UTF-8");
    }
    public function U8($chaine)
    {
        return htmlentities($chaine, ENT_QUOTES, "UTF-8");
    }

    public function wd_remove_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }

    public function removeAccents($str)
    {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
        return str_replace($a, $b, $str);
    }

    public function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function format_code($text)
    {
        $scode = str_split($text);
        for ($t = 0; $t < 10; $t++) {
            if (!isset($scode[$t])) $scode[$t] = "";
        }
        return $scode[0] . $scode[1] . $scode[2] . $scode[3] . "-" . $scode[4] . $scode[5] . $scode[6] . "-" . $scode[7] . $scode[8] . $scode[9];
    }

    public function format_verify_code($text)
    {
        $scode = str_split($text);
        for ($t = 0; $t < 16; $t++) {
            if (!isset($scode[$t])) $scode[$t] = "";
        }
        return trim($scode[0] . $scode[1] . $scode[2] . $scode[3] . $scode[4] .
            "-" . $scode[5] . $scode[6] . $scode[7] . $scode[8] .
            "-" . $scode[9] . $scode[10] . $scode[11] . $scode[12] .
            "-" . $scode[13] . $scode[14] . $scode[15] . $scode[16]);
    }

    public function FormatZero($valeur)
    {

        if ($valeur == 0) {
            $valeur = "";
        }
        return $valeur;
    }

    public function sans_vide($str)
    {

        $new_str = preg_replace("/\s+/", "", $str);
        return $new_str;
    }

    public function remove_accents($string)
    {
        if (!preg_match('/[\x80-\xff]/', $string))
            return $string;

        $chars = array(
            // Decompositions for Latin-1 Supplement
            chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
            chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
            chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
            chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
            chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
            chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
            chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
            chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
            chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
            chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
            chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
            chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
            chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
            chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
            chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
            chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
            chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
            chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
            chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
            chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
            chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
            chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
            chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
            chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
            chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
            chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
            chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
            chr(195) . chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
            chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
            chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
            chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
            chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
            chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
            chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
            chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
            chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
            chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
            chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
            chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
            chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
            chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
            chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
            chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
            chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
            chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
            chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
            chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
            chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
            chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
            chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
            chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
            chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
            chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
            chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
            chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
            chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
            chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
            chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
            chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
            chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
            chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
            chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
            chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
            chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
            chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
            chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
            chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
            chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
            chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
            chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
            chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
            chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
            chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
            chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
            chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
            chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
            chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
            chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
            chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
            chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
            chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
            chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
            chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
            chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
            chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
            chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
            chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
            chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
            chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
            chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
            chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's'
        );

        $string = strtr($string, $chars);

        return $string;
    }


    //=======================
}
