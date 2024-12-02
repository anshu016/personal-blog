// Fetch and display posts on the homepage
window.onload = function() {
    fetch('http://localhost/personal-blog/backend/api/posts.php')
        .then(response => response.json())
        .then(posts => {
            const postsList = document.getElementById('posts-list');
            posts.forEach(post => {
                const postCard = document.createElement('div');
                postCard.classList.add('post-card');
                postCard.innerHTML = `
                    <img src="${post.image || 'https://via.placeholder.com/400x200'}" alt="${post.title}">
                    <h2>${post.title}</h2>
                    <p>${post.content.substring(0, 100)}...</p>
                    <a class="view-more" href="post.html?id=${post.id}">Read More</a>
                `;
                postsList.appendChild(postCard);
            });
        })
        .catch(error => console.error('Error fetching posts:', error));
};

// Handle post creation form submission
document.getElementById('create-post-form')?.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const category = document.getElementById('category').value;

    // Basic client-side validation
    if (!title || !content || !category) {
        alert('All fields are required');
        return;
    }

    const postData = { title, content, category };

    fetch('http://localhost/personal-blog/backend/api/posts.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(postData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Post created successfully!');
            window.location.href = 'index.html'; // Redirect to homepage
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
