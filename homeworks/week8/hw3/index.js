const request = new XMLHttpRequest();

request.onload = () => {
  if (request.status >= 200 && request.status < 400) {
    const response = request.responseText;
    const json = JSON.parse(response);
    json.streams.forEach((data) => {
      const div = document.createElement('div');
      div.classList.add('channels');
      div.innerHTML = `
      <a href=${data.channel.url} target="_blank" class="link">
        <div class="col">
          <img src="${data.preview.medium}"/>
          <div class="intro">
            <div class="logo">
              <img src="${data.channel.logo}"/>
            </div>
            <div class="desc">
              <div class="title">
              ${data.channel.status}
              </div>
              <div class="name">
              ${data.channel.display_name}
              </div>
            </div>
          </div>
        </div>
      </a>
      `;

      document.querySelector('.main-page').appendChild(div);
    });
  }
};

request.open('GET', 'https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=20', true);
request.setRequestHeader('Content-Type', 'application/vnd.twitchtv.v5+json');
request.setRequestHeader('Client-ID', 'be00453jnj8hxjnyratke1dcm1invd');
request.send();
