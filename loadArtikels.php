
<?php
// Start the session
session_start();

include 'apifunctions.php';

function makeTabs(){
	$dict = getDictWithItems();
	$categories = getCategories();
	$artikelen = getArticleList();
	$MainCat = new stdClass();
	$MainCat->id = 101;
	$MainCat->leafs = $categories;
	echo loopCats($MainCat,array_keys(get_object_vars($dict)),$artikelen,"");
}

function loopCats($cat,$keys,$lijst,$prefix){

	$containsItems = False;
	if(in_array($cat->id,$keys)){
		$containsItems = True;
	}

	$childContainsItems = False;
	$childcontent = array();
	$childId = array();
	foreach($cat->leafs as $leaf){
		$content = loopCats($leaf,$keys,$lijst,$prefix."\t");
		if($content!==''){
			array_push($childcontent,$content);
			array_push($childId,$leaf);
			$childContainsItems = True;
		}
	}
	$html = '';
	if ($childContainsItems){
		$html = $prefix."<nav>\n";
		$html .= $prefix."\t<div class=\"nav nav-tabs\" id=\"nav-tab-".$cat->id."\" role=\"tablist\">\n";

		$firstActiveTab='active';
		foreach($childId as $leafId){
			$html .= $prefix."\t\t<a class=\"nav-item nav-link ".$firstActiveTab."\" id=\"nav-tab-".$leafId->id."\" role=\"tab\" data-toggle=\"tab\" href=\"#nav-".$leafId->id."\">".substr($leafId->title,0,10)."</a>\n";
			$firstActiveTab='';
		}
		if ($containsItems){
			$html .= $prefix."\t\t<a class=\"nav-item nav-link ".$firstActiveTab."\" id=\"nav-tab-".$cat->id."\" role=\"tab\" data-toggle=\"tab\" href=\"#nav-def-".$cat->id."\">".substr($cat->title,0,10)."</a>\n";
		}
		$html .= $prefix."\t</div>\n";
		$html .= $prefix."</nav>\n";
		$html .= $prefix."<div class=\"tab-content\" id=\"nav-tabContent-".$cat->id."\">\n";

		$firstActiveTab='show active';
		for($i = 0; $i < count($childcontent); $i++ ){
			$child = $childcontent[$i];
			$leafId = $childId[$i];
			$html .= $prefix."\t<div class=\"tab-pane fade ".$firstActiveTab."\" id=\"nav-".$leafId->id."\" role=\"tabpanel\">\n";
			$html .= "\t".$child;
			$html .= $prefix."\t</div>\n";
			$firstActiveTab='';
		}
		if ($containsItems){
			$html .= $prefix."\t<div class=\"tab-pane fade ".$firstActiveTab."\" id=\"nav-def-".$cat->id."\" role=\"tabpanel\">\n";
			$html .= $prefix."\t\t\n";
			$html .= $prefix."\t</div>\n";
		}
		$html .= $prefix."</div>\n";
	}
	elseif ($containsItems) {
		//$html = $prefix."<div class=\"tab-pane fade active show\" id=\"nav-".$cat->id."\" role=\"tabpanel\">Leaf</div>\n";
		$html .= $prefix."\n";
	}
	return $html;
}
makeTabs();
?>
