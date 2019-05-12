const request = require('request');

const options = {
  url: 'https://api.twitch.tv/helix/games/top',
  headers: {
    'Client-ID': 'be00453jnj8hxjnyratke1dcm1invd',
  },
};

request(options, (error, response, body) => {
  if (!error && response.statusCode === 200) {
    const obj = JSON.parse(body);
    for (let i = 0; i < obj.data.length; i += 1) {
      console.log(obj.data[i].id, obj.data[i].name);
    }
  }
});
