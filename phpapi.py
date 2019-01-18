
import os, sys, ast, json
os.chdir("/home/rens/mx5/api/Parts-Picker")
sys.path.append('/home/rens/mx5/api/Parts-Picker')
import api

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
