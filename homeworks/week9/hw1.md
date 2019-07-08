資料庫名稱：comments

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id     |
|  username |  varchar(128) | 使用者名稱 |
|  content  |  text    |  留言內容  |
|   time   |   DATETIME   |  留言時間 |  


資料庫名稱：users
| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id  |
|  username |  varchar(16) |  使用者名稱 |
| password | varchar(16) | 使用者密碼 ｜
| nickname | varchar(64) | 使用者暱稱 |