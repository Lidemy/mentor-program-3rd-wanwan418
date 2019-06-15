## 什麼是 DOM？
DOM（Document Object Model），文件物件模型，是 W3C 聯合各瀏覽器制定的標準物件模型，以解決瀏覽器物件不一致的情形。在 HTML 下，每個標籤（tag）都是一個物件，以文件定義的結構，形成樹狀結構。例如：document > html > head ( > title) or body ( > h1、div) 等。 

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？
- Event Flow: capture, target, and bubbling。
-![圖片來源: W3C, DOM event flow](https://blog.techbridge.cc/img/huli/event/eventflow.png)

- 假設我們點擊 (click) 了 <div>cd</div> 元素，那麼在「事件捕獲」的機制下， cd 事件由上往下依序被觸發，就是「事件捕獲」機制。然後再繼續執行綠色的 「bubble phase」，反方向由 <td> 一路往上傳至 Document，整個事件流程到此結束。
- 事件捕獲（event capturing）：當滑鼠點擊獲觸發 Event 時，瀏覽器會從根節 document 由外到內傳播，假設點擊子元素，也會同時點擊父元素。
事件冒泡（dubbed bubbling）：和捕獲相反，事件冒泡顺序是由内到外（可能是從子元素到父元素），依序到 document。

## 什麼是 event delegation，為什麼我們需要它？
- Event Delegation（事件委派）是一種受惠於 Event Bubbling 而能減少監聽器數目的方法。
- 本來的 addEventListener 是跟著子元素的，當子元素有新增時，需要重新加上 addEventListener，那如果利用 event delegation，把 click 事件改成綁定父元素，就可以利用事件傳遞的原理，判斷目標節點，進行後續的動作。

參考資料：<a href="https://ithelp.ithome.com.tw/articles/10192015">重新認識 JavaScript: Day 15 隱藏在 "事件" 之中的秘密</a>

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

- e.stopPropagation：取消事件繼續往下傳遞
- e.preventDefault：取消瀏覽器的預設行為。如點選超連結，預設行為是開啟連結分頁，則無法開啟連結：選擇 checkbox 則是無法點選打勾。以下的例子，web 元素無法再為我們進行導頁的動作，因為已經停止他的預設行為。

```
<a id="web" href="https://google.com">Google</a>
<script type="text/javascript">
document.getElementById("hyper").onclick = function(){
    event.preventDefault();//終止預設行為
}
</script>
```
```
<div id="div1">
   <a id="web" href="https://google.com">google<a>
</div>
<script type="text/javascript">

document.getElementById("web").onclick = function(){
    event.preventDefault();//終止預設行為
    console.log("web click");
}

document.getElementById("div1").onclick = function() {
    console.log("div1 click");
}
</script>
```
當我們點擊超連結，console 顯示訊息的順序為「web click」>「div1 click」，因為我們點擊超連結後browser先幫我們執行了 web所註冊的Click 事件，接著因為我們的 web 被包在 div 裡面，進而 div 所註冊的事件就被「傳導」到了 web 上，所以當我們點擊了 web 的同時不只自己本身的Click事件被觸發，連同div 所註冊的事件也會被觸發，這個結果就是所謂的事件傳導。

只要加入 event.stopPropagation()就不會有事件傳導的結果囉。
```
<div id="div1">
   <a id="web" href="https://google.com">google<a>
</div>
<script type="text/javascript">

document.getElementById("web").onclick = function(){
    event.preventDefault();//終止預設行為
    event.stopPropagation();//終止事件傳導
    console.log("web click");
}

document.getElementById("div1").onclick = function() {
    console.log("div1 click");
}
</script>
```

參考資料：<a href="https://dotblogs.com.tw/harry/2016/09/10/131956">event.preventDefault() 與 event.stopPropagation() 的差異</a>