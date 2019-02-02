
var baseUrl = 'http://localhost:8000';

const apiObject = {
getItems: function(api){
 return  api.get(baseUrl + "/api/items");
},
addItem: function (api,$item){
  return api.post(baseUrl+"/api/items",$item);
              }
            }
export default apiObject;
