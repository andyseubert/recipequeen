var myApp = angular.module('myApp',['ngRoute',"xeditable"]);

// xeditable options
myApp.run(function(editableOptions,editableThemes) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
  editableThemes.bs3.inputClass = 'input-sm';
  editableThemes.bs3.buttonsClass = 'btn-sm';
});


myApp.config(function($routeProvider){
    
    $routeProvider
    .when ('/items',{
        templateUrl:'/listitems.html',
        controller:'inventoryItemController'
    })
           .when('/recipes',{
        templateUrl:'/recipes.html',
        controller:'recipeController'
    })
           .when('/',{
        templateUrl:'/recipes.html',
        controller:'recipeController'
    })
});

// items need to be on both items and recipes pages
myApp.factory('itemService', ['$log','$http', function($log,$http){
    this.items={};
    
    // get list of all items
    $http.get('/data/items.php')
            .success(function(result){
                this.items = result; // items set to GET result here
                //$log.info("in itemService here");
                //$log.log(result);
            })
            .error(function(result, status){
                this.items = status;
                $log.log(status);
            
            });
    return this.items;
}]);




myApp.controller('inventoryItemController',['$scope','$log','$http','itemService','$filter', function($scope,$log,$http,itemService,$filter){
    
    $log.info("in inventoryItemController here");
    // manage inventory items 
    // need to know about the items
    $scope.items=[];
    //$log.log($scope.items);
    $http.get('/data/items.php')
            .success(function(result){
                $scope.items = result; // items set to GET result here
                $log.log(result);
            })
            .error(function(result, status){
                $scope.items = status;
                $log.log(status);
            
            });
    
    //calculate inventory total cost
    $scope.calculateTotalCost=function(){
        //$log.log("calculating cost");
        var total = 0;
        for(var i = 0; i < $scope.items.length; i++){
            var product = $scope.items[i];
            total += (product.cost * product.quantity);
        };
        return total;
    };
    
    
    // add item to inventory
    $scope.addItem = function() {
	
		$http.get('/data/additem.php')
			.success(function(result){
				$log.log("result.item_id is " +result);
				var insertedItem={
					item_id:result,
					name: 'new item',
					vendor: '',
					vendorpartnumber: '',
					type: '',
					origin: '',
					cost: '',
					unit: '',
					description: ''
				};
				$scope.items.splice(0,0,insertedItem);
			})
			.error(function(result,status){
				$log.log(status+"	"+result);
			})
        
  };
    
    
    // edit item parameters
    $scope.updateItem=function(data){
        return $http.post('/data/updateitem.php',data)
        .error(function(err) {
            if(err.field && err.msg) {
              // err like {field: "name", msg: "Server-side error for this !"} 
              $log.log(err.field, err.msg);
            } else { 
              // unknown error
              $log.log('name', 'Unknown error!');
            }
        })
        
        .success(function(result){
            //$log.log(result);
        });
    
    calculateTotalCost();
    };
    
    // delete Item from inventory
	$scope.deleteItem=function(removethis){
        // {'item_id':item.item_id})
		$http.post('data/deleteitem.php',removethis)
		.success(function(result){
			$log.log ("deleted item id : " + removethis.item_id);
			// remove from $scope.items too			
			   $log.log("returned from php: " + result);
			   $scope.items = $filter('filter')($scope.items, function(value, index) {return value.item_id !== removethis.item_id;});
			 
		})
	
	
	};
    
}]);


myApp.controller('recipeController',['$scope','$log','$http','itemService','$filter', function($scope,$log,$http,itemService,$filter){
    // manage recipes with this controller
    
    // need to know about the items
    
    // get list of all items
    $http.get('/data/items.php')
            .success(function(result){
                $scope.items = result; // items set to GET result here
                //$log.info("in itemService here");
                //$log.log(result);
            })
            .error(function(result, status){
                $scope.items = status;
                $log.log(status);
            
            });
        
        //$log.info ($scope.items);
    
    // get all recipes
    //$scope.recipes={};
    $scope.recipeItems=[];
    
    $http.get('/data/getrecipes.php')
            .success(function(result){
                $scope.recipes = result; // items set to GET result here
                //$log.log($scope.recipes);
            })
            .error(function(result, status){
                $scope.recipes = status;
                $log.log(status);
            
            });
    
    
    
    // get recipe items by recipeid
    $scope.recipe_id='';
    $scope.recipe_name='';
    // column sorting
    $scope.orderByField = 'name';
    $scope.reverseSort = false;
    
    
    //display chosen recipe
    $scope.selectRecipe =function(chooseRecipeForm){
        // reset the list of items
        $scope.recipeItems=[];
        // should only be sending me the recipe_id as { 'recipe_id':## }
        //$log.log("attempting to select recipe by id here");
        //$log.log($scope.recipe_id);
        $http.post('/data/listrecipeitems.php',{'recipe_id':$scope.recipe_id.recipe_id})
            .success(function(result){
                if (angular.isObject(result)) {  // crazy ? 
                    $scope.recipeItems=result;
                    $log.log("result from choosing: '" + result + "'");
                    $log.log("length of result: " + result.length);
                }
            });
    };
    
    
    // add recipe
    $scope.addRecipe = function(){
        $scope.addone=false;
        if ($scope.recipename !=='') {
        // add recipe - receive recipe object
        $http.post('/data/addrecipe.php',{ 'recipe_name':$scope.recipe_name })
        .success(function(result){
            //$log.log(result);
            $scope.recipe = {
			'recipe_id':result,
			'name':$scope.recipe_name,
			'description':'',
			'recipe_cost':'',
			'recipe_size':'',
			'recipe_units':''
			};
            $scope.recipe_id=$scope.recipe.recipe_id
            $scope.recipes.push($scope.recipe);
            //$log.info($scope.recipe);
            
        })
        
        .error(function(result, status){
            $log.log(result + status);
            // duplicate name needs feedback
        });
        
        
    }else{
        //maybe say something about entering empty recipe name
    }
    };
    
    // add item to recipe
    $scope.addItemToRecipe = function(additem_id){
        $log.log('looking to add id: '+ additem_id.item_id);
            //don't allow duplicates to be added
            // php will check for duplicates in db
            $http.post('/data/additemtorecipe.php',{'item_id':additem_id.item_id,'recipe_id':$scope.recipe_id.recipe_id})
            .success(function(result){
                if ( angular.isObject(result) ) { // empty means there was a duplicate
                    // find the item object from the items we have and push it onto the recipeItems
                    $log.log("add item to recipe result from php: " + result);
                    var matchedItem = $filter('filter')($scope.items, function(value, index) {return value.item_id == additem_id.item_id;})[0];
                    if (matchedItem) {
                        
                        $scope.recipeItems.push(matchedItem);
                        $log.log(matchedItem);
                    
                    }else{
                        $log.log ("item not matched..");
                    }
                }else{
                    $log.log("no object returned add item to recipe result from php: " + result);
                    // alert the user here that they tried to add a duplicate
                }
            })
            .error(function(result,status){
                // probably should handle some error here
                $log.log("error adding item to recipe result from php: " + result);
                });   
            // reset select box
            $scope.additem_id={};
        
        };
        
        
        
    // delete item from recipe
    $scope.removeRecipeItem=function(removethis){
        // {'recipe_id':recipe_id,'item_id':recipeitem.item_id})
        $log.log("incoming values:"+removethis.toString());
        
        $log.log("removethis recipe_id : " + removethis.recipe_id);
		$log.log("current page $scope.recipe_id.recipe_id: " + $scope.recipe_id.recipe_id);
        $log.log("removethis item_id : " + removethis.item_id);
        
        $http.post('/data/removerecipeitem.php',{'recipe_id':$scope.recipe_id.recipe_id,'item_id':removethis.item_id})
			.success(function(result){
			   // remove from recipeItems
			   $log.log("returned from php: " + result);
			   $scope.recipeItems = $filter('filter')($scope.recipeItems, function(value, index) {return value.item_id !== removethis.item_id;});
			 })
			.error(function(result,status){
			   $log.log("error result:" + result);  
			})
     
    };
    
    // edit amount of item in recipe
    $scope.updateRecipeItem=function(data){
        
        return $http.post('/data/updaterecipeitem.php',data)
        .error(function(err) {
            if(err.field && err.msg) {
              // err like {field: "name", msg: "Server-side error for this !"} 
              $log.log(err.field, err.msg);
            } else { 
              // unknown error
              $log.log('name', 'Unknown error!');
            }
        })
        
        .success(function(result){
            //$log.log(result);
        });
    
    calculateRecipeCost();
        };
    
    
    // caculate cost of item in recipe
    // calculate total recipe cost
    // calculate recipe amount produced by unit (containers separate from oz,g,lb, etc)
    
}]);
    