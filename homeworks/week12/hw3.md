## 請說明 SQL Injection 的攻擊原理以及防範方法
### SQL Injection
SQL injection 是攻擊者透過修改 SQL語句，達到竊取資料的行為。
```
SELECT * FROM users WHERE username='$username' AND password='$password'";
// 假設 username=123;password=456
```
當 username=123（true）並且password=456 (true) ，可以順利登入。但如果攻擊者不知道帳號或密碼之下，會故意這樣填寫 username=' or 1=1 /* ，/*、-- 在 SQL 語法是註解，所以不用執行，判斷句 1=1 (true)，攻擊者就可以登入成功。

### 防範方式：
是以過濾字串的概念為主，
運用 Prepared Statement，例如Java PreparedStatement()，.NET SqlCommand(), OleDbCommand()，**PHP PDO bindParam()**。（粗體是作業所用的方式），Prepared Statement 會替 SQL 語句進行預處理，再利用它提供的 bindValue 或 bindParam 函式將欲查詢的參數的值或變數綁定上去，底層查詢時，其參數會保證作為數值傳遞，不可能成為 SQL 語句的一部分，也因此就不會產生 SQL Injection 的問題。

## 請說明 XSS 的攻擊原理以及防範方法
### XSS(Cross-Site Scripting)
Cross-Site Scripting，跨站式腳本攻擊。主要是在使用者的輸入文字的地方，沒有過濾惡意指令，引導用戶到不法頁面、使網站當機、偷用戶資料，常見的就是可以在網站上的輸入 JavaScript 指令就可以執行。
### 防範方式：
- 檢查頁面輸入數值
- 輸出頁面做 Encoding 檢查
- 使用白名單機制過濾，而不單只是黑名單
- PHP 使用 htmlspecialchars 過濾字串


## 請說明 CSRF 的攻擊原理以及防範方法
### CSRF
Cross Site Request Forgery，跨站請求偽造。
已登入網站應用程式的合法使用者執行到惡意的 HTTP 指令（可能使用者自己也不知情），但網站只會判定使用者發出 request 且當成合法需求處理，使得惡意指令被正常執行。 
舉例來說，攻擊者在網站內放置了按鈕，但是按鈕的語法卻是
```
<a href='https://small-min.blog.com/delete?id=3'>顯示結果</a>
```
當使用者點擊後，瀏覽器就發送 GET 請求，當 server 端收到判斷是否為合理使用者的 requset，確認是就執行 requset 行為。

### 防範方式：
- 確保網站內沒有任何可供XSS攻擊的弱點
- 在Input欄位加上亂數產生的驗證編碼
- 在能使用高權限的頁面，重新驗證使用者