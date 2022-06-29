<?php
//	=======================================================
//      ECODER ET DECODER  
//		UNE CHAINE DE CARACTERRE
//	====================================================

function Messa_encrypt($data) {
    $key = "htu3mpV";  // Clé de 8 caractères max
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data;
}
 
function Messa_decrypt($data) {
    $key = "htu3mpV";
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = mdecrypt_generic($td, base64_decode($data));
    mcrypt_generic_deinit($td);
 
    if (substr($data,0,1) != '!')
        return false;
 
    $data = substr($data,1,strlen($data)-1);
    return unserialize($data);
} 
//==========================================
function addhttp($url) {
    if (!preg_match("@^[hf]tt?ps?://@", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
//=======================================
// TRONQUER UNE CHAINE DE CARACTERE 
//======================================

function tronquer($texte, $nbrChar, $append='...') {
    if(strlen($texte) > $nbrChar) {
        $texte = substr($texte, 0, $nbrChar);
        $texte .= $append;
    }

    return $texte;

}
 function verticletext($string)
    {
       $txt = "";
	   $tlen = strlen($string);
       for($i=0;$i<$tlen;$i++)
       {
            $txt .= substr($string,$i,1)."<br />";   
       }
	   
	   return $txt;
    }
// ===========================================
//     EXTRAIRE LES CARACTERES DANS UNE CHAINE 
//============================================


function clean($texte)
{    
    
    $aremplacer = array("{","}","<",">","$","/","\\","'"," ","-");
    
    $enremplacement = ""; 

    $mots = trim(str_replace($aremplacer, $enremplacement, $texte)); 
    
    return $mots;
}
// ===========================================
//     CONTROL DES CARACTERES DANS UNE CHAINE 
//============================================
function date_fr($date=0) 
{
  if(!$date)
    $date=date("Y-m-d H:i:s A"); //Timestamp courant par défaut

    $a = substr($date, 0, 4);
    $m = substr($date, 5, 2);
    $j = substr($date, 8, 2);
    $h = substr($date, 11, 2);
    $min = substr($date, 14, 2);
    $s = substr($date, 17, 2);
	$a1 = substr($date, 20, 2);
 $datefr=$j.'/'.$m.'/'.$a;
 $heurefr=$h.':'.$min." ".$a1;
        return array("date"=>$datefr,"heure"=>$heurefr);
}

define ("NODE_TYPE_START",0);
define ("NODE_TYPE_ELEMENT",1);
define ("NODE_TYPE_ENDELEMENT",2);
define ("NODE_TYPE_TEXT",3);
define ("NODE_TYPE_COMMENT",4);
define ("NODE_TYPE_DONE",5);
define ("NODE_TYPE_ELEMENT_END",6);

/**
 * Class HtmlParser.
 * To use, create an instance of the class passing
 * HTML text. Then invoke parse() until it's false.
 * When parse() returns true, $iNodeType, $iNodeName
 * $iNodeValue and $iNodeAttributes are updated.
 *
 * To create an HtmlParser instance you may also
 * use convenience functions HtmlParser_ForFile
 * and HtmlParser_ForURL.
 */
class HtmlParser {

    /**
    * Field iNodeType.
    * May be one of the NODE_TYPE_* constants above.
    */
    var $iNodeType;

    /**
    * Field iNodeName.
    * For elements, it's the name of the element.
    */
    var $iNodeName = "";

    /**
    * Field iNodeValue.
    * For text nodes, it's the text.
    */
    var $iNodeValue = "";

    /**
    * Field iNodeAttributes.
    * A string-indexed array containing attribute values
    * of the current node. Indexes are always lowercase.
    */
    var $iNodeAttributes;

    /**
    * Field iNodeStart.
    * The position of the first char.
    */
    var $iNodeStart;

    /**
    * Field iNodeEnd.
    * The position of the last char.
    */
    var $iNodeEnd;

    // The following fields should be 
    // considered private:

    var $iHtmlText;
    var $iHtmlTextLength;
    var $iHtmlTextIndex = 0;
    var $iHtmlCurrentChar;
    var $BOE_ARRAY;
    var $B_ARRAY;
    var $BOS_ARRAY;

    var $no_comment = false;

    //Liste des balises autofermantes
    var $BalisesSimples = array('hr', 'br', 'input', 'meta', 'link', 'img', 
'area', 'param');

    /**
    * Constructor.
    * Constructs an HtmlParser instance with
    * the HTML text given.
    */
    function HtmlParser3 ($aHtmlText) {
        $this->iHtmlText = $aHtmlText;
        $this->iHtmlTextLength = strlen($aHtmlText);
        $this->iNodeAttributes = array();
        $this->setTextIndex (0);

        $this->BOE_ARRAY = array (" ", "\t", "\r", "\n", "=" );
        $this->B_ARRAY = array (" ", "\t", "\r", "\n" );
        $this->BOS_ARRAY = array (" ", "\t", "\r", "\n", "/" );
    }

    /**
    * Method parse.
    * Parses the next node. Returns false only if
    * the end of the HTML text has been reached.

    * Updates values of iNode* fields.
    */
    function parse() {
        $this->iNodeStart = $this->iHtmlTextIndex;
        $text = $this->skipToElement();
        if ($text != "") {
            $this->iNodeType = NODE_TYPE_TEXT;
            $this->iNodeName = "Text";
            $this->iNodeValue = $text;
            $this->iNodeEnd = $this->iHtmlTextIndex;
            return true;
        }
        return $this->readTag();
    }

    function clearAttributes() {
        $this->iNodeAttributes = array();
    }

    function readTag() {
        if ($this->iCurrentChar != "<") {
            $this->iNodeType = NODE_TYPE_DONE;
            return false;
        }
        $this->clearAttributes();
        $this->skipMaxInTag ("<", 1);
        if ($this->iCurrentChar == '/') {
            $this->moveNext();
            $name = $this->skipToBlanksInTag();
            if (strtolower($name) == 'script') {
                $this->no_comment = false;
            }
            $this->iNodeType = NODE_TYPE_ENDELEMENT;
            $this->iNodeName = $name;
            $this->iNodeValue = "";
            $this->skipEndOfTag();
            $this->iNodeEnd = $this->iHtmlTextIndex;
            return true;
        }
        $name = $this->skipToBlanksOrSlashInTag();
        if (!$this->isValidTagIdentifier ($name)) {
            $comment = false;
            if ((strpos($name, "!--") === 0) && (!$this->no_comment)) {
                $ppos = strpos($name, "--", 3);
                if (strpos($name, "--", 3) === (strlen($name) - 2)) {
                    $this->iNodeType = NODE_TYPE_COMMENT;
                    $this->iNodeName = "Comment";
                    $this->iNodeValue = "<" . $name . ">";
                    $comment = true;
                } else {
                    $rest = $this->skipToStringInTag ("-->");
                    if ($rest != "") {
                        $this->iNodeType = NODE_TYPE_COMMENT;
                        $this->iNodeName = "Comment";
                        $this->iNodeValue = "<" . $name . $rest;
                        $comment = true;
                        // Already skipped end of tag
                        $this->iNodeEnd = $this->iHtmlTextIndex;
                        return true;
                    }
                }
            }
            if (!$comment) {
                $this->iNodeType = NODE_TYPE_TEXT;
                $this->iNodeName = "Text";
                $this->iNodeValue = "<" . $name;
                $this->iNodeEnd = $this->iHtmlTextIndex;
                return true;
            }
        } else {
            if (strtolower($name) == 'script') {
                $this->no_comment = true;
            }
            $this->iNodeType = NODE_TYPE_ELEMENT;
            $this->iNodeValue = "";
            $this->iNodeName = $name;
            while ($this->skipBlanksInTag()) {
                $attrName = $this->skipToBlanksOrEqualsInTag();
                if ($attrName != "" && $attrName != "/") {
                    $this->skipBlanksInTag();
                    if ($this->iCurrentChar == "=") {
                        $this->skipEqualsInTag();
                        $this->skipBlanksInTag();
                        $value = $this->readValueInTag();
                        $this->iNodeAttributes[strtolower($attrName)] = $value;
                    } else {
                        $this->iNodeAttributes[strtolower($attrName)] = "";
                        $this->setTextIndex ($this->iHtmlTextIndex - 1);
                    }
                }
            }
        }
        if (($this->iHtmlText{$this->iHtmlTextIndex - 1} == '/') || (in_array(
$this->iNodeName, $this->BalisesSimples))) {
            $this->iNodeType = NODE_TYPE_ELEMENT_END;
        }
        $this->skipEndOfTag();
        $this->iNodeEnd = $this->iHtmlTextIndex;
        return true;
    }

    function isValidTagIdentifier ($name) {
        return @ereg ("^[A-Za-z0-9_\\-]+$", $name);
    }

    function skipBlanksInTag() {
        return "" != ($this->skipInTag ($this->B_ARRAY));
    }

    function skipToBlanksOrEqualsInTag() {
    return $this->skipToInTag ($this->BOE_ARRAY);
    }

    function skipToBlanksInTag() {
        return $this->skipToInTag ($this->B_ARRAY);
    }

    function skipToBlanksOrSlashInTag() {
        return $this->skipToInTag ($this->BOS_ARRAY);
    }

    function skipEqualsInTag() {
        return $this->skipMaxInTag ("=", 1);
    }

    function readValueInTag() {
        $ch = $this->iCurrentChar;
        $value = "";
        if ($ch == "\"") {
            $this->skipMaxInTag ("\"", 1);
            $value = $this->skipToInTag ("\"");
            $this->skipMaxInTag ("\"", 1);
        } elseif ($ch == "'") {
            $this->skipMaxInTag ("'", 1);
            $value = $this->skipToInTag ("'");
            $this->skipMaxInTag ("'", 1);
        } else {
            $value = $this->skipToBlanksInTag();
        }
        return $value;
    }

    function setTextIndex ($index) {
        $this->iHtmlTextIndex = $index;
        if ($index >= $this->iHtmlTextLength) {
            $this->iCurrentChar = -1;
        } else {
            $this->iCurrentChar = $this->iHtmlText{$index};
        }
    }

    function moveNext() {
        if ($this->iHtmlTextIndex < $this->iHtmlTextLength) {
            $this->setTextIndex ($this->iHtmlTextIndex + 1);
            return true;
        } else {
            return false;
        }
    }

    function skipEndOfTag() {
        while (($ch = $this->iCurrentChar) !== -1) {
            if ($ch == ">") {
            $this->moveNext();
            return;
            }
            $this->moveNext();
        }
    }

    function skipInTag ($chars) {
        $sb = "";
        while (($ch = $this->iCurrentChar) !== -1) {
            if ($ch == ">") {
                return $sb;
            } else {
                $match = false;
                for ($idx = 0; $idx < count($chars); $idx++) {
                    if ($ch == $chars[$idx]) {
                    $match = true;
                    break;
                    }
                }
                if (!$match) {
                    return $sb;
                }
                $sb .= $ch;
                $this->moveNext();
            }
        }
        return $sb;
    }

    function skipMaxInTag ($chars, $maxChars) {
        $sb = "";
        $count = 0;
        while (($ch = $this->iCurrentChar) !== -1 && $count++ < $maxChars) {
            if ($ch == ">") {
                return $sb;
            } else {
                $match = false;
                for ($idx = 0; $idx < count($chars); $idx++) {
                    if ($ch == $chars[$idx]) {
                    $match = true;
                    break;
                    }
                }
                if (!$match) {
                    return $sb;
                }
                $sb .= $ch;
                $this->moveNext();
            }
        }
        return $sb;
    }

    function skipToInTag ($chars) {
        $sb = "";
        while (($ch = $this->iCurrentChar) !== -1) {
            $match = $ch == ">";
            if (!$match) {
                for ($idx = 0; $idx < count($chars); $idx++) {
                    if ($ch == $chars[$idx]) {
                        $match = true;
                        break;
                    }
                }
            }
            if ($match) {
                return $sb;
            }
            $sb .= $ch;
            $this->moveNext();
        }
        return $sb;
    }

    function skipToElement() {
        $sb = "";
        while (($ch = $this->iCurrentChar) !== -1) {
            if ($ch == "<") {
                return $sb;
            }
            $sb .= $ch;
            $this->moveNext();
        }
        return $sb;
    }

    /**
    * Returns text between current position and $needle,
    * inclusive, or "" if not found. The current index is moved to a point
    * after the location of $needle, or not moved at all
    * if nothing is found.
    */
    function skipToStringInTag ($needle) {
        $pos = strpos ($this->iHtmlText, $needle, $this->iHtmlTextIndex);
        if ($pos === false) {
            return "";
        }
        $top = $pos + strlen($needle);
        $retvalue = substr ($this->iHtmlText, $this->iHtmlTextIndex, $top - 
$this->iHtmlTextIndex);
        $this->setTextIndex ($top);
        return $retvalue;
    }
}

function HtmlParser_ForFile ($fileName) { 
    return HtmlParser_ForURL($fileName);
}

function HtmlParser_ForURL ($url) {
    $fp = fopen ($url, "r");
    $content = "";
    while (true) {
        $data = fread ($fp, 8192);
        if (strlen($data) == 0) {
            break;
        }
        $content .= $data;
    }
    fclose ($fp);
    return new HtmlParser ($content);
}

function TronqueHtml($chaine, $max, $separateur = ' ', $suffix = ' ...') {
    if (strlen(strip_tags($chaine)) > $max) {
        $tabElements = array();
        $cur_len = 0;
        $parser = new HtmlParser($chaine);
        while ($parser->parse()) {
            if ($parser->iNodeType == NODE_TYPE_ELEMENT) {
                array_push($tabElements, $parser->iNodeName);
            } elseif ($parser->iNodeType == NODE_TYPE_ENDELEMENT) {
                while (array_pop($tabElements) != $parser->iNodeName) {
                    if (count($tabElements) < 1) {
                        echo 'Erreur : pas de balise ouvrante pour ' . $parser->
iNodeName;
                    }
                }
            } elseif ($parser->iNodeType == NODE_TYPE_TEXT) {
                $cur_max = $cur_len + $parser->iNodeEnd - $parser->iNodeStart;
                if ($cur_max == $max) {
                    $resultat = substr($chaine, 0, $parser->iNodeEnd) . $suffix;
                    while (($balise = array_pop($tabElements)) !== null) {
                        $resultat .= '</' . $balise . '>';
                    }
                    return $resultat;
                } elseif ($cur_max > $max) {
                    if (($pos = strrpos(substr($parser->iNodeValue, 0, ($max - 
$cur_len + strlen( $separateur ))), $separateur)) !== false) {
                        $resultat = substr($chaine, 0, $parser->iNodeStart + 
$pos) . $suffix;
                        while (($balise = array_pop($tabElements)) !== null) {
                            $resultat .= '</' . $balise . '>';
                        }
                        return $resultat;
                    } else {
                        $resultat = substr($chaine, 0, $parser->iNodeEnd) . 
$suffix;
                        while (($balise = array_pop($tabElements)) !== null) {
                            $resultat .= '</' . $balise . '>';
                        }
                        return $resultat;
                    }
                } else {
                    $cur_len += $parser->iNodeEnd - $parser->iNodeStart;
                }
            }
        }
    }
    return $chaine;
}


function mois($valeur){
$mois = "";
$el = intval($valeur);
	switch($el){
		case 1 : $mois = "jan";
		break;
		case 2 : $mois = "fev";
		break;
		case 3 : $mois = "mars";
		break;
		case 4 : $mois = "avr";
		break;
		case 5 : $mois = "mai";
		break;
		case 6 : $mois = "juin";
		break;
		case 7 : $mois = "juil";
		break;
		case 8 : $mois = "aout"; 
		break;
		case 9 : $mois = "sept";
		break;
		case 10 : $mois = "oct";
		break;
		case 11 : $mois = "nov"; 
		break;
		case 12 : $mois = "dec";
		break;	
	}
return $mois;
}
function chaineVersDate($chaine){
$el = explode(" ",$chaine);
$chaine = $el[0];
if ($chaine == "") $chaine = "00/00/0000";
$valeur = explode("/", $chaine);
return 
$valeur[2]."-".$valeur[1]."-".$valeur[0];
}

function dateVersChaine($chaine){
$el = explode(" ",$chaine);
$chaine = $el[0];
if ($chaine == "") $chaine = "0000-00-00";
$valeur = explode("-", $chaine);
return 
$valeur[2]."/".$valeur[1]."/".$valeur[0];
}

function dateVersChainetext($chaine){
$el = explode(" ",$chaine);
$chaine = $el[0];
if ($chaine == "") $chaine = "0000-00-00";
$valeur = explode("-", $chaine);
return 
$valeur[2]."-".mois($valeur[1])."-".$valeur[0];
}

function dateVersChainetextHeure($chaine){
$el = explode(" ",$chaine);
$chaine = $el[0];
if ($chaine == "") $chaine = "0000-00-00";
$valeur = explode("-", $chaine);
return 
$valeur[2]."-".mois($valeur[1])."-".$valeur[0]." ".$el[1];
}

function dateVersChainetextCourt($chaine){
$el = explode(" ",$chaine);
$chaine = $el[0];
if ($chaine == "") $chaine = "0000-00-00";
$valeur = explode("-", $chaine);
return 
$valeur[2]."-".mois($valeur[1]);
}

function Age($d1,$d2){

	$dStart = new DateTime($d1);
	$dEnd  = new DateTime($d2);
   	$dDiff = $dStart->diff($dEnd);
   	$dDiff->format('%r'); // use for point out relation: smaller/greater
   	return 
	$dDiff->days." jour(s)";

}

function Age2($naiss)  {
  list($annee, $mois, $jour) = explode('-', $naiss);
  $today['mois'] = date('n');
  $today['jour'] = date('j');
  $today['annee'] = date('Y');
  $annees = $today['annee'] - $annee;
  if ($today['mois'] <= $mois) {
    if ($mois == $today['mois']) {
      if ($jour > $today['jour'])
        $annees--;
      }
    else
      $annees--;
    }
  return $annees;
  }

function dec($chaine){
	return utf8_decode($chaine);
}
function enc($chaine){
	return utf8_encode($chaine);
	//return htmlentities($chaine, 0, 'UTF-8');
	
}

function Enfr($chaine){
	return html_entity_decode($chaine, ENT_COMPAT, "UTF-8");
}
function U8($chaine){
	return htmlentities($chaine, ENT_QUOTES, "UTF-8");
}

function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}
function valeur_n_chiffres($valeur,$n){
$taille = strlen($valeur);
$element = "";
		for($i=1;$i<=($n-$taille);$i++){
		$element .= "0";
		}
		$element .=$valeur;
		return
		$element;
}
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function format_code($text){
	$scode = str_split($text);
		for($t=0;$t<10;$t++){
			if(!isset($scode[$t])) $scode[$t] = "";
		}
	return $scode[0].$scode[1].$scode[2].$scode[3]."-".$scode[4].$scode[5].$scode[6]."-".$scode[7].$scode[8].$scode[9];
}

function format_verify_code($text){
	$scode = str_split($text);
		for($t=0;$t<16;$t++){
			if(!isset($scode[$t])) $scode[$t] = "";
		}
	return trim($scode[0].$scode[1].$scode[2].$scode[3].$scode[4].
	       "-".$scode[5].$scode[6].$scode[7].$scode[8].
	       "-".$scode[9].$scode[10].$scode[11].$scode[12].
	       "-".$scode[13].$scode[14].$scode[15].$scode[16]);
}
?>
