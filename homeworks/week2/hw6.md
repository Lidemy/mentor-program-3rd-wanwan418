``` js
function isValid(arr) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] <= 0) return 'invalid'
  }
  for(var i=2; i<arr.length; i++) {
    if (arr[i] !== arr[i-1] + arr[i-2]) return 'invalid'
  }
  return 'valid'
}

isValid([3, 5, 8, 13, 22, 35])
```

## 執行流程

1. 執行第 11 行，叫用 inVaild Function，帶入參數 [3, 5, 8, 13, 22, 35]。
2. 執行第 1 行，宣告一個參數是 arr 的 isVaild 的 Function。
3. 執行第 2 行，進入第一個 for 迴圈，設定變數 i 是 0 ，檢查 i 是否 <= arr 的長度，是，繼續執行，開始進入第一圈迴圈
4. 執行第 3 行，判斷 arr[i] 是否 <= 0 ，如果是，回傳 invalid 字串，跳出迴圈，如果不是，進入下一行。
5. 執行第 4 行， 第一圈迴圈結束，跑回第 2 行，i++，i 變成 1，檢查是否 <= arr 的長度，是，繼續執行
6. 執行第 3 行，判斷 arr[i] 是否 <= 0 ，如果是回傳 invalid 字串，如果不是，如果不是，進入下一行。
7. 迴圈結束，再跑回第 2 行，i++，i 變成 2，檢查是否 <= arr 的長度，直到 i 變成 arr 的長度，第一個 for 迴圈執行完畢。
8. 執行第 5 行，進入第二個 for 迴圈，設定變數 i 是 2 ，檢查 i 是否 < arr 的長度，是，繼續執行，開始進入第一圈迴圈。
9. 執行第 6 行，判斷 arr[i] 是否不等於 arr[i-1] + arr[i-2] ，如果是回傳 invalid 字串，跳出迴圈，如果不是，進入下一行。
10. 第一圈迴圈結束，跑回第 5 行，i++，i 變成 3，檢查是否 < arr 的長度，是，繼續執行
11. 執行第 6 行，判斷 arr[i] 是否不等於 arr[i-1] + arr[i-2] ，如果是回傳 invalid 字串如果不是，進入下一行。
12. 迴圈結束，再跑回第 5 行，i++，i 變成 2，檢查是否 <= arr 的長度，直到 i 變成 arr 的長度，執行完畢
13. 執行第 8 行，回傳 valid 字串。
14. 執行第 9 行，函式 isValid 結束。
