# mk_busines_online-test-task
* Write string preparation function, which fill template in with data from
* specified object
*
* Data object
* user: {
* id: 20
* type_id: 'test'
* }
*
* Template: /api/items/%id%/%type_id%
* Expected result: /api/items/20/test
*/
const user = {
id: 20,
name: "John Dow",
role: "QA",
salary: 100
};

const apiTemplatesSet1 = [
"/api/items/%id%/%name%",
"/api/items/%id%/%role%",
"/api/items/%id%/%salary%"
];

const apiPathes = apiTemplatesSet1.map(apiPathTemplate => {
return getApiPath(user, apiPathTemplate);
});

function getApiPath(obj, template) {
let result = "";
return result;
}

console.log(JSON.stringify(apiPathes));
/
* expected:
* ["/api/items/20/John%20Dow","/api/items/20/QA","/api/items/20/100"]
*/
