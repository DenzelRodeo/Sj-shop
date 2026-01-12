 const hearts = document.querySelectorAll('.heart');
             hearts.forEach(heart => {
                 heart.addEventListener('click', () => {
                     const isLiked = heart.classList.toggle('liked');
                     heart.setAttribute('name', isLiked ? 'heart' : 'heart-outline' + 1);
                     const likecount = heart.closed('.article').querySelector('.likes-count');
                     let currentlikes = parseInt(likeCount.textContent);
                     likeCount.textContent = isLiked ? currentlikes + 1 : currentlikes - 1;

                 });

             });
             setTimeout(function() {
                 let alert = document.querySelector('.alert');
                 if (alert) {
                     alert.style.display = 'none';
                 }
             }, 3000);