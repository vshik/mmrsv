<?php

$button = $_GET ['submit'];
$search = $_GET ['search'];

if(strlen($search)<=1)
echo "Search term too short";
else{
echo "You searched for <b>$search</b> <hr size='1'></br>";

$link = mysql_connect("localhost", "root", "root");
mysql_set_charset('utf8',$link);
mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');

mysql_select_db("mmrsv");

$search_exploded = explode (" ", $search);

$x = "";
$construct = "";

foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="shloka LIKE '%$search_each%'";
else
$construct .="AND shloka LIKE '%$search_each%'";

}

$constructs ="SELECT * FROM mmrsv WHERE $construct";
$run = mysql_query($constructs);

$foundnum = mysql_num_rows($run);

if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>. Please try again with following points in mind. </br></br>
1. Try more general words. for example: If you want to search 'how to create a website'
then use general keyword like 'create' 'website'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling";
else
{ 
  
echo "$foundnum results found !<p>";
  
$per_page = 5;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = mysql_query("SELECT * FROM mmrsv WHERE $construct LIMIT $start, $per_page");
  
while($runrows = mysql_fetch_assoc($getquery))
{
$ChapterS = $runrows ['ChapterS'];
$SectionS = $runrows ['SectionS'];
$ShlokaNo = $runrows ['ShlokaNo'];
$Shloka = $runrows ['Shloka'];
$ShlokaMeaning = $runrows ['ShlokaMeaning'];
$Reference = $runrows ['Reference'];
echo "$ChapterS *** $SectionS *** $ShlokaNo *** $Shloka *** $ShlokaMeaning *** $Reference<p>";
}

//Pagination Starts
echo "<center>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
//previous button
if (!($start<=0)) 
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$prev'>Prev</a> ";    
          
//pages 
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                                       
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='search.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}   
$i = $i + $per_page;                
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='search.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";   
} 
$i = $i + $per_page;              
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$next'>Next</a> ";    
}   
echo "</center>";
} 
} 
?>

