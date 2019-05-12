const request = require('request');

request('https://lidemy-book-store.herokuapp.com/books?_limit=10', (error, response, body) => {
  const obj = JSON.parse(body);
  // console.log('error:', error); => error: null
  // console.log('statusCode:', response && response.statusCode); => statusCode: 200
  // console.log('body:', body); => all data
  for (let i = 0; i <= 9; i += 1) {
    console.log(obj[i].id, obj[i].name);
  }
});
