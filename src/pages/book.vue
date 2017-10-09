<template lang="pug">
    #book
        h1 {{ book.title }}
        p {{ book.annotation }}
        hr
        p {{ book.body }}
</template>


<script>
    var books = require('../data/books')
    
    module.exports = {
        data: function()
        {
            return {
                books: books,
                book: null
            }
        },
        created: function()
        {
            var bookId = this.$route.params.id
            this.book = this.books[bookId]
        }
    }
</script>