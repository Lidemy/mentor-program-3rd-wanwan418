const printStars = function (n) {
  let result = [];
  for (let i = 1; i <= n; i += 1) {
    result += ['*'];
  }
  return result;
};

function stars(n) {
  const newStars = [];
  for (let i = 1; i <= n; i += 1) {
    newStars.push(printStars(i));
  }
  return newStars;
}

console.log(stars(6));

module.exports = stars;
