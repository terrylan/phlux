(async () => {
  try {
    await Phlux.api.scan('/data.php');
    console.log('API scanned successfully');
  } catch (e) {
    console.error('API scan failed in app.js:', e.message);
  }
})();

function loadUser() {
  Phlux.try(() => {
    const id = document.getElementById('userId').value;
    const user = Phlux.api.getUser(id);
    return user.then(data => {
      Phlux.Session.set('username', data.name);
      console.log('Set username:', Phlux.Session.get('username'));
    });
  }).catch(e => Phlux.echo('Error: ' + e.message));
}

function loadPosts() {
  Phlux.try(() => {
    const posts = Phlux.api.getPosts();
    return posts.then(data => {
      Phlux.Session.set('posts', data);
      console.log('Set posts:', Phlux.Session.get('posts'));
    });
  }).catch(e => Phlux.echo('Error: ' + e.message));
}

function saveComment() {
  Phlux.try(() => {
    const postId = document.getElementById('postId').value;
    const comment = document.getElementById('comment').value;
    const result = Phlux.api.saveComment(postId, comment);
    return result.then(data => {
      Phlux.Session.set('commentStatus', `Comment saved for Post ${data.postId}`);
      console.log('Set commentStatus:', Phlux.Session.get('commentStatus'));
    });
  }).catch(e => Phlux.echo('Error: ' + e.message));
}
