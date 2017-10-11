<template lang="pug">
    #heroes.container
        h1.header Heroes
        hr
        .box
            .col3
            .col6.center
                input(type="search" placeholder="search by name..." v-model="search")
            .col3
        .box    
            .col3
            .col3.right
                select(v-model='search_race')
                    option(value="" selected) choose race...
                    option(disabled) ---
                    option(value="sahi") sahi
                    option(value="ahomir") ahomir
            .col3
                select(v-model='search_subrace')
                    option(value="" selected) choose subrace...
                    option(disabled) ---
                    option(value="skamat") skamat
                    option(value="salar") salar
                    option(value="riat") riat
            .col3
        .box
            .col3
            .col6.center
                ul
                    li(@click="search_gender = ''") any
                    li(v-for="(gender, index) in genders" @click="search_gender = genders[index]") {{ gender }}
            .col3
        .debug(v-if='debug')
            hr
            h3 debug
            p name: {{ search }}
            p race: {{ search_race }}
            p subrace: {{ search_subrace }}
            p gender: {{ search_gender }}
        hr
        .box
            .colauto.center.hero(v-for="(hero,index) in heroes" v-if="check(hero)" @click="info(index)") {{ hero.title }}
        .closer(v-if="text_hero" @click="close")
        h2.title(v-if="text_hero") {{ text_hero }}
        p.text {{ text_bio }}
</template>

<script>
    var heroes = require('../data/heroes.js')

    module.exports = {
        data: function() {
            return {
                debug: true,
                search: '',
                genders: ['mmale', 'female', 'irami', 'shelt', 'andigma'],
                heroes: heroes,
                text_hero: '',
                text_bio: '',
                search_race: '',
                search_subrace: '',
                search_gender: ''
            }
        },
        methods: {
            info: function(index) {
                this.text_hero = this.heroes[index].title;
                this.text_bio = this.heroes[index].bio;
            },
            close: function() {
                this.text_hero = '';
                this.text_bio = '';
            },
            check: function(hero) {
                let search_points = 0;
                if ( hero.title.toLowerCase().indexOf(this.search.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.race.toLowerCase().indexOf(this.search_race.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.subrace.toLowerCase().indexOf(this.search_subrace.toLowerCase()) != -1 ) { search_points += 1 }
                if ( hero.gender.toLowerCase().indexOf(this.search_gender.toLowerCase()) != -1 ) { search_points += 1 }
                if ( search_points == 4 ) { return true } else { return false }
            }
        },
        created: function() {
        }
    }
    
    
</script>

<style lang="less">
    .col3 {
/*        background-color: red;*/
    }
    #heroes {
        input,select {
            width: 400px;
            font-size: 16px;
            background-color: transparent;
            border: none;
            border: 1px solid white;
            border-radius: 5px;
            color: white;
            padding: 10px 10px;
            margin: 0 auto;
        }
        
        input {
            width: 400px;
        }
        select {
            width: 200px;
            background: transparent;
            -webkit-appearance: none;
            option {
                background-color: black;
            }
        }
        
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            li {
                display: inline-block;
                font-size: 20px;
                padding-left: 10px;
                padding-right: 10px;
                transition: 0.25s ease;
                &:hover {
                    color: white;
                    cursor: pointer;
                }
            }
        }
        
        .hero {
            border-bottom: 2px solid #999;
            transition: 0.25s ease;
            &:hover {
                color: white;
                border-color: white;
                cursor: pointer;
            }
        }
        
        .closer {
            background-image: url(../img/close.png);
            background-size: 100%;
            width: 28px;
            height: 28px;
            position: relative;
            top: 64px;
            cursor: pointer;
            float: right;
        }
        
        h2.title {
            margin-top: 66px;
            font-size: 30px;
            font-weight: 300;
            color: white;
        }

        p.text {
            margin-top: 20px;
            color: #999;
            font-size: 20px;
        }
        
    }

</style>
