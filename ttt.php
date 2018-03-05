
<?php  
include('incl.html');
 
$num=$_POST["Number"];
echo "<br/>";
/*$myfile = fopen("word.txt","r")
or die ("Unable to find File!");*/

$lenght;
$words = array();
$result = array();
$name = array();
$i=0;
$count;
$x = array();
if($myfile = fopen("word.txt","r"))
{
  while(!feof($myfile)) 
    {
	  
	  if ($s = fgets($myfile,1048576)) 
	  {
        $words = preg_split('/[\s,?\/:]+/',$s,-1,PREG_SPLIT_NO_EMPTY);
        // process words
		
	  }
	  
		 
        $result=array_merge($result , $words);		
    }
	
	//print_r($result);
	    
	   
}
//print_r($result);

$lenght = sizeof($result); 
$repeat= array();
$array1 = array();

$data=array();
foreach($result as $array)
{
    //gatering words in an array by spliting the sentence on space.
    $data=  array_merge($data,explode(" ", strtolower($array)));
}
//counting values present in array for case sensitive
$result1=array_count_values($data);

//counting values present in array for case insensitive by changing each array element to lowercase
$result1=array_count_values(array_map("strtolower", $data));

      arsort($result1); //sorting of ArrayMap according to it;s values
	  $k=0;
 
      //creation of table to print data in tabular from
	  echo"<center><div class='container'><h3 style='color:#062454 '><span style='font-weight:bold;'>*************************</span>Frquency of Words in word.txt file
	  <span style=font-weight:bold>*************************</span>
	  </h3></div></center>
	  <hr style='background-color:red'/>";
	  echo "<div class='container table-responsive'>";
	  echo "<table class='table table-bordered table table-hover' style='color:#2F4F4F'>";
			echo "<thead><tr  style='color:white;font-weight: bold;background-color:#36648B' >
                <th>Serial No.</th>
                 <th>Word</th>
                <th>Frequency</th>
             </tr></thead>";
	 foreach($result1 as $x => $x_value) {
		 if($k<$num){
           
			 echo "<tbody><tr  style='text-transform:uppercase;font-weight: bold;background-color:lightblue'>";
			echo "<td>". ($k+1) ."</td>" . "<td>". $x ."</td>" . "<td>". $x_value."</td>"."</tr></tbody>"; 
			 $k++;
		 }
     }
	 echo "</table>";  //end of table creation
	 echo "</div>";
fclose($myfile);
 ?>
