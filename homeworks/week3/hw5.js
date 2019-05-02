function add(a, b) {
  const arrA = a.toString().split('').reverse();
  const arrB = b.toString().split('').reverse();
  const ans = [''];
  const length = Math.max(arrA.length, arrB.length);

  let carry = 0; // 進位
  for (let i = 0; i < length; i += 1) {
    ans[i] = Number(arrA[i] || 0) + Number(arrB[i] || 0) + carry;
    carry = 0;
    if (ans[i] >= 10) {
      carry = 1; // 兩位相加 只會進位一
      ans[i] -= 10;
    }
  }
  if (carry) {
    ans.push(1);
  }
  return ans.reverse().join('');
}
console.log(add(12, 76));
module.exports = add;
