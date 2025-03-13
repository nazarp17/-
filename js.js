// 1 запит GET: отримання списку постів
async function fetchPosts() {
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/posts');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const posts = await response.json();
        console.log(posts);
    } catch (error) {
        console.error('Error fetching posts:', error);
    }
}

// 2 запит POST: Надсилання нового поста
async function createPost() {
    try {
        const newPost = {
            title: 'My New Post',
            body: 'This is the content of my new post.',
            userId: 1
        };
        
        const response = await fetch('https://jsonplaceholder.typicode.com/posts', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newPost)
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        
        const result = await response.json();
        console.log('Post created:', result);
    } catch (error) {
        console.error('Error creating post:', error);
    }
}

//  додаткове завдання
async function fetchUsersAndPosts() {
    try {
        const usersResponse = await fetch('https://jsonplaceholder.typicode.com/users');
        if (!usersResponse.ok) {
            throw new Error(`HTTP error! Status: ${usersResponse.status}`);
        }
        
        const users = await usersResponse.json();
        
        const postsPromises = users.map(user => 
            fetch(`https://jsonplaceholder.typicode.com/posts?userId=${user.id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
        );
        
        const usersPosts = await Promise.all(postsPromises);
        
        users.forEach((user, index) => {
            console.log(`Posts for user ${user.name}:`, usersPosts[index]);
        });
    } catch (error) {
        console.error('Error fetching users and posts:', error);
    }
}

// Виконання функцій
createPost();
fetchUsersAndPosts();
