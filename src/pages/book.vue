<template lang="pug">
    #book.container.center
        #darker
        h1 {{ book.title }}
        p {{ book.annotation }}
        hr
        .box
            .col1
            .col10
                p.left.text {{ book.body }}
            .col1
        router-link(to="/books") << back
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


<style lang="less">
    #book {
        .text {
            text-indent: 40px;
            line-height: 1.5em;
        }
    }
</style>