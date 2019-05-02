function isPalindromes(str) {
  let strReverse = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    strReverse += str[i];
  }
  if (str === strReverse) {
    return true;
  }
  return false;
}

console.log(isPalindromes('abcba'));

module.exports = isPalindromes;
