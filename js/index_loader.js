$.ajaxSetup({ cache: false });

var news;

$.get("../data/news.json", function (data) {
    news = data;
    var target = document.getElementById("news");
    for ( var i=0; i<news.length; i++ )
    {
        var title = document.createElement("h2");
        title.innerHTML = "#"+i+" | "+news[i].title;
        var text = document.createElement("p")
        text.innerHTML = news[i].text;
        target.appendChild(title);
        target.appendChild(text);
    }
});