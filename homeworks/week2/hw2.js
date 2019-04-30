function capitalize(str) {
  const arr = str.split('');
  arr[0] = arr[0].toUpperCase();
  return arr.join('');
}

console.log(capitalize('hello'));
