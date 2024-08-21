const search = document.getElementById("search-btn");
var inputData = document.getElementById("searchInput");
const blog = {
    articles: [
      { '1': 'ff', description: 'Description 1', url: 'URL 1' },
      { '2': 'Article 2', description: 'Description 2', url: 'URL 2' },
      // Add more articles as needed
    ],
  };

function getInputValue() {
    const inputValue = inputData.value;
    console.log(inputValue.toLowerCase());
    search(inputValue);
}


search.addEventListener('click', getInputValue);
function search(data) {
    if (data.toLowerCase().includes("ff")){
        console.log(blog.articles[1]);
    }
}