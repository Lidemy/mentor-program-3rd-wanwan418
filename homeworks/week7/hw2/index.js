document.querySelector('.button').addEventListener('click',
  () => {
    const content = document.querySelectorAll('.content');
    const require = document.querySelectorAll('.required');
    const hint = document.querySelectorAll('.content__hint');
    // const value = require.value;
    for (let i = 0; i <= 6; i += 1) {
      if (require[i].value === '') {
        // document.querySelector('.content').style.background = 'rgb(251, 223, 226)';
        require[i].style.background = 'rgb(251, 223, 226)';
        require[i].parentElement.style.background = 'rgb(251, 223, 226)';
        hint[i].innerHTML = "<p style='color:red;'>這是必填問題</p>";
      } else {
        require[i].style.background = 'white';
        require[i].parentElement.style.background = 'white';
        hint[i].innerHTML = '';
      }
    }
    const radio1 = document.querySelector('.radio[value="zero"]');
    const radio2 = document.querySelector('.radio[value="one"]');
    if (!radio1.checked && !radio2.checked) {
      content[2].style.background = 'rgb(251, 223, 226)';
      radio1.style.background = 'rgb(251, 223, 226)';
      radio2.style.background = 'rgb(251, 223, 226)';
      hint[2].innerHTML = "<p style='color:red;'>這是必填問題</p>";
    } else {
      content[2].style.background = 'white';
      radio1.style.background = 'white';
      radio2.style.background = 'white';
      hint[2].innerHTML = '';
    }
  });
