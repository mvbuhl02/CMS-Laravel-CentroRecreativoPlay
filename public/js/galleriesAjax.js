const fetchImagesButton = document.getElementById("fetch-images");

page = 0;

function reply_click(id){
    const imagesContainer = document.getElementById("images-container"+id);
    page++;
fetch("loadGalleries?id=" + id + "&page=" + page, {
  method: "GET",
  headers: {
    "Content-Type": "application/json;charset=UTF-8"
  }
})
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error("Erro ao obter dados:", error);
  });
}
