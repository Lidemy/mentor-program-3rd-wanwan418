## 交作業流程

1. 先確認所在的位置是 master 還是 branch
2. 新開一個 branch：`git branch branchname`
3. 轉換到新開的 branch：`git checkout branchname`
4. 確認現在這個目錄的狀態：`git status`
5. 如果檔案顯示 Untracked，接下來就是要把檔案交給 Git，讓 Git 開始「追蹤」它：`git add filename` 或　`git add .` ( add 全部檔案 )
6. 把暫存區的東西存放到儲存庫（Repository）裡：`git commit -m "first commit"` (m是後面放你這次做了什麼更動)
7. 將本機的檔案推上遠端的伺服器，先設定一個 repo 的伺服器：`git remote add origin https://github.com/Lidemy/mentor-program-3rd-wanwan418.git`
8. 將本機的檔案推上遠端的伺服器，因為不是推到 master，在 origin 後面要打 branchname：`git push origin branchname`
9. 在 GitHub 發 PR 給 Huli
10. 在 issue 放上 PR 網址