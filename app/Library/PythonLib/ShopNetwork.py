
import sys

class Shop(object):
	"""docstring for Shop"""
	def __init__(self, arg):
		self.shop_id = shop_id
		self.weight = weight
		self.category_id = category_id
		self.super_cat_id = super_cat_id



#given array of shop sorted by weight  = customer reach + category factor
# return a dic {S1 : [S2, S3, S4, S5] and S2:[S1, S3, S4, S5]}. 

class ShopNetwork(Shop):
	"""docstring for ClassName"""
	def __init__(self, arg):


	def sortedShopsByWeight(weight):
		return sort(weight);

	def network(self, shops, s):
		parent = { : }
		start = []
		for i in range(len(shops)):
			start.append(shops[i])
			child = []
			for j in range(len(shops)):
				if parent != shops[j]:
					child.appned(shop[j])

			parent[start] = child 
			start = []

		return parent
		
	def update(self, shops):
		network(shops)
		if child.customer_count = 0:
			parent[start].remove(child)






# #Dynmicaly remove the child from the particular shop and adding too.
# class DynamicNetwork(ShopNetwork):
# 	"""docstring for DynamicNetwork"""
# 	def __init__(self, usedtimes):
# 		self.usedtimes = usedtimes

# 	def 
		







			



		