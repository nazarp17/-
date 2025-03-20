
const urls = [
    "https://jsonplaceholder.typicode.com/todos/1",
    "https://jsonplaceholder.typicode.com/todos/2",
    
  ];
  
 
  async function fetchData(url) {
    try {
    
      if (Mat.random() < 0.3) throw new Error(`Помилка запиту до ${url}`);
  
      const response = await fetch(url);
      if (!response.ok) throw new Error(`HTTP помилка: ${response.status}`);
  
      return await response.json();
    } catch (error) {
      throw error;
    }
  }
  

  async function fetchAllData(urls) {
    let results = await Promise.allSettled(urls.map(fetchData));

    const failedUrls = urls.filter((_, index) => results[index].status === "rejected");
  

    if (failedUrls.length > 0) {
      console.log("Повторний запит для помилкових URL...");
      await new Promise((resolve) => setTimeout(resolve, 1000));
  
      const retryResults = await Promise.allSettled(failedUrls.map(fetchData));
  
    
      retryResults.forEach((result, index) => {
        const originalIndex = urls.indexOf(failedUrls[index]);
        results[originalIndex] = result;
      });
    }
  
    console.log("Результати запитів:", results);
  }
  
  
  fetchAllData(urls);