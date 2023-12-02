function searchProducts() {
    var input = document.getElementById('search-box').value;

    if (input.length === 0) {
        document.getElementById('suggestions').style.display = 'none';
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('suggestions').innerHTML = this.responseText;
            document.getElementById('suggestions').style.display = 'block';
        }
    };
    xhr.open("GET", "search.php?q=" + encodeURIComponent(input), true);
    xhr.send();
}