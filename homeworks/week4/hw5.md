## 請以自己的話解釋 API 是什麼
API (Application Programming Interface) 應用程式介面，主要是運用來連結不同裝置、資料庫的。例如現在比價網和各家航空公司中是透過 API 來連結資訊，透過 API 比價網會將要求發送給各家航空公司，各家航空公司同時也會將要求回傳回來。

## 請找出三個課程沒教的 HTTP status code 並簡單介紹
- 101 Switching Protocols
： 1XX 這類回應是臨時回應，只包含狀態行和某些可選的回應頭資訊，並以空行結束。101 是指切換協定，只有在切換新的協定更有好處的時候才應該採取類似措施。例如，切換到新的HTTP版本（如HTTP/2）比舊版本更有優勢，或者切換到一個實時且同步的協定（如WebSocket）以傳送利用此類特性的資源。
- 204 No Content
：2XX 這類回應是指成功。server 有順利接到 client 的 request ，但沒有呈現畫面。
- 401 Unauthorized
於存在的網頁，但對於沒有足夠許可權的用戶來說，(它們沒有登錄或者不屬於適當的用戶組) 沒有對請求資源的訪問權，則應該返回，會出現 401 沒有授權的畫面。

參考資料：https://en.wikipedia.org/wiki/List_of_HTTP_status_codes

## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

|    說明         | Method |  path  |	參數 |  範例   |
| -------------- | ------ | ------ | ------ | ------ |
| 回傳所有餐廳資料 |  GET   | /restaurants | _limit:限制回傳資料數量 | /restaurants?_limit=6
| 回傳單一餐廳資料 | GET   | /restaurants/:id | 無 | /restaurants/1
| 刪除餐廳        | DELETE | /restaurants/:id | 無 | 無 | 
| 新增餐廳        | POST| /restaurants | name: 餐廳名 | 無 | 
| 更改餐廳        | PATCH  | /restaurants/:id  | name: 餐廳名 | 無 | 