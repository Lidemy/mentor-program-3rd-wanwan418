function alphaSwap(str) {
  let strSwap = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str[i] >= 'a' && str[i] <= 'z') {
      strSwap += str[i].toUpperCase();
    } else if (str[i] >= 'A' && str[i] <= 'Z') {
      strSwap += str[i].toLowerCase();
    } else {
      strSwap += str[i];
    }
  }
  return strSwap;
}

alphaSwap('abcd');

module.exports = alphaSwap;
