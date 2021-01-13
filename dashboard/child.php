<?php    
	include("connect.php");
	include("function.php");
 function retrieveSubTree($parent, $myarray) {
    $tempArray = $myarray;
    $array = array();           
    //now we have our top level parent, lets put its children into an array, yea!
    while ($child = array_search($parent, $tempArray)) {
        unset($tempArray[$child]);
        //now lets get all this guys children
        if (in_array($child, $tempArray)) {
            $array[$child] = retrieveSubTree($child, $tempArray);
        } else {
            $array[$child] = true;
        }
    }//end while
    return (!empty($array)) ? $array : false;
}

function retrieveTree($myarray) {
    $array = array();
    $counter = 0;
    foreach ($myarray as $key => $value) {
        $child = $key;
        $parent = $value;
        //if this child is a parent of somebody else
        if (in_array($child, $myarray) && $parent != '0') {
            while ($myarray[$parent] != '' && $myarray[$parent] != '0') {
                $newparent = $myarray[$parent];
                $parent = $newparent;
            }
            if (!array_key_exists($parent, $array)) {
                $array[$parent] = retrieveSubTree($parent, $myarray);
            }
        } else {
            //now make sure they don't appear as some child
            if (!array_key_exists($parent, $myarray)) {
                //see if it is a parent of anybody
                if (in_array($child, $myarray)) {
                    $array[$child] = retrieveSubTree($child, $myarray);
                } else {
                    $array[$child] = true;
                }
            }//end if array key
        }//end initial in array
    }//end foreach
    return (!empty($array) ? $array : false);
} 
echo "<pre>";



 $q = mysql_query_md("SELECT accounts_id,parent FROM `tbl_accounts`");
                  while($row=mysql_fetch_md_array($q))
                  {
                    $test[$row['accounts_id']] = $row['parent'];
                  }
$a = retrieveTree($test);



foreach($a as $key=>$val){

    echo $key."<br>";


}