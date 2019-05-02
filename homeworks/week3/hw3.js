function isPrime(n) {
  if (n <= 1) return false;
  for (let i = 2; i < n; i += 1) {
    if (n % i === 0) {
      return false;
    }
  }
  return true;
}
// i != n , 因為 n = i 必定可以整除

isPrime(40);

module.exports = isPrime;
