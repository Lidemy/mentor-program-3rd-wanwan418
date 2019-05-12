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

if (process.argv[2] === 'delete') {
  const idNum = parseInt(process.argv[3], 10);
  request.delete(`https://lidemy-book-store.herokuapp.com/books/${idNum}`, (error, status) => {
    if (status.statusCode === 200) {
      console.log('Delete successfully');
    } else {
      console.log('Delete Failed.');
      console.log('error', error);
    }
  });
}

if (process.argv[2] === 'update') {
  request.patch({ url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`, form: { name: process.argv[4] } }, (error, status) => {
    if (status.statusCode === 200) {
      console.log('Update successfully!');
    } else {
      console.log('Update Failed.');
      console.log('error', error);
    }
  });
}

if (process.argv[2] === 'create') {
  request.post({ url: 'https://lidemy-book-store.herokuapp.com/books/', form: { name: process.argv[3] } }, (error, status) => {
    if (status.statusCode === 201) {
      console.log('Create successfully');
    } else {
      console.log('Create Failed.');
      console.log('error:', error);
    }
  });
}
