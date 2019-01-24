<?php
function getProductImage($id){
	$fotoUrl = 'Images/'.$id.'.jpeg';
	if(!file_exists($fotoUrl)){
		if ($id % 2==0){
			return "/Images/nopic.jpg";
		}
		else{
			return "/Images/icon.png";
		}
	}
	return $fotoUrl;
}

function getDictWithItems(){
	#return shell_exec("python -c \"import phpapi; phpapi.getPHPDictWithItems()\"");
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getPHPDictWithItems()\""));
}

function getArticleList(){
	#return shell_exec("python -c \"import phpapi; phpapi.getPHPDictWithItems()\"");
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getPHPArticleList()\""));
}

function getStoreDetails(){
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getStoreDetails()\""));
}
function getOrders($aantal=0,$silent=False){
	;//print(json.dumps(api.getOrders($aantal,$silent)))
}
function getCategories(){
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getCategories()\""));
}
function getOrderCount(){
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getOrderCount()\""));
}
function getArtikelCount(){
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getArtikelCount()\""));
}
function getArtikels($aantal = 0,$silent = False){
	return json_decode(shell_exec("python -c \"import phpapi; phpapi.getArtikels(aantal=1000,silent=True)\""));
}
function getArtikel($id,$use_url_id=False){
		;//print(json.dumps(api.getArtikel(id,use_url_id)))
}
function deleteArtkel($id,$use_url_id=False){
	;//print(json.dumps(api.deleteArtkel(id,use_url_id)))
}
function postArtikel($data){
	;//print(json.dumps(api.postArtikel(data)))
}
function patchArtikel($id,$data,$use_url_id=False,$taal='nl_NL'){
	;//print(json.dumps(api.patchArtikel(id,data,use_url_id,taal)))
}
?>
