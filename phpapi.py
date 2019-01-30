
import os, sys, json
path = "/home/rens/mx5/api/Parts-Picker"
os.chdir(path)
sys.path.append(path)
import api, utils

def getPHPDictWithItems():
	artikelen = loadWebshopArtikels()
	print(json.dumps(getDictWithItems(artikelen)))

def getPHPArticleList():
	artikelen = loadWebshopArtikels()
	print(json.dumps(artikelen))

def getStoreDetails():
	print(json.dumps(api.getStoreDetails()))

def getOrders(aantal=0,silent=False):
	print(json.dumps(api.getOrders(aantal,silent)))

def getCategories():
	print(json.dumps(api.getCategories()))

def getOrderCount():
	print(json.dumps(api.getOrderCount()))

def getArtikelCount():
	print(json.dumps(api.getArtikelCount()))

def getArtikels(aantal=0,silent=False):
	print(json.dumps(api.getArtikels(aantal,silent)))

def getArtikel(id,use_url_id=False):
	print(json.dumps(api.getArtikel(id,use_url_id)))

def deleteArtkel(id,use_url_id=False):
	print(json.dumps(api.deleteArtkel(id,use_url_id)))

def postArtikel(data):
	print(json.dumps(api.postArtikel(data)))

def patchArtikel(id,data,use_url_id=False,taal='nl_NL'):
	print(json.dumps(api.patchArtikel(id,data,use_url_id,taal)))

#-------------------------------------------------------

def loadWebshopArtikels(silent=True):
	webshopLijst = [];
	webshopProducts = utils.readJson('Resources/Artikelen.json')
	if webshopProducts == {}:
		webshopProducts = api.getArtikels(silent=silent)
		utils.writeJson('Resources/Artikelen.json',webshopProducts)
	for d in webshopProducts:
		item = d
		if item is not None:
			webshopLijst.append(item)
	return webshopLijst

def getDictWithItems(webshopLijst):
	cids = {}
	for a in webshopLijst:
		for c in a['categories']:
			cids.setdefault(str(c['category_id']),[]).append(a)
	return cids
