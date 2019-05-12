const request = require('request');
const process = require('process');

request('https://lidemy-book-store.herokuapp.com/books/', (_error, _response, _body) => {
  const obj = JSON.parse(_body);
  const idNum = parseInt(process.argv[3], 10);
  if (process.argv[2] === 'list') {
    for (let i = 1; i <= 18; i += 1) {
      console.log(obj[i].id, obj[i].name);
    }
  }
  if (process.argv[2] === 'read') {
    request(`https://lidemy-book-store.herokuapp.com/books/${idNum}`,
      (error, response, body) => {
        const obj1 = JSON.parse(body);
        console.log(idNum, obj1.name);
      });
  }
});
