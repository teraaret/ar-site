<template lang="pug">
    #book
        .container.center
            h1 Books page
            .box
                .col4(v-for="(book, index) in books").book
                    router-link(:to="{ name: 'book', params: { id: index } }")
                        img(src="../img/book.png")
                        h2 {{ book.title }}
                        p {{ book.genre }}
                        p.hidden {{ book.annotation }}
</template>

<script>
    var books = require('../data/books.js')
    
    module.exports = {
        data: function()
        {
            return {
                books: books
            }
        }
    }
</script>

<style lang="less">
    #book {
        font-family: 'Roboto Condensed', sans-serif;
        line-height: 24px;
        
        .book {
            cursor: pointer;
            transition: 0.25s ease;
            
            a {
                text-decoration: none;
                color: black;
            }
            img {
                margin-top: 20px;
                width: 150px;
                transition: 0.25s ease;
            }
            h2 {
                font-weight: 200;
                margin: 0;
                padding: 0;
                position: relative;
                top: -16px;
                transition: 0.25s ease;
            }
            p {
                position: relative;
                top: -20px;
                transition: 0.25s ease;
            }
            p.hidden {
                opacity: 0;
            }
            
            &:hover {
                background-color: orange;
            }
            &:hover img {
                width: 180px;
            }
            &:hover p.hidden {
                opacity: 1;
            }  
        }
    }
</style>