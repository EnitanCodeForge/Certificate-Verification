<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
//Copyright to Frost Codes( Oluwaseyi Aderinkomi )
//Of PUNCHLINE TECHNOLOGIES

//respect my code...  

//This file contains just a few misc. functions 
//that i find very useful as i face this problems regularly

//so decided to write this file and compile from various sources
//while stating their copyright

//yea .. i respect copyright a lot.. so PLEASE DO!!

//And yea  its poorly commented i guess but in nearest feature,
//i will consider commmenting it well
//As you can see i have a program to build

//BYE  :)  ... use with LOVE ......
//...........
//........................
//..........................
//FROST CODES 

//>>>>>>>>>>>>  FROST CODES   >>>>>>>>>>>>>>



function text_available($text,$append="",$return_if_empty="",$mode='a'){

    /*
   Usage: this is used to return a combination of two strings 
   if only the first string is not empty
    
    @param $text is the text to check if it is not empty
    @param $append is the text to append if the first parameter is true
    @param $return_if_empty   is the text to return if the test was failed
    @param $mode  should be set to p only if you want to prepend text instead
    of append text 
    
    */
    
    
    //load mode
    $mode=strtolower($mode);
    
    
    
    if(!empty($text)){


        //compare mode
        if($mode=='a'){


           return $append.$text;


       }
       else
       {


           return $text.$append;

       }



   }
   else
   {

    return $return_if_empty;
}



}
 
function list_months(){

    /* Usage: use this to generate a list of months in the year
    */
    
    
    $info = cal_info(0);
    return $info['months']; 
    
} 

function list_abbr_months(){

    /* Usage: use this to generate a list of abbreviated months in the year
    */
    
    
    $info = cal_info(0);
    return $info['abbrevmonths']; 
    
}
 
function PostnotEmptyAndIsset($name){
  if(isset($_POST[$name]) && !empty($_POST[$name]) ){
      return true;

  }
  
  else
  {
    return false;
}

}

function CookieNotEmptyAndIsset($name){
  if(isset($_COOKIE[$name]) && !empty($_COOKIE[$name]) ){
      return true;

  }
  
  else
  {
    return false;
}

}


function isAnEmail($email){
 return preg_match("/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i"  ,$email);
}


function RandomHash(){

    return md5(str_shuffle(bin2hex(time().rand(0,9999))));

}



function is_assoc_array($array)
{
    if(is_array($array) && !is_numeric(array_shift(array_keys($array))))
    {
        return true;
    }
    return false;
}






function UnsetAllCookies(){
    foreach($_COOKIE as $key => $value) {
        setcookie($key,$value,time()-10000,"/",".domain.com");
    }
}




/**************
*@length - length of random string (must be a multiple of 2)
**************/
function readable_random_string($length = 6){
    $conso=array("b","c","d","f","g","h","j","k","l",
        "m","n","p","r","s","t","v","w","x","y","z");
    $vocal=array("a","e","i","o","u");
    $password="";
    srand ((double)microtime()*1000000);
    $max = $length/2;
    for($i=1; $i<=$max; $i++)
    {
        $password.=$conso[rand(0,19)];
        $password.=$vocal[rand(0,4)];
    }
    return $password;
}



/*************
*@l - length of random string
*/
function generate_rand($l){
  $c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  srand((double)microtime()*1000000);
  $rand="";

  for($i=0; $i<$l; $i++) {
      $rand.= $c[rand()%strlen($c)];
  }
  return $rand;
}





/*****
*@dir - Directory to destroy
*@virtual[optional]- whether a virtual directory
*/
function destroyDir($dir, $virtual = false)
{
    $ds = DIRECTORY_SEPARATOR;
    $dir = $virtual ? realpath($dir) : $dir;
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
    if (is_dir($dir) && $handle = opendir($dir))
    {
        while ($file = readdir($handle))
        {
            if ($file == '.' || $file == '..')
            {
                continue;
            }
            elseif (is_dir($dir.$ds.$file))
            {
                destroyDir($dir.$ds.$file);
            }
            else
            {
                unlink($dir.$ds.$file);
            }
        }
        closedir($handle);
        rmdir($dir);
        return true;
    }
    else
    {
        return false;
    }
}




function create_slug($string){
    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}




function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}




/********************
*@file - path to file
*/
function force_download($file)
{
    if ((isset($file))&&(file_exists($file))) {
       header("Content-length: ".filesize($file));
       header('Content-Type: application/octet-stream');
       header('Content-Disposition: attachment; filename="' . $file . '"');
       readfile("$file");
   } else {
       echo "No file selected";
   }
}




//BY: CertaiN @ php.net ...05-May-2014 04:52 

/**
   * Get the size of file, platform- and architecture-independant.
   * This function supports 32bit and 64bit architectures and works fith large files > 2 GB
   * The return value type depends on platform/architecture: (float) when PHP_INT_SIZE < 8 or (int) otherwise
   * @param   resource $fp
   * @return  mixed (int|float) File size on success or (bool) FALSE on error
   */
  function my_filesize($fp) {
    $return = false;
    if (is_resource($fp)) {
      if (PHP_INT_SIZE < 8) {
        // 32bit
        if (0 === fseek($fp, 0, SEEK_END)) {
          $return = 0.0;
          $step = 0x7FFFFFFF;
          while ($step > 0) {
            if (0 === fseek($fp, - $step, SEEK_CUR)) {
              $return += floatval($step);
            } else {
              $step >>= 1;
            }
          }
        }
      } elseif (0 === fseek($fp, 0, SEEK_END)) {
        // 64bit
        $return = ftell($fp);
      }
    }
    return $return;
  }
 




function getCloud( $data = array(), $minFontSize = 12, $maxFontSize = 30 )
{
    $minimumCount = min($data);
    $maximumCount = max($data);
    $spread       = $maximumCount - $minimumCount;
    $cloudHTML    = '';
    $cloudTags    = array();

    $spread == 0 && $spread = 1;

    foreach( $data as $tag => $count )
    {
        $size = $minFontSize + ( $count - $minimumCount ) 
            * ( $maxFontSize - $minFontSize ) / $spread;
        $cloudTags[] = '<a style="font-size: ' . floor( $size ) . 'px' 
        . '" class="tag_cloud" href="#" title="\'' . $tag  .
        '\' returned a count of ' . $count . '">' 
        . htmlspecialchars( stripslashes( $tag ) ) . '</a>';
    }
    
    return join( "\n", $cloudTags ) . "\n";
}
/* 
****   Sample usage   
$arr = Array('Actionscript' => 35, 'Adobe' => 22, 'Array' => 44, 'Background' => 43, 
    'Blur' => 18, 'Canvas' => 33, 'Class' => 15, 'Color Palette' => 11, 'Crop' => 42, 
    'Delimiter' => 13, 'Depth' => 34, 'Design' => 8, 'Encode' => 12, 'Encryption' => 30, 
    'Extract' => 28, 'Filters' => 42);
echo getCloud($arr, 12, 36);


 */







// Original PHP code by Chirp Internet: www.chirp.com.au 
// Please acknowledge use of this code by including this header. 
function myTruncate($string, $limit, $break=".", $pad="...") { 
    // return with no change if string is shorter than $limit  
    if(strlen($string) <= $limit) 
        return $string; 
    
    // is $break present between $limit and the end of the string?  
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) { 
            $string = substr($string, 0, $breakpoint) . $pad; 
        } 
    }
    return $string; 
}
/***** Example **
$short_string=myTruncate($long_string, 100, ' ');

**/










/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
    //if the zip file already exists and overwrite is false, return false
    if(file_exists($destination) && !$overwrite) { return false; }
    //vars
    $valid_files = array();
    //if files were passed in...
    if(is_array($files)) {
        //cycle through each file
        foreach($files as $file) {
            //make sure the file exists
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    //if we have good files...
    if(count($valid_files)) {
        //create the archive
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        //add the files
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        //debug
        //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
        
        //close the zip -- done!
        $zip->close();
        
        //check to make sure the file exists
        return file_exists($destination);
    }
    else
    {
        return false;
    }
}
/***** Example Usage 
$files=array('file1.jpg', 'file2.jpg', 'file3.gif');
create_zip($files, 'myzipfile.zip', true);

***/



/**********************
*@file - path to zip file
*@destination - destination directory for unzipped files
*/
function unzip_file($file, $destination){
    // create object
    $zip = new ZipArchive() ;
    // open archive
    if ($zip->open($file) !== TRUE) {
        die ('Could not open archive');
    }
    // extract contents to destination directory
    $zip->extractTo($destination);
    // close archive
    $zip->close();
    echo 'Archive extracted to directory';
}


/**********************
*@filename - path to the image
*@tmpname - temporary path to thumbnail
*@xmax - max width
*@ymax - max height
*/
function resize_image($filename, $tmpname, $xmax, $ymax)
{
    $ext = explode(".", $filename);
    $ext = $ext[count($ext)-1];

    if($ext == "jpg" || $ext == "jpeg")
        $im = imagecreatefromjpeg($tmpname);
    elseif($ext == "png")
        $im = imagecreatefrompng($tmpname);
    elseif($ext == "gif")
        $im = imagecreatefromgif($tmpname);
    
    $x = imagesx($im);
    $y = imagesy($im);
    
    if($x <= $xmax && $y <= $ymax)
        return $im;

    if($x >= $y) {
        $newx = $xmax;
        $newy = $newx * $y / $x;
    }
    else {
        $newy = $ymax;
        $newx = $x / $y * $newy;
    }
    
    $im2 = imagecreatetruecolor($newx, $newy);
    imagecopyresized($im2, $im, 0, 0, 0, 0, floor($newx), floor($newy), $x, $y);
    return $im2; 
}



function is_ajax_request(){




    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }else{


        return false;
    }




}



function json_echo_error($message){


    die(json_encode(array('error_code'=>'0','error_message'=>$message)));
}



function write_to_file($file_name,$data=''){

    $f=fopen($file_name,'w');
    
    fwrite($f,$data);



    fclose($f);
    return true;

    
}




function safe_filename($name) { 
    $except = array( '../', '*', '?', '"', '<', '>', '|','./'); 
    return str_replace($except, '', $name); 
} 



/**
 * Makes directory and returns BOOL(TRUE) if exists OR made.
 *
 * @param  $path Path name
 * @return bool
 */
function mkdir_r($path, $mode = 0755) {
    $path = rtrim(preg_replace(array("/\\\\/", "/\/{2,}/"), "/", $path), "/");
    $e = explode("/", ltrim($path, "/"));
    if(substr($path, 0, 1) == "/") {
        $e[0] = "/".$e[0];
    }
    $c = count($e);
    $cp = $e[0];
    for($i = 1; $i < $c; $i++) {
        if(!is_dir($cp) && !@mkdir($cp, $mode)) {
            return false;
        }
        $cp .= "/".$e[$i];
    }
    return @mkdir($path, $mode);
}







 //Gotten from php.net....
 //thanks to the guy that owns this
 //sorry... i don't know your name

 //cory at veck dot ca


    define('DS', DIRECTORY_SEPARATOR); // I always use this short form in my code.

    function copy_r( $path, $dest )
    {
        if( is_dir($path) )
        {
            @mkdir( $dest );
            $objects = scandir($path);
            if( sizeof($objects) > 0 )
            {
                foreach( $objects as $file )
                {
                    if( $file == "." || $file == ".." )
                        continue;
                    // go on
                    if( is_dir( $path.DS.$file ) )
                    {
                        copy_r( $path.DS.$file, $dest.DS.$file );
                    }
                    else
                    {
                        copy( $path.DS.$file, $dest.DS.$file );
                    }
                }
            }
            return true;
        }
        elseif( is_file($path) )
        {
            return copy($path, $dest);
        }
        else
        {
            return false;
        }
    }






/**
     * Delete a file or recursively delete a directory
     *
     * @param string $str Path to file or directory
     */
function recursiveDelete($str){
    if(is_file($str)){
        return @unlink($str);
    }
    elseif(is_dir($str)){
        $scan = glob(rtrim($str,'/').'/*');
        foreach($scan as $index=>$path){
            recursiveDelete($path);
        }
        return @rmdir($str);
    }
}











// by Edward Jaramilla   -     28-Jun-2008 08:45

//modified to suit radius need

function file_resumable_download($file, $is_resume=TRUE)
{
    //First, see if the file exists
    if (!is_file($file))
    {

                //failure

        json_echo_error("Sorry File was not found!");


    }

    //Gather relevent info about file
    $size = filesize($file);
    $fileinfo = pathinfo($file);
    
    //workaround for IE filename bug with multiple periods / multiple dots in filename
    //that adds square brackets to filename - eg. setup.abc.exe becomes setup[1].abc.exe
    $filename = (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) ?
    preg_replace('/\./', '%2e', $fileinfo['basename'], substr_count($fileinfo['basename'], '.') - 1) :
    $fileinfo['basename'];
    
    $file_extension = strtolower($path_info['extension']);

    //This will set the Content-Type to the appropriate setting for the file
    switch($file_extension)
    {
        case 'exe': $ctype='application/octet-stream'; break;
        case 'zip': $ctype='application/zip'; break;
        case 'mp3': $ctype='audio/mpeg'; break;
        case 'mpg': $ctype='video/mpeg'; break;
        case 'avi': $ctype='video/x-msvideo'; break;
        default:    $ctype='application/force-download';
    }

    //check if http_range is sent by browser (or download manager)
    if($is_resume && isset($_SERVER['HTTP_RANGE']))
    {
        list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);

        if ($size_unit == 'bytes')
        {
            //multiple ranges could be specified at the same time, but for simplicity only serve the first range
            //http://tools.ietf.org/id/draft-ietf-http-range-retrieval-00.txt
            list($range, $extra_ranges) = explode(',', $range_orig, 2);
        }
        else
        {
            $range = '';
        }
    }
    else
    {
        $range = '';
    }

    //figure out download piece from range (if set)
    list($seek_start, $seek_end) = explode('-', $range, 2);

    //set start and end based on range (if set), else set defaults
    //also check for invalid ranges.
    $seek_end = (empty($seek_end)) ? ($size - 1) : min(abs(intval($seek_end)),($size - 1));
    $seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)),0);

    //add headers if resumable
    if ($is_resume)
    {
        //Only send partial content header if downloading a piece of the file (IE workaround)
        if ($seek_start > 0 || $seek_end < ($size - 1))
        {
            header('HTTP/1.1 206 Partial Content');
        }

        header('Accept-Ranges: bytes');
        header('Content-Range: bytes '.$seek_start.'-'.$seek_end.'/'.$size);
    }

    //headers for IE Bugs (is this necessary?)
    //header("Cache-Control: cache, must-revalidate");   
    //header("Pragma: public");

    header('Content-Type: ' . $ctype);
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: '.($seek_end - $seek_start + 1));

    //open the file
    $fp = fopen($file, 'rb');
    //seek to start of missing part
    fseek($fp, $seek_start);

    //start buffered download
    while(!feof($fp))
    {
        //reset time limit for big files
        set_time_limit(0);
        print(fread($fp, 1024*8));
        flush();
        ob_flush();
    }

    fclose($fp);
    exit;
}






 //use to convert date in numeric to text
//eg 01 to january

function NumericDate2Text($num){


    return jdmonthname($num,1);

}






//use this to calculate an average of numbers
//@param $data is the array of numbers to calculate their average
//@param $RoundUp is a flag if the value should be rounded up or returned RAW

function NumbersAverage($data,$RoundUp=true){

    $total=0;



    if (!is_array($data)){

    //Must alway be an array


        return $total;

    }

    else

    {


//an array  :)



//add up values
        foreach ($data as $value) {


            $total= $total + intval($value);


        }



//we have the total

//return the average... simple maths


        if ($RoundUp){

    //round up values
            return ceil($total / count($data));

        }

        else{

//do not round up values... Return raw


            return $total / count($data);

        }




    }



}




//use this function to convert path from windows to apache based path

function winPath2Apache($path){

 return str_replace(array('\\','//'), '/', $path);

}





 /** 
* Converts bytes into human readable file size. 
* 
* @param string $bytes 
* @return string human readable file size (2,87 ÐœÐ±)
* @author Mogilev Arseny and modified by frost
*/ 
function FileSizeConvert($bytes)

{


    if($bytes<1){

       $bytes=1; 
   }


   $bytes = floatval($bytes);
   $arBytes = array(
    0 => array(
        "UNIT" => "TB",
        "VALUE" => pow(1024, 4)
        ),
    1 => array(
        "UNIT" => "GB",
        "VALUE" => pow(1024, 3)
        ),
    2 => array(
        "UNIT" => "MB",
        "VALUE" => pow(1024, 2)
        ),
    3 => array(
        "UNIT" => "KB",
        "VALUE" => 1024
        ),
    4 => array(
        "UNIT" => "B",
        "VALUE" => 1
        ),
    );

   foreach($arBytes as $arItem)
   {
    if($bytes >= $arItem["VALUE"])
    {
        $result = $bytes / $arItem["VALUE"];
        $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
        break;
    }
}
return $result;
}







/** 
 * Converts human readable file size (e.g. 10 MB, 200.20 GB) into bytes. 
 * 
 * @param string $str 
 * @return int the result is in bytes 
 * @author Svetoslav Marinov 
 * @author http://slavi.biz 
 */ 
function filesize2bytes($str) { 
    $bytes = 0; 

    $bytes_array = array( 
        'B' => 1, 
        'KB' => 1024, 
        'MB' => 1024 * 1024, 
        'GB' => 1024 * 1024 * 1024, 
        'TB' => 1024 * 1024 * 1024 * 1024, 
        'PB' => 1024 * 1024 * 1024 * 1024 * 1024, 
        ); 

    $bytes = floatval($str); 

    if (preg_match('#([KMGTP]?B)$#si', $str, $matches) && !empty($bytes_array[$matches[1]])) { 
        $bytes *= $bytes_array[$matches[1]]; 
    } 

    $bytes = intval(round($bytes, 2)); 

    return $bytes; 
} 





function cache_expired( $cache_file,$cache_life= 7200 ){

  // $cache_file is the file to use as bait to check if the cache should be regenerated

//$cache_life is caching time, in seconds [2hours]


 $cache_file=winPath2Apache( $cache_file);

 if (!file_exists($cache_file)){


    return true;


}

$diff=time() - @filemtime($cache_file);


//check if cache file date is corrupt..  recreate it index

//we can't have negative values.. check first character
if (substr($diff, 0, - strlen($diff) +1)=='-'){


 // write empty value to it
    file_put_contents($cache_file, ' --Corrupt-- ');


}





if ($diff >= $cache_life){

//expired

    return true;

}


else

{

    //fresh

 return false;
}



}






/*
***** By wwwebdesigner at web doott de 12-Apr-2005 09:20 
 -> using sort of scandir() that returns the content sorted by Filemodificationtime.

returns false if an error occured
otherwise it returns an array like this.
Array
(
    [20040813231320] => DSC00023.JPG
    [20040813231456] => DSC00024.JPG
    [20040814003728] => MOV00055.MPG
    [20040814003804] => DSC00056.JPG
    [20040814003946] => DSC00057.JPG
    [20040814004030] => DSC00058.JPG
    [20040814014516] => DSC00083.JPG
    [20050401161718] => album.txt
) 
*/

function scandir_by_ctime($folder) {

  $dircontent = scandir($folder);
  $arr = array();
  foreach($dircontent as $filename) {
    if ($filename != '.' && $filename != '..') {
      if (filectime($folder.$filename) === false) return false;
      $dat = date("YmdHis", filectime($folder.$filename));


      $arr[$dat] = $filename;

  }
}
if (!ksort($arr)) return false;
return $arr;
}








/**
 * -----------------------------------------------------------------------------------------  Based on <https://github.com/mecha-cms/extend.minify>
 * 
 * -----------------------------------------------------------------------------------------
 */


 //Refix by  FROST CODES OF PUNCHLINE TECHNOLOGIES
    //NOTE: this function must be at the top and not new line space must be in the beginning of the file ...



    //NOTE: this function must be at the top and not new line space must be in the beginning of the file ...



function ob_html_compress($buf){
    return str_replace(array("\n","\r","\t"),'',$buf);

    // return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}






//callback to minify always


function minify_compress_callback($buffer)
{


  // first we minify , then we compress the data :)


    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
//support gzip

     @ini_set('zlib.output_compression_level', 4);
     return ob_gzhandler(ob_html_compress($buffer),5);

 }

 else

 {



    //just minify... gzip not supported

     return  ob_html_compress($buffer);
 }


}







function image_dominant_color($target_file){

   
/**
 * PHP: Determine the dominant color of an image
 * http://www.catswhocode.com/blog/10-super-useful-php-snippets-you-probably-havent-seen
 */

//REFIX BY FROST OF PUNCHLINE TECNOLOGIES

$i = imagecreatefromjpeg($target_file);


$colors['rTotal']  =0;
$colors['gTotal']  = 0;
$colors['bTotal']  = 0;


$average=array('red'=>0,'green'=>0,'blue'=>0); //average array of colors



$total=0;

for ($x=0;$x<imagesx($i);$x++) {
  for ($y=0;$y<imagesy($i);$y++) {
    $rgb = imagecolorat($i,$x,$y);
    $r   = ($rgb >> 16) &0xFF;
    $g   =  $rgb   &0xFF ;
    $b   = $rgb  &0xFF ;



    $colors['rTotal'] += $r;
    $colors['gTotal'] += $g;
    $colors['bTotal'] += $b;
    $total++;
}
}




$average['red']=round( $colors['rTotal']/$total);
$average['green']=round( $colors['gTotal'] /$total);
$average['blue']=round($colors['bTotal']/$total);


  return  $average; //average array of colors




}





//use this to try and determine that an image 
//is a valid passport photograph with a white background
function is_passport_photograph($target_file,$minimum=215)
{

//@param $target_file   is the path to the jpeg image to check

//@param $minimum is the minimum rgb color blending.. max of 255




   if ( NumbersAverage(image_dominant_color($target_file)) >=$minimum)

   {

    return true;
}
else
{
    
    return false;

}



}






//user this to prepend 0 to value lower than 10

function fix_zero($no){


//if it is a single digit day add 0 to front
    if ($no<10){

        $no="0" . $no;

    }

    return $no;

}




//use this to var_dump faster

function d($data){

    var_dump($data);

}

//use this as a mini breakpoint in your code
//after var_dump.. nothing executes again

function b($data){

    d($data);
    exit();

}



/**
 * @param string $source (accepted jpg, gif & png filenames)
 * @param string $destination
 * @param int $quality [0-100]
 * @throws Exception
 */

// From PhpTools..
function convertToJpeg($source, $destination, $quality = 100) {

    if ($quality < 0 || $quality > 100) {
        throw new Exception("Param 'quality' out of range.");
    }

    if (!file_exists($source)) {
        throw new Exception("Image file not found.");
    }

    $ext = pathinfo($source, PATHINFO_EXTENSION);

    if (preg_match('/jpg|jpeg/i', $ext)) {
        $image = imagecreatefromjpeg($source);
    } else if (preg_match('/png/i', $ext)) {
        $image = imagecreatefrompng($source);
    } else if (preg_match('/gif/i', $ext)) {
        $image = imagecreatefromgif($source);
    } else {
        throw new Exception("Image isn't recognized.");
    }

    $result = imagejpeg($image, $destination, $quality);

    if (!$result) {
        throw new Exception("Saving to file exception.");
    }

    imagedestroy($image);
}







//BY  Pedja (pedja at supurovic dot net) 26-Jul-2007 07:59 
// Here is sample function that creates thumbnail of source JPEG file. Thumbnail wil be in square form (with and height are the same), and original image cropped to fit in.

// Parameters:

// $p_thumb_file - name of the file (including path) where thumb should be saved to

// $p_photo_file - nam of the source JPEG file (including path) thatthumbnail should be created of

// $p_max_size - with and height (they will be the same) in pixels for thumbnail image

// $p_quality - quality of jpeg thumbnail


function photoCreateCropThumb ($p_thumb_file, $p_photo_file, $p_max_size, $p_quality = 75) {
  
    $pic = @imagecreatefromjpeg($p_photo_file);

    if ($pic) {
        $thumb = @imagecreatetruecolor ($p_max_size, $p_max_size) or die ("Can't create Image!");
        $width = imagesx($pic);
        $height = imagesy($pic);
        if ($width < $height) {
            $twidth = $p_max_size;
            $theight = $twidth * $height / $width; 
            imagecopyresized($thumb, $pic, 0, 0, 0, ($height/2)-($width/2), $twidth, $theight, $width, $height); 
        } else {
            $theight = $p_max_size;
            $twidth = $theight * $width / $height; 
            imagecopyresized($thumb, $pic, 0, 0, ($width/2)-($height/2), 0, $twidth, $theight, $width, $height); 
        }

        ImageJPEG ($thumb, $p_thumb_file, $p_quality);
        
// Free up memory
        imagedestroy( $pic);

    }

}






/**
 * Resize image - preserve ratio of width and height.
 * @param string $sourceImage path to source JPEG image
 * @param string $targetImage path to final JPEG image file
 * @param int $maxWidth maximum width of final image (value 0 - width is optional)
 * @param int $maxHeight maximum height of final image (value 0 - height is optional)
 * @param int $quality quality of final image (0-100)
 * @return bool
 */


/**
 * Example
 * resizeImage('image.jpg', 'resized.jpg', 200, 200);
 */


 //copyright to https://gist.github.com/janzikan/2994977
//janzikan


function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
{
    // Obtain image from given source file.
    if (!$image = @imagecreatefromjpeg($sourceImage))
    {
        return false;
    }

    // Get dimensions of source image.
    list($origWidth, $origHeight) = getimagesize($sourceImage);

    if ($maxWidth == 0)
    {
        $maxWidth  = $origWidth;
    }

    if ($maxHeight == 0)
    {
        $maxHeight = $origHeight;
    }

    // Calculate ratio of desired maximum sizes and original sizes.
    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;

    // Ratio used for calculating new image dimensions.
    $ratio = min($widthRatio, $heightRatio);

    // Calculate new image dimensions.
    $newWidth  = (int)$origWidth  * $ratio;
    $newHeight = (int)$origHeight * $ratio;

    // Create final image with new dimensions.
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    imagejpeg($newImage, $targetImage, $quality);

    // Free up the memory.
    imagedestroy($image);
    imagedestroy($newImage);

    return true;
}

//use this to select a random value in an array


function rand_array_value($array){


    if( is_array($array)){

        return $array[rand(0, count($array) -1 )];

    }
    else

    {

        return $array;

    }


}




//use this to generate randonm real human name...
//BY:   subodhghulaxe
//URl: https://gist.github.com/subodhghulaxe/8148971



function rand_human_name(){

    $names = array(
      'Abbott',
      'Acevedo',
      'Acosta',
      'Adams',
      'Adkins',
      'Aguilar',
      'Aguirre',
      'Albert',
      'Alexander',
      'Alford',
      'Allen',
      'Allison',
      'Alston',
      'Alvarado',
      'Alvarez',
      'Anderson',
      'Andrews',
      'Anthony',
      'Armstrong',
      'Arnold',
      'Ashley',
      'Atkins',
      'Atkinson',
      'Austin',
      'Avery',
      'Avila',
      'Ayala',
      'Ayers',
      'Bailey',
      'Baird',
      'Baker',
      'Baldwin',
      'Ball',
      'Ballard',
      'Banks',
      'Barber',
      'Barker',
      'Barlow',
      'Barnes',
      'Barnett',
      'Barr',
      'Barrera',
      'Barrett',
      'Barron',
      'Barry',
      'Bartlett',
      'Barton',
      'Bass',
      'Bates',
      'Battle',
      'Bauer',
      'Baxter',
      'Beach',
      'Bean',
      'Beard',
      'Beasley',
      'Beck',
      'Becker',
      'Bell',
      'Bender',
      'Benjamin',
      'Bennett',
      'Benson',
      'Bentley',
      'Benton',
      'Berg',
      'Berger',
      'Bernard',
      'Berry',
      'Best',
      'Bird',
      'Bishop',
      'Black',
      'Blackburn',
      'Blackwell',
      'Blair',
      'Blake',
      'Blanchard',
      'Blankenship',
      'Blevins',
      'Bolton',
      'Bond',
      'Bonner',
      'Booker',
      'Boone',
      'Booth',
      'Bowen',
      'Bowers',
      'Bowman',
      'Boyd',
      'Boyer',
      'Boyle',
      'Bradford',
      'Bradley',
      'Bradshaw',
      'Brady',
      'Branch',
      'Bray',
      'Brennan',
      'Brewer',
      'Bridges',
      'Briggs',
      'Bright',
      'Britt',
      'Brock',
      'Brooks',
      'Brown',
      'Browning',
      'Bruce',
      'Bryan',
      'Bryant',
      'Buchanan',
      'Buck',
      'Buckley',
      'Buckner',
      'Bullock',
      'Burch',
      'Burgess',
      'Burke',
      'Burks',
      'Burnett',
      'Burns',
      'Burris',
      'Burt',
      'Burton',
      'Bush',
      'Butler',
      'Byers',
      'Byrd',
      'Cabrera',
      'Cain',
      'Calderon',
      'Caldwell',
      'Calhoun',
      'Callahan',
      'Camacho',
      'Cameron',
      'Campbell',
      'Campos',
      'Cannon',
      'Cantrell',
      'Cantu',
      'Cardenas',
      'Carey',
      'Carlson',
      'Carney',
      'Carpenter',
      'Carr',
      'Carrillo',
      'Carroll',
      'Carson',
      'Carter',
      'Carver',
      'Case',
      'Casey',
      'Cash',
      'Castaneda',
      'Castillo',
      'Castro',
      'Cervantes',
      'Chambers',
      'Chan',
      'Chandler',
      'Chaney',
      'Chang',
      'Chapman',
      'Charles',
      'Chase',
      'Chavez',
      'Chen',
      'Cherry',
      'Christensen',
      'Christian',
      'Church',
      'Clark',
      'Clarke',
      'Clay',
      'Clayton',
      'Clements',
      'Clemons',
      'Cleveland',
      'Cline',
      'Cobb',
      'Cochran',
      'Coffey',
      'Cohen',
      'Cole',
      'Coleman',
      'Collier',
      'Collins',
      'Colon',
      'Combs',
      'Compton',
      'Conley',
      'Conner',
      'Conrad',
      'Contreras',
      'Conway',
      'Cook',
      'Cooke',
      'Cooley',
      'Cooper',
      'Copeland',
      'Cortez',
      'Cote',
      'Cotton',
      'Cox',
      'Craft',
      'Craig',
      'Crane',
      'Crawford',
      'Crosby',
      'Cross',
      'Cruz',
      'Cummings',
      'Cunningham',
      'Curry',
      'Curtis',
      'Dale',
      'Dalton',
      'Daniel',
      'Daniels',
      'Daugherty',
      'Davenport',
      'David',
      'Davidson',
      'Davis',
      'Dawson',
      'Day',
      'Dean',
      'Decker',
      'Dejesus',
      'Delacruz',
      'Delaney',
      'Deleon',
      'Delgado',
      'Dennis',
      'Diaz',
      'Dickerson',
      'Dickson',
      'Dillard',
      'Dillon',
      'Dixon',
      'Dodson',
      'Dominguez',
      'Donaldson',
      'Donovan',
      'Dorsey',
      'Dotson',
      'Douglas',
      'Downs',
      'Doyle',
      'Drake',
      'Dudley',
      'Duffy',
      'Duke',
      'Duncan',
      'Dunlap',
      'Dunn',
      'Duran',
      'Durham',
      'Dyer',
      'Eaton',
      'Edwards',
      'Elliott',
      'Ellis',
      'Ellison',
      'Emerson',
      'England',
      'English',
      'Erickson',
      'Espinoza',
      'Estes',
      'Estrada',
      'Evans',
      'Everett',
      'Ewing',
      'Farley',
      'Farmer',
      'Farrell',
      'Faulkner',
      'Ferguson',
      'Fernandez',
      'Ferrell',
      'Fields',
      'Figueroa',
      'Finch',
      'Finley',
      'Fischer',
      'Fisher',
      'Fitzgerald',
      'Fitzpatrick',
      'Fleming',
      'Fletcher',
      'Flores',
      'Flowers',
      'Floyd',
      'Flynn',
      'Foley',
      'Forbes',
      'Ford',
      'Foreman',
      'Foster',
      'Fowler',
      'Fox',
      'Francis',
      'Franco',
      'Frank',
      'Franklin',
      'Franks',
      'Frazier',
      'Frederick',
      'Freeman',
      'French',
      'Frost',
      'Fry',
      'Frye',
      'Fuentes',
      'Fuller',
      'Fulton',
      'Gaines',
      'Gallagher',
      'Gallegos',
      'Galloway',
      'Gamble',
      'Garcia',
      'Gardner',
      'Garner',
      'Garrett',
      'Garrison',
      'Garza',
      'Gates',
      'Gay',
      'Gentry',
      'George',
      'Gibbs',
      'Gibson',
      'Gilbert',
      'Giles',
      'Gill',
      'Gillespie',
      'Gilliam',
      'Gilmore',
      'Glass',
      'Glenn',
      'Glover',
      'Goff',
      'Golden',
      'Gomez',
      'Gonzales',
      'Gonzalez',
      'Good',
      'Goodman',
      'Goodwin',
      'Gordon',
      'Gould',
      'Graham',
      'Grant',
      'Graves',
      'Gray',
      'Green',
      'Greene',
      'Greer',
      'Gregory',
      'Griffin',
      'Griffith',
      'Grimes',
      'Gross',
      'Guerra',
      'Guerrero',
      'Guthrie',
      'Gutierrez',
      'Guy',
      'Guzman',
      'Hahn',
      'Hale',
      'Haley',
      'Hall',
      'Hamilton',
      'Hammond',
      'Hampton',
      'Hancock',
      'Haney',
      'Hansen',
      'Hanson',
      'Hardin',
      'Harding',
      'Hardy',
      'Harmon',
      'Harper',
      'Harrell',
      'Harrington',
      'Harris',
      'Harrison',
      'Hart',
      'Hartman',
      'Harvey',
      'Hatfield',
      'Hawkins',
      'Hayden',
      'Hayes',
      'Haynes',
      'Hays',
      'Head',
      'Heath',
      'Hebert',
      'Henderson',
      'Hendricks',
      'Hendrix',
      'Henry',
      'Hensley',
      'Henson',
      'Herman',
      'Hernandez',
      'Herrera',
      'Herring',
      'Hess',
      'Hester',
      'Hewitt',
      'Hickman',
      'Hicks',
      'Higgins',
      'Hill',
      'Hines',
      'Hinton',
      'Hobbs',
      'Hodge',
      'Hodges',
      'Hoffman',
      'Hogan',
      'Holcomb',
      'Holden',
      'Holder',
      'Holland',
      'Holloway',
      'Holman',
      'Holmes',
      'Holt',
      'Hood',
      'Hooper',
      'Hoover',
      'Hopkins',
      'Hopper',
      'Horn',
      'Horne',
      'Horton',
      'House',
      'Houston',
      'Howard',
      'Howe',
      'Howell',
      'Hubbard',
      'Huber',
      'Hudson',
      'Huff',
      'Huffman',
      'Hughes',
      'Hull',
      'Humphrey',
      'Hunt',
      'Hunter',
      'Hurley',
      'Hurst',
      'Hutchinson',
      'Hyde',
      'Ingram',
      'Irwin',
      'Jackson',
      'Jacobs',
      'Jacobson',
      'James',
      'Jarvis',
      'Jefferson',
      'Jenkins',
      'Jennings',
      'Jensen',
      'Jimenez',
      'Johns',
      'Johnson',
      'Johnston',
      'Jones',
      'Jordan',
      'Joseph',
      'Joyce',
      'Joyner',
      'Juarez',
      'Justice',
      'Kane',
      'Kaufman',
      'Keith',
      'Keller',
      'Kelley',
      'Kelly',
      'Kemp',
      'Kennedy',
      'Kent',
      'Kerr',
      'Key',
      'Kidd',
      'Kim',
      'King',
      'Kinney',
      'Kirby',
      'Kirk',
      'Kirkland',
      'Klein',
      'Kline',
      'Knapp',
      'Knight',
      'Knowles',
      'Knox',
      'Koch',
      'Kramer',
      'Lamb',
      'Lambert',
      'Lancaster',
      'Landry',
      'Lane',
      'Lang',
      'Langley',
      'Lara',
      'Larsen',
      'Larson',
      'Lawrence',
      'Lawson',
      'Le',
      'Leach',
      'Leblanc',
      'Lee',
      'Leon',
      'Leonard',
      'Lester',
      'Levine',
      'Levy',
      'Lewis',
      'Lindsay',
      'Lindsey',
      'Little',
      'Livingston',
      'Lloyd',
      'Logan',
      'Long',
      'Lopez',
      'Lott',
      'Love',
      'Lowe',
      'Lowery',
      'Lucas',
      'Luna',
      'Lynch',
      'Lynn',
      'Lyons',
      'Macdonald',
      'Macias',
      'Mack',
      'Madden',
      'Maddox',
      'Maldonado',
      'Malone',
      'Mann',
      'Manning',
      'Marks',
      'Marquez',
      'Marsh',
      'Marshall',
      'Martin',
      'Martinez',
      'Mason',
      'Massey',
      'Mathews',
      'Mathis',
      'Matthews',
      'Maxwell',
      'May',
      'Mayer',
      'Maynard',
      'Mayo',
      'Mays',
      'Mcbride',
      'Mccall',
      'Mccarthy',
      'Mccarty',
      'Mcclain',
      'Mcclure',
      'Mcconnell',
      'Mccormick',
      'Mccoy',
      'Mccray',
      'Mccullough',
      'Mcdaniel',
      'Mcdonald',
      'Mcdowell',
      'Mcfadden',
      'Mcfarland',
      'Mcgee',
      'Mcgowan',
      'Mcguire',
      'Mcintosh',
      'Mcintyre',
      'Mckay',
      'Mckee',
      'Mckenzie',
      'Mckinney',
      'Mcknight',
      'Mclaughlin',
      'Mclean',
      'Mcleod',
      'Mcmahon',
      'Mcmillan',
      'Mcneil',
      'Mcpherson',
      'Meadows',
      'Medina',
      'Mejia',
      'Melendez',
      'Melton',
      'Mendez',
      'Mendoza',
      'Mercado',
      'Mercer',
      'Merrill',
      'Merritt',
      'Meyer',
      'Meyers',
      'Michael',
      'Middleton',
      'Miles',
      'Miller',
      'Mills',
      'Miranda',
      'Mitchell',
      'Molina',
      'Monroe',
      'Montgomery',
      'Montoya',
      'Moody',
      'Moon',
      'Mooney',
      'Moore',
      'Morales',
      'Moran',
      'Moreno',
      'Morgan',
      'Morin',
      'Morris',
      'Morrison',
      'Morrow',
      'Morse',
      'Morton',
      'Moses',
      'Mosley',
      'Moss',
      'Mueller',
      'Mullen',
      'Mullins',
      'Munoz',
      'Murphy',
      'Murray',
      'Myers',
      'Nash',
      'Navarro',
      'Neal',
      'Nelson',
      'Newman',
      'Newton',
      'Nguyen',
      'Nichols',
      'Nicholson',
      'Nielsen',
      'Nieves',
      'Nixon',
      'Noble',
      'Noel',
      'Nolan',
      'Norman',
      'Norris',
      'Norton',
      'Nunez',
      'Obrien',
      'Ochoa',
      'Oconnor',
      'Odom',
      'Odonnell',
      'Oliver',
      'Olsen',
      'Olson',
      'Oneal',
      'Oneil',
      'Oneill',
      'Orr',
      'Ortega',
      'Ortiz',
      'Osborn',
      'Osborne',
      'Owen',
      'Owens',
      'Pace',
      'Pacheco',
      'Padilla',
      'Page',
      'Palmer',
      'Park',
      'Parker',
      'Parks',
      'Parrish',
      'Parsons',
      'Pate',
      'Patel',
      'Patrick',
      'Patterson',
      'Patton',
      'Paul',
      'Payne',
      'Pearson',
      'Peck',
      'Pena',
      'Pennington',
      'Perez',
      'Perkins',
      'Perry',
      'Peters',
      'Petersen',
      'Peterson',
      'Petty',
      'Phelps',
      'Phillips',
      'Pickett',
      'Pierce',
      'Pittman',
      'Pitts',
      'Pollard',
      'Poole',
      'Pope',
      'Porter',
      'Potter',
      'Potts',
      'Powell',
      'Powers',
      'Pratt',
      'Preston',
      'Price',
      'Prince',
      'Pruitt',
      'Puckett',
      'Pugh',
      'Quinn',
      'Ramirez',
      'Ramos',
      'Ramsey',
      'Randall',
      'Randolph',
      'Rasmussen',
      'Ratliff',
      'Ray',
      'Raymond',
      'Reed',
      'Reese',
      'Reeves',
      'Reid',
      'Reilly',
      'Reyes',
      'Reynolds',
      'Rhodes',
      'Rice',
      'Rich',
      'Richard',
      'Richards',
      'Richardson',
      'Richmond',
      'Riddle',
      'Riggs',
      'Riley',
      'Rios',
      'Rivas',
      'Rivera',
      'Rivers',
      'Roach',
      'Robbins',
      'Roberson',
      'Roberts',
      'Robertson',
      'Robinson',
      'Robles',
      'Rocha',
      'Rodgers',
      'Rodriguez',
      'Rodriquez',
      'Rogers',
      'Rojas',
      'Rollins',
      'Roman',
      'Romero',
      'Rosa',
      'Rosales',
      'Rosario',
      'Rose',
      'Ross',
      'Roth',
      'Rowe',
      'Rowland',
      'Roy',
      'Ruiz',
      'Rush',
      'Russell',
      'Russo',
      'Rutledge',
      'Ryan',
      'Salas',
      'Salazar',
      'Salinas',
      'Sampson',
      'Sanchez',
      'Sanders',
      'Sandoval',
      'Sanford',
      'Santana',
      'Santiago',
      'Santos',
      'Sargent',
      'Saunders',
      'Savage',
      'Sawyer',
      'Schmidt',
      'Schneider',
      'Schroeder',
      'Schultz',
      'Schwartz',
      'Scott',
      'Sears',
      'Sellers',
      'Serrano',
      'Sexton',
      'Shaffer',
      'Shannon',
      'Sharp',
      'Sharpe',
      'Shaw',
      'Shelton',
      'Shepard',
      'Shepherd',
      'Sheppard',
      'Sherman',
      'Shields',
      'Short',
      'Silva',
      'Simmons',
      'Simon',
      'Simpson',
      'Sims',
      'Singleton',
      'Skinner',
      'Slater',
      'Sloan',
      'Small',
      'Smith',
      'Snider',
      'Snow',
      'Snyder',
      'Solis',
      'Solomon',
      'Sosa',
      'Soto',
      'Sparks',
      'Spears',
      'Spence',
      'Spencer',
      'Stafford',
      'Stanley',
      'Stanton',
      'Stark',
      'Steele',
      'Stein',
      'Stephens',
      'Stephenson',
      'Stevens',
      'Stevenson',
      'Stewart',
      'Stokes',
      'Stone',
      'Stout',
      'Strickland',
      'Strong',
      'Stuart',
      'Suarez',
      'Sullivan',
      'Summers',
      'Sutton',
      'Swanson',
      'Sweeney',
      'Sweet',
      'Sykes',
      'Talley',
      'Tanner',
      'Tate',
      'Taylor',
      'Terrell',
      'Terry',
      'Thomas',
      'Thompson',
      'Thornton',
      'Tillman',
      'Todd',
      'Torres',
      'Townsend',
      'Tran',
      'Travis',
      'Trevino',
      'Trujillo',
      'Tucker',
      'Turner',
      'Tyler',
      'Tyson',
      'Underwood',
      'Valdez',
      'Valencia',
      'Valentine',
      'Valenzuela',
      'Vance',
      'Vang',
      'Vargas',
      'Vasquez',
      'Vaughan',
      'Vaughn',
      'Vazquez',
      'Vega',
      'Velasquez',
      'Velazquez',
      'Velez',
      'Villarreal',
      'Vincent',
      'Vinson',
      'Wade',
      'Wagner',
      'Walker',
      'Wall',
      'Wallace',
      'Waller',
      'Walls',
      'Walsh',
      'Walter',
      'Walters',
      'Walton',
      'Ward',
      'Ware',
      'Warner',
      'Warren',
      'Washington',
      'Waters',
      'Watkins',
      'Watson',
      'Watts',
      'Weaver',
      'Webb',
      'Weber',
      'Webster',
      'Weeks',
      'Weiss',
      'Welch',
      'Wells',
      'West',
      'Wheeler',
      'Whitaker',
      'White',
      'Whitehead',
      'Whitfield',
      'Whitley',
      'Whitney',
      'Wiggins',
      'Wilcox',
      'Wilder',
      'Wiley',
      'Wilkerson',
      'Wilkins',
      'Wilkinson',
      'William',
      'Williams',
      'Williamson',
      'Willis',
      'Wilson',
      'Winters',
      'Wise',
      'Witt',
      'Wolf',
      'Wolfe',
      'Wong',
      'Wood',
      'Woodard',
      'Woods',
      'Woodward',
      'Wooten',
      'Workman',
      'Wright',
      'Wyatt',
      'Wynn',
      'Yang',
      'Yates',
      'York',
      'Young',
      'Zamora',
      'Zimmerman');


return rand_array_value($names);


}



//use this to generate a random lorem ispum text
//@param $paragraph_count  is the number of paragraphs to generate
function lorem_ispum($paragraph_count = 2){

    $text=array();

    $text[]='Lorem ispum is the beginning of the random text.';

    $text[]='If Lorem Ispum was to be a paragraph,
    it would look like this.';

    $text[]='I love Lorem Ispum because it is not an english word but a word used in another language.';

    $text[]='Lorem Ispum is great also but programmers use it is to fill in for a test paragraph';

    $text[]='Once tried to understand what is Lorem Ispum, well you can google it is it a non-english word.';

    $text[]='Lorem Ispum again and again and again, it would always be Lorem ispum, Thats all for now!';

    $text[]='Lorem Ispum was like the story of a man and a woman that fell in love even though it was not real love!';



    $final='';
    for ($i=0; $i < $paragraph_count; $i++) { 
       

        $final = $final.rand_array_value($text).' ';


    }


    return $final;


}







//Copyright to: andrea.vacondio@gmail.com  from the php.net manual
 function is_odd($num){
     return (is_numeric($num)&($num&1));
 }
 
 function is_even($num){
     return (is_numeric($num)&(!($num&1)));
 }
 
function num_weeks_in_year($year) {
    $daySum=0;
    for($x=1;$x<=12;$x++) 
        $daySum += cal_days_in_month(CAL_GREGORIAN, $x, $year);
    return $daySum/7;
}


function week_num_from_date($date){

$date = new DateTime($date);
return $date->format("W");
 
}

function current_week_num(){

return week_num_from_date(date("Y-m-d"));
 
}


function get_date_from_week_no($week , $year){

$week = (($week >= 1) AND ($week <= 52))?($week-1):(1);

$dayrange  = array(7,1,2,3,4,5,6);
$result=array();

for($count=0; $count<=6; $count++) {
    $week = ($count == 1)?($week + 1): ($week);
    $week = str_pad($week,2,'0',STR_PAD_LEFT);
    // echo date('d m Y', strtotime($year."W".$week.($dayrange[$count]))); }
$result[]  = strtotime($year."W".$week.($dayrange[$count]));

}

return $result;

}


function numTo2Dp($num){

return number_format((float)$num, 2, '.', '');

}


//By gutzmer at usa dot net's 
//( http://php.net/manual/en/function.base64-encode.php#103849 )

 function base64url_encode( $data ){
  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
}

function base64url_decode( $data ){
  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
} 



