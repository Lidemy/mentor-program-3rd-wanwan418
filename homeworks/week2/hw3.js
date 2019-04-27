function reverse(str) {
  let strReverse = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    strReverse += str[i];
  }
  console.log(strReverse);
}

reverse('hello');
